<?php if (isset($_GET['message']) && $_GET['message'] === 'success'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil',
            confirmButtonText: 'OK',
        });
    </script>
<?php elseif (isset($_GET['message']) && $_GET['message'] === 'error'): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Terjadi kesalahan',
            confirmButtonText: 'Coba Lagi',
        });
    </script>
<?php elseif (isset($_GET['message']) && $_GET['message'] === 'username_exists'): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Username sudah digunakan.',
            confirmButtonText: 'Coba Lagi',
        });
    </script>
<?php endif; ?>