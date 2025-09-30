<html>
    <head>
        <title>login</title>
    </head>

    <body>
        <form action="../handlers/login_handler.php" method="post">

            <label name="user_id">User Id:</label>
            <input name="user_id">

            <br>

            <label name="password">Password:</label>
            <input type="password" name="password">

            <br>

            <?php
                if(isset($_GET['error'])){
                    echo "*", $_GET['error'];
                }
            ?>

            <br>

            <input type="submit">

        </form>
    </body>
</html>