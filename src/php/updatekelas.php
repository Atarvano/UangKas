<?php

session_start();
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['kelas'];
    $namakelas = htmlspecialchars($_POST['nama-kelas']);


    $sql = "UPDATE kelas SET nama_kelas='$namakelas' WHERE id_kelas='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../../dashboard/admin.php?message=success");
    } else {
        header("Location: ../../dashboard/admin.php?message=error");
    }
}