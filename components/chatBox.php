<?php
function chatBox($userId)
{
    include_once dirname(__DIR__) . "/models/messages.php";
    $messages = getMessages($userId);

    return "
    <div class='messageContainer' id='messagesBox'>
        $messages
    </div>
    <div class='form__container'>
        <form id='messagesForm'>
            <button type='submit' id='send-btn'>Send</button>
            <input type='text' name='content' placeholder='Aa' id='content'>
            <input type='hidden' name='userId' value='$userId'>
        </form>
    </div>
    <script>
    $(document).ready(function(){
        var prevMessages = '';
        function getMessages(dataSent){
            $.post('../controllers/handleSendMessage.php',dataSent,function(data){
                if(!data){
                    inputs.prop('disabled', false);
                    return false;
                }
                if(prevMessages === '')
						prevMessages = data;
					if(data !== prevMessages){
						$('#posts').empty();
						$('#posts').append(data);
						prevMessages = data;
					}
                $('#messagesBox').empty();
                $('#messagesBox').append(data);
                
            });
        }
        var messageRequest;
        $('#messagesForm').submit(function(event){
            event.preventDefault();

            if (messageRequest) {
                messageRequest.abort();
            }
            var form = $(this);
            var inputs = form.find('input, select, button, textarea');
            var serializedData = form.serialize();
            inputs.prop('disabled', true);
            getMessages(serializedData);
            $('#content').prop('value','');
            inputs.prop('disabled', false);
        });
        
    })
   
    </script>
";
}
//  window.setInterval(()=>{
//             getMessages({userId: $userId});
//         },10000)