<?php 
	require dirname(__DIR__)."/models/comments.php";
	require dirname(__DIR__)."/models/likes.php";

	$postId = $_POST["postId"];
	$userId = $_COOKIE["user-id"];
	$isLiked = isLiked($postId,$userId);

	if($isLiked){
		removeLike($postId);	
	} else {
		addLike($postId);
	}

	echo !$isLiked;
?>
