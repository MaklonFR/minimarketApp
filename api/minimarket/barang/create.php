<?php

// Allow all origins to access this resource (you can restrict to specific domains if necessary)
header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); // Allows any origin, you can replace '*' with a specific domain like "http://127.0.0.1:5500"
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers

// Handle preflight OPTIONS requests (required for some requests)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // Stop further processing for OPTIONS requests
}

include "../config/db.php";

if (isset($_POST['nama_barang'], $_POST['kategori'], $_POST['harga'], $_POST['stok'], $_POST['diskon'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $diskon = $_POST['diskon'];

    $stmt = $conn->prepare("INSERT INTO barang (nama_barang, kategori, harga, stok, diskon) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdii", $nama_barang, $kategori, $harga, $stok, $diskon);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
