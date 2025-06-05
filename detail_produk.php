<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id_produk = intval($_GET['id']);
  $query = $con->query("SELECT * FROM produk WHERE id_produk = $id_produk");

  if ($query->num_rows > 0) {
    $data = $query->fetch_assoc();
    $nama = $data['nama_produk'];
    $deskripsi = $data['deskripsi'];
    $harga_raw = $data['harga'];
    $harga = number_format($harga_raw, 0, ',', '.');
    $img = strtolower(str_replace(' ', '_', $nama)) . ".jpg";
  } else {
    echo "Produk tidak ditemukan.";
    exit;
  }
} else {
  echo "ID produk tidak valid.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($nama) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #a5b55f;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .detail-box {
      background: #f5f5f5;
      padding: 20px;
      border-radius: 20px;
      max-width: 500px;
      margin: auto;
      text-align: center;
    }

    .detail-box img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .qty-btn {
      border: none;
      font-size: 24px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #ddd;
      margin: 0 10px;
      cursor: pointer;
    }

    .btn-keranjang {
      background-color: #708000;
      color: white;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      border-radius: 10px;
      margin-top: 20px;
    }

    textarea {
      width: 100%;
      border-radius: 10px;
      padding: 10px;
      resize: none;
      border: 1px solid #ccc;
      font-family: Arial, sans-serif;
    }
  </style>
</head>
<body>

<?php include 'navigasi.php'; ?>

<div class="detail-box">
  <img src="img/produk/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($nama) ?>">
  <h4 class="fw-bold"><?= strtoupper(htmlspecialchars($nama)) ?></h4>
  <p class="text-muted"><?= htmlspecialchars($deskripsi) ?></p>
  <h5 class="mb-4">Rp <?= $harga ?></h5>

  <form method="POST" action="tambah_keranjang.php">
    <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
    <input type="hidden" name="qty" id="qty-input" value="1">

    <h6 class="text-start">Catatan untuk Restoran <span class="text-muted float-end small">Opsional</span></h6>
    <textarea name="catatan" rows="2" placeholder="Permintaan akan disesuaikan dengan kebijakan resto..."></textarea>

    <div class="d-flex justify-content-center align-items-center my-3">
      <button type="button" class="qty-btn" onclick="ubahQty(-1)">−</button>
      <span id="qty">1</span>
      <button type="button" class="qty-btn" onclick="ubahQty(1)">+</button>
    </div>

    <button type="submit" class="btn-keranjang">Tambahkan ke keranjang</button>
  </form>
</div>

<script>
  let qty = 1;
  function ubahQty(change) {
    qty += change;
    if (qty < 1) qty = 1;
    document.getElementById("qty").innerText = qty;
    document.getElementById("qty-input").value = qty;
  }
</script>

</body>
</html>
