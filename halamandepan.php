<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FoodHub GRA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .left-section {
      background-color: #7aa15c;
      color: #1e1e1e;
      padding: 40px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .logo {
      width: 70px;
      border-radius: 50%;
    }

    .highlight {
      font-weight: 700;
      font-size: larger;
    }

    h1 {
        font-size: 28px; /* Atur sesuai kebutuhan, misalnya dari 36px ke 28px */
        line-height: 1.5; /* Agar teks lebih rapi */
    }


    .order-button {
      background-color: #c4e538;
      color: #1e1e1e;
      font-weight: 600;
      border-radius: 30px;
      padding: 12px 25px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }

    .order-button i {
      margin-right: 10px;
      font-size: 20px;
    }

    .social-icons i {
      margin-right: 6px;
    }

    .food-image {
      height: 100vh;
      object-fit: cover;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- Left Section -->
    <div class="col-md-6 left-section">
      <!-- Logo -->
      <div class="mb-4">
        <img src="img/logo/logo.jpg" alt="FoodHub GRA" class="logo">
      </div>

      <!-- Judul & Tombol -->
      <div>
        <h1 class="mb-4">ENJOY YOUR<br>
          <span class="highlight">FAVORITE DISHES</span><br>
          WITHOUT THE<br>
          WAIT – ORDER <span class="highlight">NOW</span><br>
          ON FOODHUB!
        </h1>

        <!-- Tombol Order -->
        <a href="login.php" class="order-button">
          <i class="bi bi-cart"></i> ORDER NOW
        </a>
      </div>

      <!-- Footer -->
      <div class="footer mt-4">
        <span>Follow us on</span>
        <div class="d-flex align-items-center gap-4 mt-2">
          <span><i class="bi bi-instagram"></i> @FoodHub.GRA</span>
          <span><i class="bi bi-telephone"></i> 0987526353</span>
        </div>
      </div>
    </div>

    <!-- Right Section -->
    <div class="col-md-6 p-0">
      <img src="img/salad2.jpeg" alt="Delicious Dish" class="food-image">
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
