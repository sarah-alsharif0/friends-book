<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Friends Book</title>
</head>
<body>
	
	<?php
		require "util/dbconnection.php";
		
		if (isset($_COOKIE["user-id"])){
			header("location:views/home.php");
		}
		else{
		    header("location:views/sign-in.php");
		}

	?>
</body>
</html>