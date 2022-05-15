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
	<div class="container">
	<div class="title">Log in</div>
	<form class="form" action="../controllers/check.php" method="post">
	<div class="user_details">
		<div class="form__field-container">
			<label for="">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter username" required>
		</div>
		<div class="form__field-container">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter password" required>
		</div>
		<?php
                        if (isset($_GET['error'])){
                            ?>
                            <div  role="alert">
                            <span class="alert ">Invalid Username or Password!</span>
                            </div>
                          <?php
                        }
                    ?>
	</div>
	
		<button type="submit">Sign In</button>
		
	</form>
	<span class= "routing_sign-up">Not have an account? <a href="../views/sign-up.php">Sign up here</a></span>
	</div>


</body>
</html>