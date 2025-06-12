<?php
session_start();
include 'koneksi.php';

// Update status jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_order'], $_POST['status_order'])) {
    $id_order = intval($_POST['id_order']);
    $status_order = $_POST['status_order'];

    $stmt = $con->prepare("UPDATE orders SET status_order = ? WHERE id_order = ?");
    $stmt->bind_param("si", $status_order, $id_order);
    $stmt->execute();
}

// Ambil semua pesanan
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
      background-color: #a5b55f;
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
    .form-status {
      display: flex;
      gap: 6px;
      align-items: center;
    }
    select {
      font-size: 0.9rem;
      padding: 4px;
    }
    .btn-simpan {
      background-color: #ff9800;
      color: white;
      border: none;
      padding: 4px 10px;
      font-size: 0.9rem;
      border-radius: 5px;
    }
    .btn-simpan:hover {
      background-color: #fb8c00;
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
          <th>update status</th>
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
              <td>
                <form method="POST" class="form-status">
                  <input type="hidden" name="id_order" value="<?= $row['id_order'] ?>">
                  <select name="status_order" required>
                    <?php
                      $statuses = ['MENUNGGU', 'SELESAI', 'DIBATALKAN'];
                      foreach ($statuses as $status) {
                        $selected = $row['status_order'] == $status ? 'selected' : '';
                        echo "<option value='$status' $selected>$status</option>";
                      }
                    ?>
                  </select>
                  <button type="submit" class="btn-simpan">Simpan</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">Belum ada pesanan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
