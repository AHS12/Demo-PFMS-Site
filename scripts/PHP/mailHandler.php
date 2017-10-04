<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/08/2017
 * Time: 09:30 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

include "db.php";

if (isset($_POST['send'])) {

    $UserEmail = $_POST['email'];

    //checking User

    $query = "SELECT * FROM userinfo WHERE user_Email = '{$UserEmail}'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Error!" . mysqli_error($connection));
    }


    if (mysqli_num_rows($result) == 1) {

        while ($row = mysqli_fetch_array($result)) {

            $db_userId = $row['user_id'];
            $db_userName = $row['user_Name'];
            $db_userEmail = $row['user_Email'];
            $db_userPassWord = $row['user_Pass'];
            $db_userFname = $row['user_Fname'];
            $db_userLname = $row['user_Lname'];
        }


        /** @var array $db_userEmail */
        if ($db_userEmail != $UserEmail) {
            echo "No Account Found!";
        }


        $resetCode = mt_rand(1000, 5000);
        $_SESSION['resetCode'] = $resetCode;


        $_SESSION['forgottenUserEmail'] = $UserEmail;
        /** @var array $db_userFname */
        /** @var array $db_userLname */
        $_SESSION['forgottenUserName'] = $db_userFname . " " . $db_userLname;

        $to = $UserEmail; // Receiver Email ID, Replace with your email ID
        $subject = 'PassWord Reset';
        /** @var array $db_userFname */
        $message = "Hello " . $_SESSION['forgottenUserName'] . "!\n Your Password Reset Code is: " . $resetCode;
        $headers = "From: Your Savings";


        if (mail($to, $subject, $message, $headers)) {

            header("location: ../../submitCode.php");
        } else {
            die("Error!" . mysqli_error($connection));
        }


    } else {

        $_SESSION['errorMail'] = 1;
        header("location: ../../resetPass.php");
    }


}
