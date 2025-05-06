<?php if ($is_forbidden): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak',
            text: 'Anda tidak berhak mengakses siswa ini!'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>
<?php endif; ?>