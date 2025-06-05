<?php
include 'koneksi.php';
?>

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

    .produk-container {
      padding: 40px;
      padding-top: 70px;
    }
    

    .kategori-banner {
      width: 100vw;
      margin-left: calc(-50vw + 50%);
      overflow: hidden;
    }

    .kategori-banner img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      display: block;
      position: relative;
      padding-top: 0;
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

 

<div class="container produk-container">
<?php
  if (isset($_GET['kategori'])) {
    // Produk berdasarkan kategori
    $id_kategori = intval($_GET['kategori']);
    $kategori = $con->query("SELECT nama_kategori FROM kategori WHERE id_kategori = $id_kategori")->fetch_assoc();
    $nama_kategori = $kategori['nama_kategori'];
    $img = strtolower(str_replace(' ', '_', $nama_kategori)) . ".jpg";

    echo "
      <div class='kategori-banner'>
        <img src='img/kategori/$img' alt='$nama_kategori'>
      </div>
      <div class='produk-judul'>
        " . strtoupper($nama_kategori) . "
      </div>
    ";

    $result = $con->query("SELECT * FROM produk WHERE id_kategori = $id_kategori");
  } else {
    // Semua produk
    echo "<div class='produk-judul'>SEMUA PRODUK</div>";
    $result = $con->query("SELECT * FROM produk");
  }

  // Tampilkan produk
  if ($result->num_rows > 0) {
    echo "<div class='row g-4'>";
    while ($row = $result->fetch_assoc()) {
      $nama = $row['nama_produk'];
      $deskripsi = $row['deskripsi'];
      $harga = number_format($row['harga'], 0, ',', '.');
      $img = strtolower(str_replace(' ', '_', $nama)) . ".jpg";

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
    echo "<p class='text-center text-white'>Tidak ada produk yang tersedia.</p>";
  }
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
