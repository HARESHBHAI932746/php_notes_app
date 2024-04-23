<?php

$id = $_GET['id'];

include 'db.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE `notes` SET `title` = '$title',`content` = '$content' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location:main.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Note</title>
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
    <hr>

    <div class="container">

        <center>

            <h2>Edit Note</h2>
        </center>
        <?php

        $id = $_GET['id'];

        include 'db.php';
        $sql = "SELECT * FROM `notes` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result);
        ?>
        <form action="" method="POST">
            <input value="<?php echo $row['title'] ?>" type="text" name="title" placeholder="Note Title" required>
            <input value="<?php echo $row['content'] ?>" type="text" name="content" required>
            <button class="buttons" type="submit" name="submit">Edit Note</button>
        </form>

    </div>


   <br><br><br>
 <center>
    <footer class="footer">
        <div class="fcontainer">
            <div class="footer-content">

                    <p class="footer-text">QuickNote &copy; 2024</p>
                </div>
            </div>
        </footer>
    </center>
</body>

</html>