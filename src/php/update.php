<?php

session_start();
include '../php/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $tanggal = $_POST['date-column'];
    $jumlah = $_POST['dibayar-column'];
    $bendahara = $_SESSION['id_user'];

    // Prepared statement untuk keamanan
    $stmt = $conn->prepare("UPDATE uang_kas_kelas 
                            SET tanggal = ?, jumlah = ? 
                            WHERE id_transaksi = ?");
    $stmt->bind_param("ssi", $tanggal, $jumlah, $id);

    if ($stmt->execute()) {
        header("Location: ../../dashboard/index.php?message=success");
    } else {
        header("Location: ../../dashboard/index.php?message=error");
    }
    $stmt->close();
}
?>