<?php
//Fill this information
$host     = "localhost"; // Database Host
$user     = "allpsds_Demo"; // Database Username
$password = "Password101@"; // Database's user Password
$database = "allpsds_demologin"; // Database Name

//------------------------------------------------------------

$connect = mysqli_connect($host, $user, $password, $database);

// Checking Connection
if (mysqli_connect_errno()) {
    echo "Failed to connect with MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect, "utf8");

?>