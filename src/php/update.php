<?php

session_start();
include '../php/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $tanggal = $_POST['date-column'];
    $jumlah = $_POST['dibayar-column'];
    $bendahara = $_SESSION['id_user'];

    // Menggunakan procedural style
    $query = "UPDATE uang_kas_kelas 
              SET tanggal = '$tanggal', jumlah = '$jumlah' 
              WHERE id_transaksi = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../../dashboard/index.php?message=success");
    } else {
        header("Location: ../../dashboard/index.php?message=error");
    }
}
?>