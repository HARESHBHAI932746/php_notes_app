<?php
session_start();

include "db.php";

// if($_SERVER("REQUEST_METHOD") == "POST" && isset($_SESSION['user_id'])){
//     $user_id = $_SESSION['user_id'];
//     $title = $_POST['title'];
//     $content = $_POST['content'];

//     $sql = "INSERT INTO `notes` (`user_id`, `title`, `content`) VALUES ('$user_id', '$title', '$content')";
//     $result = mysqli_query($conn,$sql);

    

// }






if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "INSERT INTO notes (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header("Location:main.php?msg=Note Added Successfully");
    }


}





?>