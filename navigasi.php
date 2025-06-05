<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nav Minimal + Style</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
   .hero {
  position: relative;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: transparent; /* tanpa background */
}

.menu-toggle {
  font-size: 24px;
  cursor: pointer;
  color: white; /* ikon putih */
}

.top-icons {
  display: flex;
  gap: 15px;
  font-size: 22px;
}

/* Warna putih untuk semua ikon dalam top-icons */
.top-icons i,
.top-icons a {
  color: white;  /* ikon putih */
  text-decoration: none;
  display: flex;
  align-items: center;
}

.top-icons a:hover,
.top-icons i:hover {
  color: #ccc; /* warna hover terang */
}

.nav-links {
  margin-top: 10px;
  padding: 0 20px;
  display: none;
  flex-direction: column;
  gap: 10px;
}

.nav-links a {
  text-decoration: none;
  color: white;  /* teks putih */
  font-weight: 500;
}

.nav-links a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>

<div class="hero">
  <!-- Tombol toggle menu -->
  <div class="menu-toggle">
    <i class="bi bi-list" id="toggleIcon"></i>
  </div>

  <!-- Icon di kanan atas -->
  <div class="top-icons" id="topIcons">
    <a href="keranjang.php" aria-label="Keranjang Belanja">
      <i class="bi bi-cart3"></i>
    </a>
    <i class="bi bi-person-circle" title="Akun"></i>
  </div>
</div>

<!-- Link navigasi -->
<div class="nav-links" id="navLinks">
  <a href="halamandepan.php">Halaman Depan</a>
  <a href="kategori.php">Kategori</a>
  <a href="produk.php">Produk</a>
  <!-- Tambahkan link lainnya di sini -->
</div>

<script>
  const toggleIcon = document.getElementById('toggleIcon');
  const navLinks = document.getElementById('navLinks');

  toggleIcon.addEventListener('click', () => {
    const isVisible = navLinks.style.display === 'flex';
    navLinks.style.display = isVisible ? 'none' : 'flex';
  });
</script>

</body>
</html>
