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
					$posts.=post($row['id'],$row['user-id'],$row['image-url'],$row['text-content'],$row['date']);								
				}
				return $posts;
			} else {
				return "<h3 class='message'>No posts found</h3>";
			}
		} else {
			echo mysql_error($conn);
		}


		mysqli_close($conn);
	}

	function getUserPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/getPostInteractions.php";

		$query = "SELECT `first-name` , `last-name`, `image-url` FROM user WHERE id=$userId";
		$result = mysqli_query($conn,$query);

		if($result){
			$rowInfo = mysqli_fetch_assoc($result);

			$lastName = $rowInfo["last-name"];
			$firstName = $rowInfo["first-name"];
			$imageUrl = $rowInfo["image-url"];

			$query = "SELECT * FROM post WHERE `user-id`= $userId ORDER BY `date` DESC";

			$result = mysqli_query($conn,$query);

			if($result){
				if(mysqli_num_rows($result) > 0 ){

					while($row = mysqli_fetch_assoc($result)){

						$postImgUrl = $row["image-url"];
						$postTextContent = $row["text-content"]; 

						echo "<div class='post'>
							  	<h4>$firstName $lastName</h4>
							  	<p>$postTextContent</p>
							  	<img src=$postImgUrl>
						  	  </div>";
						echo getNumberOfPostLikes($row['id']);
						getPostComments($row['id']);
					}

				} else echo "<h4 class='message'>No posts found</h4>";
				
			} else echo mysql_error($conn);
			 						
		} else echo mysql_error($conn);

		mysqli_close($conn);
	}
	


	
					
?>