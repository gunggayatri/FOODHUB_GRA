<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Cek apakah user dengan email tersebut ada
$query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
$user = mysqli_fetch_assoc($query);

if ($user) {
    // Verifikasi password yang diinput dengan yang di-hash di database
    if (password_verify($password, $user['password'])) {
        // Login sukses, set session
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // Redirect sesuai role
        if ($user['role'] == 'ADMIN') {
            header("Location: kategori_admin.php");
            exit();
        } elseif ($user['role'] == 'CUSTOMER') {
            header("Location: kategori.php");
            exit();
        } else {
            header("Location: login.php?pesan=role_invalid");
            exit();
        }
    } else {
        // Password salah
        header("Location: login.php?pesan=password_salah");
        exit();
    }
} else {
    // Email tidak ditemukan
    header("Location: login.php?pesan=email_tidak_ditemukan");
    exit();
}
?> 