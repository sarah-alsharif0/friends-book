<?php 

require dirname(__DIR__)."/models/posts.php";

    if(isset($_POST["imageUrl"]) && trim($_POST["imageUrl"]) || (isset($_POST["textContent"]) && trim($_POST["textContent"]))){
        $imageUrl = $_POST["imageUrl"];
        $textContent = $_POST["textContent"];

        addPost($imageUrl ?? "",$textContent ?? "");
        echo getUserAndFriendsPosts($_COOKIE['user-id']);
    }
?>