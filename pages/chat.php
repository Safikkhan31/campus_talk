<html>
    <head>
        <title>chat</title>
        <link rel="stylesheet" href="../assets/css/icon.css">
    </head>

    <body>

        <?php

            session_start();

            include "../database/database_connect.php";

            $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info where user_id = :other_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":other_id", $_GET['other_id']);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';

            echo "
                <div>
                    <img class='profile_icon' src='{$profile_image}'>
                    {$row['user_name']}
                </div>
            ";

            

        ?>

        <div id="chat_box">

        </div>

        <input id="message_input">
        <button onClick="send_message();">Send</button>

        <script>
            window.other_id = <?php echo '"'.$_GET['other_id'].'"'; ?>;
        </script>
        <script src="../assets/javascript/chat.js"></script>
    </body>
</html>