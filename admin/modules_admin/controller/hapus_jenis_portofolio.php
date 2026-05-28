<?php

include '../../../config/koneksi.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if($id <= 0){
        header("Location: ../../../index.php?page=jenis_portofolio");
        exit();
    }

    // Hapus data jenis portofolio berdasarkan ID
    $sql = "DELETE FROM jenis_portofolio WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Menghapus jenis portofolio: " . mysqli_error($conn));
    } else {
        header("Location: ../../index.php?page=jenis_portofolio");
    }


?>