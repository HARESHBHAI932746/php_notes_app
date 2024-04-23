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
        
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="enter your name" required>
            <input type="password" name="password" placeholder="enter your Password" required>
            <button class="buttons" type="submit">Register</button>
        </form>
    </div>
    <a href="login.php">already have account</a>
</body>
</html>
