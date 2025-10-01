<html>
    <head>
        <title>resitoration</title>
    </head>

    <boduy>

        <form action="../handlers/resistor_handler.php" method="post">

            <label for="user_id">User ID:</label>
            <input name="user_id">

            <br>

            <label for="password">Password:</label>
            <input type="password" name="password">

            <br>

            <lavel for="password1">Reenter Password:</label>
            <input name="password1">

            <br>

            <?php
                if(isset($_GET['error'])){
                    echo "*", $_GET['error'];
                }
            ?>

            <br>

            <input type="submit">

        </form>

    </boduy>
</html>