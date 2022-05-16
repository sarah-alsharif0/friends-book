<?php
require dirname(__DIR__)."/util/dbconnection.php";
require dirname(__DIR__)."/models/posts.php";

if(isset($_POST['postId'])){
    $postId = $_POST['postId'];
    echo $postId;
    echo deletePost($postId);
}
?>
