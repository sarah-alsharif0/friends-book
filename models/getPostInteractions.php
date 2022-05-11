<?php 

	function getPostComments($postId){

		require dirname(__DIR__)."/util/dbconnection.php";
		include_once dirname(__DIR__)."/components/comment.php";

		$query = "SELECT * FROM comment WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);
		$comments = "";
		if($result){

			while($row = mysqli_fetch_assoc($result)){
				
				$userId = $row["commentedUser-id"];
				$commentContent = $row["content"];
				
				$comments .= comment($userId,$commentContent);
			}
			return $comments;
		} else echo mysql_error($conn);

		mysqli_close($conn);
	}

	function getNumberOfPostLikes($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM `like` WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){

			return mysqli_num_rows($result);
			
		} else return mysql_error($conn);

		return mysqli_close($conn);
	}

	function getNumberOfPostComments($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM comment WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){
			return mysqli_num_rows($result);
		} else echo mysqli_error($conn);
	}

	function isLiked($postId,$userId){
		require dirname(__DIR__)."/util/dbconnection.php";
		$query = "SELECT * FROM `like` WHERE `post-id`=$postId AND `likedUser-id`=$userId";
		$result = mysqli_query($conn,$query);

		if($result){
			if(mysqli_num_rows($result) > 0){
				return true;
			} else return false;
		} else echo mysqli_error($conn);
	}

	function addLike($postId,$userId){
		require dirname(__DIR__)."/util/dbconnection.php";
		$query = "INSERT INTO `like` (`likedUser-id`,`post-id`) VALUES ($userId,$postId)";
		$result = mysqli_query($conn,$query);

		if(!$result){
			echo mysqli_error($conn);
		} 
	}

?>