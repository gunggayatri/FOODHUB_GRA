<?php
include 'koneksi.php';

if (isset($_POST['id'], $_POST['aksi'])) {
    $id = intval($_POST['id']);
    $aksi = $_POST['aksi'];

    if ($aksi == 'tambah') {
        $con->query("UPDATE keranjang SET jumlah = jumlah + 1 WHERE id = $id");
    } elseif ($aksi == 'kurang') {
        // Kurangi jumlah, jika tinggal 1, hapus
        $row = $con->query("SELECT jumlah FROM keranjang WHERE id = $id")->fetch_assoc();
        if ($row['jumlah'] <= 1) {
            $con->query("DELETE FROM keranjang WHERE id = $id");
        } else {
            $con->query("UPDATE keranjang SET jumlah = jumlah - 1 WHERE id = $id");
        }
    } elseif ($aksi == 'hapus') {
        // Hapus langsung dari keranjang
        $con->query("DELETE FROM keranjang WHERE id = $id");
    }

    // Redirect kembali ke halaman keranjang
    header("Location: keranjang.php");
    exit;
} else {
    echo "Permintaan tidak valid.";
}
