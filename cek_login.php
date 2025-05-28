<?php
// mengaktifkan session php
session_start();

//menambahkan file koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form login atau index.php
//di bagian ini yg ditangkap harus sesuai dengan NAME yang ada pada field INPUT
$email = $_POST['email'];
//penambahan md5 adalah untuk melakukan enkripsi data password, agar sama pada sisi database
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($con, "select * from user where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    // ambil data user lengkap termasuk role-nya
    $user = mysqli_fetch_assoc($data);

    // simpan session
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role']; // simpan role juga, penting

    // cek role dan redirect sesuai role-nya
    if ($user['role'] == 'ADMIN') {
        header("Location: Dasbord_admin.php");
        exit();
    } else if ($user['role'] == 'CUSTOMER') {
        header("Location: Dasbord_customer.php");
        exit();
    } else {
        // jika role tidak sesuai, misal error role
        header("Location: login.php?pesan=role_invalid");
        exit();
    }
} else {
    header("location:login.php?pesan=gagal");
    exit();
}
?>