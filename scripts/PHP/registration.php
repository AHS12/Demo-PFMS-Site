<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 09/08/2017
 * Time: 08:23 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

include "db.php";


if (isset($_POST['register'])) {

    $userName = $_POST['username'];
    $userPassword = $_POST['password'];
    $userEmail = $_POST['email'];
    $userFname = $_POST['firstname'];
    $userLname = $_POST['lastname'];
//    $userImg = $_POST['image'];

    $userName = mysqli_real_escape_string($connection, $userName);
    $userPassword = mysqli_real_escape_string($connection, $userPassword);
    $userFname = mysqli_real_escape_string($connection, $userFname);
    $userLname = mysqli_real_escape_string($connection, $userLname);

    //using Crypto_BlowFish encryption
    $hashFormate = "$2y$10$";
    $salt = "iusesomestupidestrin12";
    $hashF_and_salt = $hashFormate . $salt;
    //encrypting password
    $userPassword = crypt($userPassword, $hashF_and_salt);

    //processing Image upload

    $fileTmp = $_FILES['image']['tmp_name']; //Temporary location Of File
    $fileUserImgName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $filePath = "../images/" . $fileUserImgName;

    $fileSize = getimagesize($fileTmp);


    if ($fileSize != false) {


        if (($fileType != "image/jpeg" && $fileType != "image/png") && $fileType != "image/gif") {

            echo "Please Upload A Jpeg/PNG/Gif";

        } else {

            move_uploaded_file($fileTmp, $filePath);


            $query = "INSERT INTO userinfo(user_Name, user_Pass, user_Email, user_Fname, user_Lname, user_Img) VALUES ('$userName','$userPassword','$userEmail','$userFname','$userLname','$fileUserImgName')";
            $result = mysqli_query($connection, $query);


            if (!$result) {
                die("Failed!!!" . mysqli_error($connection));
            }

            header("location: ../login.php");
            $_SESSION['successReg'] = 1;
        }


    } else {
        die("Please Upload A Image");
    }


}