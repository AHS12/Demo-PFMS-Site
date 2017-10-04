<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 16/08/2017
 * Time: 07:24 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

include "db.php";

if (isset($_POST['password'])) {

    $newUserPass = $_POST['newPass'];

    //using Crypto_BlowFish encryption
    $hashFormate = "$2y$10$";
    $salt = "iusesomestupidestrin12";
    $hashF_and_salt = $hashFormate . $salt;
    //encrypting password
    $newUserPass = crypt($newUserPass, $hashF_and_salt);


    $forgottenUserEmail = $_SESSION['forgottenUserEmail'];
    $query = "UPDATE userinfo SET user_Pass = '$newUserPass' WHERE userinfo.user_Email = '$forgottenUserEmail';";
    $result = mysqli_query($connection, $query);


    if (!$result) {
        die("Failed!!!" . mysqli_error($connection));
    }

    $_SESSION['successPassUp'] = 1;

    header("location: ../../login.php");
}