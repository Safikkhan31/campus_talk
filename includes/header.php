<?php
    if(!isset($_SESSION['user_id']))session_start();

    include "../database/database_connect.php";

    $sql = "select user_id, profile_image_location from user_info where user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":user_id",$_SESSION['user_id']);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';
?>
<link rel="stylesheet" href="../assets/css/header.css?v=1.2">
<nav class="header">
    <a href="home.php" class="logo">
        Campus Talk
    </a>
    <div class="nav-icons">
        <a href="chet_list.php">
            <img class="icon" src="../assets/images/icons/chet_icon.png?v=1.1" alt="chat">
        </a>
        <a href="profile.php?v=1.1">
            <img class="profile_icon" src="<?php echo $profile_image?>" alt="Profile">
        </a>
    </div>
    
</nav>