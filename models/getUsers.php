<?php

	function getNonFriendsUsers($userId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT friends.`user1-id` , friends.`user2-id`, user.*
					  FROM friends
					  RIGHT JOIN user 
					  ON user.id != friends.`user1-id` AND user.id != friends.`user2-id` 
					  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'";

		$result = mysqli_query($conn,$query);

		if ($result) {
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)) {
					$firstName = $row['first-name'];
					$lastName = $row['last-name'];
					$imageUrl = $row['image-url'];
					$id = $row['id'];
					echo "
							<div class='users-list__user'>
								<img class='user__image' src=$imageUrl>
								<span class='user__name'>$firstName $lastName</span>
								<button onClick>Add</button>
							</div>
						  ";
			}
			} else {
				echo "<h3>No users found</h3>";
			}
		} else {
			echo mysql_error($conn);
		}

		mysqli_close($conn);
	}

	function getFriendsUsers($userId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT friends.`user1-id` , friends.`user2-id`, user.*
				  FROM friends
				  RIGHT JOIN user 
				  ON user.id != $userId AND (user.id = friends.`user1-id` OR user.id = friends.`user2-id`)  
				  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'";

		$result = mysqli_query($conn,$query);

		if ($result) {
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)) {
					$firstName = $row['first-name'];
					$lastName = $row['last-name'];
					$imageUrl = $row['image-url'];
					$id = $row['id'];
					echo "
							<div class='users-list__user'>
								<img class='user__image' src=$imageUrl>
								<span class='user__name'>$firstName $lastName</span>
							</div>
						  ";
			}
			} else {
				echo "<h3>No users found</h3>";
			}
		} else {
			echo mysql_error($conn);
		}

		mysqli_close($conn);
	}
?>