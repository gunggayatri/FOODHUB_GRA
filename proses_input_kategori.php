<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = htmlspecialchars(trim($_POST['nama_kategori']));
    $gambar = $_FILES['gambar'];

    if (!empty($nama_kategori)) {
        // Format nama file gambar dari nama kategori
        $nama_file = strtolower(str_replace(' ', '_', $nama_kategori)) . '.' . pathinfo($gambar['name'], PATHINFO_EXTENSION);

        // Lokasi penyimpanan gambar
        $upload_dir = 'img/kategori/';
        $upload_path = $upload_dir . $nama_file;

        // Validasi gambar dan simpan
        if ($gambar['error'] === 0 && move_uploaded_file($gambar['tmp_name'], $upload_path)) {

            // Simpan ke database
            $stmt = $con->prepare("INSERT INTO kategori (nama_kategori, gambar) VALUES (?, ?)");
            $stmt->bind_param("ss", $nama_kategori, $nama_file);

            if ($stmt->execute()) {
                header("Location: input_kategori.php?status=sukses");
            } else {
                echo "Gagal menyimpan kategori: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Nama kategori tidak boleh kosong.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>
