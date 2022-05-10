<?php 
	
	$serverName = "localhost";
	$username = "user";
	$password = "user";
	$database = "friends-book";

	$conn = mysqli_connect($serverName, $username, $password, $database);

	if(!$conn){
		die("Cannot connect to database".mysqli_connect_error());
	}

?>