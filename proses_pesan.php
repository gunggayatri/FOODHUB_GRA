<?php
include 'koneksi.php';

$user_id = 1; // Simulasi user login
$status_order = 'Menunggu Konfirmasi';

// Ambil data dari keranjang
$result = $con->query("SELECT * FROM keranjang");
$items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
  $produk = $con->query("SELECT harga FROM produk WHERE id_produk = {$row['id_produk']}")->fetch_assoc();
  $subtotal = $produk['harga'] * $row['jumlah'];
  $total += $subtotal;

  $items[] = [
    'id_produk' => $row['id_produk'],
    'jumlah' => $row['jumlah'],
    'subtotal' => $subtotal
  ];
}

// Cek jika keranjang kosong
if (empty($items)) {
  echo "<script>alert('Keranjang kosong!'); window.location='keranjang.php';</script>";
  exit;
}

// Simpan ke tabel order
$tanggal = date('Y-m-d H:i:s');
$con->query("INSERT INTO `orders` (id_user, tanggal_order, status_order) VALUES ($user_id, '$tanggal', '$status_order')");
$id_order = $con->insert_id;

// Simpan ke tabel detail_produk
foreach ($items as $item) {
  $con->query("INSERT INTO order_details (id_order, id_produk, jumlah, subtotal) 
              VALUES ($id_order, {$item['id_produk']}, {$item['jumlah']}, {$item['subtotal']})");
}

// Hapus isi keranjang
$con->query("DELETE FROM keranjang");

// Redirect ke konfirmasi
header("Location: hasil_pesan.php?order_id=$id_order");
exit;
?>
