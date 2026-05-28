<?php

    session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
        header("Location: ../auth/login.php");
        exit;
    }
    include '../../../config/koneksi.php';
    // Ambil data dari form edit pengguna
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    // Menggantikan data pengguna berdasarkan ID
    $sql = "UPDATE pengguna SET role='$role' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Mengubah data pengguna: ");
    } else {
        header("Location: ../../index.php?page=pengguna");
    }
?>