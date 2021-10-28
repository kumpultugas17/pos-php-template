<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'wp_penjualan';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal!, " . mysqli_connect_error());
}
