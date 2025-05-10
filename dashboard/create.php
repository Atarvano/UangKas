<?php

session_start();
if (isset($_SESSION['role']) != 'bendahara' && $_SESSION['role'] != 'admin') {
    header("Location: ../error403.html");
    exit();
}
$is_forbidden = false;
if (($_SESSION['role']) === 'bendahara') {

    $id_siswa = $_GET['id'];
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }

    include '../src/php/conn.php';

    $id_siswa = $_GET['id'];

    $query = "
        SELECT s.*, k.id_kelas 
        FROM siswa s
        JOIN kelas k ON s.kelas = k.id_kelas
        WHERE s.id_siswa = $id_siswa AND k.id_kelas = " . $_SESSION['id_kelas'];


    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $is_forbidden = (!$row || $row['id_kelas'] != $_SESSION['id_kelas']);

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
    <?php
    include '../src/assets/sidebar.php';
    if ($_SESSION['role'] === 'bendahara') {
        include '../src/assets/createhistory.php';
    } elseif (
        $_SESSION['role'] === 'admin'
        && !isset($_GET['create'])
    ) {
        include '../src/assets/createusers.php';
    } elseif ($_SESSION['role'] === 'admin' && isset($_GET['create'])) {
        include '../src/assets/createkelas.php';
    }
    ?>


    <script src="../src/js/bundle.js"></script>
</body>

</html>