<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="../styles/post.css">
	<link rel="stylesheet" type="text/css" href="../styles/profile.css">
	<link rel="stylesheet" type="text/css" href="../styles/userInfotmation.css">
	<link rel="stylesheet" type="text/css" href="../styles/comment.css">
	<title>My Profile</title>
</head>
<body>
	
	<?php 
		if (isset($_COOKIE["user-id"])){
		    $userId = $_COOKIE["user-id"];

		    require dirname(__DIR__)."/util/dbconnection.php";
		    require dirname(__DIR__)."/components/navbar.php";
			require dirname(__DIR__)."/components/userInformation.php";
			require dirname(__DIR__)."/models/getPosts.php";


		    echo navbar("profile");
			
				
			// echo getUserPosts($userId);
		} else {
		    header("location:sign-in.php");
		}
	?>
	<main>
		<?php
		echo userInformation($userId);
		echo getUserPosts($userId);
		?>
	<main>
</body>
</html>