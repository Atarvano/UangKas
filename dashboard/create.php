<?php

session_start();
if (isset($_SESSION['role']) != 'bendahara') {
    header("Location: ../error403.html");
    exit();
}


$id_siswa = $_GET['id'];
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

include '../src/php/conn.php';

$id_siswa = $_GET['id'];

$query = "
    SELECT k.id_kelas 
    FROM siswa s
    JOIN kelas k ON s.kelas = k.id_kelas
    WHERE s.id_siswa = $id_siswa AND k.id_kelas = " . $_SESSION['id_kelas'];

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$is_forbidden = (!$row || $row['id_kelas'] != $_SESSION['id_kelas']);





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
    <?php include '../src/assets/sidebar.php'; ?>
    <div id="app">
        <?php include '../src/assets/createalert.php'; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="c>
                        </div>
                        <div class=" col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        History
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Create
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Multiple Column</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="../src/php/insert.php?id=<?= $id_siswa ?>"
                                            method="POST" data-parsley-validate>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="date-column" class="form-label">Date</label>
                                                        <input type="date" id="date-column" value="<?= date('Y-m-d') ?>"
                                                            class="form-control" placeholder="Select date.."
                                                            name="date-column" required data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dibayar-column" class="form-label">Dibayar</label>
                                                        <input type="number" id="dibayar-column" class="form-control"
                                                            placeholder="Jumlah Dibayar" name="dibayar-column"
                                                            data-parsley-required="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        <a href="index.php">Back</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>


        </div>
    </div>
    <script src="../src/js/bundle.js"></script>
</body>

</html>