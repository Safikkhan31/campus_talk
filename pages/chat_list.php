<html>
<head>
    <title>chat list</title>
    <link rel="stylesheet" href="../assets/css/chat_list.css?v=1.3">
</head>

<header>
    <?php include "../includes/header.php"; ?>
</header>

<body>
    <div class="chat_container">
        <div class="chat_list" id="chat_list">
            <?php
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
                        <div class='chat_user' onclick='start_iframe(".'"'.$link.'"'.");'>
                            <img class='profile_icon' src='{$profile_image}' alt='profile image'>
                            <span>{$row['user_name']}</span>
                        </div>
                    ");
                }
            ?>
        </div>

        <!-- Chat iframe -->
        <div id="chat_iframe" class="chat_frame">
            <img src="../assets/images/chat_background.jpg" class="chat_bg">
        </div>
    </div>

    <script src="../assets/javascript/chat_list.js?v=1.1"></script>
    <script>
        start_iframe(<?php
            $link = "chat.php?other_id=".urlencode($_GET['other_id']);
            echo "'".$link."'";
        ?>);
    </script>
</body>
</html>
