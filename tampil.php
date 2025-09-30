<?php
include 'koneksi.php';

// Ambil semua data komentar
$sql = "SELECT * FROM komentar ORDER BY tanggal DESC";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REKAYASA PRANGKAT LUNAK</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #E0F2FE;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }
    header {
      background: #3B82F6;
      color: #fff;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .logo-title { display: flex; align-items: center; gap: 15px; }
    .logo-title img {
      width: 50px; height: 50px;
      background: #fff; border-radius: 10px;
      padding: 5px;
    }
    nav ul { display: flex; list-style: none; gap: 20px; }
    nav a { color: #fff; text-decoration: none; }
    nav a:hover { text-decoration: underline; }

    main {
      max-width: 1000px;
      margin: 40px auto;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #2563EB;
      margin-bottom: 25px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 25px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
      vertical-align: top;
    }
    th {
      background: #3B82F6;
      color: white;
    }
    tr:nth-child(even) { background: #f9f9f9; }
    tr:hover { background: #e0f2fe; }
    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      color: white;
      font-size: 14px;
    }
    .btn-edit { background: #2563EB; }
    .btn-hapus { background: #DC2626; }
    .btn-home {
      background: #2563EB;
      display: inline-block;
      margin-top: 10px;
    }
    .btn:hover { opacity: 0.9; }
    footer {
      background: #3B82F6;
      color: #fff;
      text-align: center;
      padding: 30px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo-title">
      <img src="ChatGPT_Image_25_Sep_2025__17.48.29-removebg-preview.png" alt="Logo RPL">
      <h1>REKAYASA PRANGKAT LUNAK</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Beranda</a></li>
        <li><a href="profil.html">Profil</a></li>
        <li><a href="galeri.html">Galeri</a></li>
        <li><a href="kontak.html">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main -->
  <main>
    <h2>Daftar Komentar</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Komentar</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
        <?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= nl2br(htmlspecialchars($row['komentar'])); ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id_komentar']; ?>" class="btn btn-edit">Edit</a>
              <a href="hapus.php?id=<?= $row['id_komentar']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin hapus komentar ini?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p style="text-align:center; color: #555;">Belum ada komentar.</p>
    <?php endif; ?>

    <a href="index.html" class="btn btn-home">⬅ Kembali ke Beranda</a>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Kelas 12 Rekayasa Perangkat Lunak | SMK BHAKTI NUSANTARA</p>
  </footer>

</body>
</html>
