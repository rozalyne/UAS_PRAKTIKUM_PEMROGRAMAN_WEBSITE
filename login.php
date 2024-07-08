<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "praktikum_web");

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_POST['submit'])) {
    $user = $mysqli->real_escape_string($_POST['username']);
    $pass = $mysqli->real_escape_string($_POST['password']);

    if ($user == "" || $pass == "") {
        $error = "Username Tidak Terdaftar/Password Yang di masukan Salah!";
    } else {
        $result = $mysqli->query("SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
            or die("Could not execute the select query.");

        $row = $result->fetch_assoc();

        if ($row) {
            $_SESSION['valid'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .container table input[type="password"],
        .container table input[type="submit"],
        .container table input[type="button"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin: 4px 0;
        }

        .container table input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }

        .container table input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container table input[type="button"] {
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }

        .container table input[type="button"]:hover {
            background-color: #0056b3;
        }

        .container p.error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
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

        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <h2>Login</h2>
        <form name="form1" method="post" action="">
            <table>
                <tr>
                    <td width="10%">Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                        <input type="button" value="Register" onclick="window.location.href='register.php';">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
