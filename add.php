<?php
session_start();
include("connection.php");

// Pastikan variabel-variabel berikut sesuai dengan pengaturan database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_web";

// Buat koneksi ke database menggunakan mysqli
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi database
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Periksa apakah form telah disubmit
if(isset($_POST['submit'])) {
    // Ambil nilai-nilai dari form
    $name = $_POST['name'];
    $episode = $_POST['episode'];
    $rating = $_POST['rating'];

    // Periksa apakah ada field yang kosong
    if(empty($name) || empty($episode) || empty($rating)) {
        echo "Semua field harus diisi. Salah satu atau beberapa field masih kosong.";
        echo "<br/>";
        echo "<a href='add_modal_anime.php'>Kembali</a>";
    } else {
        // Siapkan query untuk melakukan INSERT ke tabel 'anime'
        $query = "INSERT INTO anime (name, episode, rating) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($query);

        // Bind parameter-parameter ke statement
        // 'sdi' berarti s = string, d = double, i = integer
        $stmt->bind_param("sdi", $name, $episode, $rating);
        
        // Eksekusi statement untuk menjalankan query INSERT
        if($stmt->execute()) {
            // Redirect ke halaman index.php setelah berhasil menambahkan anime
            header("Location: index.php");
            exit; // Pastikan untuk keluar dari script setelah redirect
        } else {
            echo "Gagal mengeksekusi query INSERT: " . $stmt->error;
        }
    }
} else {
    // Handle jika seseorang mengakses add.php secara langsung tanpa form submission
    echo "Akses Ditolak";
}
?>
