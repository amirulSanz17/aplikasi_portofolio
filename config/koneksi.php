<?php

// Koneksi Database MySQL dengan PHP menggunakan MySQLi
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sistem_portofolio';

$conn = new mysqli($host, $username, $password, $dbname);

if( ! $conn ){
    die("Koneksi Gagal: " . mysqli_connect_error());
}
//echo "koneksi berhasil";

?>