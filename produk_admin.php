<?php
session_start();
include 'koneksi.php';



// Ambil semua produk
$result = $con->query("SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori = k.id_kategori");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #a5b55f;
      padding: 30px;
    }
    .container {
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .table img {
      height: 60px;
      object-fit: cover;
    }
    .btn-edit {
      background-color: #ffc107;
      color: black;
    }
    .btn-hapus {
      background-color: #dc3545;
      color: white;
    }
    .btn-edit:hover {
      background-color: #e0a800;
    }
    .btn-hapus:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
<?php include 'navigasi.php'; ?>

<div class="container">
  <h2 class="mb-4 text-success">📦 Daftar Produk</h2>
  <a href="input_produk.php" class="btn btn-success mb-3">+ Tambah Produk</a>

  <table class="table table-bordered table-striped">
    <thead class="table-success">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <?php
            $img = $row['gambar'];
            if (!$img || !file_exists("img/produk/$img")) {
              $guess = strtolower(str_replace(' ', '_', $row['nama_produk'])) . ".jpg";
              $img = file_exists("img/produk/$guess") ? $guess : "default.jpg";
            }
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="img/produk/<?= $img ?>" alt="<?= $row['nama_produk'] ?>"></td>
            <td><?= htmlspecialchars($row['nama_produk']) ?></td>
            <td><?= htmlspecialchars($row['nama_kategori'] ?? '-') ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
             <!-- Tombol Edit -->
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_produk'] ?>">Edit</button>

          <!-- Tombol Hapus -->
          <a href="produk_delete.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $row['id_produk'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="POST" action="produk_update.php" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_produk" value="<?= $row['id_produk'] ?>">
                    <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
                    <div class="mb-3">
                      <label>Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control" value="<?= $row['nama_produk'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label>Harga</label>
                      <input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label>Stok</label>
                      <input type="number" name="stok" class="form-control" value="<?= $row['stok'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label>Kategori</label>
                      <select name="id_kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        $kategori = $con->query("SELECT * FROM kategori");
                        while ($k = $kategori->fetch_assoc()):
                        ?>
                          <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $row['id_kategori'] ? 'selected' : '' ?>>
                            <?= $k['nama_kategori'] ?>
                          </option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Gambar (opsional)</label>
                      <input type="file" name="gambar" class="form-control">
                      <small>Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <?php endwhile; else: ?>
      <tr>
        <td colspan="8" class="text-center">Tidak ada produk.</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
