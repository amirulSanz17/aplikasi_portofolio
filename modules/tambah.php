<?php
    session_start();
    if (! isset($_SESSION['login']) OR $_SESSION['login'] != true){
        header('location: ../auth/login.php');
        exit;
    }
include '../config/koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM jenis_portofolio");

?>

<!-- Form Tambah Data Mahasiswa -->
<link rel="stylesheet" href="../assets/css/tambah.css">

<h3>Tambah Portofolio</h3>

<form action="simpan.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" maxlength="200" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsi" maxlength="1000" required>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" id="link" name="link" maxlength="500">
    </div>

    <div class="form-group">
        <label for="id_jenis">Jenis</label>
        <select id="id_jenis" name="id_jenis" required>
            <?php while($data = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $data['id']; ?>"><?= $data['nama_jenis']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="bukti">Bukti</label>
        <input type="file" id="bukti" name="bukti" accept="image/*" required>
    </div>

    <input type="submit" value="kirim">
</form>