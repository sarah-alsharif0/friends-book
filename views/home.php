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
	<link rel="stylesheet" type="text/css" href="../styles/addPostForm.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	

	<title>Home</title>
	<script>
		$(document).ready(function() {
			var oldPosts = "";
			var oldUsers = "";
			
			window.setInterval(()=>{
				
				$.get('../controllers/handleGetPosts.php', function(data) {
					if(oldPosts === "")
						oldPosts = data;
					if(data !== oldPosts){
						$('#posts').empty();
						$('#posts').append(data);
						oldPosts = data;
					}
				});
				
				$.get('../controllers/handleGetUsers.php', function(data) {
					if(oldUsers === "")
						oldUsers = data;
					if(data !== oldUsers){
						$('#add-friends').empty();
						$('#add-friends').append(data);
						oldUsers = data;
					}
				});

			},10000);			

		})
	</script>
	

</head>

<body>

	<?php
	if (!isset($_COOKIE["user-id"])) {
		
		header("location:sign-in.php");
	}
	$userId = $_COOKIE["user-id"];

	include dirname(__DIR__) . "/util/dbconnection.php";
	include_once dirname(__DIR__) . "/components/navbar.php";

	echo navbar("home");

	?>
	<main class="main">
		<section class="section__add-friends" >
			<h3 class="add-friends__title">Add Friends</h3>
			<br>
			<div class='add-friends__users-list' id="add-friends">
				<?php

				include_once dirname(__DIR__) . "/models/users.php";

				echo getNonFriendsUsers($userId);
				?>
			</div>
			
		</section>
		<section id="posts" class="section__posts">

			<?php
			include_once dirname(__DIR__) . "/models/posts.php";

			echo getUserAndFriendsPosts($userId);
			?>

		</section>
		<section class="section__add-post" >
		<?php

			include_once dirname(__DIR__) . "/components/addPostForm.php";

			echo addPostForm();
		?>
		</section>
	</main>
	<script src="https://kit.fontawesome.com/0b1cfb088a.js" crossorigin="anonymous"></script>
</body>

</html>