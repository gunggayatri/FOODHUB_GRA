<?php
include 'koneksi.php';
$id = $_GET['id'];
$con->query("DELETE FROM kategori WHERE id_kategori = $id");
header("Location: kategori_admin.php");
?>
