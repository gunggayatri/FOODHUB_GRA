<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id         = $_POST['id_produk'];
  $nama       = $_POST['nama_produk'];
  $deskripsi  = $_POST['deskripsi'];
  $harga      = $_POST['harga'];
  $stok       = $_POST['stok'];
  $kategori   = $_POST['id_kategori'];
  $gambarLama = $_POST['gambar_lama'];

  $gambarBaru = $gambarLama;

  // Jika user upload gambar baru
  if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $ext        = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $namaBaru   = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($nama)); // nama produk jadi nama file
    $namaFile   = $namaBaru . '_' . time() . '.' . $ext;
    $uploadPath = 'img/produk/' . $namaFile;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath)) {
      // Hapus gambar lama jika ada
      if ($gambarLama && file_exists('img/produk/' . $gambarLama)) {
        unlink('img/produk/' . $gambarLama);
      }
      $gambarBaru = $namaFile;
    } else {
      echo "Gagal upload gambar baru.";
      exit;
    }
  }

  // Query update
  $stmt = $con->prepare("UPDATE produk SET nama_produk=?, deskripsi=?, harga=?, stok=?, id_kategori=?, gambar=? WHERE id_produk=?");
  $stmt->bind_param("ssdissi", $nama, $deskripsi, $harga, $stok, $kategori, $gambarBaru, $id);

  if ($stmt->execute()) {
    header("Location: produk_admin.php?update=success");
    exit;
  } else {
    echo "Gagal update: " . $stmt->error;
  }
}
?>
