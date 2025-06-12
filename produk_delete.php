<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $con->query("DELETE FROM produk WHERE id_produk = $id");
}

header("Location: produk_admin.php");
?>
