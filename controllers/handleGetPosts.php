<?php 
    require dirname(__DIR__)."/models/posts.php";

	$userId = $_COOKIE["user-id"];

    echo getUserAndFriendsPosts($userId);

?>