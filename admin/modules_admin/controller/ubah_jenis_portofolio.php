<?php

    session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
        header("Location: ../auth/login.php");
        exit;
    }
    include '../../../config/koneksi.php';
    // Ambil data dari form edit jenis portofolio
    $id = $_POST['id'];
    $nama_jenis = $_POST['nama_jenis'];
    $deskripsi = $_POST['deskripsi_jenis'];

    // Menggantikan data jenis portofolio berdasarkan ID
    $sql = "UPDATE jenis_portofolio SET nama_jenis='$nama_jenis', deskripsi_jenis='$deskripsi' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Mengubah data jenis portofolio: ");
    } else {
        header("Location: ../../index.php?page=jenis_portofolio");
    }
?>