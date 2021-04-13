<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    </style>
</head>
<body>
<form action="index.php" name="loginform" method="post" >
    <h2>Login</h2>
    <p>Enter your credentials to login.</p>
   <br><br>
    username:    <input type="text" name="username" require><br><br>
    Password: <input type="password" name="password" require><br><br>
    <input type="submit" name="login" value="login">
    <p>Haven't registered ? <a href="register.php" style="text-decoration:none;">Click to Register </a>.</p>
</form>
</body>
</html>
<?php
    if(isSet($_POST['login'])){
        $username= $_POST['username'];
        $userPassword = $_POST['password'];
        login($username,$userPassword);
    }

    //user Login function Logs the user into the system.
    function login($username,$password){
        $success =false;
        $file = "filedatabase.txt";
        $userData = file ($file);
        $name ="";
        $userpass="";
        
        foreach ($userData as $user) { 
            $userdetails = explode('|', $user);
           if ($userdetails[0] == $username && $userdetails[1] == $password) {
                
                $name = $userdetails[0];
                $userpass=$userdetails[1];
                $success = true ;
                
                break;
            }else{
               
            }
        }

        if ($success) {
            
            session_start();               
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $name;
                $_SESSION["password"] = $userpass;
                header("Location: welcome.php"); 
            
        } else {
            echo "<br> You have entered the wrong username or password. Please try again. <br>";
        }

    }
 
?>