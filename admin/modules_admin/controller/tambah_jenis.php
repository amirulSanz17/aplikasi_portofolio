<?php
    session_start();
    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: ../auth/login.php');
        exit;
    }
include '../../../config/koneksi.php';
// Ambil data jenis portofolio untuk ditampilkan pada pilihan jenis
$query = mysqli_query($conn, "SELECT * FROM jenis_portofolio");

?>

<!-- Form Tambah Data Mahasiswa -->
<link rel="stylesheet" href="../../../assets/css/register.css">

<h3>Tambah Jenis Portofolio</h3>

<form action="simpan_jenis.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama_jenis">Nama Jenis</label>
        <input type="text" id="nama_jenis" name="nama_jenis" maxlength="200" required>
    </div>

    <div class="form-group">
        <label for="deskripsi_jenis">Deskripsi</label>
        <input type="text" id="deskripsi_jenis" name="deskripsi_jenis" maxlength="1000" required>
    </div>

    <input type="submit" value="kirim">
</form>