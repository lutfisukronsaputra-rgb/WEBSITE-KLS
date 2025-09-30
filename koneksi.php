<?php
// koneksi.php
$host     = "localhost";
$user     = "root";     // ganti jika user MySQL kamu berbeda
$password = "";         // isi password MySQL kalau ada
$db       = "websitekls";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
