<html>
    <head>
        <title>profile</title>
        <link rel="stylesheet" href="../assets/css/home.css">
    </head>

    <body>

        <?php 
            session_start();

            include "../database/database_connect.php";

            $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info where user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);


        ?>

        <img class="profile_icon" src=<?php 
            if($row && $row['profile_image_location']) echo $row['profile_image_location'];
            else echo "../assets/images/icons/profile_icon.png";
        ?> alt="profile_image">

        <button onClick="start_iframe_icon();">update image</button>
        <br>

        <button onClick='start_iframe(<?php 
            if($row)echo '"'.$row['user_name'].'",'.'"'.$row['branch'].'",'.'"'.$row['department'].'",'.$row['year'].','.$row['cgpa'];
        ?>)'>edit</button>
        <br>

        Name: <?php 
                if($row) echo $row['user_name'];
                else echo "user name"; ?>
        <br>

        Branch: <?php 
                if($row) echo $row['branch'];
                else echo "user branch"; ?>
        <br>

        Department: <?php 
                if($row) echo $row['department'];
                else echo "user department"; ?>
        <br>
 
        Year: <?php 
                if($row) echo $row['year'];
                else echo "user year"; ?>
        <br>

        CGPA: <?php 
                if($row) echo $row['cgpa'];
                else echo "user cgpa"; ?>
        <br>

        <a href="../handlers/logout_handler.php">
            <button>Logout</button>
        </a>
        


        <div id="profile_update_iframe">

        </div>

        <script src="../assets/javascript/profile_update.js"></script>

    </body>
</html>