<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<section class="section__add-friend">
		<h3>Add Friend</h3>
		<div class='users-list'>
			<?php
				
				require dirname(__DIR__)."/models/fetchUsers.php";

				fetchNonFriendsUsers($userId);
			?>
		</div>
		
	</section>
	<section class="section__posts">

		<?php
				require dirname(__DIR__)."/models/fetchPosts.php";
			
				fetchUserAndFriendsPosts($userId);
		?>
		
	</section>
</body>
</html>