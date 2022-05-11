<?php 
	
	function post($postId,$userId,$imageUrl,$textContent,$date){

		include_once dirname(__DIR__)."/models/getUser.php";
		include_once dirname(__DIR__)."/models/getPostInteractions.php";
		$userInfo = getUserInfo($userId);
		$numberOfLikes = getNumberOfPostLikes($postId);
		$numberOfComments = getNumberOfPostComments($postId);
		$isLiked = isLiked($postId,$userId);
		$likeIcon = ($isLiked?"<i class='fa-regular fa-heart post__like-icon'></i>":"<i class='fa-solid fa-heart post__like-icon'></i>");

		$firstName = $userInfo["first-name"];
		$lastName = $userInfo["last-name"];
		$userImageUrl = $userInfo["image-url"];

		$comments = getpostComments($postId);


		return "<div class='post'>
					<div class='post__userInfo'>
						<img src='$userImageUrl' class='post__userImage1'>
						<div class='wrapper'>
						<h4 class='post__userName'>$firstName $lastName</h4>
						<h6>$date</h6>
						</div>
					</div>
				  	<div class='post__content'>
				  		
					  	<p class='post__text'>$textContent</p>
					". ($imageUrl?"<img src=$imageUrl>":"")."
				  	</div>
				  	<br>
				  	<ul class='post__interactions'>	
				  		
				  		<li><a>$likeIcon</a></li>
				  		<li> $numberOfLikes Likes</li>
				  		<li> $numberOfComments Comments</li>
				  	</ul>
				  	<h4>Comments</h4>
				  	<form class='form'>
				  		<img src='$userImageUrl' class='post__userImage2'>
				  	  	<input class='form__input' type='text' name='content' placeholder='Write a comment...' id='content'>
				  	  	<input type='hidden' id='' name='postId' value=$postId>
			  	  	<button class='form__button' id='submit-comment' type='submit' value='submit' name='submit'>Add</button>
			  	  </form>
			  	 
			  	  <div class='post__comments'> 
			  	  ".($numberOfComments>0?
			  	  	$comments:'<h4>
			  	  		No Comments
			  	  	</h4>'
			  	  )
			  	  ."</div>
		  	  </div>";
	} 
?>