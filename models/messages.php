<?php 

    function getMessages($userId){
        require dirname(__DIR__) . "/util/dbconnection.php";
        require dirname(__DIR__) . "/components/message.php";

        $currUserId = $_COOKIE['user-id'];

        $query = "SELECT * FROM message WHERE (`user1-id`=$userId AND `user2-id`=$currUserId)
                  OR (`user1-id`=$currUserId AND `user2-id`=$userId)
                  ORDER BY date ASC";

        $result = mysqli_query($conn,$query);

        if($result){
            if (mysqli_num_rows($result) > 0) {
				$messages = "";
				while ($row = mysqli_fetch_assoc($result)) {
                    $messages .= message($row["user1-id"],$row['user2-id'],$row['content'],$row['date']);
				}
				return $messages;
			} else {
				return "<h3 class='chat__message'>No messages found</h3>";
			}
        }
    }

    function addMessage($userId,$content){
        require dirname(__DIR__) . "/util/dbconnection.php";

        $currUserId = $_COOKIE['user-id'];

        $content = htmlspecialchars($content);
        $date = date("Y-m-d H:i:s");
		$query = "INSERT INTO message (`user1-id`,`user2-id`,content,`date`)
				  VALUES ($currUserId,$userId,'$content','$date')";

		$result = $conn->query($query);
		if(!$result){
            echo $conn->error;
		}
    }

?>