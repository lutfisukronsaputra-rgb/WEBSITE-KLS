<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: tampil.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data komentar
$sql = "SELECT * FROM komentar WHERE id_komentar = $id";
$result = mysqli_query($koneksi, $sql);
if (!$row = mysqli_fetch_assoc($result)) {
    echo "Komentar tidak ditemukan.";
    exit;
}

// Proses update
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

    $update_sql = "UPDATE komentar SET nama='$nama', email='$email', komentar='$komentar' WHERE id_komentar=$id";
    if (mysqli_query($koneksi, $update_sql)) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Komentar</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #E0F2FE, #BAE6FD);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background: #fff;
      padding: 35px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 500px;
      transition: transform 0.3s;
    }

    .form-container:hover {
      transform: translateY(-5px);
    }

    h2 {
      text-align: center;
      color: #1E40AF;
      margin-bottom: 30px;
      font-size: 26px;
      font-weight: 600;
    }

    input, textarea {
      width: 100%;
      padding: 14px 12px;
      margin-bottom: 20px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 15px;
      transition: 0.3s;
    }

    input:focus, textarea:focus {
      outline: none;
      border-color: #3B82F6;
      box-shadow: 0 0 10px rgba(59,130,246,0.3);
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 10px;
      background: #3B82F6;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 5px 15px rgba(59,130,246,0.3);
    }

    button:hover {
      background: #2563EB;
      transform: scale(1.03);
      box-shadow: 0 8px 20px rgba(59,130,246,0.4);
    }

    @media (max-width: 600px) {
      .form-container {
        padding: 25px 20px;
        border-radius: 12px;
      }

      h2 {
        font-size: 22px;
      }

      button {
        font-size: 15px;
      }
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Edit Komentar</h2>
    <form method="post">
      <input type="text" name="nama" placeholder="Nama Anda" value="<?= htmlspecialchars($row['nama']); ?>" required>
      <input type="email" name="email" placeholder="Email Anda" value="<?= htmlspecialchars($row['email']); ?>" required>
      <textarea name="komentar" placeholder="Tulis komentar..." required><?= htmlspecialchars($row['komentar']); ?></textarea>
      <button type="submit" name="update">Update Komentar</button>
    </form>
  </div>

</body>
</html>
