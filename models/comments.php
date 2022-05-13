<?php
	
	function addComment($postId,$content){

		require dirname(__DIR__)."/util/dbconnection.php";

		
		$commentedUserId = $_COOKIE['user-id'];
		$query = $conn->prepare("INSERT INTO comment (`post-id`,`commentedUser-id`,content)
				  VALUES (?, ?, ?)");
		$query->bind_param('sss',$postId,$commentedUserId,$content);
		$query->execute();
		$query->store_result();
   		if($query->num_rows == 0){
   			$q = "SELECT * FROM comment WHERE id = (SELECT max(id) FROM comment)";
   			$res = mysqli_query($conn,$q);
   			if($res) {
   				$commentId = mysqli_fetch_assoc($res)['id'];
   				return $commentId;
   			} else echo mysqli_error($conn);
  
   		} else echo mysqli_error($conn);
	}

	function getComment($commentId){

		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/users.php";
		require dirname(__DIR__)."/components/comment.php";

		$query = "SELECT * FROM comment WHERE id = $commentId";

		$result = mysqli_query($conn,$query);

		if($result){

			$commentInfo = mysqli_fetch_assoc($result);

			$userId = $commentInfo["commentedUser-id"];
			$content = $commentInfo["content"];

			return comment($userId,$content);

		} else echo mysqli_error($conn);

	}
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
	function getNumberOfPostComments($postId){

		require dirname(__DIR__)."/util/dbconnection.php";

		$query = "SELECT * FROM comment WHERE `post-id`=$postId";

		$result = mysqli_query($conn,$query);

		if($result){
			return mysqli_num_rows($result);
		} else echo mysqli_error($conn);
	}
?>