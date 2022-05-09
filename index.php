<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Friends Book</title>
</head>
<body>
	
	<?php
		require 'dbconnect.php';

if (isset($_COOKIE['username'])){
    echo "Welcome " . $_COOKIE['username'] . "<br>f";
    echo "<a href='logout.php'>Logout</a><br>";
}
else{
    header("location:sign-in.php");
}


	?>
</body>
</html>