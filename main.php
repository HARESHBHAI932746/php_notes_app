<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notes Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            color: white;
            background-color: black;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .input {
            color: white;
            background-color: rgba(0, 0, 55, 0.372);
        }

        .cards {

            display: flex;
            margin: 6px;
            flex-wrap: wrap;
        }

        .card {
            border-radius: 10px;
            padding: 20px;
            margin: 30px;


        }

        .box {
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.969);
            color: white;
            background-color: black;
            border: 2px solid white;
            width: 380px;
            padding: 20px;
            border-radius: 8px;
            margin: 25px;

        }

        .boxh2 {
            color: white;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .cardp {
            color: white;
            font-size: 16px;
            line-height: 1.6;
        }

        .logoutbtn {
            background-color: #a40000c7;
        }

        .logoutbtn:hover {
            background-color: red;

        }





        .navbar {
            background-color: #333;
        }

        .navcontainer {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .brand {
            color: white;
            font-size: 24px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        .nav-links a:hover {
            background-color: #555;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: none;
            border-radius: 4px 0 0 4px;
        }

        .search-container button {
            padding: 8px 12px;
            font-size: 16px;
            border: none;
            background-color: #555;
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 10px;
            }

            .nav-links {
                margin-top: 20px;
                flex-direction: column;
                align-items: center;
            }

            .nav-links a {
                display: block;
                padding: 10px 0;
            }

            .search-container {
                margin-top: 20px;
            }
        }


        .notification {
            font-size: 15px;
            margin: 1px;
            padding: 4px;
            display: flex;
            color: green;
        }

        .closemsg {
            display: none;
        }

        .closebtn {
            background-color: transparent;
            color: red;
            font-size: 24px;
        }
        .iconimg{
            height: 23px;
            width: 23px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <a href="main.php" class="brand">QuickNote</a>
            <div class="nav-links">
                <a href="main.php" class="home">Home</a>
                <a href="about.php" class="about">About</a>
                <a href="index.php" class="register">Register</a>
                <a href="login.php" class="login">Login</a>
                <a href="logout.php" class="logout">Logout</a>
            </div>
            <div class="search-container">
                <a href="searchpage.php">
                    <button type="submit">Search
                    </button>
                </a>
            </div>
        </div>
    </nav>
    <br>
    <h2>Welcome,
        <?php echo $_SESSION['username']; ?>
    </h2>

    <br>

    <br>
    <hr>
    <?php
  
    // $msg = $_GET['msg'];
    ?>
    <div class="notification" id="notification">
        <h2 class="message">
            <!-- <?php echo $msg; ?> -->
            <!-- <button class="closebtn" onclick="closeNotification()">x</button> -->

        </h2>
    </div>
    <br>

    <div class="container">

        <center>

            <h2>Add New Note</h2>
        </center>
        <form action="add_note.php" method="POST">
            <input type="text" name="title" placeholder="Note Title" required>
            <textarea class="input" name="content" placeholder="Note Content" required></textarea>
            <button class="buttons" type="submit">Save Note</button>
        </form>

    </div>


    <br><br>
    <hr>
    <div>

        <center>
            <h1>Notes</h1>
        </center>
        <hr>
        <?php


include "db.php";
$user_id = $_SESSION['user_id'];



// $sql = "SELECT * FROM `notes` WHERE user_id = $user_id ";
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){



        ?>
        <div class="cards">
            <div class="box">
                <h2 class="boxh2"><?php echo $row['title'] ?></h2>
                <p class="cardp"><?php echo $row['content'] ?></p>
                <a href="edit.php?id=<?php echo $row['id'] ?>" class=""><img class="iconimg" src="editpng.png" alt="">  </a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" class=""><img class="iconimg" src="deletepng.png" alt=""></a>

            </div>

<?php } ?>
        </div>
    </div>



 <center>
    <footer class="footer">
        <div class="fcontainer">
            <div class="footer-content">

                    <p class="footer-text">QuickNote &copy; 2024</p>
                </div>
            </div>
        </footer>
    </center>
    <script src="script.js"></script>
</body>

</html>