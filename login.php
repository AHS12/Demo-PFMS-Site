<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 05/08/2017
 * Time: 07:52 PM
 */
?>

<?php
@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/loginStyle.css">
    <link rel="stylesheet" type="text/css" href="style/navBar.css">
    <link rel="shortcut icon" href="src/favicon.ico"/>
    <title>Login</title>
</head>
<body>

<nav>
    <div class="navBar">
        <ul>
            <li><a href="index.html">Your Savings</a></li>
            <li><a href="about.html">About</a></li>
            <li class="active"><a style="float: right" href="login.php">Login</a></li>
            <li style="float: right"><a href="register.php">Register</a></li>
        </ul>
    </div>
</nav>

<div class="login-page">
    <div class="form">
        <form class="login-form" action="scripts/PHP/login.php" method="post" enctype="multipart/form-data">

            <?php

            if (isset($_SESSION['errorAcc'])) {
                echo "<h4 class=\"errorMsg\">Username Error!!</h4> <br>";
            }


            if (isset($_SESSION['errorMsg'])) {

                echo "<h4 class=\"errorMsg\">Password Error!!</h4> <br>";
            }

            if (isset($_SESSION['successReg'])) {
                echo "<h4 class=\"successMsg\">Registration Successful!!! You can now Login!!</h4> <br>";
            }

            if (isset($_SESSION['successPassUp'])) {
                echo "<h4 class=\"successMsg\">Password Updated!!</h4> <br>";
            }

            session_unset();
            ?>
            <input type="text" placeholder="username" name="username"/>
            <input type="password" placeholder="password" name="password"/>
            <button type="submit" name="Login">login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            <p class="message">Forget Password? <a href="resetPass.php">Click Here</a></p>
        </form>
    </div>
</div>
</body>
</html>
