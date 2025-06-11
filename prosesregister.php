<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dengan validasi sederhana
    $nama = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    // Validasi password
    if ($password !== $password2) {
        die("Password dan konfirmasi tidak sama.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = "customer"; // langsung atur role-nya

    // Koneksi ke database
    $con = new mysqli("localhost", "root", "", "foodhub");
    if ($con->connect_error) {
        die("Koneksi gagal: " . $con->connect_error);
    }

    // Cek apakah email sudah terdaftar
    $cek = $con->query("SELECT * FROM user WHERE email = '$email'");
    if ($cek->num_rows > 0) {
        die("Email sudah terdaftar.");
    }

    // Simpan data user baru dengan role customer
    $stmt = $con->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // Redirect ke halaman login
        header("Location: login.php");
        exit(); // Penting agar kode setelah redirect tidak dieksekusi
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Form belum dikirim.";
}
?>
