<?php 
include "inc/dbconfig.php"; 
                if(isset($_POST['register'])){
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $uip = $_SERVER['REMOTE_ADDR'];
            $regdate = date("Y-m-d H:i:s");
        
            $sql = mysqli_query($connect, "SELECT username FROM `users` WHERE username='$username'");
    if (mysqli_num_rows($sql) > 0) {
        echo 'Username already in use';
    } else if(strlen($username) <= 4){
	echo "Username needs to be 5 characters or longer";
    } else {
        $sql2 = mysqli_query($connect, "SELECT email FROM `users` WHERE email='$email'");
        if (mysqli_num_rows($sql2) > 0) {
            echo 'Email address already in use';
        } else if(strlen($password) < 8){
	echo 'Password needs to be 8 characters or longer';
           } else {
               $password = hash('sha256', $_POST['password']);
             $insert = mysqli_query($connect, "INSERT INTO `users` (username, password, email, datetime, ip) VALUES ('$username', '$password', '$email', '$regdate', '$uip')");
             session_start();
             $_SESSION['username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=home.php">';
    }
  }
        }
        ?>
            Sign Up
        <form method="POST" action="">
   <i class="fas fa-user-circle"></i>  <input type="text" name="username" placeholder="Username" required> <BR>
   <i class="fas fa-unlock-alt"></i>  <input type="password" name="password" placeholder="Password" required> <BR>
  <i class="fas fa-envelope-open"></i>  <input type="email" name="email" placeholder="Email@address.co.uk" required> <BR><BR>
      <input type="checkbox" name="remember" id="remember" />
		<label for="remember-me">Agree to Terms & Conditions</label><BR><BR>
    <input type="submit" name="register" value="Register">
        </form>
        <?php exit; ?>