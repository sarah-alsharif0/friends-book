<?php 
	function post($postId,$userId,$imageUrl,$textContent,$date){

		include_once dirname(__DIR__)."/models/users.php";
		include_once dirname(__DIR__)."/models/likes.php";
		include_once dirname(__DIR__)."/models/comments.php";

		$currUserId = $_COOKIE['user-id'];
		$currUserImage = getUserInfo($currUserId)['image-url'];

		$userInfo = getUserInfo($userId);
		$numberOfLikes = getNumberOfPostLikes($postId);
		$numberOfComments = getNumberOfPostComments($postId);
		
		$likeIcon = (isLiked($postId,$userId)?"<i class='fa-solid heart__color fa-heart post__like-icon'>
		<?php
		?></i>":"<i class='fa-regular fa-heart post__like-icon'></i>");
		
		$updateIcon = ($userId == $currUserId?"<a href='../views/edit-post.php?post-id=$postId'><i class='fa-solid fa-pen-to-square'></i></a>":"");
		$deleteIcon = ($userId == $currUserId?"<button id='delete$postId'><i class='fa-solid fa-trash-can' ></i></button>":"");

		$firstName =$userInfo['first-name'];
		$lastName = $userInfo['last-name'];
		$userImageUrl = $userInfo['image-url'];

		$comments = getpostComments($postId);

		return "<div class='post' id='post$postId'>
		            <ul class='post__adjustment'>	
				  		<li>$updateIcon</li>
				  		<li>$deleteIcon</li>
				  	</ul>
	
					<div class='post__userInfo'>
						<img src='$userImageUrl' class='post__userImage1'>
						<div>
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
				  	<h4 class='comment_container'>Comments</h4>
				  	<form class='form' id='form$postId'>
				  		<img src='$currUserImage' class='post__userImage2'>
				  	  	<input class='form__input' type='text' name='content' id='content$postId' placeholder='Write a comment...'>
				  	  	<input type='hidden' name='postId' value='$postId'>
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
						var commentRequest,likeRequest;
						$('#form$postId').submit(function(event){
							
							event.preventDefault();
							if (commentRequest) {
								commentRequest.abort();
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
									$('#content$postId').prop('value','');
									inputs.prop('disabled', false);
							});
						});
						$('#like$postId').click(function(event){

							event.preventDefault();
							if(likeRequest){
								likeRequest.abort();
							}
							$.post('../controllers/handleLike.php',{ postId : $postId },function(data){
								var icon  =  (data?\"<i class='fa-solid heart__color fa-heart post__like-icon'></i>\":\"<i class='fa-regular fa-heart post__like-icon'></i>\");
								$('#like$postId').empty();
								$('#like$postId').append(icon);
								var numberOfLikes = $('#nooflikes$postId').html();
									$('#nooflikes$postId').html(+numberOfLikes+(data?1:-1));
							});
						});

						$('#delete$postId').click(function(event){
							event.preventDefault();
													
							$.post('../controllers/handleDeletePost.php',{postId: $postId},function(data){
								console.log(data);
								if(data){
									$('#post$postId').remove();
								}
							});
						});
						});
				</script>
		  	  ";
	} 
?>