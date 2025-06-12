<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id           = $_POST['id_kategori'];
  $nama         = $_POST['nama_kategori'];
  $gambarLama   = $_POST['gambar_lama'];
  $gambarBaru   = $gambarLama;

  // Jika user upload gambar baru
  if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $ext        = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $namaBaru   = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($nama));
    $namaFile   = $namaBaru . '_' . time() . '.' . $ext;
    $uploadPath = 'img/kategori/' . $namaFile;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath)) {
      // Hapus gambar lama jika ada
      if ($gambarLama && file_exists('img/kategori/' . $gambarLama) && $gambarLama !== 'default.jpg') {
        unlink('img/kategori/' . $gambarLama);
      }
      $gambarBaru = $namaFile;
    } else {
      echo "Gagal upload gambar baru.";
      exit;
    }
  }

  // Update data kategori
  $stmt = $con->prepare("UPDATE kategori SET nama_kategori = ?, gambar = ? WHERE id_kategori = ?");
  $stmt->bind_param("ssi", $nama, $gambarBaru, $id);

  if ($stmt->execute()) {
    header("Location: kategori_admin.php?update=success");
    exit;
  } else {
    echo "Gagal update: " . $stmt->error;
  }
}
?>
