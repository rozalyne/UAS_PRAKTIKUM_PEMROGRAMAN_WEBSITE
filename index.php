<?php
include("connection.php");

// Koneksi database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check koneksi
if ($mysqli->connect_error) {
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Connection Failed',
                text: 'Koneksi gagal: " . $mysqli->connect_error . "'
            });
          </script>";
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Query untuk mengambil daftar user
$resultUser = mysqli_query($mysqli, "SELECT * FROM login") or die("Query failed: " . mysqli_error($mysqli));

// Query untuk mengambil daftar anime
$resultAnime = mysqli_query($mysqli, "SELECT * FROM anime") or die("Query failed: " . mysqli_error($mysqli));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }

        .header a {
            text-decoration: none;
            margin-right: 10px;
        }

        h2 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            border: 1px solid #888;
            width: 80%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="index.php">Home</a> |
        <a href="logout.php">Logout</a>
    </div>

    <h2>User List</h2>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($resultUser)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h2>Anime List</h2>
    <button class='btn btn-primary mb-3' id='addAnimeBtn'>Add Anime</button>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Episode</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($resultAnime)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['episode'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<td><a href='#' class='edit-btn-anime' data-id='" . $row['id'] . "'>Edit</a> | 
                      <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this anime?');\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Modal content for Add Anime -->
    <div id="addAnimeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Anime</h2>
            <div id="addAnimeForm">
                <!-- Form akan dimuat melalui AJAX -->
            </div>
        </div>
    </div>

    <!-- Modal content for Edit Anime -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Data</h2>
            <div id="editForm">
                <!-- Form akan dimuat melalui AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS dan SweetAlert2 script -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var addAnimeModal = document.getElementById('addAnimeModal');
    var editModal = document.getElementById('editModal');
    var closeSpans = document.getElementsByClassName("close");

    for (var i = 0; i < closeSpans.length; i++) {
        closeSpans[i].onclick = function () {
            addAnimeModal.style.display = "none";
            editModal.style.display = "none";
        }
    }

    window.onclick = function (event) {
        if (event.target == addAnimeModal) {
            addAnimeModal.style.display = "none";
        }
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var addAnimeBtn = document.getElementById('addAnimeBtn');
        addAnimeBtn.addEventListener('click', function () {
            loadFormInModal('add_modal_anime.php');
        });

        var editLinksAnime = document.querySelectorAll('.edit-btn-anime');
        editLinksAnime.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var animeId = this.getAttribute('data-id');
                loadFormInModal('edit_modal_anime.php?id=' + animeId);
            });
        });
    });

    function loadFormInModal(url) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("addAnimeForm").innerHTML = this.responseText;
                addAnimeModal.style.display = "block";
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }
</script>
</body>
</html>
