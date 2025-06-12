<?php
session_start();
include 'koneksi.php';

// Ambil semua kategori
$result = $con->query("SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Kategori</title>
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
      width: 80px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<?php include 'navigasi.php'; ?>

<div class="container">
  <h2 class="mb-4 text-success">📂 Daftar Kategori</h2>
  <a href="input_kategori.php" class="btn btn-success mb-3">+ Tambah Kategori</a>

  <table class="table table-bordered table-striped">
    <thead class="table-success">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): $no = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <?php
            $img = $row['gambar'];
            $nama = $row['nama_kategori'];
            $id = $row['id_kategori'];
            if (!$img || !file_exists("img/kategori/$img")) {
              $guessJpg = strtolower(preg_replace('/[^a-z0-9]/i', '_', $nama)) . ".jpg";
              $guessPng = strtolower(preg_replace('/[^a-z0-9]/i', '_', $nama)) . ".png";
              $img = file_exists("img/kategori/$guessJpg") ? $guessJpg : (file_exists("img/kategori/$guessPng") ? $guessPng : "default.jpg");
            }
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="img/kategori/<?= $img ?>" alt="<?= $nama ?>"></td>
            <td><?= htmlspecialchars($nama) ?></td>
            <td>
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $id ?>">Edit</button>
              <a href="hapus_kategori.php?id=<?= $id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</a>

              <!-- Modal Edit -->
              <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="edit_kategori.php" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="id_kategori" value="<?= $id ?>">
                        <input type="hidden" name="gambar_lama" value="<?= $img ?>">
                        <div class="mb-3">
                          <label>Nama Kategori</label>
                          <input type="text" name="nama_kategori" class="form-control" value="<?= $nama ?>" required>
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
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4" class="text-center">Belum ada kategori.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
