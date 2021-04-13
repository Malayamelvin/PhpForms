<!Doctype html>
<html>
<head>
<title>Registration page</title>
</head>
<body>
<form action="register.php" name="registrationform" method="post">
    <h2>Register</h2>
    <p>Fill this form to register</p>
   <br><br>
    Username:    <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    country:    <input type="text" name="country" required><br><br>
    Email:    <input type="email" name="email" required><br><br>
    <input type="submit" name="register">
</form>
</body>
</html>
<?php
if(isset($_POST['register'])){

    $errormessage="";
    
    if(empty($_POST['username'])){
        $errormessage .="<li> you for got to user your username</li>";
    }

    if(empty($_POST['country'])){
        $errormessage .="<li> you for got to user your country</li>";
    }

    if(empty($_POST['email'])){
        $errormessage .=" </li>you for got to user your email</li>";
    }

    if(empty($_POST['password'])){
        $errormessage .="<li> you for got to user your password</li>";
    }

    if(!empty($errormessage)){
        echo ("<ul>".$errormessage."</ul>\n");
       
    }
    $username =$_POST['username'];
    $country =$_POST['country'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    

    register($username, $country, $email, $password  );
   

}

//Registers the user to the system by adding user details to the database.
function register($username, $country,  $email, $password){
   
    $file = "filedatabase.txt";
    $myfile = fopen($file,"a+");
    $data = $username."|".$password."|".$email."|".$country."\n";
    fwrite($myfile,$data);
    header("Location: index.php"); 

}
?>