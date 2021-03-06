<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/08/2017
 * Time: 10:29 AM
 */

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
    <link rel="shortcut icon" href="src/favicon.ico"/>
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="style/loginStyle.css">
    <link rel="stylesheet" type="text/css" href="style/navBar.css">
    <script src="lib/jQuery/jquery-3.2.1.min.js"></script>
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
        <form class="login-form" action="scripts/PHP/profileUpdate.php" method="post" enctype="multipart/form-data">
            <input type="email" placeholder="Email" name="email" required/>
            <input type="password" placeholder="password" name="password"/>
            <input type="text" placeholder="First Name" name="firstname"/>
            <input type="text" placeholder="Last name" name="lastname"/>
            <!--    for preview Image-->

            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#preview').attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>

            <input type="file" name="image" onchange="readURL(this)"> <br>
            <img width="240" height="240" id="preview" src="#" alt=""> <br>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</div>
</body>
</html>
