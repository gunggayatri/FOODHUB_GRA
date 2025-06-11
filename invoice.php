<?php
include 'koneksi.php';

if (!isset($_GET['order_id'])) {
  echo "Order ID tidak ditemukan!";
  exit;
}

$order_id = (int) $_GET['order_id'];

// Ambil data pesanan dari tabel orders
$order = $con->query("SELECT * FROM `orders` WHERE id_order = $order_id")->fetch_assoc();

// Ambil detail produk dari tabel order_detail + produk
$detail = $con->query("
  SELECT od.*, p.nama_produk, p.harga 
  FROM order_details od
  JOIN produk p ON od.id_produk = p.id_produk
  WHERE od.id_order = $order_id
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Invoice #<?= $order_id ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #a5b55f;
      padding: 40px;
      font-family: 'Arial', sans-serif;
    }
    .invoice-box {
        background-color: #fff;
      max-width: 700px;
      margin: auto;
      border: 1px solid #ccc;
      padding: 30px;
      border-radius: 10px;
    }
    h2 {
      color: #4caf50;
      margin-bottom: 20px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .btn-print {
      margin-top: 20px;
    }
  </style>
</head>
<body>
     <?php include 'navigasi.php'; ?>

<div class="invoice-box">
  <h2>INVOICE #<?= $order['id_order'] ?></h2>
  <p>
    <strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($order['tanggal_order'])) ?><br>
    <strong>Status:</strong> <?= htmlspecialchars($order['status_order'] ?? 'Menunggu Konfirmasi') ?><br>
    <strong>Nama Pelanggan:</strong> Umum
  </p>

  <table class="table table-bordered">
    <thead class="table-success">
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $grand_total = 0;
      while ($row = $detail->fetch_assoc()):
        $subtotal = $row['harga'] * $row['jumlah'];
        $grand_total += $subtotal;
      ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_produk']) ?></td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3" class="text-end">Total</th>
        <th>Rp <?= number_format($grand_total, 0, ',', '.') ?></th>
      </tr>
    </tfoot>
  </table>

  <button class="btn btn-success btn-print" onclick="window.print()">🖨️ Cetak Invoice</button>
</div>

</body>
</html>
