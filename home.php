<?php
// call the function file to use the functions
require 'functions.php';
$host="localhost";
$dbname="my_data";
$username="root";
$password="";
$return="";
$pdo=connectToDatabase($host, $dbname, $username, $password);
;
// check if the use has login or not 
session_start();
if (!isset($_SESSION['user_id'])){
    // if the user  not login resend to the login page 
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Php Home </title>
</head>
<body>
   <div class="sayHello">
    <p>Welcom back <?php echo $_SESSION['user_name'] ?>
    </p>
   </div>
</body>
</html>