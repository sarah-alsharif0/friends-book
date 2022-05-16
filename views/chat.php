<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/chat.css">
    <link rel="stylesheet" type="text/css" href="../styles/userCard.css">
    <link rel="stylesheet" type="text/css" href="../styles/navbar.css">
    <title>Document</title>
</head>
<body>
<?php
    	require dirname(__DIR__) . "/util/dbconnection.php";
        require dirname(__DIR__) . "/components/navbar.php";
        require dirname(__DIR__) . "/components/userInformation.php";
        require dirname(__DIR__) . "/models/posts.php";
        require dirname(__DIR__) . "/models/users.php";

	if (!isset($_COOKIE["user-id"])) {
		
		header("location:sign-in.php");
	}
	$userId = $_COOKIE["user-id"];
    echo navbar("chat");


    ?>
    <main>
    <div class="wrapper">
<section class="user-friends__section">
    <h3 class="user-friends__title">My Friends</h3>
    <br>
    <?php
    echo getFriendsUsers($userId);
    ?>
</section>
<section class="messageForm">Chat
    <div class="mesasgeContainer"></div>
    <div class="form__container">
    <form action="" method="post">
        <button type ="submit" name="send"id = "send-btn">Send</button>
        <input type="text" name="text" placeholder="Aa" id="content">
        
    </form>
</div>
</section>



</div>

    </main>

    
</body>
</html>