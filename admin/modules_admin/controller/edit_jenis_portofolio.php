

<?php
    session_start();

    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: login.php');
        exit;
    }
    include '../../../config/koneksi.php';

    $id = $_GET['id'];

    if (empty($id)){
        header("Location: index.php");
    } else {
    // Ambil data jenis portofolio berdasarkan ID untuk ditampilkan pada form edit
    $sql = "SELECT * FROM jenis_portofolio WHERE id='$id' LIMIT 1";
    mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
    
    if( ! mysqli_num_rows($result)){
        header("Location: ../../index.php?page=jenis_portofolio");
    }else {
        $row = mysqli_fetch_assoc($result);}
    }

?>

<!-- Form Ubah Data jenis_portofolio -->
<link rel="stylesheet" href="../../../assets/css/register.css">

<h3>Ubah Data jenis portofolio</h3>

<form action="ubah_jenis_portofolio.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$row['id']; ?>">
    nama jenis: <input type="text" name="nama_jenis" value="<?=$row['nama_jenis']; ?>"><br><br>
    deskripsi : <input type="text" name="deskripsi" value="<?=$row['deskripsi']; ?>"><br><br>
    <input type="submit" value="kirim">
</form>