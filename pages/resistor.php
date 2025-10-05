<html>
    <head>
        <title>resitoration</title>
        <link rel="stylesheet" href="../assets/css/resistor.css">
    </head>

    <boduy>

        <form class="resistor_box" action="otp.php?v=1.1" method="post">

            <label for="user_id">User ID:</label>
            <input name="user_id" required>

            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <br>

            <label for="password1">Reenter Password:</label>
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
                    echo '<div class="error">*' . htmlspecialchars($_GET['error']) . '</div>';
                }
            ?>

            <br>

            <input type="submit">

            <a class="login" href="login.php">login</a>

        </form>

    </boduy>
</html>