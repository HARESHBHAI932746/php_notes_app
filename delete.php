<?php



include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM `notes` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location:main.php');
}
?>