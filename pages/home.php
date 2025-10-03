<html>
    <head>
        <title>home</title>
        <link rel='stylesheet' href='../assets/css/home.css'>
    </head>

    <header>
        <?php
            session_start();

            include "../database/database_connect.php";

            $sql = "select user_id, profile_image_location from user_info where user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user_id",$_SESSION['user_id']);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';
        ?>
        <nav>
            <a href="chat_list.php">
                <img class="profile_icon" src="../assets/images/icons/chat_icon.png">
            </a>
            <a href="profile.php">
                <img class="profile_icon" src="<?php echo $profile_image?>">
            </a>
        </nav>
    </header>
    
    <body>

        <div>
            <?php

                $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($rows as $row){
                    if($row['user_id'] != $_SESSION['user_id']){
                        $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';
                        echo("
                            <div>
                                <img class='profile_icon' src='{$profile_image}'>
                                <br>
                                Name: {$row['user_name']}
                                <br>
                                Branch: {$row['branch']}
                                <br>
                                Department: {$row['department']}
                                <br>
                                Year: {$row['year']}
                                <br>
                                CGPA: {$row['cgpa']}
                                <br>
                                <a href='chat.php?other_id=".urlencode($row['user_id'])."'><button>Start Chat</button></a>
                            </div>
                        ");
                    }
                }

            ?>
        </div>

        

    </body>
</html>