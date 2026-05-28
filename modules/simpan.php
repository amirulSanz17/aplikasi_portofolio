<?php

    session_start();
    include '../config/koneksi.php';

    
    // Ambil data dari form
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $id_jenis = $_POST['id_jenis'];

    // Validasi input
    if (
        empty($judul) ||
        empty($id_jenis) ||
        mb_strlen($judul) > 200 ||
        mb_strlen($deskripsi) > 1000 ||
        mb_strlen($link) > 500
    ) {
        header('Location: tambah.php?error=Data tidak valid');
        exit();
    }

    // Upload file
    $nama_file = $_FILES['bukti']['name'];
    $ukuran_file = $_FILES['bukti']['size'];
    $tmp_name = $_FILES['bukti']['tmp_name'];
    $error = $_FILES['bukti']['error'];

    // Validasi 1 = cek apakah file dipilih
    if ($error === 4) {
        echo "<script>
                alert('Pilih bukti terlebih dahulu');
                window.location.href='tambah.php';
            </script>";
        exit();
    }

    // Validasi 2 = cek ekstensi file
    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    if (!in_array($ekstensi_file, $ekstensi_valid)) {
        die("Ekstensi file tidak valid");
    }

    // Validasi 3 = cek ukuran file
    if ($ukuran_file > 10000000) {
        die("Ukuran file terlalu besar");
    }

    // Rename file agar unik
    $nama_file_baru = 'bukti_' . uniqid() . '.' . $ekstensi_file;

    // Folder tujuan upload
    $tujuan = '../assets/image/portofolio/' . $nama_file_baru;

    // Pindahkan file
    if (move_uploaded_file($tmp_name, $tujuan)) {
    $id_pengguna = $_SESSION['id_pengguna'];
        // Simpan ke database
        $sql = "INSERT INTO portofolio 
            ( id_pengguna,id_jenis, judul, deskripsi, link, bukti) 
            VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        // i = integer, s = string
        mysqli_stmt_bind_param(
            $stmt,
            "iissss",
            $id_pengguna,
            $id_jenis,
            $judul,
            $deskripsi,
            $link,
            $nama_file_baru
        );

        if (!mysqli_stmt_execute($stmt)) {
            echo "Gagal menambah data. Error: " . mysqli_stmt_error($stmt);
            die();
        }

        header("Location: index.php");

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);

?>