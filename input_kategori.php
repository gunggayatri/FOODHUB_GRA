<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Kategori Baru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .judul-box {
      background: #fff;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
      padding: 1rem 1.5rem;
    }
    .form-control {
      background-color: #f5f5f5 !important;
      border: 1px solid #ccc;
    }
    .card {
      border-radius: 0.5rem;
      overflow: hidden;
    }
    .card-body {
      background: rgba(108, 121, 80, 0.8);
      padding: 1.5rem;
    }
  </style>
</head>
<body style="background:#a5b55f;">
  <?php include 'navigasi.php'; ?>
  <div class="container mt-5">
    <div class="card mx-auto" style="max-width:400px;">
      <div class="judul-box">
        <h4 class="mb-0 text-success fw-bold">INPUT KATEGORI</h4>
      </div>
      <div class="card-body">
        <!-- Tambahkan enctype untuk upload file -->
        <form method="POST" action="proses_input_kategori.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
          </div>

          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Kategori</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
          </div>

          <button type="submit" class="btn btn-success w-100">Simpan Kategori</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
