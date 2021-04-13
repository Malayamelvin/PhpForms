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
    <title>Reset password</title>
    </head>
    <body>
        <form action="resetpassword.php" method="post">
        <h2>Reset password</h2>
        <p>Enter password to reset.</p>

        <br><br>
        Old Password: <input type="password" name="oldpassword" require><br><br>
        New Password: <input type="password" name="newpassword" require><br><br>
        <input type="submit" name="resetpassword" value="Reset">
        </form>

    </body>

    </html>

<?php

    if(isSet($_POST['resetpassword'])){
        $oldpassword= $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        resetPassword($oldpassword,$newpassword);
    }

    //Resets the users password 
    function resetPassword($oldpassword,$newpassword){

        if($oldpassword== $_SESSION['password']){
            $file = "filedatabase.txt";
            $myfile = file_get_contents($file);
            $myfile = str_replace($oldpassword,$newpassword,$myfile);
            file_put_contents($file,$myfile);
            header("Location: welcome.php");


        }


    }


    

?>