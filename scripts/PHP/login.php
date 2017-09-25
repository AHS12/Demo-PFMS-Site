<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 09/08/2017
 * Time: 08:22 PM
 */


@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

include "db.php";


if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    //using Crypto_BlowFish encryption
    $hashFormate = "$2y$10$";
    $salt = "iusesomestupidestrin12";
    $hashF_and_salt = $hashFormate . $salt;
//    encrypting password
    $password = crypt($password, $hashF_and_salt);

    $query = "SELECT * FROM userinfo WHERE user_Name = '{$username}'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Failed!!!" . mysqli_error($connection));
    }


    //checking if user account exists or not
    if (mysqli_num_rows($result) == 1) {

        while ($row = mysqli_fetch_array($result)) {
            $db_userId = $row['user_id'];
            $db_userName = $row['user_Name'];
            $db_userPassWord = $row['user_Pass'];
            $db_userFname = $row['user_Fname'];
            $db_userLname = $row['user_Lname'];
            $db_userImg = $row['user_Img'];
            $db_userRole = $row['user_role'];
        }


        /** @var array $db_userId */
        /** @var array $db_userName */
        /** @var array $db_userPassWord */
        /** @var array $db_userFname */
        /** @var array $db_userLname */
        /** @var array $db_userImg */
        /** @var array $db_userRole */


        if ($db_userName == $username && $db_userPassWord == $password) {


            $_SESSION['userId'] = $db_userId;
            $_SESSION['username'] = $db_userName;
            $_SESSION['userPassword'] = $db_userPassWord;
            $_SESSION['userFname'] = $db_userFname;
            $_SESSION['userLname'] = $db_userLname;
            $_SESSION['userImg'] = $db_userImg;
            $_SESSION['userRole'] = $db_userRole;

            header("location: ../profile.php");
        } else {

            $_SESSION['errorMsg'] = 1;
            header("location: ../login.php");

        }

    } else {
        $_SESSION['errorAcc'] = 1;
        header("location: ../login.php");
    }


}