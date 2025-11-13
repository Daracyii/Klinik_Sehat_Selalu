<?php
include '../config/database.php';

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM rawat_jalan WHERE id=$id");
$data = mysqli_fetch_assoc($result);

// Ambil data untuk dropdown
$pasien = mysqli_query($conn, "SELECT * FROM pasien");
$dokter = mysqli_query($conn, "SELECT * FROM dokter");
$penyakit = mysqli_query($conn, "SELECT * FROM jenis_penyakit");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_pasien = intval($_POST['id_pasien']);
  $id_dokter = intval($_POST['id_dokter']);
  $id_penyakit = intval($_POST['id_penyakit']);
  $tanggal = $_POST['tanggal'];
  $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

  mysqli_query($conn, "UPDATE rawat_jalan SET 
    id_pasien=$id_pasien, 
    id_dokter=$id_dokter, 
    id_penyakit=$id_penyakit, 
    tanggal='$tanggal', 
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
  <title>Edit Rawat Jalan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-warning">✏️ Edit Rawat Jalan</h2>
    <form method="post">

      <!-- Pasien -->
      <div class="mb-3">
        <label>Pasien</label>
        <select name="id_pasien" class="form-control" required>
          <option value="">-- Pilih Pasien --</option>
          <?php while ($p = mysqli_fetch_assoc($pasien)): ?>
            <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['id_pasien'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($p['nama']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- Dokter -->
      <div class="mb-3">
        <label>Dokter</label>
        <select name="id_dokter" class="form-control" required>
          <option value="">-- Pilih Dokter --</option>
          <?php while ($d = mysqli_fetch_assoc($dokter)): ?>
            <option value="<?= $d['id'] ?>" <?= $d['id'] == $data['id_dokter'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($d['nama']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- Penyakit -->
      <div class="mb-3">
        <label>Penyakit</label>
        <select name="id_penyakit" class="form-control" required>
          <option value="">-- Pilih Penyakit --</option>
          <?php while ($py = mysqli_fetch_assoc($penyakit)): ?>
            <option value="<?= $py['id'] ?>" <?= $py['id'] == $data['id_penyakit'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($py['nama_penyakit']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- Tanggal -->
      <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control" required>
      </div>

      <!-- Keterangan -->
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
