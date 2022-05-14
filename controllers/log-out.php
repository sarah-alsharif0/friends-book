<?php
 	require dirname(__DIR__)."/util/dbconnection.php";
     setcookie("user-id",$userId,time()-10000,'/');
     header("location: ../views/sign-in.php");

?>