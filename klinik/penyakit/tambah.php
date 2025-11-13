<?php
include '../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_penyakit']);
  $ket = mysqli_real_escape_string($conn, $_POST['keterangan']);
  mysqli_query($conn, "INSERT INTO jenis_penyakit (nama_penyakit, keterangan) VALUES ('$nama', '$ket')");
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Penyakit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-success">+ Tambah Jenis Penyakit</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama Penyakit</label>
        <input type="text" name="nama_penyakit" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
