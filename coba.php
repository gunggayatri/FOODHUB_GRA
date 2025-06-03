<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FoodHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #b5bf5d;
    }

    .header {
      background: url('img/salad.jpeg') no-repeat center center;
      background-size: cover;
      min-height: 350px;
      position: relative;
    }

    .search-box {
      background-color: white;
      padding: 20px;
      width: 270px;
      border-radius: 10px;
      position: absolute;
      top: 30px;
      left: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .form-control {
      border-radius: 30px 0 0 30px;
      border-right: none;
    }

    .btn-outline-secondary {
      border-radius: 0 30px 30px 0;
      border-left: none;
    }

    .button {
      background-color: #20B050;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 30px;
      border-radius: 8px;
      margin-top: 10px;
      width: 100%;
    }

    .button:hover {
      background-color: #178a3d;
    }

    .kategori-container {
      padding: 30px 10px;
    }

    .kategori-card img {
      height: 140px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    .kategori-card {
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow: hidden;
      text-decoration: none;
      color: inherit;
    }

    .kategori-card h5 {
      padding: 10px 0;
      margin: 0;
      font-weight: bold;
    }

    .makanan-card {
      background: white;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- Header / Hero -->
<div class="header">
  <div class="search-box">
    <h4 style="font-weight: normal; font-size: 20px;">LAPER?</h4>
    <h2>mau makan apa hari ini?</h2>
    <br><br>
    <form class="d-flex my-2">
      <input type="text" class="form-control" placeholder="Telusuri Makanan">
      <button class="btn btn-outline-secondary" type="submit">
        <i class="bi bi-search"></i>
      </button>
    </form>
    <button class="button">Pesan Sekarang</button>
  </div>
</div>

<!-- Kategori -->
<div class="container kategori-container">
  <div class="row justify-content-center g-4">
    <?php
      $result = $con->query("SELECT * FROM kategori");
      while($row = $result->fetch_assoc()) {
          $nama = $row['nama_kategori'];
          $img = strtolower($nama) . ".jpg";
          $id = $row['id_kategori'];
          echo "
          <div class='col-6 col-md-3'>
            <a href='index.php?kategori=$id' class='card kategori-card text-center'>
              <img src='img/kategori/$img' class='card-img-top' alt='$nama'>
              <h5>$nama</h5>
            </a>
          </div>";
      }
    ?>
  </div>
</div>

<!-- Makanan berdasarkan Kategori -->
<?php if (isset($_GET['kategori'])): ?>
<div class="container mt-4">
  <h4>Daftar Makanan</h4>
  <div class="row">
    <?php
      $id_kategori = intval($_GET['kategori']);
      $makanan = $con->query("SELECT * FROM produk WHERE id_kategori = $id_kategori");
      if ($makanan->num_rows > 0) {
        while ($row = $makanan->fetch_assoc()) {
          echo "
          <div class='col-md-4'>
            <div class='makanan-card'>
              <h5>{$row['nama_makanan']}</h5>
              <p>Rp " . number_format($row['harga'], 0, ',', '.') . "</p>
            </div>
          </div>";
        }
      } else {
        echo "<p>Tidak ada makanan dalam kategori ini.</p>";
      }
    ?>
  </div>
</div>
<?php endif; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
