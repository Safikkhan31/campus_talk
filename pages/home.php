<?php 
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
        <title>home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='../assets/css/home.css?v=1.5'>
    </head>

    <header>
        <?php include "../includes/header.php"; ?>
    </header>
    
    <body>

        <form class="search" action="home.php" method="GET">
            <input type="text" name="search">
            <input type="submit" value="search">
        </form>

        <div>
            <?php

                $search = isset($_GET['search']) ? $_GET['search']."%" : "%";

                $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info where user_name like :search";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($rows as $row){
                    if($row['user_id'] != $_SESSION['user_id']){
                        $profile_image = !empty($row['profile_image_location']) ? $row['profile_image_location'] : '../assets/images/icons/profile_icon.png';
                        echo("
                            <div>
                                <img class='profile_icon' src='{$profile_image}'>
                                <br>
                                Name: {$row['user_name']}
                                <br>
                                Branch: {$row['branch']}
                                <br>
                                Department: {$row['department']}
                                <br>
                                Year: {$row['year']}
                                <br>
                                CGPA: {$row['cgpa']}
                                <br>
                                <a href='chet_list.php?other_id=".urlencode($row['user_id'])."'><button>Start Chat</button></a>
                            </div>
                        ");
                    }
                }

            ?>
        </div>

        

    </body>
</html>