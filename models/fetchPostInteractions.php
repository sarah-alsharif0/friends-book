<?php 

	function fetchPostComments($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM comment WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){
			if(mysqli_num_rows($result) > 0 ){

				while($row = mysqli_fetch_assoc($result)){
					
					$userId = $row["commentedUser-id"];
					$query = "SELECT `first-name` , `last-name`, `image-url` FROM user 
						      WHERE id=$userId";

					$res = mysqli_query($conn,$query);

					if($res){
					
							$rowInfo = mysqli_fetch_assoc($res);
							$firstName = $rowInfo["first-name"];
							$lastName = $rowInfo["last-name"];

							$imageUrl = $rowInfo["image-url"];

							echo $firstName . " " . $lastName . "<br>";
							echo $row['content']."<br><br>";
					
						
					} else echo mysql_error($conn);
					
				}

			} else echo "<h4 class='message'>No comments</h4>";
			
		} else echo mysql_error($conn);

		mysqli_close($conn);
	}

	function fetchNumberOfPostLikes($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM `like` WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){

			return mysqli_num_rows($result);
			
		} else return mysql_error($conn);

		return mysqli_close($conn);
	}

?>