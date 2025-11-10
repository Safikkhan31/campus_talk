<?php 
    session_start();
    if(!isset($_POST['user_id'])){
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
        <title>otp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/otp.css">
    </head>

    <body>

        <?php

            require '../vendor/autoload.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;


            if($_POST['password'] != $_POST['password1']){
                $error = "passwords does not match";
                header("Location: resistor.php?error=$error");
                exit;
            }

            $reg = "/^[a-zA-Z0-9]*@sot.pdpu.ac.in$/";

            if(!preg_match($reg, $_POST['user_id'])){
                $error = "the user id should be of form rollno@sot.pdpu.ac.in";
                header("Location: resistor.php?error=$error");
                exit;
            }

            require_once __DIR__ . '/../config/env_loader.php';

            // Load .env if exists
            loadEnv(__DIR__ . '/../.env');


            $mail_username = env('MAIL_USERNAME');
            $mail_password = env('MAIL_PASSWORD');
            $mail_app_name = env('MAIL_APP_NAME');


            $mail = new PHPMailer(true);

            $otp = rand(100000, 999999);

            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $mail_username;
                $mail->Password = $mail_password;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom($mail_username, $mail_app_name);
                $mail->addAddress($_POST['user_id']);

                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Code';
                $mail->Body = "<h2>Your OTP is: <b>$otp</b></h2>";
                $mail->AltBody = "Your OTP is: $otp";
                
                $mail->send();
            }
            catch(Exception $e){
                echo " message could not be sent $e";
            }



        ?>

        <form class="otp_box" action="../handlers/resistor_handler.php?v=1.1" method="post">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" maxlength="6" pattern="\d{6}" required>

            <input type="hidden" name="user_id" value="<?php echo $_POST['user_id']; ?>">
            <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
            <input type="hidden" name="user_name" value="<?php echo $_POST['user_name']; ?>">
            <input type="hidden" name="branch" value="<?php echo $_POST['branch']; ?>">
            <input type="hidden" name="department" value="<?php echo $_POST['department']; ?>">
            <input type="hidden" name="year" value="<?php echo $_POST['year']; ?>">
            <input type="hidden" name="cgpa" value="<?php echo $_POST['cgpa']; ?>">

            <input type="hidden" name="otp_set" value="<?php echo $otp?>">

            <?php
                if(isset($_GET['error'])){
                    echo '<div class="error">*' . htmlspecialchars($_GET['error']) . '</div>';
                }
            ?>

            <input class="submit" type="submit">
        </form>

    </body>
</html>