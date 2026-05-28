<?php
    session_start();

    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: ../auth/login.php');
        exit;
    }

    // Koneksi ke database
    include '../config/koneksi.php';

    // Header dan navbar
    include '../includes/header.php'; 

    // Dashboard Tabel Mahasiswa
    include 'dashboard.php';

    // Footer
    include '../includes/footer.php';

?>
<!-- Script JavaScript untuk Bootstrap dan Fungsionalitas Tambahan -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>