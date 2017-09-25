<?php

/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 06/08/2017
 * Time: 09:42 PM
 */
class connectDB
{
    var $host = "localhost:3306/finance";
    var $user = "root";
    var $dbPassword = "";
    var $database = "finance";
    var $port = "3306";
}

$connect = new connectDB();

//connecting to Database
$connection = mysqli_connect($connect->host, $connect->user, $connect->dbPassword, $connect->database, $connect->port);

if (!$connection) {
    die("Failed to Connect!!!" . mysqli_error($connection));
}