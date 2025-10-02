<?php

session_start();

include "../database/database_connect.php";

$sql = "update user_info set user_name = :user_name, branch = :branch, department = :department, year = :year, cgpa = :cgpa where user_id = :user_id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":user_id", $_SESSION['user_id']);
$stmt->bindParam(":user_name", $_POST['user_name']);
$stmt->bindParam(":branch", $_POST['branch']);
$stmt->bindParam(":department", $_POST['department']);
$stmt->bindParam(":year", $_POST['year']);
$stmt->bindParam(":cgpa", $_POST['cgpa']);

try{
    $stmt->execute();

    header("Location: ../pages/profile.php");
    exit;
}
catch(PDOException $e){
    echo "unable to update " . $e;
}