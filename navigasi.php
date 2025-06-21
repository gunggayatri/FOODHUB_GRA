<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>


<!-- Navigasi Minimalis 3 Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
  .nav-fixed {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    background: transparent;
    padding: 0;
  }
  .nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 20px;
    background: rgba(108,121,80,0.95);
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
  }
  .nav-icons {
    display: flex;
    gap: 18px;
    font-size: 1.7rem;
  }
  .nav-icons a, .nav-icons i {
    color: #fff;
    text-decoration: none;
    transition: color 0.2s;
    display: flex;
    align-items: center;
  }
  .nav-icons a:hover, .nav-icons i:hover {
    color: #d6d6d6;
  }
  .nav-menu {
    display: none;
    position: absolute;
    top: 56px;
    left: 20px;
    background: #fff;
    border-radius: 0.7rem;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    min-width: 170px;
    padding: 10px 0;
    z-index: 1100;
  }
  .nav-menu a {
    display: block;
    padding: 10px 22px;
    color: #6c7950;
    text-decoration: none;
    font-weight: 500;
    border-radius: 0.4rem;
    transition: background 0.2s;
  }
  .nav-menu a:hover {
    background: #f5f5f5;
  }
  @media (max-width: 600px) {
    .nav-bar { padding: 10px 10px; }
    .nav-menu { left: 10px; min-width: 140px; }
  }

  /* Perbaikan scroll body */
  body {
    margin: 0;
    padding-top: 80px;
    overflow-y: auto;
  }
</style>

<!-- Navigasi -->
<div class="nav-fixed">
  <div class="nav-bar">
    <div>
      <i class="bi bi-list" id="menuToggle" style="cursor:pointer;"></i>
    </div>
    <div class="nav-icons">
       <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'CUSTOMER'): ?>
      <a href="keranjang.php" aria-label="Keranjang"><i class="bi bi-cart3"></i></a>
      <a href="logout.php" aria-label="Logout"><i class="bi bi-box-arrow-right"></i></a>
       <?php else: ?>
      <a href="logout.php" aria-label="Logout"><i class="bi bi-box-arrow-right"></i></a>
        <?php endif; ?>
    </div>
  </div>

  <!-- Menu Dropdown -->
  <div class="nav-menu" id="menuDropdown">
    <a href="halamandepan.php">Halaman Depan</a>
    

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'ADMIN'): ?>
      <a href="riwayat_invoice.php">Riwayat Invoice</a>
      <a href="kategori_admin.php">Kategori</a>
      <a href="produk_admin.php">Produk</a>
      
      
    <?php else: ?>
      <a href="keranjang.php">Keranjang Saya</a>
      <a href="produk.php">Produk</a>
    <a href="kategori.php">Kategori</a>
    <?php endif; ?>
  </div>
</div>

<script>
  const menuToggle = document.getElementById('menuToggle');
  const menuDropdown = document.getElementById('menuDropdown');
  document.addEventListener('click', function(e) {
    if (menuToggle.contains(e.target)) {
      menuDropdown.style.display = menuDropdown.style.display === 'block' ? 'none' : 'block';
    } else if (!menuDropdown.contains(e.target)) {
      menuDropdown.style.display = 'none';
    }
  });
</script>
