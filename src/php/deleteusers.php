<?php

session_start();
include 'conn.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../error403.html');
    exit;
}

$id = $_GET['id'];
$role = $_GET['role'];

switch ($role) {
    case 'siswa':
        $sql = "DELETE FROM siswa WHERE id_siswa = $id";
        break;
    case 'guru':
        $sql = "DELETE FROM guru WHERE id_guru = $id";
        break;
    case 'bendahara':
        $sql = "DELETE FROM bendahara WHERE id_bendahara = $id";
        break;
    default:
        header("Location: ../../dashboard/admin.php?message=invalid_role");
        exit();
}



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
?>