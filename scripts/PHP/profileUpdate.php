<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/08/2017
 * Time: 11:30 AM
 */
@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

include "db.php";

if (isset($_POST['update'])) {
    $newUserEmail = $_POST['email'];
    $newUserPass = $_POST['password'];
    $newUserFname = $_POST['firstname'];
    $newUserLname = $_POST['lastname'];

    $newUserPass = mysqli_real_escape_string($connection, $newUserPass);
    $newUserFname = mysqli_real_escape_string($connection, $newUserFname);
    $newUserLname = mysqli_real_escape_string($connection, $newUserLname);


    //using Crypto_BlowFish encryption
    $hashFormate = "$2y$10$";
    $salt = "iusesomestupidestrin12";
    $hashF_and_salt = $hashFormate . $salt;
    //encrypting password
    $newUserPass = crypt($newUserPass, $hashF_and_salt);


    //processing Image upload

    $fileTmp = $_FILES['image']['tmp_name']; //Temporary location Of File
    $fileUserImgName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $filePath = "../images/" . $fileUserImgName;

    $fileSize = getimagesize($fileTmp);

    $userId = $_SESSION['userId'];


    if ($fileSize != false) {


        if (($fileType != "image/jpeg" && $fileType != "image/png") && $fileType != "image/gif") {

            echo "Please Upload A Jpeg/PNG/Gif";

        } else {

            move_uploaded_file($fileTmp, $filePath);


            $query = "UPDATE userinfo SET user_Email = '$newUserEmail',user_Pass = '$newUserPass', user_Fname = '$newUserFname', user_Lname = '$newUserLname',user_Img = '$fileUserImgName' WHERE userinfo.user_id = '$userId';";
            $result = mysqli_query($connection, $query);


            if (!$result) {
                die("Failed!!!" . mysqli_error($connection));
            }

            header("location:logout.php");
        }


    } else {
        die("Please Upload A Image");
    }


}