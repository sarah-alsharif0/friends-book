<?php 

require dirname(__DIR__)."/components/chatBox.php";

$userId = $_GET['userId'];

echo chatBox($userId);
?>