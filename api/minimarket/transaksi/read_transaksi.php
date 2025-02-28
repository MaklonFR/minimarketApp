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

$result = $conn->query("
    SELECT t.id_transaksi, b.nama_barang, t.jumlah, t.total_harga, t.tanggal_transaksi 
    FROM transaksi t 
    JOIN barang b ON t.id_barang = b.id_barang 
    ORDER BY t.id_transaksi DESC
");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
