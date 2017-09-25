<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/08/2017
 * Time: 09:19 PM
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
            <li><a href="index.html">Your Savings</a></li>
            <li><a href="about.html">About</a></li>
            <li><a style="float: right" href="login.php">Login</a></li>
            <li style="float: right"><a href="register.php">Register</a></li>
        </ul>
    </div>
</nav>

<div class="login-page">
    <div class="form">

        <?php

        if (isset($_SESSION['errorMail'])) {
            echo "<h4 class=\"errorMsg\">No Account found associated with this Email!!</h4> <br>";
        }
        session_unset();
        ?>

        <form class="login-form" action="scripts/PHP/mailHandler.php" method="post" enctype="multipart/form-data">

            <input type="email" placeholder="Email" name="email" required/>
            <button type="submit" name="send">Send Mail</button>
        </form>
    </div>
</div>
</body>
</html>
