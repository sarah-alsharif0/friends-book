<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/sign-up.css">
	<title>Sign Up</title>
</head>
<body>
	<?php
		if (isset($_COOKIE["user-id"])){
			header("location:home.php");
		}
	?>
	<div class="container">
		<div class="title">Registration</div>
	<form action="../controllers/addUser.php" method="post">
		<div class="user_details">
		<div class="form__field-container">
			<label for="first-name">First Name</label>
			<input type="text" id="first-name" name="first-name" placeholder="enter your first name" required> 
		</div>
		<div class="form__field-container">
			<label for="last-name">Last Name</label>
			<input type="last-name" id="last-name" name="last-name" placeholder="enter your last name" required>
		</div>
		<div class="form__field-container">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="enter your user name" required>
			<?php
			if(isset($_GET['error']))
			 if (($_GET['error'])==1 ||($_GET['error'])==3 ){       
				?>
				<div>
					<sapn class="alert">User Name Already in Use</span>
				</div>
				<?php
			}
			?>
		</div>
		<div class="form__field-container">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" placeholder="enter your email" required>
			<?php
			if(isset($_GET['error']))
			 if (($_GET['error'])==2 ||($_GET['error'])==3){
                            
				?>
			 	<div>
					<sapn class="alert">Email Already in Use</span>
				</div>
			 	<?php
			}
			?> 
		</div>
		<div class="form__field-container">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="enter your password" required>
		</div>
		<div class="form__field-container">
			<label for="teleNo">Telephone Number</label>
			<input type="number" id="teleNo" name="teleNo" placeholder="enter mobile number" required>
		</div>
		<div class="form__field-container">
			<label for="address">Address</label>
			<input id="address" name="address" type="text" placeholder="enter your address"required >
		</div>
		<div class="form__field-container">
			<label for="image-url">Image Url</label>
			<input type="text" id="image-url" name="image-url" placeholder="enter image link"required>
		</div>
		</div>
		<div class="gender-container">
			<span class=".gender__label">Gender</span>
			<br>
			<div class="gender__title"
			><div>
			<label for="female">Female</label>
			<input type="radio" id="female" name="gender" value="female" required>
			</div>
			<div>
			<label for="male">Male</label>
			<input type="radio" name="gender" id="male" value="male">
	        </div>
		</div>
			
		</div>
		
		<button type="submit">Sign Up</button>
	</form>
	</div>
</body>
</html>