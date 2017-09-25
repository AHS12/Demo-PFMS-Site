<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['userFname'] . " " . $_SESSION['userLname'] ?></title>
    <link rel="stylesheet" type="text/css" href="../style/navBar.css">
    <link rel="stylesheet" type="text/css" href="../style/profile.css">
</head>
<body>

<nav>
    <div class="navBar">
        <ul>
            <li><a href="../index.html">Your Savings</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a style="float: right" href="../login.php">Login</a></li>
            <li style="float: right"><a href="../scripts/PHP/logout.php"><?php echo $_SESSION['username'] ?></a></li>
        </ul>
    </div>
</nav>

<div class="side-profile">
    <h1>Welcome <?php echo $_SESSION['userFname'] ?> </h1> <br>
    <img class="img-circle" height="150" width="150" src="../images/<?php echo $_SESSION['userImg'] ?>"
         alt="Cant Load Image">

    <a class="button" href="../updateProfile.php">Update Profile</a>
    <hr>
</div>

</body>
</html>