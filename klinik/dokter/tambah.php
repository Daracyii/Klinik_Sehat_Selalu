<?php
include '../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $spesialis = mysqli_real_escape_string($conn, $_POST['spesialis']);
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);

    $sql = "INSERT INTO dokter (nama, spesialis, no_telp) VALUES ('$nama', '$spesialis', '$no_telp')";
    mysqli_query($conn, $sql);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Dokter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-success">+ Tambah Dokter</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Spesialis</label>
        <input type="text" name="spesialis" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>No. Telp</label>
        <input type="text" name="no_telp" class="form-control">
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
