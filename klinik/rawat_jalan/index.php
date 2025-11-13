<?php
include '../config/database.php';
$query = "
  SELECT rj.*, p.nama AS pasien, d.nama AS dokter, jp.nama_penyakit AS penyakit 
  FROM rawat_jalan rj
  LEFT JOIN pasien p ON rj.id_pasien = p.id
  LEFT JOIN dokter d ON rj.id_dokter = d.id
  LEFT JOIN jenis_penyakit jp ON rj.id_penyakit = jp.id
  ORDER BY rj.id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Data Rawat Jalan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-success">🚶 Data Rawat Jalan</h2>
    <div class="mb-3">
      <a href="tambah.php" class="btn btn-success">+ Tambah Data</a>
      <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th>ID</th>
          <th>Pasien</th>
          <th>Dokter</th>
          <th>Penyakit</th>
          <th>Tanggal</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['pasien']) ?></td>
          <td><?= htmlspecialchars($row['dokter']) ?></td>
          <td><?= htmlspecialchars($row['penyakit']) ?></td>
          <td><?= $row['tanggal'] ?></td>
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
