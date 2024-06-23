<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Anime</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .form-container {
        max-width: 400px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin: auto;
    }
    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }
    .form-container input[type="text"] {
        width: calc(100% - 20px); /* Adjust width for padding */
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box; /* Ensures padding is included in width */
    }
    .form-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .form-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<div class="form-container">
    <?php
    include("connection.php");

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Checking the connection
    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($mysqli, "SELECT * FROM anime WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            ?>
            <form name="editForm" method="post" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
                <label for="episode">Episode:</label>
                <input type="text" id="episode" name="episode" value="<?php echo $row['episode']; ?>"><br>
                <label for="rating">Rating:</label>
                <input type="text" id="rating" name="rating" value="<?php echo $row['rating']; ?>"><br><br>
                <input type="submit" name="update" value="Update">
            </form>
            <?php
        } else {
            echo "Anime with ID $id not found.";
        }
    } else {
        echo "ID parameter not specified.";
    }
    ?>
</div>

</body>
</html>
