<?php
include '../config/database.php';
$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM jenis_penyakit WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_penyakit']);
  $ket = mysqli_real_escape_string($conn, $_POST['keterangan']);
  mysqli_query($conn, "UPDATE jenis_penyakit SET nama_penyakit='$nama', keterangan='$ket' WHERE id=$id");
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Penyakit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="text-warning">✏️ Edit Jenis Penyakit</h2>
    <form method="post">
      <div class="mb-3">
        <label>Nama Penyakit</label>
        <input type="text" name="nama_penyakit" value="<?= htmlspecialchars($data['nama_penyakit']) ?>" class="form-control" required>
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
