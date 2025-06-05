<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = intval($_POST['id_produk']);
    $aksi = isset($_POST['aksi']) ? $_POST['aksi'] : 'tambah';

    if ($aksi === 'tambah') {
        // Cek apakah produk sudah ada di keranjang
        $cek = $con->query("SELECT * FROM keranjang WHERE id_produk = $id_produk");
        if ($cek->num_rows > 0) {
            // Jika sudah ada, tambahkan jumlahnya
            $con->query("UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_produk = $id_produk");
        } else {
            // Jika belum ada, tambahkan baris baru
            $con->query("INSERT INTO keranjang (id_produk, jumlah) VALUES ($id_produk, 1)");
        }

    } elseif ($aksi === 'hapus') {
        // Hapus produk dari keranjang
        $con->query("DELETE FROM keranjang WHERE id_produk = $id_produk");
    }

    // Redirect kembali ke halaman sebelumnya
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

} else {
    echo "Permintaan tidak valid.";
}
