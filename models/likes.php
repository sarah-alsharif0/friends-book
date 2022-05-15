<?php 

	function getNumberOfPostLikes($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$userId = $_COOKIE['user-id'];

		$query = "SELECT * FROM `like` WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){

			return mysqli_num_rows($result);
			
		} else return mysqli_error($conn);

		return mysqli_close($conn);
	}

	function isLiked($postId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$userId = $_COOKIE['user-id'];

		$query = "SELECT * FROM `like` WHERE `post-id`=$postId AND `likedUser-id`=$userId";
		$result = mysqli_query($conn,$query);

		if($result){
			if(mysqli_num_rows($result) > 0){
				return true;
			} else return false;
		} else echo mysqli_error($conn);
	}

	function addLike($postId){
		require dirname(__DIR__)."/util/dbconnection.php";
		$userId = $_COOKIE['user-id'];

		$query = "INSERT INTO `like` (`likedUser-id`,`post-id`) VALUES ($userId,$postId)";
		$result = mysqli_query($conn,$query);

		if(!$result){
			echo mysqli_error($conn);
		} ;
	}
	function removeLike($postId){
		require dirname(__DIR__)."/util/dbconnection.php";

		$userId = $_COOKIE['user-id'];

		$query = "DELETE FROM `like` WHERE `likedUser-id`=$userId AND `post-id`=$postId";
		$result = mysqli_query($conn,$query);

		if(!$result){
			echo mysqli_error($conn);
		} ;
	}

?>