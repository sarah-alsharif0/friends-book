<?php 
	require dirname(__DIR__)."/models/comment.php";

	
	$postId = $_POST["postId"];
	$content = $_POST["content"];

	$commentId = postComment($postId,$content);

	// getComment($commentId);

	// header("location: ../views/home.php")
?>