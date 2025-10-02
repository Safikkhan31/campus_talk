<?php

session_start();

include "../database/database_connect.php";

$sql = "select user_id, user_password from login_info where user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $_POST['user_id']);
$result = $stmt->execute();

$raws = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($raws)){
    $error = "no such user found";
    header("Location: ../pages/login.php?error=$error");
    exit;
}
else{
    foreach($raws as $raw){
        if($_POST['user_id'] === $raw['user_id']){
            if($_POST['password'] === $raw['user_password']){
                $_SESSION['user_id'] = $_POST['user_id'];
                setcookie('user_id', $_POST['user_id'], time() + 60*60*24*20, "/");
                header("Location: ../pages/home.php");
                exit;
            }
        }
    }

    $error = "wrong password";
    header("Location: ../pages/login.php?error=$error");
    exit;
}