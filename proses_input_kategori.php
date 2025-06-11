<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = htmlspecialchars($_POST['nama_kategori']);

    if (!empty($nama_kategori)) {
        // Siapkan dan jalankan query
        $stmt = $con->prepare("INSERT INTO kategori (nama_kategori) VALUES (?)");
        $stmt->bind_param("s", $nama_kategori);

        if ($stmt->execute()) {
            header("Location: input_kategori.php?status=sukses");
        } else {
            echo "Gagal menyimpan kategori: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Nama kategori tidak boleh kosong.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>
