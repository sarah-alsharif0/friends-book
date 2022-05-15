<?php 
	
	function post($postId,$userId,$imageUrl,$textContent,$date){

		include_once dirname(__DIR__)."/models/users.php";
		include_once dirname(__DIR__)."/models/likes.php";
		include_once dirname(__DIR__)."/models/comments.php";

		$currUserImage = getUserInfo($_COOKIE['user-id'])["image-url"];

		$userInfo = getUserInfo($userId);
		$numberOfLikes = getNumberOfPostLikes($postId);
		$numberOfComments = getNumberOfPostComments($postId);
		
		$likeIcon = (isLiked($postId,$userId)?"<i class='fa-solid fa-heart post__like-icon'></i>":"<i class='fa-regular fa-heart post__like-icon'></i>");

		$firstName = $userInfo["first-name"];
		$lastName = $userInfo["last-name"];
		$userImageUrl = $userInfo["image-url"];

		$comments = getpostComments($postId);

		return " 
				<div class='post'>
					<div class='post__userInfo'>
						<img src='$userImageUrl' class='post__userImage1'>
						<div class='wrapper'>
						<h4 class='post__userName'>$firstName $lastName</h4>
						<h6>$date</h6>
						</div>
					</div>
				  	<div class='post__content'>
				  		
					  	<p class='post__text'>$textContent</p>
					". ($imageUrl?"<img src='$imageUrl'>":"")."
				  	</div>
				  	<br>
				  	<ul class='post__interactions'>	
				  		
				  		<li><button class='post__like-button' id='like$postId'>$likeIcon</button></li>
				  		<li><span id='nooflikes$postId'>$numberOfLikes</span> Likes</li>
				  		<li><span id='noofcomments$postId'>$numberOfComments</span> Comments</li>
				  	</ul>
				  	<h4>Comments</h4>
				  	<form class='form' id='$postId'>
				  		<img src='$currUserImage' class='post__userImage2'>
				  	  	<input class='form__input' type='text' name='content' value='' placeholder='Write a comment...'>
				  	  	<input type='hidden' name='postId' value=$postId>
			  	  	<button class='form__button' type='submit' value='submit'>Add</button>
			  	  </form>
			  	 
			  	  <div class='post__comments' id='comments$postId'> 
			  	  ".($numberOfComments>0?
			  	  	$comments:'<h4 id="message">
			  	  		No Comments
			  	  	</h4>'
			  	  )
			  	  ."</div>
		  	  </div>
		  	  <script> 
					$(document).ready(function(){
						var request;
						$('#$postId').submit(function(event){
							event.preventDefault();

							if(request){
								request.abort();
							}				
							var form = $(this);

							var inputs = form.find('input, select, button, textarea');

							var serializedData = form.serialize();

							inputs.prop('disabled', true);
							
							$.post('../controllers/handleComment.php',serializedData,function(data){
									if(!data){
										inputs.prop('disabled', false);
										return false;
									}
									var numberOfComments = $('#noofcomments$postId').html();
									
									if(+numberOfComments === 0){
										$('#message').remove();
									}
									$('#comments$postId').append(data);
									$('#noofcomments$postId').html(+numberOfComments+1);
									inputs.prop('value','');
									inputs.prop('disabled', false);
							});
						});
						$('#like$postId').click(function(event){

							event.preventDefault();
							if(request){
								request.abort();
							}
							$.post('../controllers/handleLike.php',{ postId : $postId },function(data){
								var icon  =  (data?\"<i class='fa-solid fa-heart post__like-icon'></i>\":\"<i class='fa-regular fa-heart post__like-icon'></i>\");
								$('#like$postId').empty();
								$('#like$postId').append(icon);
								var numberOfLikes = $('#nooflikes$postId').html();
									$('#nooflikes$postId').html(+numberOfLikes+(data?1:-1));
							});
						});

					});
				</script>
		  	  ";
	} 
?>