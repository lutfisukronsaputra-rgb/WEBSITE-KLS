<?php
// proses_komentar.php
include 'koneksi.php';

// Pastikan form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

    // Query insert ke tabel komentar
    $sql = "INSERT INTO komentar (nama, email, komentar, tanggal) 
            VALUES ('$nama', '$email', '$komentar', NOW())";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Komentar berhasil dikirim!'); window.location.href='tampil.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Akses tidak valid.";
}
?>
