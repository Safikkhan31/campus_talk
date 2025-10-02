<?php

session_start();

include "../database/database_connect.php";

$target = "../uploads/profile_icons/".$_FILES['profile_icon']['name'];
move_uploaded_file($_FILES['profile_icon']['tmp_name'], $target);

$sql = "update user_info set profile_image_location = :location where user_id = :user_id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":user_id", $_SESSION['user_id']);
$stmt->bindParam(":location", $target);

try{
    $stmt->execute();

    header("Location: ../pages/profile.php");
    exit;
}
catch(PDOException $e){
    echo "unable to update " . $e;
}