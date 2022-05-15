<?php 

	function getUserAndFriendsPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		include_once dirname(__DIR__)."/components/post.php";

		$query = "SELECT * FROM post 
				  WHERE post.`user-id` = $userId OR `user-id` = (
					SELECT `user2-id` FROM friends WHERE `user1-id` = $userId
				  ) OR `user-id`= (SELECT `user1-id` FROM friends WHERE `user2-id` = $userId)
				  ORDER BY `date` DESC";

		// $query = "SELECT friends.`user1-id` , friends.`user2-id`, post.* 
		// 		  FROM friends
		// 		  RIGHT JOIN post 
		// 		  ON post.`user-id` = friends.`user1-id` OR post.`user-id` = friends.`user2-id` 
		// 		  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'
		// 		  ORDER BY post.date DESC";

		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				$posts = "";
				while($row = mysqli_fetch_assoc($result)){
					$posts.=post($row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;
			} else {
				return "<h3 class='message'>No posts found</h3>";
			}
		} else {
			echo mysqli_error($conn);
		}


		mysqli_close($conn);
	}

	function getUserPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		include_once dirname(__DIR__)."/components/post.php";

		$query = "SELECT * FROM post WHERE `user-id`= $userId ORDER BY `date` DESC";

		$result = mysqli_query($conn,$query);

		if($result){
			if(mysqli_num_rows($result) > 0 ){
				$posts = "";
				while($row = mysqli_fetch_assoc($result)){
					$posts.= post($row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;

			} else echo "<h4 class='message'>No posts found</h4>";
			
		} else echo mysqli_error($conn);		

		mysqli_close($conn);
	}
	
	function addPost($imageUrl,$textContent){
		require dirname(__DIR__)."/util/dbconnection.php";
		
		$userId = $_COOKIE['user-id'];
		$date = date("Y-m-d H:i:s");

		$query = $conn->prepare("INSERT INTO post (`user-id`,`image-url`,`text-content`,`date`)
				  VALUES (?, ?, ?, ?)");
		
		$query->bind_param('isss',$userId,$imageUrl,$textContent,$date);
		$query->execute();
		$query->store_result();
		
	}

	function getPostToUpdate($postId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM post WHERE `id`= $postId";
		$result = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result) > 0 ){
			$postInfo = mysqli_fetch_assoc($result);

			$array=array("id"=> $postInfo['id'],"user-id"=>$postInfo['user-id'],
							"image-url"=>$postInfo['image-url'],"text-content"=>$postInfo['text-content'],
							"date"=>$postInfo['date']);
			return $array;						
	   } else echo "<h4 class='message'>Ops, No posts found !</h4>";


}
					
?>