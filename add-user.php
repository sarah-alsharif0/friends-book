<?php 
	require 'connection.php';

	if(isset($_POST['username']) && 
	   isset($_POST['password']) &&
	   isset($_POST['first-name']) &&
	   isset($_POST['last-name']) &&
	   isset($_POST['gender']) &&
	   isset($_POST['email']) &&
	   isset($_POST['address']) &&
	   isset($_POST['teleNo']) &&
	   isset($_POST['image-url']) 
		){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstName = $_POST['first-name'];
	$lastName = $_POST['last-name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$teleNo = $_POST['teleNo'];
	$imageUrl = $_POST['image-url'];

	$query = "INSERT INTO user (username,password,`first-name`,`last-name`,email,address,`tele-No`,gender,`image-url`)  VALUES ('$username','$password','$firstName','$lastName','$email','$address',$teleNo,'$gender','$imageUrl')";


	$result = mysqli_query($conn,$query);
	if($result){
		header("location:index.php");

	} else {
	
		echo mysqli_error($conn);
	}

	} else {
		header("location: sign-up.php?error=1");
	}
?>