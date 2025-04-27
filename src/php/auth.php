<?php
session_start();
include 'conn.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];


$sql = "
    (SELECT 'guru' AS role, id_guru AS id_user, g.nama, g.username, g.password, k.id_kelas, k.nama_kelas
     FROM guru g
     LEFT JOIN kelas k ON k.wali_kelas = g.id_guru
     WHERE g.username = ?)
    UNION
    (SELECT 'siswa', id_siswa, s.nama, s.username, s.password, s.kelas, k.nama_kelas
     FROM siswa s
     LEFT JOIN kelas k ON k.id_kelas = s.kelas
     WHERE s.username = ?)
    UNION
    (SELECT 'bendahara', id_bendahara, b.nama, b.username, b.password, b.id_kelas, k.nama_kelas
     FROM bendahara b
     LEFT JOIN kelas k ON k.id_kelas = b.id_kelas
     WHERE b.username = ?)
    LIMIT 1
";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $username, $username, $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if ($password === $row['password']) {
        // Set session
        $_SESSION = [
            'role' => $row['role'],
            'id_user' => $row['id_user'],
            'nama' => $row['nama'],
            'id_kelas' => $row['id_kelas'],
            'nama_kelas' => $row['nama_kelas']
        ];
        echo "<p style='color:green;'>Login berhasil!</p>";
        echo "<p>Selamat datang, " . htmlspecialchars($row['nama']) . "!</p>";

        echo "role: " . htmlspecialchars($row['role']) . "<br>";

        echo "id_kelas: " . htmlspecialchars($row['id_kelas']) . "<br>";
        echo "nama_kelas: " . htmlspecialchars($row['nama_kelas']) . "<br>";
        exit();
    }
}

// Jika gagal login
echo "<p style='color:red;'>Login gagal: username/password tidak cocok.</p>";
echo "<p><a href='login.html'>&laquo; Kembali ke Login</a></p>";
?>