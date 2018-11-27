 <?php 
 ini_set( "display_errors", 0); 
 include "checklogin.php"; 
$uname     = $_SESSION['username'];
$suser     = mysqli_query($connect, "SELECT * FROM `users` WHERE username='$uname' LIMIT 1");
$rowu      = mysqli_fetch_assoc($suser);
$uname = $rowu['username'];
?>

            You are logged in <?php echo"$uname"; 
            exit; ?>
            
            
            
