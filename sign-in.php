<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign in</title>
</head>
<body>
	<form class="form" action="check.php" method="post">
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