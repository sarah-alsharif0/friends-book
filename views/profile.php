<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/navbar.css">
	<title>My Profile</title>
</head>
<body>
	<?php 
		if (isset($_COOKIE["user-id"])){
		    $userId = $_COOKIE["user-id"];

		    require dirname(__DIR__)."/util/dbconnection.php";
		    require dirname(__DIR__)."/components/navbar.php";

		    echo navbar("profile");

		} else {
		    header("location:sign-in.php");
		}
	?>
</body>
</html>