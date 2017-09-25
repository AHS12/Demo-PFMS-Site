<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 16/08/2017
 * Time: 07:17 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

if (isset($_POST['submitCode'])) {
    $userCode = $_POST['resetCode'];

    if ($_SESSION['resetCode'] == $userCode) {
        header("location: ../updatePass.php");
    } else {
        $_SESSION['wrongCode'] = 1;
        header("location: ../submitCode.php");
    }
}

if (isset($_POST['resendCode'])) {

    $resetCode = mt_rand(1000, 5000);
    $_SESSION['resetCode'] = $resetCode;

    $to = $_SESSION['forgottenUserEmail'];
    $subject = 'PassWord Reset';
    /** @var array $db_userFname */
    $message = "Hello " . $_SESSION['forgottenUserName'] . "!\n Your Password Reset Code is: " . $resetCode;
    $headers = "From: Your Savings";

    //for debugging purpose

    $_SESSION['successEmail'] = 1;


    if (mail($to, $subject, $message, $headers)) {

        header("location: ../submitCode.php");
    } else {
        die("Error!" . mysqli_error($connection));
    }


}
