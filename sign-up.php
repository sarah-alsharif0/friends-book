<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
</head>
<body>
	<form action="add-user.php" method="post">
		<div class="form__field-container">
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
		</div>
		<div class="form__field-container">
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="form__field-container">
			<label for="first-name">First Name</label>
			<input type="text" id="first-name" name="first-name">
		</div>
		<div class="form__field-container">
			<label for="last-name">Last Name</label>
			<input type="last-name" id="last-name" name="last-name">
		</div>
		<div class="form__field-container">
			<label for="teleNo">Telephone Number</label>
			<input type="number" id="teleNo" name="teleNo">
		</div>
		<div class="form__field-container">
			<label for="address">Address</label>
			<input id="address" name="address" type="text">
		</div>
		<div class="form__field-container">
			<label for="email">Email</label>
			<input type="email" id="email" name="email">
		</div>
		<div class="form__field-container">
			<label>Gender</label>
			<label for="female">Female</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="male" value="male">
		</div>
		<div class="form__field-container">
			<label for="image-url">Image Url</label>
			<input type="text" id="image-url" name="image-url">
		</div>
		<button type="submit">Sign Up</button>
	</form>
		<?php
                        if (isset($_GET['error'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                            Fields cannot be empty!
                            </div>
                          <?php
                        }
                    ?>
</body>
</html>