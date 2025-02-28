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
//print_r($_POST);

if (isset($_POST['id_barang'], $_POST['nama_barang'], $_POST['kategori'], $_POST['harga'], $_POST['stok'], $_POST['diskon'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $diskon = $_POST['diskon'];

        $stmt = $conn->prepare("UPDATE barang SET nama_barang=?, kategori=?, harga=?, stok=?, diskon=? WHERE id_barang=?");
        $stmt->bind_param("ssdiii", $nama_barang, $kategori, $harga, $stok, $diskon, $id_barang);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
}
?>
