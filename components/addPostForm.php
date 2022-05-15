<?php 

    function addPostForm(){

        return "
            <div class='add-post'>
                <h2 class='add-post__title'>Create Post</h2>
                <form class='add-post__form' id='add-post-form'>
                    <input placeholder=\"What's on Your mind?\" type='text' name='textContent' class='add-post__content-input'>
                    <div class='add-post__image'>
                        <label for='textContent'>Add Image to Your Post</label>
                        <input type='text' placeholder='Enter image URL' name='imageUrl' class= 'add-post__image-input'>
                    </div>
                    <button type='submit' value='submit' class='add-post__button'>Post</button>
                </form>
            </div>
            <script>
                $(document).ready(function(){
                    var request;
                    $('#add-post-form').submit(function(event){
                        console.log('submitted');
                        event.preventDefault();

                        if(request){
                            request.abort();
                        }				
                        var form = $(this);

                        var inputs = form.find('input, select, button, textarea');

                        var serializedData = form.serialize();

                        inputs.prop('disabled', true);
                        
                        $.post('../controllers/handleAddPost.php',serializedData,function(data){
                            console.log(data);
                                if(!data){
                                    inputs.prop('disabled', false);
                                    return false;
                                }
                                $('#posts').empty();
                                $('#posts').append(data);
                                inputs.prop('value','');
                                inputs.prop('disabled', false);
                        });
                    }); 
                });
            </script>
        ";
    }

?>