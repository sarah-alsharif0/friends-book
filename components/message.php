<?php 
    function message($sender,$reciever,$content,$date){

        $currUserId = $_COOKIE['user-id'];
        $class = "";
        if($currUserId == $sender){
            $class = 'message__sender';
        } else $class = 'message__reciever';

        return "
        <div class='container-$class'>
            <p class='message__content $class'>
                $content
            </p>
            <span class='message__date'>
                    $date
            </span>
        </div>
        ";
    }

?>