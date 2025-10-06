<?php

session_start();

include "../database/database_connect.php";

$sql = "select message_id, sender_id, receiver_id, message from messages where (sender_id = :user_id and receiver_id = :other_id) or (receiver_id = :user_id and sender_id = :other_id) order by created_at";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":user_id", $_SESSION['user_id']);
$stmt->bindParam(":other_id", $_GET['other_id']);

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

// foreach($rows as $row){
//     if($row['sender_id'] == $_SESSION['user_id']){
//         echo("
//             <div class='user_message'>
//                 {$row['message']}
//             </div>
//         ");
//     }
//     else{
//         echo("
//             <div class='other_message'>
//                 {$row['message']}
//             </div>
//         ");
//     }
// }

