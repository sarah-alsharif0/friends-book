<?php 
	require dirname(__DIR__)."/models/comments.php";


	$postId = (int)$_POST["postId"];
	if (isset($_POST['content']) && trim($_POST['content']) != '') {
		$content = $_POST["content"];
		$commentId = addComment($postId,$content);
		echo getComment($commentId);
	}
	
?>