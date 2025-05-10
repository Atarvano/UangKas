<?php

session_start();
include 'conn.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../error403.html');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username-column']);
    $password = htmlspecialchars($_POST['password-column']);
    $nama = htmlspecialchars($_POST['nama-column']);
    $role = $_GET['role'];
    $id_kelas = htmlspecialchars($_POST['kelas-column']);
    $id = $_GET['id'];

    if ($role === 'siswa') {
        $sql = "UPDATE siswa SET username='$username', password='$password', nama='$nama', kelas='$id_kelas' WHERE id_siswa=$id";
    } elseif ($role === 'guru') {
        $sql = "UPDATE guru SET username='$username', password='$password', nama='$nama', id_kelas='$id_kelas' WHERE id_guru=$id";
    } elseif ($role === 'bendahara') {
        $sql = "UPDATE bendahara SET username='$username', password='$password', nama='$nama', id_kelas='$id_kelas' WHERE id_bendahara=$id";
    }

    if (mysqli_query($conn, query: $sql)) {
        header("Location: ../../dashboard/admin.php?message=success");
        exit();
    } else {
        header("Location: ../../dashboard/admin.php?message=error");
        exit();
    }
}
?>