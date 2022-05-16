<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="../styles/profile.css">
	<link rel="stylesheet" type="text/css" href="../styles/userInformation.css">
	<link rel="stylesheet" type="text/css" href="../styles/post.css">
	<link rel="stylesheet" type="text/css" href="../styles/comment.css">
	<link rel="stylesheet" type="text/css" href="../styles/userCard.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>My Profile</title>
</head>

<body>

	<?php
	if (!isset($_COOKIE["user-id"])) {
		header("location:sign-in.php");
	}
	$userId = $_COOKIE["user-id"];

	require dirname(__DIR__) . "/util/dbconnection.php";
	require dirname(__DIR__) . "/components/navbar.php";
	require dirname(__DIR__) . "/components/userInformation.php";
	require dirname(__DIR__) . "/models/posts.php";
	require dirname(__DIR__) . "/models/users.php";


	echo navbar("profile");
	// echo getUserPosts($userId);

	?>
	<main>
		<section class="user-info__section">
			<?php
			echo userInformation();
			?>
		</section>
		<div class="sections-wrapper">


			<section class="user-friends__section">
				<h3 class="user-friends__title">My Friends</h3>
				<br>
				<?php
				echo getFriendsUsers($userId);
				?>
			</section>

			<section class="user-posts__section" id="posts">
				<?php
				echo getUserPosts($userId);
				?>
			</section>
		</div>
		<main>
			<script src="https://kit.fontawesome.com/0b1cfb088a.js" crossorigin="anonymous"></script>
</body>

</html>