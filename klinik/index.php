<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏥 Klinik Sehat Selalu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #ffffff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: "Poppins", sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .icon {
      font-size: 45px;
    }

    h1 {
      font-weight: 700;
      color: #0d6efd;
    }

    footer {
      text-align: center;
      font-size: 0.9rem;
      color: #777;
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container text-center">
    <h1 class="mb-4">🏥 Klinik Sehat Selalu</h1>
    <p class="text-muted mb-5">Sistem Manajemen Klinik & Rumah Sakit Sederhana</p>

    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <a href="dokter/index.php" class="text-decoration-none text-dark">
          <div class="card p-4">
            <div class="icon text-primary mb-2">👨‍⚕️</div>
            <h4>Data Dokter</h4>
            <p class="text-muted small">Lihat dan kelola data seluruh dokter.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="pasien/index.php" class="text-decoration-none text-dark">
          <div class="card p-4">
            <div class="icon text-success mb-2">🧍</div>
            <h4>Data Pasien</h4>
            <p class="text-muted small">Kelola data pasien yang terdaftar di klinik.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="penyakit/index.php" class="text-decoration-none text-dark">
          <div class="card p-4">
            <div class="icon text-warning mb-2">🦠</div>
            <h4>Jenis Penyakit</h4>
            <p class="text-muted small">Daftar penyakit yang umum ditangani.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="rawat_jalan/index.php" class="text-decoration-none text-dark">
          <div class="card p-4">
            <div class="icon text-info mb-2">🚶</div>
            <h4>Rawat Jalan</h4>
            <p class="text-muted small">Data pasien yang menjalani perawatan jalan.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="rawat_inap/index.php" class="text-decoration-none text-dark">
          <div class="card p-4">
            <div class="icon text-danger mb-2">🛏️</div>
            <h4>Rawat Inap</h4>
            <p class="text-muted small">Data pasien yang sedang dirawat inap.</p>
          </div>
        </a>
      </div>
    </div>

    <footer>
      <p class="mt-5">💙 Dibuat dengan semangat oleh <strong>Marmut</strong> untuk tugas PPLG</p>
    </footer>
  </div>
</body>
</html>
