<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../error403.html');
    exit;
}

$id = intval($_GET["id"]);


mysqli_query($conn, "DELETE FROM siswa WHERE kelas = $id");


mysqli_query($conn, "DELETE FROM guru WHERE id_kelas = $id");

$sql = "DELETE FROM kelas WHERE id_kelas = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: ../../dashboard/admin.php?message=success");
    } else {
        header("Location: ../../dashboard/admin.php?message=error");
    }
} else {
    header("Location: ../../dashboard/admin.php?message=error");
}