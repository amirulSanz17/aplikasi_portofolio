

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

    // Ambil data pengguna berdasarkan ID untuk ditampilkan pada form edit
    $sql = "SELECT * FROM pengguna WHERE id='$id' LIMIT 1";
    mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);
    
    if( ! mysqli_num_rows($result)){
        header("Location: ../../index.php?page=pengguna");
    }else {
        $row = mysqli_fetch_assoc($result);}
    }

?>

<!-- Form Ubah Data penguna -->
<link rel="stylesheet" href="../../../assets/css/register.css">

<h3>Ubah Role Pengguna</h3>

<form action="ubah_pengguna.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$row['id']; ?>">
    Username: <input type="text" name="username" value="<?=$row['username']; ?>" readonly><br><br>
    Role : <select name="role" required>
        <option value="admin" <?= ($row['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
        <option value="user" <?= ($row['role'] == 'user') ? 'selected' : '' ?>>User</option>
    </select><br><br>
    <input type="submit" value="kirim">
</form>