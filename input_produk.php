<?php

include 'koneksi.php';

// Ambil kategori dari tabel kategori (jika ada)
$kategori = [];
$result = $con->query("SELECT id_kategori, nama_kategori FROM kategori");
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $kategori[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Produk Baru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .judul-box {
      background: #fff;
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
      padding: 1rem 1.5rem;
    }
    .form-control, .form-select, textarea {
      background-color:rgba(215, 210, 210, 0.95) !important;
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
    <div class="card mx-auto" style="max-width:500px;">
      <div class="judul-box">
        <h4 class="mb-0 text-success fw-bold">INPUT PRODUK</h4>
      </div>
      <div class="card-body">
       <form method="POST" action="proses_input_produk.php" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" required></textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" required>
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" required>
          </div>
          <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select class="form-select" id="id_kategori" name="id_kategori" required>
              <option value="">-- Pilih Kategori --</option>
              <?php foreach ($kategori as $kat): ?>
                <option value="<?= $kat['id_kategori'] ?>"><?= htmlspecialchars($kat['nama_kategori']) ?></option>
              <?php endforeach; ?>
            </select>
            <div class="mb-3">
  <label for="gambar" class="form-label">Gambar Produk</label>
  <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
</div>

          </div>
          <button type="submit" class="btn btn-success w-100">Simpan Produk</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>