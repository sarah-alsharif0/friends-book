<?php
	
	function checkIfFriend($firstUserId, $secondUserId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT id FROM friends WHERE (`user1-id`=$firstUserId AND `user2-id`= $secondUserId) OR (`user2-id`=$firstUserId AND `user1-id`= $secondUserId)";
		
		$result = mysqli_query($conn,$query);
		if($result){
			if($row = mysqli_num_rows($result) > 0){
				return true;
			} else {
				return false;
			}
		} else {
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}


	function checkForFriendRequest($userSent,$userRecieved){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT id FROM request WHERE `userSent-id`=$userSent AND `userRecieved-id`= $userRecieved";

		$result = mysqli_query($conn,$query);
		if($result){
			if($row = mysqli_num_rows($result) > 0){
				return true;
			} else {
				return false;
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

				$userSent = $rows["userSent-id"];
				$userRecieved = $row["userRecieved-id"];

				$query = "INSERT INTO friends (`user1-id`,`user2-id`) VALUES ($userSent,$userRecieved);
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

	function getRequestId($firstUserId,$secondUserId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT id from request WHERE (`userSent-id`=$firstUserId AND `userRecieved-id` = $secondUserId)";
		$result = mysqli_query($conn,$query);

		if($result){

			$reqId = mysqli_fetch_assoc($result)['id'];
			return $reqId;

		} else echo mysqli_error($conn);

		mysqli_close($conn);

	}

	function sendRequest($userId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$currUserId = $_COOKIE["user-id"];

		$isRecieved = checkForFriendRequest($userId,$currUserId);

		if($isRecieved)
			return;
		
		$query = "INSERT INTO request (`userSent-id`,`userRecieved-id`) VALUES ($userId,$currUserId)";

		$result = mysqli_query($conn,$query);

		if(!$result){
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	
?>