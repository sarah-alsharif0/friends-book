<?php
function getPostInfo(){
    require dirname(__DIR__)."/util/dbconnection.php";
    
    include_once dirname(__DIR__)."/models/users.php";
    include_once dirname(__DIR__)."/models/posts.php";

    if(isset($_GET['post-id'])){

        $postId = $_GET['post-id'];
        $postInfo =getPostToUpdate($postId);
        $userId = $postInfo['user-id'];
        $userInfo = getUserInfo($userId);
        $userImageUrl = $userInfo["image-url"];
        $firstName = $userInfo["first-name"];
		$lastName = $userInfo["last-name"];
		$postImageUrl = $postInfo["image-url"];
        $imagePost = ($postImageUrl?"<input type='text' name='imagePost' value='$postImageUrl'><br>":"<input type='text' name='imagePost' placeholder='Add Image'><br>");
        $date = $postInfo['date'];
        $postContent= $postInfo["text-content"];
        $postContent =strip_tags($postContent);;
        $postContentcheck = ($postContent?"<input type='text' name='postContent' value='$postContent'><br>":"<input type='text' name='postContent' placeholder='Add Text'><br>");
        echo "<div>
               <form method ='post' id='edit__postForm'>
                <div class='post__userInfo'>
                <img src='$userImageUrl' class='post__userImage1'>
                <div class='wrapper'>
                <h4 class='post__userName'>$firstName $lastName</h4>
                <h6>$date</h6>
                </div>  
                </div>
                <div class='line'></div>
                <div class='edit__post'>
                <label>Post Content : </label>
                $postContentcheck   
                <label>Post Image : </label>
                $imagePost

                </div>
                <div class='button__div'>
                <button type='submit' name='update'>Update</button>
                </div>
               </form>
            </div>
        ";
        if(isset($_POST['update'])){

           if(isset($_POST['postContent']) || isset($_POST['imagePost'])){
               
               $textContent = isset($_POST['postContent'])? trim($_POST['postContent']):"";
                $imagePost= isset($_POST['imagePost'])?trim($_POST['imagePost']):"";

                if($textContent != "" || $imagePost != ""){
                    $query = "UPDATE `post` SET `image-url`='$imagePost',`text-content`='$textContent' WHERE `id`=$postId";
                    $run_update = mysqli_query($conn,$query);
                if($run_update){
                    header("location: ../views/profile.php");
                }
                }   
           }
              
        }
        }
}


?>