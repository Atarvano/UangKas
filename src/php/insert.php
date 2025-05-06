<?php
include 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("Error: Missing student ID.");
    }

    $tanggal = $_POST['date-column'];
    $jumlah = $_POST['dibayar-column'];



    $bendahara = $_SESSION['id_user'];
    $idkelas = $_SESSION['id_kelas'];

    $sql = "call postuangkas($id, '$tanggal', $jumlah, $bendahara, $idkelas)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../dashboard/index.php?message=success");

    } else {
        header("Location: ../dashboard/index.php?message=success");

    }
}