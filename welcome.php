<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!Doctype html>
    <html>
    <head>
    <title>Welcome page</title>
    </head>
    <body>
        <?php
        
            echo "welcome ".$_SESSION['username']."<br><br>";
        ?>
        <button><a href="logout.php" style="text-decoration:none;">Logout</a></button>
        <button><a href="resetpassword.php" style="text-decoration:none;">Reset Password</a></button>

    </body>
    </html>