<?php
    
    include_once dirname(__DIR__)."/models/users.php";
    $userId = $_COOKIE['user-id'];

    echo getNonFriendsUsers($userId);

?>