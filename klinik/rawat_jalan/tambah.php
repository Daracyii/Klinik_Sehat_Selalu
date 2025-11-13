<?php
include '../config/database.php';

$pasien = mysqli_query($conn, "SELECT * FROM pasien");
$dokter = mysqli_query($conn, "SELECT * FROM dokter");
$penyakit = mysqli_query($conn, "SELECT * FROM jenis_penyakit");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_pasien = $_POST['id_pasien'];
  $id_dokter = $_POST['id_dokter'];
  $id_penyakit = $_POST['id_penyakit'];
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];

  mysqli_query($conn, "INSERT INTO rawat_jalan (id_pasien,id_dokter,id_penyakit,tanggal,keterangan) VALUES ('$id_pasien','$id_dokter','$id_penyakit','$tanggal','$keterangan')");
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Rawat Jalan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-success">+ Tambah Rawat Jalan</h2>
    <form method="post">
      <div class="mb-3">
        <label>Pasien</label>
        <select name="id_pasien" class="form-select" required>
          <option value="">-- Pilih Pasien --</option>
          <?php while($p = mysqli_fetch_assoc($pasien)): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="mb-3">
        <label>Dokter</label>
        <select name="id_dokter" class="form-select" required>
          <option value="">-- Pilih Dokter --</option>
          <?php while($d = mysqli_fetch_assoc($dokter)): ?>
            <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nama']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="mb-3">
        <label>Penyakit</label>
        <select name="id_penyakit" class="form-select" required>
          <option value="">-- Pilih Penyakit --</option>
          <?php while($j = mysqli_fetch_assoc($penyakit)): ?>
            <option value="<?= $j['id'] ?>"><?= htmlspecialchars($j['nama_penyakit']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
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
