<?php

session_start();

setcookie('user_id', $_SESSION['user_id'], time() - 60, "/");

session_destroy();

header("Location: ../");
exit;