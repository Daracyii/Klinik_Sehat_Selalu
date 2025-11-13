<?php
include '../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_pasien = mysqli_real_escape_string($conn, $_POST['nama_pasien']);
  $nama_dokter = mysqli_real_escape_string($conn, $_POST['nama_dokter']);
  $penyakit = mysqli_real_escape_string($conn, $_POST['penyakit']);
  $kamar = mysqli_real_escape_string($conn, $_POST['kamar']);
  $tanggal_masuk = $_POST['tanggal_masuk'];
  $tanggal_keluar = $_POST['tanggal_keluar'];
  $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

  mysqli_query($conn, "INSERT INTO rawat_inap (nama_pasien, nama_dokter, penyakit, kamar, tanggal_masuk, tanggal_keluar, keterangan)
  VALUES ('$nama_pasien', '$nama_dokter', '$penyakit', '$kamar', '$tanggal_masuk', '$tanggal_keluar', '$keterangan')");
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Rawat Inap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-primary">+ Tambah Rawat Inap</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Dokter</label>
        <input type="text" name="nama_dokter" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Penyakit</label>
        <input type="text" name="penyakit" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Kamar</label>
        <input type="text" name="kamar" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" class="form-control">
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
