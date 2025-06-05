<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #a5b55f;
      font-family: 'Arial', sans-serif;
    }

    .cart-item {
      background: #f3f4df;
      margin: 10px 0;
      border-radius: 10px;
      padding: 15px;
    }

    .btn-jumlah {
      border: none;
      background: transparent;
      font-size: 20px;
      font-weight: bold;
    }

    .total-container {
      padding: 15px;
      background: #f3f4df;
      margin-top: 20px;
      text-align: right;
      font-weight: bold;
    }

    .btn-pesan {
      background-color: #4caf50;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      padding: 10px 30px;
      width: 100%;
    }
  </style>
</head>
<body class="p-4">

<?php include 'navigasi.php'; ?>

<h4 class="mb-3">🛒 Keranjang Saya</h4>

<?php
$total = 0;
$result = $con->query("
  SELECT k.id, p.nama_produk, p.harga, k.jumlah
  FROM keranjang k
  JOIN produk p ON k.id_produk = p.id_produk
");

while ($row = $result->fetch_assoc()) {
  $subtotal = $row['harga'] * $row['jumlah'];
  $total += $subtotal;
  $img = strtolower(str_replace(' ', '_', $row['nama_produk'])) . '.jpg';

  echo "
  <div class='cart-item row align-items-center'>
    <div class='col-3'>
      <img src='img/produk/$img' class='img-fluid rounded'>
    </div>
    <div class='col-5'>
      <b>{$row['nama_produk']}</b><br>
      Rp " . number_format($row['harga'], 0, ',', '.') . "
    </div>
    <div class='col-4 text-end'>
  <form method='POST' action='update_keranjang.php' class='d-inline'>
    <input type='hidden' name='id' value='{$row['id']}'>
    <input type='hidden' name='aksi' value='kurang'>
    <button class='btn-jumlah'>−</button>
  </form>
  {$row['jumlah']}
  <form method='POST' action='update_keranjang.php' class='d-inline'>
    <input type='hidden' name='id' value='{$row['id']}'>
    <input type='hidden' name='aksi' value='tambah'>
    <button class='btn-jumlah'>+</button>
  </form>
  <form method='POST' action='update_keranjang.php' class='d-inline'>
    <input type='hidden' name='id' value='{$row['id']}'>
    <input type='hidden' name='aksi' value='hapus'>
    <button class='btn btn-sm btn-danger'>🗑️</button>
  </form>
</div>


    </div>
  </div>
  ";
}
?>

<div class="total-container">
  TOTAL (TERMASUK PAJAK): Rp <?= number_format($total, 0, ',', '.') ?>
</div>

<button class="btn-pesan mt-3">Pesan</button>

</body>
</html>
