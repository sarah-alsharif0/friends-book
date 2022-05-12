<?php
	
	function checkForFriendRequest($userSent,$userRecieved){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT id FROM request WHERE `userSent-id`=$userSent AND `userRecieved-id`= $userRecieved";

		$result = mysqli_query($conn,$query);
		if($result){
			if($row = mysqli_num_rows($result) > 0){
				return $row['id'];
			} else {
				return null;
			}
		} else {
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}

	function acceptRequest($requestId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM request WHERE id=$requestId";

		$result = mysqli_query($conn,$query);
		if($result){
			if($row = mysqli_num_rows($result) > 0){
				$query = "INSERT INTO friends (`user1-id`,`user2-id`) VALUES ($rows['userSent-id'],$row['userRecieved-id']);
					DELETE FROM request WHERE id=$requestId;
				";
				$result = mysqli_multi_query($conn,$query);
				if(!$result){
					echo mysqli_error($conn);
				}
			}
		} else {
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}

	function denyRequest($requestId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "DELETE FROM request WHERE id=$requestId";
		$result = mysqli_query($conn,$query);

		if(!$result){
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	
?>