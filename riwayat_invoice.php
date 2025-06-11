<?php
session_start();
include 'koneksi.php';

// Ambil semua pesanan dari database
$result = $con->query("SELECT * FROM orders ORDER BY tanggal_order DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e7f0b6;
      padding: 40px;
      font-family: Arial, sans-serif;
    }
    .container {
      background-color: #fff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: #4caf50;
      margin-bottom: 25px;
    }
    .btn-invoice {
      font-size: 0.9rem;
      padding: 6px 14px;
      background: #4caf50;
      color: white;
      border: none;
      border-radius: 6px;
    }
    .btn-invoice:hover {
      background: #388e3c;
    }
  </style>
</head>
<body>
  <?php include 'navigasi.php'; ?>

  <div class="container">
    <h2>🧾 Riwayat Invoice</h2>

    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th>#</th>
          <th>ID Order</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Invoice</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php $no = 1; ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td>#<?= $row['id_order'] ?></td>
              <td><?= date('d M Y H:i', strtotime($row['tanggal_order'])) ?></td>
              <td><?= htmlspecialchars($row['status_order']) ?></td>
              <td>
                <a href="invoice.php?order_id=<?= $row['id_order'] ?>" class="btn btn-invoice" target="_blank">Cetak Invoice</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center">Belum ada pesanan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
