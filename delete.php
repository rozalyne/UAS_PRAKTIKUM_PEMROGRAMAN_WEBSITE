<?php
include("connection.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_web";

// Creating a connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM anime WHERE id='$id'") or die("Could not execute the delete query.");

header("Location: index.php");
?>
