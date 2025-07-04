<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../error403.html");
    exit();
}

$role = $_SESSION['role'];

if ($role !== 'admin') {
    header("Location: ../error403.html");
    exit();
}
$currentPage = basename($_SERVER['PHP_SELF']);
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
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>

        <div class="card mt-4">
            <div class="card-body py-4 px-4 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3">
                    <div class="ms-3 name">
                        <h5 class="font-bold">Admin</h5>
                        <h6 class="text-muted mb-0"><?= htmlspecialchars($role); ?></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-17">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Users</h4>
                            <a href="create.php" class="btn btn-success">Create</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../src/php/conn.php';

                                        $sql = " call getusers()
                                        ";

                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)):
                                            ?>
                                            <tr>
                                                <td class="col-2"><?= htmlspecialchars($row['nama']); ?></td>
                                                <td class="col-auto"><?= htmlspecialchars($row['role']); ?></td>
                                                <td class="col-2"><?= htmlspecialchars($row['username']); ?></td>
                                                <td class="col-2"><?= htmlspecialchars($row['password']); ?></td>
                                                <td class="col-2"><?= htmlspecialchars($row['kelas']); ?></td>
                                                <td class="col-auto d-flex gap-2">
                                                    <a href="update.php?role=<?= $row['role']; ?>&id=<?= $row['id']; ?>"
                                                        class="btn btn-warning">Update</a>
                                                    <a href="../src/php/deleteusers.php?role=<?= $row['role']; ?>&id=<?= $row['id']; ?>"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include '../src/assets/footer.php'; ?>
    </div>

    </div>

    <script src="../src/js/bundle.js"></script>
    <?php include '../src/assets/success.php'; ?>
</body>

</html>