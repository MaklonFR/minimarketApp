<?php
$host = "localhost";
$dbname = "minimarket";
$username = "root";
$password = "";

// Buat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi Gagal: " . $conn->connect_error]));
}
?>
