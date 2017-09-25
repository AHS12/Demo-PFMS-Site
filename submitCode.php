<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/08/2017
 * Time: 09:57 PM
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
    <title>Reset Your Password</title>
    <link rel="stylesheet" type="text/css" href="style/navBar.css">
    <link rel="stylesheet" type="text/css" href="style/loginStyle.css">
</head>
<body>

<nav>
    <div class="navBar">
        <ul>
            <li class="active"><a href="index.html">Your Savings</a></li>
            <li><a href="about.html">About</a></li>
            <li><a style="float: right" href="login.php">Login</a></li>
            <li style="float: right"><a href="register.php">Register</a></li>
        </ul>
    </div>
</nav>

<div class="login-page">
    <div class="form">


        <?php

        if (isset($_SESSION['successEmail'])) {
            echo "<h4 class=\"successMsg\">Email Sent!!Again!!</h4> <br>";
        }
        unset($_SESSION['successEmail']);

        if (isset($_SESSION['wrongCode'])) {
            echo "<h4 class=\"errorMsg\">Please submit The right recovery code!!</h4> <br>";
        }
        unset($_SESSION['wrongCode']);

        ?>


        <h3 class="message">We Have Sent You a Password Recovery Code
            <br>
            Enter it Here to Proceed!</h3> <br>

        <form class="login-form" action="scripts/PHP/verifyCode.php" method="post" enctype="multipart/form-data">

            <input type="number" placeholder="Reset Code" name="resetCode"/>
            <button type="submit" name="submitCode">Submit Code</button>
            <p class="message">No Email Received? ? </p> <br>
            <button type="submit" name="resendCode">Resend Email</button>
        </form>
    </div>
</div>
</body>
</html>
