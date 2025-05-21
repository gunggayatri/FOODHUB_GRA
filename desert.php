<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Desert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #a7af4a;
      font-family: 'Segoe UI', sans-serif;
    }
    .header-img {
      width: 100%;
      height: 400px;
      background-image: url('img/desert.jpeg'); /* ganti dengan path gambar desert */
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .navbar-icons {
      position: absolute;
      top: 10px;
      right: 20px;
      color: white;
      font-size: 1.5rem;
    }
    .menu-title {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
      padding: 1rem 0;
      color: white;
    }
    .card {
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s;
    font-size: 0.85rem;
    width: 100%; /* Penuh di dalam col-6 */
    max-width: 350px; /* Ukuran kecil */
    margin: 0 auto; /* Tengah dalam col */
    }

    .card:hover {
      transform: scale(1.02);
    }
    .add-icon {
      font-size: 1.2rem;
      cursor: pointer;
      color: #2c2c2c;
    }
    .item-title {
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="header-img">
    <div class="position-absolute top-0 start-0 m-3">
      <i class="bi bi-list text-white fs-3"></i>
    </div>
    <div class="navbar-icons">
      <i class="bi bi-cart3 me-3"></i>
      <i class="bi bi-person-circle"></i>
    </div>
  </div>

  <div class="menu-title">DESERT</div>

  <div class="container pb-5">
    <div class="row g-4">
      <!-- Item -->
      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Chocolate Lava Cake')">
          <img src="img/chocolavacake.jpg" class="card-img-top" alt="Chocolate Lava Cake">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">CHOCOLATE LAVA CAKE</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>
      <!-- Repeat for other items -->
      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Slice Chocolate')">
          <img src="img/chocolatecake.jpg" class="card-img-top" alt="Slice Chocolate">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">SLICE CHOCOLATE</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Pancake')">
          <img src="img/desert.jpeg" class="card-img-top" alt="Pancake">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">PANCAKE</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Puding Buah')">
          <img src="img/puddingbuah.jpg" class="card-img-top" alt="Puding Buah">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">PUDING BUAH</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Slice Matcha')">
          <img src="img/slicematcha.jpg" class="card-img-top" alt="Slice Matcha">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">SLICE MATCHA</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card p-2" onclick="alert('Lihat detail Churros')">
          <img src="img/churos.jpg" class="card-img-top" alt="Churros">
          <div class="card-body p-2 d-flex justify-content-between align-items-center">
            <div>
              <div class="item-title">CHURROS</div>
              <div>20K</div>
            </div>
            <i class="bi bi-plus-circle add-icon"></i>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
