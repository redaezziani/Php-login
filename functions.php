<?php

function connectToDatabase($host, $dbname, $username, $password)
{
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

function userLogin($username, $user_password, $pdo)
{
    if (!empty($username) && !empty($user_password)) {

        if( strlen($user_password) > 8){
            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name = '$username' AND user_password = '$user_password'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                session_start();
                $_SESSION['user_id']=$result['user_id'];
                $_SESSION['user_name']=$result['user_name'];
                // Successful login
                // Perform any necessary actions or return a success message
                return "Login successful!";
            } else {
                // Invalid login
                // Perform any necessary actions or return an error message
                return "Invalid username or user_password.";
            }
        }
        else{
            return "password must be at least 8 characters long";
        }
    } 
    else {
        return "username and user_password fields cannot be empty";
    }
}

?>