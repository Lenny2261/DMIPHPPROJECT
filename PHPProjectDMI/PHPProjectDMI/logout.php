<?php
    session_start();
    $_SESSION['login_user'] = null;
    $_SESSION['user_role'] = null;

    header("location: index.php");
?>