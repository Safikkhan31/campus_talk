<?php

session_start();

include "../database/database_connect.php";

$sql = "insert into messages (sender_id, receiver_id, message) values
        (:user_id, :other_id, :message);

        INSERT INTO chat_list (user_id, other_id, last_updated)
        VALUES (:user_id, :other_id, NOW())
        ON DUPLICATE KEY UPDATE 
            last_updated = VALUES(last_updated);

        INSERT INTO chat_list (user_id, other_id, last_updated)
        VALUES (:other_id, :user_id, NOW())
        ON DUPLICATE KEY UPDATE 
            last_updated = VALUES(last_updated);
        ";

$stmt = $conn->prepare($sql);

$stmt->bindParam(":user_id", $_SESSION['user_id']);
$stmt->bindParam(":other_id", $_GET['other_id']);
$stmt->bindParam(":message", $_GET['message']);

$stmt->execute();

echo "message sent succesfully";

