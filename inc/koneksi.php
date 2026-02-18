<?php
// Database configuration - menggunakan environment variables untuk keamanan
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$dbname = getenv('DB_NAME') ?: 'sipangkat';

$koneksi = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>

<!-- end -->