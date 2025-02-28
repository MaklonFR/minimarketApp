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

// Fetch the data from the database
$result = $conn->query("SELECT * FROM barang ORDER BY id_barang DESC");

// Prepare an array to store the results
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);
?>
