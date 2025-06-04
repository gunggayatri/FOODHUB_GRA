<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'ADMIN') {
        header("Location: Dasbord_admin.php");
        exit();
    } else if ($user['role'] == 'CUSTOMER') {
        header("Location: Dasbord_customer.php");
        exit();
    } else {
        header("Location: login.php?pesan=role_invalid");
        exit();
    }
} else {
    header("location:login.php?pesan=gagal");
    exit();
}
?>
