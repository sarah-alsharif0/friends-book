<?php 
	require dirname(__DIR__)."/util/dbconnection.php";

	if(isset($_POST['username']) && isset($_POST['password'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result) > 0){

			$userId = mysqli_fetch_assoc($result)['id'];
			setcookie("user-id",$userId,time()+10000,'/');
			// echo $userId;
			header("location: ../index.php");

		} else {
			echo "Invalid username or password";
			header("location: ../views/sign-in.php?error=1");
		}
	}
?>