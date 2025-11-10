<html>
    <head>
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/login.css?v=1.2">
    </head>

    <body>
        <form class="login_box" action="../handlers/login_handler.php?v=1.1" method="post">

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

            <a class="resistor" href="resistor.php">register</a>

        </form>
    </body>
</html>