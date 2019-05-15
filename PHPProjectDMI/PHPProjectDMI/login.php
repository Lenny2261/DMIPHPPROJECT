<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT ID, Role FROM users WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {

        $_SESSION['login_user'] = $myusername;
        $_SESSION['user_role'] = $row['Role'];

        header("location: index.php");
        exit();
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Martha's Brew Stand</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link href="css/login.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <p>Lorem ipsum dolor sit amet</p>
            <label id="label-register" for="log-reg-show">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked" />
        </div>

        <div class="register-info-box">
            <!--<h2>Don't have an account?</h2>
        <p>Lorem ipsum dolor sit amet</p>
        <label id="label-login" for="log-login-show">Register</label>
        <input type="radio" name="active-log-panel" id="log-login-show" />-->
        </div>
        <form action="login.php" method="post">
            <div class="white-panel">
                <div class="login-show">
                    <h2>LOGIN</h2>
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="submit" value="Login" />
                </div>
                <div class="register-show">
                    <h2>REGISTER</h2>
                    <input type="text" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <input type="password" placeholder="Confirm Password" />
                    <input type="button" value="Register" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('.login-info-box').fadeOut();
        $('.login-show').addClass('show-log-panel');
    });


    $('.login-reg-panel input[type="radio"]').on('change', function () {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        }
        else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });
</script>