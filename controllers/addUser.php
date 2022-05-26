<?php 
	require dirname(__DIR__)."/util/dbconnection.php";
	require dirname(__DIR__)."/models/users.php";
	// require dirname(__DIR__)."/models/validation.php";
	$error=0;

	if(isset($_POST['username']) && 
	   isset($_POST['password']) &&
	   isset($_POST['first-name']) &&
	   isset($_POST['last-name']) &&
	   isset($_POST['gender']) &&
	   isset($_POST['email']) &&
	   isset($_POST['address']) &&
	   isset($_POST['teleNo']) &&
	   isset($_POST['image-url']) 
		){
		
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$firstName = htmlspecialchars($_POST['first-name']);
	$lastName = htmlspecialchars($_POST['last-name']);
	$gender = htmlspecialchars($_POST['gender']);
	$email = htmlspecialchars($_POST['email']);
	$address = htmlspecialchars($_POST['address']);
	$teleNo = htmlspecialchars($_POST['teleNo']);
	$imageUrl = htmlspecialchars($_POST['image-url']);

	$username =strip_tags($username);
    $username =str_replace(' ','',$username);

	$firstName =strip_tags($firstName);
    $firstName =str_replace(' ','',$firstName);
    $firstName =ucfirst(strtolower($firstName));

	$lastName =strip_tags($lastName);
    $lastName =str_replace(' ','',$lastName);
    $lastName =ucfirst(strtolower($lastName));

	$address =strip_tags($address);
    $address =str_replace(' ','',$address);
    $address =ucfirst(strtolower($address));

	$teleNo =strip_tags($teleNo);

	$email =strip_tags($email);
    $email =str_replace(' ','',$email);

	$password =strip_tags($password);
    $password =str_replace(' ','',$password);


	$user_check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
	$email_check =mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    $user_num_rows = mysqli_num_rows($user_check);
	$email_num_rows = mysqli_num_rows($email_check);

        if($user_num_rows>0 && $email_num_rows>0){ // username and email are used
            $error=3;
        }
		if($user_num_rows==0 && $email_num_rows>0){ // email is used
			$error =2;
		}else if($user_num_rows>0 && $email_num_rows==0){ // username is used
			$error=1;
		}
	if($error == 0){
		 
	$query = "INSERT INTO user 
	(username,password,`first-name`,`last-name`,email,address,`tele-No`,gender,`image-url`) 
	 VALUES ('$username','$password','$firstName','$lastName','$email','$address',$teleNo,'$gender','$imageUrl')";
	
	$result = mysqli_query($conn,$query);

	if($result){
	   $userId = getUserId($username);  
	    setcookie("user-id",$userId,time()+10000,'/');
		header("location:../index.php");

	} 
	else {

		echo mysqli_error($conn);
	}
}else  if($error ==1){
	header("location: ../views/sign-up.php?error=1");		
}else  if($error ==2){
   header("location: ../views/sign-up.php?error=2");		
}else  if($error ==3){
   header("location: ../views/sign-up.php?error=3");		
}
}
?>