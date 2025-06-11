<?php
include 'koneksi.php';

$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$id_kategori = $_POST['id_kategori'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = 'img/produk/';

// Ambil ekstensi file
$ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

// Ubah nama file sesuai nama produk (spasi jadi _)
$nama_baru = strtolower(str_replace(' ', '_', $nama_produk)) . '.' . $ext;
$tujuan = $folder . $nama_baru;

// Validasi ekstensi
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($ext, $allowed)) {
    echo "Format gambar tidak didukung.";
    exit;
}

// Pindahkan file
if (move_uploaded_file($tmp, $tujuan)) {
    $stmt = $con->prepare("INSERT INTO produk (nama_produk, deskripsi, harga, stok, id_kategori, gambar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $nama_produk, $deskripsi, $harga, $stok, $id_kategori, $nama_baru);

    if ($stmt->execute()) {
        header("Location: produk.php?status=sukses");
        exit;
    } else {
        echo "Gagal menyimpan ke database.";
    }
} else {
    echo "Gagal upload gambar.";
}
?>
