<?php
include '../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $umur = intval($_POST['umur']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);

  mysqli_query($conn, "INSERT INTO pasien (nama, umur, alamat, no_telp) VALUES ('$nama', $umur, '$alamat', '$no_telp')");
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Pasien</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-success">+ Tambah Pasien</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Umur</label>
        <input type="number" name="umur" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label>No. Telepon</label>
        <input type="text" name="no_telp" class="form-control">
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
