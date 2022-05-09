<?php 
	require 'connection.php';

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) > 0){
			setcookie("username",$username,time()+1000);
			header("location:index.php");
		} else {
			echo "Invalid username or password";
			header("location: login.php?error=1");
		}
	}
?>