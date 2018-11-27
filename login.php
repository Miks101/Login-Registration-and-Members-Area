<?php 
include "inc/dbconfig.php";

if (isset($_POST['signin'])) {
    
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = hash('sha256', $_POST['password']);
    $check    = mysqli_query($connect, "SELECT username, password FROM `users` WHERE `username`='$username' AND password='$password'");
    if (mysqli_num_rows($check) > 0) {
        $logdate = date("Y-m-d H:i:s");
        session_start();
        $_SESSION['username'] = $username;

        echo '<meta http-equiv="refresh" content="0;url=home.php">';

    } else {
      
	echo 'Invalid Credentials<Br>';
    }
}
?>
    Login
            <form method="POST" action="">
<i class="fas fa-user-circle"></i>  <input type="text" name="username" placeholder="Username" id="username"><BR>
         <i class="fas fa-unlock-alt"></i>   <input type="password" name="password" placeholder="Password"><BR>
             <input type="checkbox" name="remember" id="remember" />
	        <BR><BR>
        <a href="register.php" class="button">Register</a>
        <input type="submit" class="button" name="signin" value="Login">
                 </form>
                 <?php exit; ?>