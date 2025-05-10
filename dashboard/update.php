<?php
include '../src/php/conn.php';
session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'bendahara' && $_SESSION['role'] != 'admin')) {
    header('Location: ../error403.html');
    exit;
}
$idkelas = $_SESSION['id_kelas'] ?? null;


if ($_SESSION['role'] === 'bendahara') {
    $id = $_GET['id'];


    $sql = "SELECT * FROM uang_kas_kelas 
     WHERE id_transaksi = $id AND id_kelas = $idkelas";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        header("Location: index.php?message=error");

        exit;
    }
}

if ($_SESSION['role'] === 'admin' && !isset($_GET['kelas'])) {
    $role = $_GET['role'];
    $id = $_GET['id'];
    switch ($role) {
        case 'siswa':
            $sql = "SELECT * FROM siswa WHERE id_siswa = $iduser";
            break;
        case 'guru':
            $sql = "SELECT * FROM guru WHERE id_guru = $iduser";
            break;
        case 'bendahara':
            $sql = "SELECT * FROM bendahara WHERE id_bendahara = $iduser";
            break;
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



} else if ($_SESSION['role'] === 'admin' && isset($_GET['kelas'])) {
    $kelas = $_GET['kelas'];
    $sql = "SELECT * FROM kelas WHERE id_kelas = $kelas";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        header("Location: index.php?message=error");
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Create</title>

    <link rel="shortcut icon" href="../src/img/icon.png" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>
    <?php include '../src/assets/sidebar.php';
    if ($_SESSION['role'] === 'bendahara') {
        include '../src/assets/updatehistory.php';
    } else if ($_SESSION['role'] === 'admin' && !isset($_GET['kelas'])) {
        include '../src/assets/updateusers.php';
    } else if ($_SESSION['role'] === 'admin' && isset($_GET['kelas'])) {
        include '../src/assets/updatekelas.php';
    }
    ?>

    <script src="../src/js/bundle.js"></script>
</body>

</html>