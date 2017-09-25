<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 16/08/2017
 * Time: 07:11 PM
 */
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
        <h3 class="message">Enter Your New PassWord</h3> <br>
        <form class="login-form" action="scripts/PHP/updatePass.php" method="post" enctype="multipart/form-data">
            <input type="password" placeholder="New PassWord" name="newPass" required/>
            <button type="submit" name="password">Update</button>
        </form>
    </div>
</div>
</body>
</html>

