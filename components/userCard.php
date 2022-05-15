<?php
function UserCard($userId, $firstName, $lastName, $imageUrl)
{
    include_once dirname(__DIR__) . "/models/users.php";
    include_once dirname(__DIR__) . "/controllers/handleRequest.php";

    $currUserId = $_COOKIE['user-id'];

    $sendIcon = "<i class='fa-solid fa-paper-plane request-icon'></i>";
    $sendIconDisabled = "<i class='fa-solid fa-paper-plane request-icon disabled'></i>";
    $acceptIcon = "<i class='fa-solid fa-circle-check request-icon'></i>";
    $denyIcon = "<i class='fa-solid fa-xmark request-icon'></i>";

    $isFriend = checkIfFriend($currUserId,$userId);
    $isReqSent = checkForFriendRequest($currUserId,$userId);
    $isReqRecieved = checkForFriendRequest($userId,$currUserId);

    $actions = "";
    $requestId = checkForFriendRequest($currUserId,$userId)?getRequestId($currUserId,$userId):(checkForFriendRequest($userId,$currUserId)?getRequestId($userId,$currUserId):0);

    if($isReqSent){
        $actions = "<button class='actions__button' disabled>$sendIconDisabled</button>";
    } else if ($isReqRecieved){
        $actions = "
            <button class='actions__button' id='accept$userId'>$acceptIcon</button>
            <button class='actions__button' id='deny$userId'>$denyIcon</button>
        ";
    } else if (!$isReqSent && !$isReqRecieved && !$isFriend){
        $actions = "<button class='actions__button' id='send$userId'>$sendIcon</button>";
    }

    return "<div class='users-list__user-card' id='userCard$userId'>
                <div class='user-card__user-info'>
                    <img class='user-info__image' src=$imageUrl>
                    <span class='user-info__name'>$firstName $lastName</span>
                </div>
                
                <div class='user-card__actions' id='actions$userId'>
                    $actions
                </div>
            </div>
            <script>
                $(document).ready(function(){

                    function bindE(){
                        $('#send$userId').click(function(){
                        $.post('../controllers/handleRequest.php',{ 'second-user-id' : $userId, 'action': 'send' },
                        function(){
                            console.log('from send');                        
                            var actions = \"<button class='actions__button' disabled>$sendIconDisabled</button>\";
                            $('#actions$userId').empty();
                            $('#actions$userId').append(actions);
                        });
                    });
                    
                    $('#accept$userId').click(function(){
                        var requestId = $requestId;
                        console.log(requestId);
                        $.post('../controllers/handleRequest.php',{ 'request-id' : requestId, 'action': 'accept' },
                        function(data){
                            $('#posts').empty();                        
                            $('#posts').append(data);                        
                            $('#userCard$userId').remove();
                        });
                    });
                    
                    $('#deny$userId').click(function(){
                        var requestId = $requestId;
                        console.log(requestId);
                        $.post('../controllers/handleRequest.php',{ 'request-id' :  requestId, 'action': 'deny' },
                        function(){
                            var actions = \"<button class='actions__button' id='send$userId'>$sendIcon</button>\";
                            $('#actions$userId').empty();
                            $('#actions$userId').append(actions);
                        });
                    });
                }
                setInterval(bindE,3000);
                    
                });
            </script>
            ";
}
