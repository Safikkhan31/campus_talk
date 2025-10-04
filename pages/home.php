<html>
    <head>
        <title>home</title>
        <link rel='stylesheet' href='../assets/css/home.css?v=1.2'>
    </head>

    <header>
        <?php include "../includes/header.php"; ?>
    </header>
    
    <body>

        <div>
            <?php

                $sql = "select user_id, user_name, branch, department, year, cgpa, profile_image_location from user_info";
                $stmt = $conn->prepare($sql);
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
                                <a href='chat_list.php?other_id=".urlencode($row['user_id'])."'><button>Start Chat</button></a>
                            </div>
                        ");
                    }
                }

            ?>
        </div>

        

    </body>
</html>