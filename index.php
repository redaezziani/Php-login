<?php
/* this code is owened by  reda ezziani 
give me a star in my github acount 
https://github.com/redaezziani */


// call the function file to use the functions
require 'functions.php';
$host="localhost";
$dbname="my_data";
$username="root";
$password="";
$return="";
$pdo=connectToDatabase($host, $dbname, $username, $password);
;
if (isset($_POST['submit'])){
    $user_name=$_POST['user-name'];
    $user_password=$_POST['user-password'];
    $return = userLogin($user_name, $user_password, $pdo);
    $return=="Login successful!"? header('Location:home.php') : "" ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="icon" href="./Genius Cat.png">
    <title> Php Login </title>
</head>
<body>
    <form  method="post">
     <div class="form-container">
        <div class="form-logo">
            <img src="./Genius Cat.png" alt="GenisCat" >
        </div>
        <div class="form-input">
            <input id="username" type="text" name="user-name" class="input-user" placeholder="Enter your username...">
            <div class="form-icon">
                <i class="icon la la-user"></i>
            </div>
            <span class="form-span">
             <?php
             echo  $return =="username and user_password fields cannot be empty" ?   "the fild cannot be empty":"";
             ?>
        </span>
        </div>
        <div class="form-input">
            <input id="userpassword" type="password" name="user-password" class="input-password" placeholder="Enter your password...">
            <div class="form-icon">
                <i class="icon la la-lock"></i>
            </div>
            <span class="form-span">
            <?php
             echo  $return =="username and user_password fields cannot be empty" ?   "the fild cannot be empty":"";
             echo  $return =="password must be at least 8 characters long" ?   "password must be at least 8 characters long":"";
             echo  $return =="Invalid username or user_password." ?   "Invalid username or user_password.":"";
             ?>
        </span>
        </div>
        <button id="submit" name="submit" class="form-button">Login</button>
     </div>
    </form>
</body>
</html>