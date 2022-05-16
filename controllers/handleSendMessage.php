<?php

include_once dirname(__DIR__)."/models/messages.php";


$receiver = $_POST['userId']; 
$content = null;
if(isset($_POST['content']))
    $content = trim($_POST['content']);

if($content)
    addMessage($receiver,$content);
echo getMessages($receiver);

?>