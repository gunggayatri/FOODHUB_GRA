<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website Restoran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #A5A94C; /* Warna hijau zaitun */
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background-image: url('img/salad.jpeg'); /* Ganti dengan path gambar pizza */
      background-size: cover;
      background-position: center;
      height: 400px;
      position: relative;
      color: black;
    }
    .hero-card {
      background: white;
      border-radius: 10px;
      padding: 20px;
      position: absolute;
      top: 120px;
      left: 20px;
      max-width: 300px;
    }
    .btn-green {
      background-color: #20B050;
      color: white;
      font-weight: bold;
    }
    .menu-card img {
      border-radius: 10px 10px 0 0;
      height: 150px;
      object-fit: cover;
    }
    .menu-card {
      border-radius: 10px;
      overflow: hidden;
      background: white;
      text-align: center;
      font-weight: bold;
    }
    .top-icons {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 10;
    }
    .top-icons i {
      font-size: 1.5rem;
      color: white;
      margin-left: 15px;
    }
    .menu-toggle {
      position: absolute;
      top: 10px;
      left: 10px;
      z-index: 10;
      font-size: 1.8rem;
      color: white;
    }
  </style>
</head>
<body>

 <!-- Navigasi Atas -->
  <div class="hero">
    <div class="menu-toggle">
      <i class="bi bi-list"></i>
    </div>
    <div class="top-icons">
      <i class="bi bi-cart3"></i>
      <i class="bi bi-person-circle"></i>
    </div>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-card shadow">
      <h5>LAPER?</h5>
      <h4><strong>mau makan apa hari ini?</strong><br><br></h4>
      <div class="input-group my-3">
        <input type="text" class="form-control" placeholder="Telusuri Makanan">
        <button class="btn btn-outline-secondary" type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <button class="btn btn-green w-100">Pesan Sekarang</button>
    </div>
  </div>

  <!-- Menu Grid -->
  <div class="container my-4">
    <div class="row g-4">
      <div class="col-6 col-md-3">
        <div class="menu-card">
          <img src="img/desert.jpeg" alt="Dessert" class="w-100">
          <div class="p-2">DESERT</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="menu-card">
          <img src="img/makanan.jpeg" alt="Makanan" class="w-100">
          <div class="p-2">MAKANAN</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="menu-card">
          <img src="img/pastry.jpeg" alt="Pastry" class="w-100">
          <div class="p-2">PASTRY</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="menu-card">
          <img src="img/minuman.jpg" alt="Minuman" class="w-100">
          <div class="p-2">MINUMAN</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
