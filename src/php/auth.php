<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
include 'conn.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];
$errorMessage = 'Username atau password salah';

$sql = "
    (SELECT 'guru' AS role, id_guru AS id_user, g.nama, g.username, g.password, g.id_kelas, k.nama_kelas
     FROM guru g
     INNER JOIN kelas k ON k.id_kelas = g.id_kelas
     WHERE g.username = ?)
    UNION
    (SELECT 'siswa', id_siswa, s.nama, s.username, s.password, s.kelas, k.nama_kelas
     FROM siswa s
     INNER JOIN kelas k ON k.id_kelas = s.kelas
     WHERE s.username = ?)
    UNION
    (SELECT 'bendahara', id_bendahara, b.nama, b.username, b.password, b.id_kelas, k.nama_kelas
     FROM bendahara b
     INNER JOIN kelas k ON k.id_kelas = b.id_kelas
     WHERE b.username = ?)
     UNION
     (SELECT 'admin', id_admin, NULL AS nama, a.username, a.password, NULL AS id_kelas, NULL AS nama_kelas
     FROM admin a
     WHERE a.username = ?)
    LIMIT 1
";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $username, $username, $username, $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if ($password === $row['password']) {
        $_SESSION = [
            'role' => $row['role'],

            'id_user' => $row['id_user'],
            'nama' => $row['nama'],
            'id_kelas' => $row['id_kelas'],
            'nama_kelas' => $row['nama_kelas']
        ];
        if ($row['role'] === 'siswa') {
            header("Location: ../../dashboard/history.php");
        } elseif ($row['role'] === 'admin') {
            header("location: ../../dashboard/admin.php");
        } else {
            header("Location: ../../dashboard/index.php");
        }
        exit;
    }
}

header("Location: ../../login.php?pesan=gagal");
exit;
?>