<?php
include '../config/database.php';
$result = mysqli_query($conn, "SELECT * FROM rawat_inap ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Data Rawat Inap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-primary">🛏️ Data Rawat Inap</h2>
    <div class="mb-3">
      <a href="tambah.php" class="btn btn-primary">+ Tambah Data</a>
      <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Penyakit</th>
          <th>Kamar</th>
          <th>Tgl Masuk</th>
          <th>Tgl Keluar</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nama_pasien']) ?></td>
          <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
          <td><?= htmlspecialchars($row['penyakit']) ?></td>
          <td><?= htmlspecialchars($row['kamar']) ?></td>
          <td><?= htmlspecialchars($row['tanggal_masuk']) ?></td>
          <td><?= htmlspecialchars($row['tanggal_keluar']) ?></td>
          <td><?= htmlspecialchars($row['keterangan']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
