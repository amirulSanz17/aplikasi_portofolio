<?php
    session_start();
    include '../config/koneksi.php';

    // Pengiriman data login melalui metode POST
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

    $sql = "SELECT * FROM pengguna WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id_pengguna'] = $row['id'];
            $_SESSION['foto'] = !empty($row['foto']) ? $row['foto'] : null;
            header('Location: ../index.php');
            exit;
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
    }
}

?>

<!-- Form Login -->
<link rel="stylesheet" href="../assets/css/login.css">

<h3>Login</h3>

<form action="" method="post" >
    username : <input type="text" name="username" required><br><br>
    password : <input type="password" name="password" required><br><br>
    <a href="register.php" class="button-register">register</a><br><br>
    <input type="submit" value="login">
</form>