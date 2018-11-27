<?php 
    session_start();
require "inc/dbconfig.php";
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $suser = mysqli_query($connect, "SELECT * FROM `users` WHERE username='$username'");
    $count = mysqli_num_rows($suser);
     if ($count <= 0) {
        echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=login.php" />';
        exit;
}
?>