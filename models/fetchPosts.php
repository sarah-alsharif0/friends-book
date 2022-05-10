<?php 

	function fetchUserAndFriendsPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/fetchPostInteractions.php";

		$query = "SELECT friends.`user1-id` , friends.`user2-id`, post.* 
				  FROM friends
				  RIGHT JOIN post 
				  ON post.`user-id` = friends.`user1-id` OR post.`user-id` = friends.`user2-id` 
				  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'
				  ORDER BY post.date DESC";

		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					$id = $row['user-id'];
					$query = "SELECT `first-name` , `last-name` FROM user WHERE id=$id";

					$res = mysqli_query($conn,$query);
					if($res){
						$rowInfo = mysqli_fetch_assoc($res);
						$lastName = $rowInfo["last-name"];
						$firstName = $rowInfo["first-name"];
						
						$postImgUrl = $row["image-url"];
						$postTextContent = $row["text-content"]; 
						echo "<div class='post'>
							  	<h4>$firstName $lastName</h4>
							  	<p>$postTextContent</p>
							  	<img src=$postImgUrl>
						  	  </div>";
						  	  echo fetchNumberOfPostLikes($row['id']);
						  	  fetchPostComments($row['id']);
					} else {
						echo mysql_error($conn);
					}							
				}
			} else {
				echo "<h4 class='message'>No posts found</h4>";
			}
		} else {
			echo mysql_error($conn);
		}


		mysqli_close($conn);
	}

	function fetchUserPosts($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/fetchPostInteractions.php";

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
						echo fetchNumberOfPostLikes($row['id']);
						fetchPostComments($row['id']);
					}

				} else echo "<h4 class='message'>No posts found</h4>";
				
			} else echo mysql_error($conn);
			 						
		} else echo mysql_error($conn);

		mysqli_close($conn);
	}
	


	
					
?>