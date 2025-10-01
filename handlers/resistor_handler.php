<?php

session_start();

if($_POST['password'] != $_POST['password1']){
    $error = "passwords does not match";
    header("Location: ../pages/resistor.php?error=$error");
    exit;
}

$reg = "/^[a-zA-Z0-9]*@sot.pdpu.ac.in$/";

if(!preg_match($reg, $_POST['user_id'])){
    $error = "the user id should be of form rollno@sot.pdpu.ac.in";
    header("Location: ../pages/resistor.php?error=$error");
    exit;
}

include "../database/database_connect.php";

try{
    $sql = "insert ignore into login_info(user_id, user_password) values (:user_id, :user_password)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id", $_POST['user_id']);
    $stmt->bindParam(":user_password", $_POST['password']);
    $result = $stmt->execute();

    $_SESSION['user_id'] = $_POST['user_id'];
    setcookie('user_id', $_POST['user_id'], time() + 1000*60*60*24*20);
    header("Location: ../pages/home.php");
    exit;
}
catch(PDOException $e){
    echo "resistoration unsuccesful ",$e;
}



