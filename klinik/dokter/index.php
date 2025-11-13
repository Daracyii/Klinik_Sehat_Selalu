<?php
include '../config/database.php';
$result = mysqli_query($conn, "SELECT * FROM dokter ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Data Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-primary">👨‍⚕️ Data Dokter</h2>
    <div class="mb-3">
      <a href="tambah.php" class="btn btn-success">+ Tambah Dokter</a>
      <a href="../index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <table class="table table-striped table-bordered">
      <thead class="table-primary">
        <tr><th>ID</th><th>Nama</th><th>Spesialis</th><th>No. Telp</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['spesialis']) ?></td>
            <td><?= htmlspecialchars($row['no_telp']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
