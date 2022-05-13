<?php
    function userInformation($id){
        include_once dirname(__DIR__)."/models/getUser.php";
        
        $userInfo = getUserInfo($id);
        $username=$userInfo["username"];
        $firstName=ucfirst(strtolower($userInfo["first-name"]));
        $lastName=ucfirst(strtolower($userInfo["last-name"]));
        $email = $userInfo["email"];
        $teleNo = $userInfo["tele-No"];
        $address=ucfirst(strtolower($userInfo["address"]));
		$userImageUrl = $userInfo["image-url"];
        
        return "
        
        <div class='user__profile__content'>
        <div class='wrapper'>
             <img src='$userImageUrl' class='profile__img'>
                 <div class='user__full__name'>
                    <h2>$firstName</h2>
                    <h2>$lastName</h2>
                 </div>
            </div> 
        <div class='line'></div> 
        <div class='about__container'>
        <div class='about'>
        <h2>About : </h2>
        <div class='about__div'>
        <div> 
        <span class='bold__span'>- User Name  : </span><span>$username</span><br>
        <span class='bold__span'>- First Name : </span><span>$firstName</span><br>
        <span class='bold__span'>- Last Name  : </span><span>$lastName</span>
       </div>
       <div>
       <span class='bold__span'>- Email   : </span><span>$email</span><br>
       <span class='bold__span'>- Tel-No  : </span><span>$teleNo</span><br>
       <span class='bold__span'>- Address : </span><span>$address</span>
       </div>
        </div>
       
        </div>       
        </div>
        <div class='line'></div> 
        <div class='friends__list'>
        <h2>Friends List : </h2>

        </div >
        
        </div>
    
        ";

    }
?>