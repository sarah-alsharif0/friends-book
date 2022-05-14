<?php
require dirname(__DIR__)."/util/dbconnection.php";

if(isset($_GET['post-id'])){
    $post_id = $_GET['post-id'];
    $delete_post_query ="DELETE FROM `post` WHERE `id` =$post_id ";
    $run_delete = mysqli_query($conn,$delete_post_query);
    if($run_delete){
        header("location: ../views/profile.php?delete=1");
    }
}else{
    header("location: ../views/profile.php?delete=2");
}
?>
