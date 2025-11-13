<?php
include '../config/database.php';
$result = mysqli_query($conn, "SELECT * FROM jenis_penyakit ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Data Jenis Penyakit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-warning">🦠 Jenis Penyakit</h2>
    <div class="mb-3">
      <a href="tambah.php" class="btn btn-success">+ Tambah Penyakit</a>
      <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-warning">
        <tr>
          <th>ID</th>
          <th>Nama Penyakit</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nama_penyakit']) ?></td>
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
