<?php

include '../config/koneksi.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if($id <= 0){
        header("Location: ../index.php?dashboard");
        exit();
    }

    $sql = "DELETE FROM portofolio WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(! $result){
        die("Gagal Menghapus Data: " . mysqli_error($conn));
    } else {
        header("Location: ../index.php?dashboard&success=Data berhasil dihapus");
    }


?>