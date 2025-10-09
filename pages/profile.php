<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
        <title>profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/profile.css?v=1.2">
    </head>


    <body>

        <header>
            <?php include "../includes/header.php"; ?>
        </header>

        <?php

            $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info where user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);


        ?>

        <img class="profile_image" src=<?php 
            if($row && $row['profile_image_location']) echo $row['profile_image_location'];
            else echo "../assets/images/icons/profile_icon.png";
        ?> alt="profile_image">

        <button onClick="start_iframe_icon();">update image</button>
        <br>

        <button onClick='start_iframe(<?php 
            if($row)echo '"'.$row['user_name'].'",'.'"'.$row['branch'].'",'.'"'.$row['department'].'",'.$row['year'].','.$row['cgpa'];
        ?>)'>edit</button>
        <br>

        <div class="profile_info">
            Name: <?php echo $row ? $row['user_name'] : "user name"; ?><br>
            Branch: <?php echo $row ? $row['branch'] : "user branch"; ?><br>
            Department: <?php echo $row ? $row['department'] : "user department"; ?><br>
            Year: <?php echo $row ? $row['year'] : "user year"; ?><br>
            CGPA: <?php echo $row ? $row['cgpa'] : "user cgpa"; ?><br>
        </div>

        <a href="../handlers/logout_handler.php">
            <button>Logout</button>
        </a>
        


        <div id="modal_overlay">
            <div id="modal_box"></div>
        </div>


        <script src="../assets/javascript/profile_update.js?v=1.2"></script>

    </body>
</html>