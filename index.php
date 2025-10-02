<?php

session_start();


if(isset($_COOKIE['user_id'])){
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    header("Location: pages/home.php");
    exit;
}

header("Location: pages/login.php");
exit;