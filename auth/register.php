
<?php

    session_start();

    include '../config/koneksi.php';
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $role = "user";

    $sql = "SELECT password FROM pengguna WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)) {
        echo "Username sudah pernah digunakan";
    } else {
        if ($password == $password_confirm) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $nama_file = $_FILES['foto']['name'];
            $ukuran_file = $_FILES['foto']['size'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $eror = $_FILES['foto']['error'];

        // Validasi 1 apakah file ada apa tidak
        if ($eror === 4){
            echo"<script>alert('Pilih foto terlebih dahulu'); window.location.href='tambah.php';</script>";
            exit();
        }

        //validasi 2 = cek ekstensi file
        $ekstensi_valid = ['jpg', 'jpeg', 'png'];
        $ekstensi_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        if (! in_array($ekstensi_file, $ekstensi_valid)){
            die("Ekstensi file tidak valid");
        }

        // Validasi 3 = cek ukuran file
        if ($ukuran_file > 10000000){
            die("Ukuran file terlalu besar");
        }

        $nama_file_baru = 'foto_' . uniqid() . '.' . $ekstensi_file;
        $tujuan = '../assets/image/users/' . $nama_file_baru;

        if (move_uploaded_file($tmp_name, $tujuan)) {
            $sql = "INSERT INTO pengguna (username, password, role, foto) 
            VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Bind parameter : s = string
            mysqli_stmt_bind_param($stmt, "ssss", $username, $password_hash, $role, $nama_file_baru);

            if(! mysqli_stmt_execute($stmt)){
                echo("gagal menambah data. Eror: " . mysqli_stmt_error($stmt));
                die();
            }
            header("Location: ../index.php");
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
            } else {
                echo "Konfirmasi password tidak cocok";
            }
        }
    }
?>

<!-- Form Register -->
<link rel="stylesheet" href="../assets/css/register.css">

<h3>Register</h3>

<form action="" method="post" enctype="multipart/form-data">    username : <input type="text" name="username" required><br><br>
    password : <input type="password" name="password"required><br><br>
    Konfirmasi password : <input type="password" name="password_confirm" required><br><br>
    Foto Profil: <input type="file" name="foto" accept="image/*" required><br><br>
    <input type="submit" value="register">
</form>