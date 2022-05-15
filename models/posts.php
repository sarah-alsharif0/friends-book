<?php 

	function getUserAndFriendsPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		include_once dirname(__DIR__)."/components/post.php";

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
					$posts.=post($row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;

			} else echo "<h4 class='message'>No posts found</h4>";
			
		} else echo mysqli_error($conn);
			 						
		

		mysqli_close($conn);
	}
	


	
					
?>