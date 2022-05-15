<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="../styles/home.css">
	<link rel="stylesheet" type="text/css" href="../styles/post.css">
	<link rel="stylesheet" type="text/css" href="../styles/comment.css">
	<link rel="stylesheet" type="text/css" href="../styles/userCard.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	

	<title>Home</title>
	<script>
		$(document).ready(function() {
			var oldData = "";
			
			// window.setInterval(()=>{
				
				$.get('../controllers/handlePosts.php', function(data) {
					if(oldData === "")
						oldData = data;
					if(data !== oldData){
						console.log('modified');
						$('#posts').empty();
						$('#posts').append(data);
						oldData = data;
					}
				});
			// },3000);

		})
	</script>
	

</head>

<body>

	<?php
	if (isset($_COOKIE["user-id"])) {
		$userId = $_COOKIE["user-id"];

		require dirname(__DIR__) . "/util/dbconnection.php";
	} else {
		header("location:sign-in.php");
	}
	?>

	<?php
	require dirname(__DIR__) . "/components/navbar.php";

	echo navbar("home");

	?>
	<main class="main">
		<section class="section__add-friends">
			<h3 class="add-friends__title">Add Friends</h3>
			<br>
			<div class='add-friends__users-list'>
				<?php

				require dirname(__DIR__) . "/models/users.php";

				echo getNonFriendsUsers($userId);
				?>
			</div>
			
		</section>
		<section id="posts" class="section__posts">

			<?php
			require dirname(__DIR__) . "/models/posts.php";

			echo getUserAndFriendsPosts($userId);
			?>

		</section>
		<section class="section__add-post">

		</section>
	</main>
	<script src="https://kit.fontawesome.com/0b1cfb088a.js" crossorigin="anonymous"></script>
</body>

</html>