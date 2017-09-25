<?php

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();


if (isset($_SESSION['userRole'])) {
    if ($_SESSION['userRole'] == 'admin') {
        header('location:admin/index.php');
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['userFname'] . " " . $_SESSION['userLname'] ?></title>
    <link rel="stylesheet" type="text/css" href="style/profile.css">
    <link rel="stylesheet" type="text/css" href="style/navBarDropDown.css">

</head>
<body>

<nav>
    <div class="navBar">
        <ul>
            <li><a href="index.html">Your Savings</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Login</a></li>
            <li style="float: right" class="dropdown">
                <a href="javascript:void(0)" class="dropbtn"><?php echo $_SESSION['username'] ?></a>
                <div class="dropdown-content">
                    <a href="scripts/PHP/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="side-profile">
    <h1>Welcome <?php echo $_SESSION['userFname'] ?> </h1> <br>
    <img class="img-circle" height="150" width="150" src="images/<?php echo $_SESSION['userImg'] ?>"
         alt="Cant Load Image"> <br>
    <a class="button" href="updateProfile.php">Update Profile</a>
    <hr>
</div>

<div>
    <a class="button" href="FinanceApp/index.html">Finance App</a>
</div>

</body>
</html>