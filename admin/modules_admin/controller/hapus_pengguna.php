<?php

include '../../../config/koneksi.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if($id <= 0){
        header("Location: ../../index.php?page=pengguna");
        exit();
    }

    // Hapus data pengguna berdasarkan ID
    $sql = "DELETE FROM pengguna WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Menghapus User: " . mysqli_error($conn));
    } else {
        header("Location: ../../index.php?page=pengguna&success=User berhasil dihapus");
    }


?>