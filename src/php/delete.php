<?php
session_start();
include 'conn.php';

// Cek apakah pengguna adalah bendahara
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'bendahara') {
    header('Location: ../error403.html');
    exit;
}

$idkelas = $_SESSION['id_kelas'];
$id = $_GET['id'];

// Jalankan query DELETE
$sql = "DELETE FROM uang_kas_kelas 
        WHERE id_transaksi = $id AND id_kelas = $idkelas";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: ../../dashboard/index.php?message=success");
    } else {
        header("Location: ../../dashboard/index.php?message=error");
    }
} else {
    header("Location: ../../dashboard/index.php?message=error");
}
?>