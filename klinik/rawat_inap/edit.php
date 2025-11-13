<?php
include '../config/database.php';
$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM rawat_inap WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_pasien = mysqli_real_escape_string($conn, $_POST['nama_pasien']);
  $nama_dokter = mysqli_real_escape_string($conn, $_POST['nama_dokter']);
  $penyakit = mysqli_real_escape_string($conn, $_POST['penyakit']);
  $kamar = mysqli_real_escape_string($conn, $_POST['kamar']);
  $tanggal_masuk = $_POST['tanggal_masuk'];
  $tanggal_keluar = $_POST['tanggal_keluar'];
  $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

  mysqli_query($conn, "UPDATE rawat_inap SET 
    nama_pasien='$nama_pasien',
    nama_dokter='$nama_dokter',
    penyakit='$penyakit',
    kamar='$kamar',
    tanggal_masuk='$tanggal_masuk',
    tanggal_keluar='$tanggal_keluar',
    keterangan='$keterangan'
    WHERE id=$id");

  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Rawat Inap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-warning">✏️ Edit Rawat Inap</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" value="<?= htmlspecialchars($data['nama_pasien']) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Dokter</label>
        <input type="text" name="nama_dokter" value="<?= htmlspecialchars($data['nama_dokter']) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Penyakit</label>
        <input type="text" name="penyakit" value="<?= htmlspecialchars($data['penyakit']) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Kamar</label>
        <input type="text" name="kamar" value="<?= htmlspecialchars($data['kamar']) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" value="<?= $data['tanggal_keluar'] ?>" class="form-control">
      </div>
      <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"><?= htmlspecialchars($data['keterangan']) ?></textarea>
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
