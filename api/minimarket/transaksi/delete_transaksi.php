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

if (isset($_POST['id_transaksi'])) {
    $id_transaksi = $_POST['id_transaksi'];

    $stmt = $conn->prepare("DELETE FROM transaksi WHERE id_transaksi = ?");
    $stmt->bind_param("i", $id_transaksi);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
