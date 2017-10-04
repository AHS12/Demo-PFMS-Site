<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 13/08/2017
 * Time: 12:10 PM
 */

@ob_start();
if (session_status() != PHP_SESSION_ACTIVE) session_start();

$_SESSION['userId'] = null;
$_SESSION['username'] = null;
$_SESSION['userPassword'] = null;
$_SESSION['userFname'] = null;
$_SESSION['userLname'] = null;
$_SESSION['userImg'] = null;
$_SESSION['userRole'] = null;
$_SESSION['resetCode'] = null;
$_SESSION['forgottenUserEmail'] = null;

session_destroy();

header("location:../../login.php");