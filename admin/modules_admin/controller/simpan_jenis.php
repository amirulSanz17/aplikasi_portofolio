<?php

    session_start();
    include '../../../config/koneksi.php';

    
    // Ambil data dari form
    $nama_jenis = $_POST['nama_jenis'];
    $deskripsi = $_POST['deskripsi_jenis'];

    // Validasi input
    if (
        empty($nama_jenis) ||
        empty($deskripsi) ||
        mb_strlen($nama_jenis) > 200 ||
        mb_strlen($deskripsi) > 1000
    ) {
        header('Location: tambah_jenis_portofolio.php?error=Data tidak valid');
        exit();
    }
    // Masukkan data ke tabel jenis_portofolio
        $sql = "INSERT INTO jenis_portofolio 
            (nama_jenis, deskripsi_jenis) 
            VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $nama_jenis,
            $deskripsi
        );
        if (!mysqli_stmt_execute($stmt)) {
            echo "Gagal menambah data: " . mysqli_stmt_error($stmt);
            die();
        }
        // Redirect setelah berhasil menyimpan data
        header("Location: ../../index.php?page=jenis_portofolio");
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
?>