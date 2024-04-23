<?php
session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            header("Location:main.php");
        exit();

        }
    }

    else{
        echo "wrong";
    }

}

$conn->close();

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notes App</title>
    <link rel="stylesheet" href="styles.css">
<style>
    body{
        color: white;
        background-color: black;
    }
   
</style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="enter your name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="buttons" type="submit">Login</button>
        </form>
        
    </div>
    <br>
    <a href="register.php">create account</a>
</body>
</html>
