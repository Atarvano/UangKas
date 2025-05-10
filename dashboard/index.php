<?php
session_start();

$role = $_SESSION['role'];

if (!isset($role)) {
  header("Location: ../error403.html");
  exit();
}

if ($role == 'siswa' || $role == 'admin') {
  header("Location: ../error403.html");
  exit();
}

$nama = $_SESSION['nama'];
$kelas = $_SESSION['nama_kelas'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <link rel="shortcut icon" href="../src/img/icon.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <h3>Class Statistics</h3>
      <div>

      </div>
    </div>
    <div class="card mt-4">
      <div class="card-body py-4 px-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center mb-3">
          <div class="avatar avatar-xl">
            <img src="../src/img/yoonaa.jpeg" alt="Face 1 " class="img-fluid" />
          </div>
          <div class="ms-3 name">
            <h5 class="font-bold"><?= $nama ?> </h5>
            <h6 class="text-muted mb-0"><?= $role ?></h6>
          </div>
        </div>

      </div>
    </div>
    <div class="page-content">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><?= $kelas ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-lg">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../src/php/conn.php';
                    $sql = "SELECT * FROM siswa WHERE kelas = (SELECT id_kelas FROM kelas WHERE nama_kelas = '$kelas')";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td class="col-5">
                          <p class="font-bold mb-0"><?= $row['nama'] ?></p>
                        </td>
                        <td class="col-3">
                          <p class="mb-0">
                            <a href="history.php?id=<?= $row['id_siswa'] ?>" class="btn btn-primary">History</a>
                          </p>
                        </td>

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


  <?php include '../src/assets/success.php'; ?>
  <script src="../src/js/bundle.js"></script>
</body>

</html>