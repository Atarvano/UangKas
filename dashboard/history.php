<?php

session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../error403.html");
    exit();
}

$nama = $_SESSION['nama'];
$role = $_SESSION['role'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <link rel="shortcut icon" href="../src/img/icon.png" type="image/x-icon" />
</head>

<body>
    <?php include '../src/assets/sidebar.php'; ?>
    <div id="main" class="full-page-content">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none" id="burger-btn">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        History
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card mt-4">
            <div class="card-body py-4 px-4 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar avatar-xl">
                        <img src="./assets/compiled/jpg/1.jpg" alt="Face 1" />
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold"><?= htmlspecialchars($nama); ?></h5>
                        <h6 class="text-muted mb-0"><?= htmlspecialchars($role); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-17">
                    <div class="card">
                        <div class="card-header">
                            <h4>History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Date</th>
                                            <th>Dibayar</th>
                                            <th>Bendahara</th>

                                            <?php if ($_SESSION['role'] == 'bendahara') { ?>
                                                <th>Action</th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../src/php/conn.php';
                                        if (isset($_SESSION['role']) == 'siswa') {
                                            $id = $_SESSION['id_user'];
                                            ;
                                        } else {
                                            $id = $_GET['id'];
                                        }
                                        $kelas = $_SESSION['nama_kelas'];

                                        $sql = "SELECT ukk.*, s.nama, b.nama AS bendahara 
                                                FROM uang_kas_kelas AS ukk
                                                JOIN siswa AS s ON ukk.id_siswa = s.id_siswa 
                                                JOIN kelas AS k ON s.kelas = k.id_kelas 
                                                JOIN bendahara AS b ON ukk.id_bendahara = b.id_bendahara
                                                WHERE ukk.id_siswa = '$id' AND k.nama_kelas = '$kelas'";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td class="col-5">
                                                    <p class="font-bold mb-0"><?= htmlspecialchars($row['nama']); ?></p>
                                                </td>
                                                <td class="col-3"><?= htmlspecialchars($row['tanggal']); ?></td>
                                                <td class="col-2"><?= htmlspecialchars($row['jumlah']); ?></td>
                                                <td class="col-3"><?= htmlspecialchars($row['bendahara']); ?></td>
                                                <?php if ($_SESSION['role'] == 'bendahara') { ?>
                                                    <td class="col-auto d-flex gap-2">
                                                        <a href="delete.php?id=<?= $row['id_transaksi']; ?>"
                                                            class="btn btn-primary">Delete</a>
                                                        <a href="update.php?id=<?= $row['id_transaksi']; ?>"
                                                            class="btn btn-danger">Update</a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script src="../src/js/bundle.js"></script>
</body>

</html>