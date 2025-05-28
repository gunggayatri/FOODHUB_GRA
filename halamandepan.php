<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FoodHub GRA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-section {
            flex: 1;
            background-color: #7aa15c;
            color: #1e1e1e;
            padding: 40px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            width: 90px;
            position: absolute;
            top: 0;
            left: 0;
            margin: 20px; /* tambahkan jarak dari pojok kalau mau */
            border-radius: 50px;
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            line-height: 1.4;
            margin-top: 130px;
            margin-bottom: 40px;
        }

        .highlight {
            font-weight: 800;
        }

        .order-button {
            display: inline-flex;
            align-items: center;
            background-color: #c4e538;
            color: #1e1e1e;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 30px;
            font-size: 18px;
            width: fit-content;
        }

        .cart-icon img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .footer {
            font-size: 14px;
        }

        .follow-container {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .social-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .icon-image {
            width: 18px;
            height: 18px;
            vertical-align: middle;
            margin-right: 6px;
        }

        .right-section {
            flex: 1;
            overflow: hidden;
        }

        .food-image {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <!-- Logo -->
            <img src="img/logo.png" alt="FoodHub GRA" class="logo">

            <!-- Judul dan Tombol -->
            <div>
                <h1>ENJOY YOUR<br>
                    <span class="highlight">FAVORITE DISHES</span><br>
                    WITHOUT THE<br>
                    WAIT – ORDER <span class="highlight">NOW</span><br>
                    ON FOODHUB!</h1>

                <!-- Tombol Order dengan gambar ikon -->
                <a href="login.php" class="order-button">
                    <span class="cart-icon"><img src="img/trolli.png" alt="Cart"></span> ORDER NOW
                </a>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="follow-container">
                    <span>Follow us on</span>
                    <div class="social-icons">
                        <span><img src="img/ig.png" alt="Instagram" class="icon-image"> @FoodHub.GRA</span>
                        <span><img src="img/troli.png" alt="Phone" class="icon-image"> 0987526353</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gambar Makanan -->
        <div class="right-section">
            <img src="img/steak.jpg" alt="Delicious Dish" class="food-image">
        </div>
    </div>
</body>
</html>
