<?php
    session_start();

    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: ../auth/login.php');
        exit;
    }

    include '../config/koneksi.php';
?>

<!-- Halaman Utama Setelah Login Untuk Tampilan Role Admin -->
<!-- Tampilan Menggunakan Template Bootstrap -->
<!DOCTYPE html>
<html lang="en">
<!-- Bagian Header -->
<?php include 'includes/header.php'?>
    <body class="sb-nav-fixed">
        <!-- Bagian Navbar -->
        <?php include 'includes/navbar.php'?>
        <div id="layoutSidenav">
            <!-- Bagian Sidebar -->
            <?php include 'includes/sidebar.php'?>
            <div id="layoutSidenav_content">
            <main>
                <?php
                // Pengecekan Parameter 'page' untuk Menentukan Halaman yang Akan Ditampilkan
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    switch($page){
                        case 'pengguna':
                            include 'modules_admin/pages/pengguna.php';
                            break;
                        case 'jenis_portofolio':
                            include 'modules_admin/pages/jenis_portofolio.php';
                            break;
                        case 'dashboard_admin':
                            include 'modules_admin/pages/dashboard_admin.php';
                            break;
                    }
                } else {
                    // default halaman awal
                    include 'modules_admin/pages/dashboard_admin.php';
                }
                ?>
            </main>
            <!-- Bagian Footer -->
                <?php include 'includes/footer.php' ?>
            </div>
        </div>

        <!-- Script JavaScript untuk Bootstrap dan Fungsionalitas Tambahan -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
