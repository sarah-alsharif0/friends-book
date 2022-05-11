<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="../styles/home.css">
	<link rel="stylesheet" type="text/css" href="../styles/post.css">
	<link rel="stylesheet" type="text/css" href="../styles/comment.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<title>Home</title>
</head>
<body>

	<?php 
		if (isset($_COOKIE["user-id"])){
		    $userId = $_COOKIE["user-id"];

		    require dirname(__DIR__)."/util/dbconnection.php";
		

		} else {
		    header("location:sign-in.php");
		}
	?>

		<?php 
			require dirname(__DIR__)."/components/navbar.php";

			echo navbar("home");

		?>
	<main>
		<!-- <section class="section__add-friend">
			<h3>Add Friend</h3>
			<div class='users-list'>
				<?php
					
					require dirname(__DIR__)."/models/getUsers.php";

					getNonFriendsUsers($userId);
				?>
			</div>
			
		</section> -->
		<section class="section__posts">

			<?php
					require dirname(__DIR__)."/models/getPosts.php";
				
					echo getUserAndFriendsPosts($userId);
			?>
			
		</section>
	</main>
	<script src="https://kit.fontawesome.com/0b1cfb088a.js" crossorigin="anonymous"></script>
	</body>
</html>