<?php
session_start();
include 'conn.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];


$sql = "
    (SELECT 'guru' AS role, id_guru AS id_user, g.nama, g.username, g.password, k.id_kelas, k.nama_kelas
     FROM guru g
     INNER JOIN kelas k ON k.wali_kelas = g.id_guru
     WHERE g.username = ?)
    UNION
    (SELECT 'siswa', id_siswa, s.nama, s.username, s.password, s.kelas, k.nama_kelas
     FROM siswa s
     INNER JOIN kelas k ON k.id_kelas =  s.kelas
     WHERE s.username = ?)
    UNION
    (SELECT 'bendahara', id_bendahara, b.nama, b.username, b.password, b.id_kelas, k.nama_kelas
     FROM bendahara b
     INNER JOIN kelas k ON k.id_kelas = b.id_kelas
     WHERE b.username = ?)
    LIMIT 1
";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $username, $username, $username);
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

        if ($row['role'] == 'siswa') {
            header("Location: ../../dashboard/history.php");
        } else {
            header("Location: ../../dashboard/index.php");
        }
    }
} else {
    echo "<script>alert('Username atau Password salah!');</script>";
    header("Location: ../../login.html");
}

?>