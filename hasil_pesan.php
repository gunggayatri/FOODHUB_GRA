<?php
include 'koneksi.php';

// Ambil ID pesanan dari URL
$id_order = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

// Ambil detail produk untuk pesanan ini
$sql = "
  SELECT p.nama_produk, d.jumlah, d.subtotal
  FROM order_details d
  JOIN produk p ON d.id_produk = p.id_produk
  WHERE d.id_order = $id_order
";
$result = $con->query($sql);

$items = [];
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['subtotal'];
  $items[] = $row;
}

// Ambil informasi pesanan jika ingin ditampilkan
$info = $con->query("SELECT * FROM `orders` WHERE id_order = $id_order")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #a5b55f;
      font-family: Arial, sans-serif;
      padding: 30px 0;
    }
    .pesan-box {
      background: #fff;
      border-radius: 1rem;
      max-width: 500px;
      margin: 40px auto;
      padding: 2rem 2.5rem;
      box-shadow: 0 4px 16px rgba(0,0,0,0.07);
      text-align: center;
    }
    .pesan-box h3 {
      color: #4caf50;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }
    .list-group-item {
      background: #f3f4df;
      border: none;
      margin-bottom: 6px;
      border-radius: 0.5rem;
    }
    .total-pesan {
      background: #f3f4df;
      border-radius: 0.5rem;
      font-weight: bold;
      padding: 12px;
      margin-top: 18px;
      font-size: 1.1rem;
    }
    .btn-kembali {
      margin-top: 22px;
      background: #708000;
      color: #fff;
      font-weight: bold;
      border-radius: 0.5rem;
      padding: 10px 30px;
      border: none;
    }
    .btn-kembali:hover {
      background: #4caf50;
    }
  </style>
</head>
<body>
  <?php include 'navigasi.php'; ?>
  <div class="pesan-box">
    <h3>✅ Pesanan Berhasil!</h3>
    <p>Terima kasih, pesanan Anda telah diterima.<br>Berikut detail pesanan Anda:</p>

    <ul class="list-group mb-3 text-start">
      <?php foreach($items as $item): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span><?= htmlspecialchars($item['nama_produk']) ?> <span class="badge bg-secondary ms-2"><?= $item['jumlah'] ?>x</span></span>
          <span>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></span>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="total-pesan">
      Total Bayar: Rp <?= number_format($total, 0, ',', '.') ?>
    </div>

    <a href="invoice.php?order_id=<?= $id_order ?>" class="btn btn-kembali">Cetak Invoice</a>


    <a href="produk.php" class="btn btn-kembali">Kembali Belanja</a>
  </div>
</body>
</html>
