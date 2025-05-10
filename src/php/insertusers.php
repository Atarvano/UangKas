<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../error403.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username-column']);
    $password = htmlspecialchars($_POST['password-column']);
    $nama = htmlspecialchars($_POST['nama-column']);
    $role = htmlspecialchars($_POST['role-column']);
    $id_kelas = htmlspecialchars($_POST['kelas-column']);

    $checkQuery = "SELECT * FROM $role WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        header("Location: ../../dashboard/admin.php?message=username_exists");
        exit();
    }

    if ($role === 'siswa') {
        $sql = "INSERT INTO siswa (username, password, nama, kelas) VALUES ('$username', '$password', '$nama', '$id_kelas')";
    } elseif ($role === 'guru') {
        $sql = "INSERT INTO guru (username, password, nama, id_kelas) VALUES ('$username', '$password', '$nama' ', '$id_kelas')";
    } elseif ($role === 'bendahara') {
        $sql = "INSERT INTO bendahara (username, password, nama, id_kelas) VALUES ('$username', '$password', '$nama', '$id_kelas')";
    } else {
        header("Location: ../../dashboard/admin.php?message=invalid_role");
        exit();
    }


    if (mysqli_query($conn, query: $sql)) {
        header("Location: ../../dashboard/admin.php?message=success");
        exit();
    } else {
        header("Location: ../../dashboard/admin.php?message=error");
        exit();
    }
}