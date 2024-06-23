<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container form {
            margin-bottom: 20px;
        }

        .container table {
            width: 100%;
        }

        .container table td {
            padding: 10px;
        }

        .container table input[type="text"],
        .container table input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin: 4px 0;
        }

        .container table input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }

        .container table input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container p {
            margin-bottom: 10px;
            color: red;
            font-weight: bold;
        }

        .container a {
            text-decoration: none;
            color: #007bff;
        }

        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="login.php">Home</a> <br />

        <?php
session_start();
include("connection.php");

$mysqli = new mysqli("localhost", "root", "", "praktikum_web");

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (empty($name) || empty($email) || empty($user) || empty($pass)) {
        echo "<p>All fields should be filled. Please fill out all fields.</p>";
    } else {
        $query = "INSERT INTO login (name, email, username, password) VALUES ('$name', '$email', '$user', MD5('$pass'))";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            echo "<p>Registration successful</p>";
            // Redirect ke halaman login setelah registrasi berhasil
            header("Location: login.php");
            exit; // Pastikan untuk keluar dari script setelah redirect
        } else {
            echo "<p>Registration failed. Please try again later.</p>";
        }
    }
}
?>
w

        <h2>Register</h2>
        <form name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
