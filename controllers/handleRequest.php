<?php

    require dirname(__DIR__)."/models/requests.php";

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
    } else if($action === "deny"){
        $requestId = $_POST["request-id"];
        denyRequest($requestId);
    }

?>