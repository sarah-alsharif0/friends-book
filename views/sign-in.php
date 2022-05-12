<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../styles/sign-in.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign in</title>
</head>
<body>
	<?php
		if (isset($_COOKIE["user-id"])){
			header("location:home.php");
		}
	?>
	<form class="form" action="../controllers/check.php" method="post">
		<div class="form__field-container">
			<label for="">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter username">
		</div>
		<div class="form__field-container">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter password">
		</div>
		<button type="submit">Sign In</button>
	</form>
	<?php
                        if (isset($_GET['error'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                            Invalid Username or Password!
                            </div>
                          <?php
                        }
                    ?>
</body>
</html>