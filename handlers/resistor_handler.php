<?php

session_start();

if($_POST['otp_set'] != $_POST['otp']){
    $error = "OTP does not match";
    header("Location: ../pages/resistor.php?error=$error");
    exit;
}

$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

include "../database/database_connect.php";

try{
    $sql = "insert into login_info(user_id, user_password) values (:user_id, :user_password);
    insert into user_info(user_id, user_name, branch, department, year, cgpa) value(:user_id, :user_name, :branch, :department, :year, :cgpa);";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id", $_POST['user_id']);
    $stmt->bindParam(":user_password", $hashed_password);
    $stmt->bindParam(":user_name", $_POST['user_name']);
    $stmt->bindParam(":branch", $_POST['branch']);
    $stmt->bindParam(":department", $_POST['department']);
    $stmt->bindParam(":year", $_POST['year']);
    $stmt->bindParam(":cgpa", $_POST['cgpa']);

    $result = $stmt->execute();

    $_SESSION['user_id'] = $_POST['user_id'];
    setcookie('user_id', $_POST['user_id'], time() + 60*60*24*20, "/");

    header("Location: ../pages/home.php");
    exit;
}
catch(PDOException $e){
    if($e->getCode() == 23000){
        $error = "the user already exists";
        header("Location: ../pages/resistor.php?error=$error");
        exit;
    }
    echo "resistoration unsuccesful ",$e;
}



