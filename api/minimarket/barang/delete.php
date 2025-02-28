<?php
include "../config/db.php";

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];

    $stmt = $conn->prepare("DELETE FROM barang WHERE id_barang=?");
    $stmt->bind_param("i", $id_barang);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
