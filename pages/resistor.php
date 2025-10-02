<html>
    <head>
        <title>resitoration</title>
    </head>

    <boduy>

        <form action="../handlers/resistor_handler.php" method="post">

            <label for="user_id">User ID:</label>
            <input name="user_id" required>

            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <br>

            <lavel for="password1">Reenter Password:</label>
            <input name="password1" required>

            <br>

            <label for="user_name">Name:</label>
            <input name="user_name" required>

            <br>

            <label for="branch">Branch:</label>
            <input name="branch" required>

            <br>

            <label for="department">Department:</label>
            <input name="department" required>

            <br>

            <label for="year">Year:</label>
            <input name="year" require><br>

            <label for="cgpa">CGPA:</label>
            <input name="cgpa" required>

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