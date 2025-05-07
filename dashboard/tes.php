<?php
session_start();
include '../src/php/conn.php';

// Cek role bendahara
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'bendahara') {
    header('Location: ../error403.html');
    exit;
}

// Ambil id_siswa

$id_siswa = $_GET['id'];

// Cek apakah siswa di kelas bendahara
$result = mysqli_query(
    $conn,
    "SELECT k.id_kelas FROM siswa s
     JOIN kelas k ON s.kelas = k.id_kelas
     WHERE s.id_siswa = $id_siswa"
);
$row = mysqli_fetch_assoc($result);
$is_forbidden = (!$row || $row['id_kelas'] != $_SESSION['id_kelas']);

// Proses simpan
$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $jumlah = (float) $_POST['jumlah'];
    $id_bdh = (int) $_SESSION['id_user'];

    if (
        mysqli_query(
            $conn,
            "INSERT INTO uang_kas_kelas (id_siswa,tanggal,jumlah,id_bendahara) \
         VALUES ($id_siswa,'$tanggal',$jumlah,$id_bdh)"
        )
    ) {
        $alert = "success";
    } else {
        $alert = "error";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php if ($is_forbidden): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Ditolak',
                text: 'Anda tidak berhak mengakses siswa ini!'
            }).then(() => {
                window.location.href = 'history.php';
            });
        </script>
    <?php else: ?>
        <h2>Tambah Transaksi Kas</h2>
        <form method="POST">
            <p>
                <label>Tanggal:<br>
                    <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                </label>
            </p>
            <p>
                <label>Jumlah (Rp):<br>
                    <input type="number" name="jumlah" step="1000" required>
                </label>
            </p>
            <p>
                <button type="submit">Simpan</button>
                <a href="history.php?id=<?= $id_siswa ?>">Batal</a>
            </p>
        </form>

        <?php if ($alert === 'success'): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan!'
                }).then(() => {
                    window.location.href = "history.php?id=<?= $id_siswa ?>";
                });
            </script>
        <?php elseif ($alert === 'error'): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Data gagal disimpan.'
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>