<?php

    session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
        header("Location: ../auth/login.php");
        exit;
    }
    include '../config/koneksi.php';

    $id_pengguna = $_SESSION['id_pengguna'];
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $id_jenis = $_POST['id_jenis'] ?? '';
    $bukti_lama = $_POST['bukti_lama'];

    $bukti = $bukti_lama;

    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] !== 4) {
        $file = $_FILES['bukti'];
        $nama_file = time() . '_' . basename($file['name']);
        $tujuan = '../assets/image/portofolio/' . $nama_file;

        if (move_uploaded_file($file['tmp_name'], $tujuan)) {
            if (!empty($bukti_lama) && file_exists('../assets/image/portofolio/' . $bukti_lama)) {
                unlink('../assets/image/portofolio/' . $bukti_lama);
            }
            $bukti = $nama_file;
        } else {
            die("Upload bukti gagal");
        }
    }

    $sql = "UPDATE portofolio SET id_jenis='$id_jenis', judul='$judul', deskripsi='$deskripsi', link='$link', bukti='$bukti' WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Mengubah data: ");
    } else {
        header("Location: index.php");
    }
?>