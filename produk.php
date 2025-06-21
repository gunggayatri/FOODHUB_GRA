<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Produk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #a5b55f;
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background: url('img/salad.jpeg') no-repeat center center;
      background-size: cover;
      min-height: 400px;
      position: relative;
    }

    .search-box {
      background-color: white;
      padding: 20px;
      width: 270px;
      border-radius: 10px;
      position: absolute;
      top: 95px;
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

    .produk-container {
      padding: 40px;
      padding-top: 70px;
    }

    .produk-judul {
      text-align: center;
      color: white;
      font-size: 50px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .card-produk {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      transition: transform 0.2s ease;
    }

    .card-produk:hover {
      transform: scale(1.02);
    }

    .card-produk img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .card-body h5 {
      font-weight: bold;
      font-size: 18px;
    }

    .card-body p {
      margin-bottom: 5px;
      color: #333;
    }

    .btn-plus {
      background-color: #cbe000;
      color: #000;
      font-weight: bold;
      border: none;
      border-radius: 20px;
      padding: 4px 12px;
      font-size: 18px;
    }

    .kategori-card {
      cursor: pointer;
      display: block;
      color: inherit;
      text-decoration: none;
    }
  </style>
</head>
<body class="m-0 p-0">

<?php include 'navigasi.php'; ?>

<!-- Header -->
<div class="header">
  <div class="search-box">
    <h4 style="font-weight: normal; font-size: 20px;">LAGI LAPAR?</h4>
    <h2>Cari Produk</h2>
    <br><br>

    <!-- Wrapper grid untuk pencarian + tombol -->
    <div class="d-grid gap-2">
      <form class="d-flex" method="GET" action="produk.php">
        <input type="text" name="search" class="form-control" placeholder="Cari nama, deskripsi, kategori..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button class="btn btn-outline-secondary" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>

      <!-- Tombol lihat semua -->
      <a href="produk.php" class="btn btn-success w-100">Lihat Semua</a>
    </div>
  </div>
</div>

</div>


<!-- Kontainer Produk -->
<div class="container produk-container">
  <?php
    $query = "SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori = k.id_kategori";
    
    if (isset($_GET['search'])) {
      $keyword = $con->real_escape_string($_GET['search']);
      $query .= " WHERE p.nama_produk LIKE '%$keyword%' 
                  OR p.deskripsi LIKE '%$keyword%' 
                  OR k.nama_kategori LIKE '%$keyword%'";
    }

    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
      echo "<div class='row g-4'>";
      while ($row = $result->fetch_assoc()) {
        $nama = $row['nama_produk'];
        $deskripsi = $row['deskripsi'];
        $harga = number_format($row['harga'], 0, ',', '.');
        $img = $row['gambar'];

        if (!$img || !file_exists("img/produk/$img")) {
          $guess = strtolower(str_replace(' ', '_', $nama)) . ".jpg";
          if (file_exists("img/produk/$guess")) {
            $img = $guess;
          } else {
            $img = "default.jpg";
          }
        }

        echo "
          <div class='col-6 col-md-4 col-lg-3'>
            <div class='card card-produk'>
              <a href='detail_produk.php?id=" . $row['id_produk'] . "' class='text-decoration-none text-dark'>
                <img src='img/produk/$img' alt='$nama'>
                <div class='card-body text-center'>
                  <h5>$nama</h5>
                  <p class='text-muted small'>$deskripsi</p>
                  <p>Rp $harga</p>
                </div>
              </a>
              <form method='POST' action='tambah_keranjang.php' class='text-center mb-2'>
                <input type='hidden' name='id_produk' value='" . $row['id_produk'] . "'>
                <button type='submit' class='btn btn-plus'>+</button>
              </form>
            </div>
          </div>
        ";
      }
      echo "</div>";
    } else {
      echo "<p class='text-center text-white'>Produk tidak ditemukan.</p>";
    }
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
