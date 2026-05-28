

<?php
    session_start();

    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: login.php');
        exit;
    }
    include '../config/koneksi.php';

    $id = $_GET['id'];

    if (empty($id)){
        header("Location: index.php");
    } else {
    $sql = "SELECT * FROM portofolio WHERE id='$id' LIMIT 1";
    mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
    
    if( ! mysqli_num_rows($result)){
        header("Location: index.php");
    }else {
        $row = mysqli_fetch_assoc($result);}
    }

?>

<!-- Form Ubah Data portofolio -->
<link rel="stylesheet" href="../assets/css/register.css">

<h3>Ubah Data portofolio</h3>

<form action="ubah.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$row['id']; ?>">
    <input type="hidden" name="bukti_lama" value="<?=$row['bukti']; ?>">
    Bukti saat ini:<br><br>
    <img src="../assets/image/portofolio/<?=$row['bukti']; ?>" width="100"><br><br>
    Jenis :<select name="id_jenis" required>
            <?php
            $sql_jenis = "SELECT * FROM jenis_portofolio";
            $result_jenis = mysqli_query($conn, $sql_jenis);
            while ($row_jenis = mysqli_fetch_assoc($result_jenis)) :
            ?>
                <option value="<?= $row_jenis['id']; ?>" <?= $row['id_jenis'] == $row_jenis['id'] ? 'selected' : ''; ?>>
                    <?= $row_jenis['nama_jenis']; ?>
                </option>
            <?php endwhile; ?>
            </select>
    judul : <input type="text" name="judul" value="<?=$row['judul']; ?>"><br><br>
    deskripsi : <input type="text" name="deskripsi" value="<?=$row['deskripsi']; ?>"><br><br>
    link : <input type="text" name="link" value="<?=$row['link']; ?>"><br><br>
    bukti : <input type="file" name="bukti" accept="image/*"><br><br>
    <input type="submit" value="kirim">
</form>