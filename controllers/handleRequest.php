<?php

    include_once dirname(__DIR__)."/models/requests.php";
    include_once dirname(__DIR__)."/models/posts.php";

    $action = null;
    
    if(isset($_POST['action']))
        $action = $_POST["action"];

    if($action === "send"){
        if(isset($_POST["second-user-id"])){
            $secondUserId = $_POST["second-user-id"];
            sendRequest($secondUserId);
        }
    } else if($action === "accept"){
        $requestId = $_POST["request-id"];
        acceptRequest($requestId);
        echo getUserAndFriendsPosts($_COOKIE['user-id']);
       } else if($action === "deny"){
        $requestId = $_POST["request-id"];
        denyRequest($requestId);
    }

?>