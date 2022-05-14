<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="../styles/edit-post.css">
    <link rel="stylesheet" type="text/css" href="../styles/post.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>

<body>

    <?php
        require dirname(__DIR__)."/components/navbar.php";
    	require dirname(__DIR__)."/components/updatePost.php";
        echo navbar("Edit Post");

       
        
       
    ?>
    <main>
        <div calss ="edit_post_div">
        <?php
            getPostInfo();
        ?>
        </div>
    </main>
   
</body>
</html>