<?php

require_once __DIR__ . '/../config/env_loader.php';

// Load .env if exists
loadEnv(__DIR__ . '/../.env');


$server_name = env('SERVER_NAME');
$user_name = env('USER_NAME');
$password = env('PASSWORD');
$database_name = env('DATABASE_NAME');

$conn;

try{
    $conn = new PDO("mysql:host=$server_name;dbname=$database_name", $user_name, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}