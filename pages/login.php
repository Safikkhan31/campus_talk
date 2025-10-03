<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>

    <body>
        <form class="login_box" action="../handlers/login_handler.php" method="post">

            <label for="user_id">User Id:</label><br>
            <input type="text" name="user_id">

            <br>

            <label for="password">Password:</label><br>
            <input type="password" name="password">

            <br>

            <?php
                if(isset($_GET['error'])){
                    echo '<div class="error">*' . htmlspecialchars($_GET['error']) . '</div>';
                }
            ?>

            <br>

            <input class="submit" type="submit">

            <br>

            <a class="resistor" href="resistor.php">resistor</a>

        </form>
    </body>
</html>