<?php 
	function navbar($currPage){

		$homePageItemClasses = "navbar__list-item ". ($currPage == "home"?"active":"");
		$profilePageItemClasses = "navbar__list-item ". ($currPage == "profile"?"active":"");
	
		return "<nav class='navbar'>
					<div class='navbar__logo-container'>
						<a href='../index.php'>
							<img src='../images/logo1.jpg' class='navbar__logo1'>
							<img src='../images/logo2.jpg' class='navbar__logo2'>
						</a>
					</div>
		
					<ul class='navbar__list'>
						<li>
							<a href='../views/home.php' class='$homePageItemClasses'>
							Home
							</a>
						</li>
						<li>
							<a href='../views/profile.php' class='$profilePageItemClasses'>
							My Profile
						</a>
						</li>
					</ul>
				</nav>
			   ";

	}
?>