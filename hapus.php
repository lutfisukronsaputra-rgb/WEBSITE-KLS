<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus komentar berdasarkan id
    $sql = "DELETE FROM komentar WHERE id_komentar = $id";
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, redirect ke tampil.php
        header("Location: tampil.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID komentar tidak ditemukan.";
} 
?>
