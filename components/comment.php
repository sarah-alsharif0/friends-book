<?php 
	function comment($userId,$commentContent){
		include_once dirname(__DIR__)."/models/getUser.php";
		$userInfo = getUserInfo($userId);

		$firstName = $userInfo["first-name"];
		$lastName = $userInfo["last-name"];
		$userImageUrl = $userInfo["image-url"];

		return "
				<div class='comment'>
					<img src='$userImageUrl' class='comment__userImage'>
					<div class='comment__content'>
						<h5 class='comment__user-name'>$firstName $lastName</h5>
						<p>
							$commentContent
						</p>
					</div>
				</div>
		";
	}

?>