<?php
session_start();
require_once 'config/koneksi.php';

// Pengecekan Apakaah Pengguna Sudah Login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: auth/login.php');
    exit;
}

// Pemilihan Tampilan Setelah Login Berdasarkan Role Pengguna
if ($_SESSION['role'] === 'admin') {
    header('Location: admin/index.php');
} else {
    header('Location: modules/index.php');
}
exit;
?>