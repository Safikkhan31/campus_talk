<html>
    <head>
        <title>chat list</title>
        <link rel="stylesheet" href="../assets/css/chat_list.css">
    </head>

    <body>
        <a href="home.php">
            <img class="profile_icon" src="../assets/images/icons/home_icon.png">
        </a>

        <?php

            session_start();

            include "../database/database_connect.php";

            $sql = "select other_id, user_name, profile_image_location 
                    from chat_list 
                    join user_info 
                    on chat_list.other_id = user_info.user_id 
                    where chat_list.user_id = :user_id
                    order by last_updated desc";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($rows as $row){
                $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';
                $link = "chat.php?other_id=".urlencode($row['other_id']);
                echo("
                        <div onclick='window.location.href = ".'"'.$link.'"'."'>
                            <img class='profile_icon' src='{$profile_image}' alt='profile image'>
                            {$row['user_name']} 
                        </div>
                ");
            }


        ?>

    </body>
</html>