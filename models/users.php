<?php

	function getNonFriendsUsers($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/components/userCard.php";

		$query = "SELECT friends.`user1-id` , friends.`user2-id`, user.*
					  FROM friends
					  RIGHT JOIN user 
					  ON user.id != friends.`user1-id` AND user.id != friends.`user2-id` 
					  WHERE friends.`user1-id`='$userId' OR friends.`user2-id`='$userId'";

		$result = mysqli_query($conn,$query);

		if ($result) {
			if(mysqli_num_rows($result) > 0){
				$users = "";
				while ($row = mysqli_fetch_assoc($result)) {
					$firstName = $row['first-name'];
					$lastName = $row['last-name'];
					$imageUrl = $row['image-url'];
					$id = $row['id'];
					
					$users .= userCard($id,$firstName,$lastName,$imageUrl);
			}
			return $users;
			} else {
				echo "<h3>No users found</h3>";
			}
		} else {
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}

	function getFriendsUsers($userId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/components/userCard.php";

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
					$users .= userCard($id,$firstName,$lastName,$imageUrl);
			}
			return $users;
			} else {
				echo "<h3>No users found</h3>";
			}
		} else {
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}

		function getUserInfo($userId) {
		require dirname(__DIR__)."/util/dbconnection.php";		

		$query = "SELECT * FROM user WHERE id = $userId";

		$result = mysqli_query($conn,$query);

		if($result){
			$userInfo = mysqli_fetch_assoc($result);
			$array=array("id"=> $userInfo['id'],"username"=>$userInfo['username'],
						 "email"=>$userInfo['email'],"first-name"=>$userInfo['first-name'],
						 "last-name"=>$userInfo['last-name'],"tele-No"=>$userInfo['tele-No'],
						 "address"=>$userInfo['address'],"image-url"=>$userInfo['image-url']);
			return $array;

		} else echo mysqli_error($conn);
	}
?>