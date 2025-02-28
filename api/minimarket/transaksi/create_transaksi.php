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

if (isset($_POST['id_barang'], $_POST['jumlah'])) {
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga barang dari tabel barang
    $query = $conn->prepare("SELECT harga, diskon FROM barang WHERE id_barang = ?");
    $query->bind_param("i", $id_barang);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $harga = $row['harga'];
        $diskon = $row['diskon'];

        // Hitung harga setelah diskon
        $harga_diskon = $harga - ($harga * $diskon / 100);
        $total_harga = $harga_diskon * $jumlah;

        // Insert ke tabel transaksi
        $stmt = $conn->prepare("INSERT INTO transaksi (id_barang, jumlah, total_harga) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $id_barang, $jumlah, $total_harga);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "barang_not_found";
    }
}
?>
