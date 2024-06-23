<?php
session_start();
include("connection.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_web";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $episode = $_POST['episode'];
    $rating = $_POST['rating'];

    // Validasi input
    if (empty($name) || empty($episode) || empty($rating)) {
        die("All fields should be filled. Either one or many fields are empty.");
    } else {
        // Update query
        $query = "UPDATE anime SET name='$name', episode='$episode', rating='$rating' WHERE id='$id'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location: index.php"); // Redirect to index.php
            exit();
        } else {
            die("Could not execute the update query: " . mysqli_error($mysqli));
        }
    }
} else {
    die("Form submission not detected.");
}
?>
