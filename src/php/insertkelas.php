<?php

session_start();
include 'conn.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../error403.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namakelas = htmlspecialchars($_POST['nama-kelas']);

    $sql = "INSERT INTO kelas (nama_kelas) VALUES ('$namakelas')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../../dashboard/admin.php?message=success");
    } else {
        header("Location: ../../dashboard/admin.php?message=error");
    }


}