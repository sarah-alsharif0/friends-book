<?php
	
	function postComment($postId,$content){

		require dirname(__DIR__)."/util/dbconnection.php";

		
		$commentedUserId = $_COOKIE['user-id'];

		$query = "INSERT INTO comment (`post-id`,`commentedUser-id`,content)
   				  VALUES ($postId,$commentedUserId,'$content')";

   		$result = mysqli_query($conn,$query);

   		if($result){
   			$query = "
   			SELECT id FROM comment WHERE id=
   			(SELECT max(id) FROM comment)";
   			$result = mysqli_query($conn,$query);
   			if($result) {
   				$commentId = mysqli_fetch_assoc($result)['id'];
   				return $commentId;
   			} else echo mysqli_error($conn);
 
   		} else echo mysqli_error($conn);
	}

	function getComment($commentId){
		require dirname(__DIR__)."/util/dbconnection.php";
		require dirname(__DIR__)."/models/getUser.php";

		$query = "SELECT * FROM comment WHERE id = $commentId";

		$result = mysqli_query($conn,$query);

		if($result){

			$commentInfo = mysqli_fetch_assoc($result);

			$commentedUserInfo = getUser($commentInfo['commentedUser-id']);

			$firstName = $commentedUserInfo["first-name"];
			$lastName = $commentedUserInfo["last-name"];
			$content = $commentInfo['content'];

			echo "
				<div> $firstName $lastName
					<p>$content</p>
				</div>
			";


		} else echo mysqli_error($conn);

	}
?>