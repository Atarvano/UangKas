<?php if (isset($_GET['message']) && $_GET['message'] === 'success'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Ditambahkan!',
            confirmButtonText: 'OK',
        });
    </script>
<?php endif; ?>