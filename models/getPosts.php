<?php 

	function getUserAndFriendsPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/getPostInteractions.php";
		require dirname(__DIR__)."/components/post.php";

		$query = "SELECT friends.`user1-id` , friends.`user2-id`, post.* 
				  FROM friends
				  RIGHT JOIN post 
				  ON post.`user-id` = friends.`user1-id` OR post.`user-id` = friends.`user2-id` 
				  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'
				  ORDER BY post.date DESC";

		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				$posts = "";
				while($row = mysqli_fetch_assoc($result)){
					$posts.=post($userId,$row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;
			} else {
				return  "<h4 class='message'>Ops, No posts found !</h4>";
			}
		} else {
			echo mysql_error($conn);
		}


		mysqli_close($conn);
	}

	function getUserPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/components/post.php";

		$query = "SELECT * FROM post WHERE `user-id`= $userId ORDER BY `date` DESC";

		$result = mysqli_query($conn,$query);

		if($result){
			if(mysqli_num_rows($result) > 0 ){
				$posts = "";
				while($row = mysqli_fetch_assoc($result)){
					$posts.=post($userId,$row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;

			} else echo "<h4 class='message'>Ops, No posts found !</h4>";
			
		} else echo mysql_error($conn);
			
		mysqli_close($conn);
	}

	
	function getPostToUpdate($postId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM post WHERE `id`= $postId";
		$postInfo = mysqli_query($conn,$query);
		if($postInfo){
		if(mysqli_num_rows($postInfo) > 0 ){
		$postInfo = mysqli_fetch_assoc($postInfo);
		$array=array("id"=> $postInfo['id'],"user-id"=>$postInfo['user-id'],
						 "image-url"=>$postInfo['image-url'],"text-content"=>$postInfo['text-content'],
						 "date"=>$postInfo['date']);
			return $array;						
	   } else echo "<h4 class='message'>Ops, No posts found !</h4>";
	}
		
	}

	

	
	
	
					
?>