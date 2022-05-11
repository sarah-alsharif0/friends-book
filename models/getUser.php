<?php 
	
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