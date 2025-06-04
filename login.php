<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Sign In</title>

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- sesuaikan file javascript -->
    <script src="asset/js/color-modes.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
.label {
    font-weight: bold;
    display: block;
    text-align: left;
}
.register-link-login {
    margin-top: 10px;
    display: block;
    text-align: center;
}
body {
    background-color: #A5A94C; 
    font-family: Arial, sans-serif;
    text-align: center;
    }
.btn {
    background-color:  #6c710b; /* Warna tombol */
    color: white;
    font-weight: bold;
    border-radius: 5px;
    padding: 8px 15px;
    border: none;
}
.btn:hover {
    background-color: #c4c963; /* Warna saat hover */
}
.ms-auto {
    margin-left: auto;
}
  </style>
</head>
<body class="d-flex align-items-center py-4 ">
    <main class="form-signin w-25 m-auto">
        <?php
        if (isset($_GET['pesan'])) { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <!--cek pesan notifikasi -->
                <?php
                if ($_GET['pesan'] == "gagal") {
                    echo "Login gagal! email dan password salah!";
                } else if ($_GET['pesan'] == "logout") {
                    echo "Anda telah berhasil logout <br>";
                    echo '<a href="index.php">Kembali ke Halaman Utama</a>';
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "Anda harus login untuk mengakses halaman admin";
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <form method="POST" action="cek_login.php">
            <img class="mb-4" src="asset/brand/person-fill.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal text-dark">Please sign in</h1>
            <div class="form-floating">
                <!-- perhatikan name harus sama pada file cek_login.php -->
                <input type="text" class="form-control bg-dark" id="floatingemail" placeholder="Input email" name="email">
                <label for="floatingemail">Email</label>
            </div>
            <div class="form-floating">
                <!-- perhatikan name harus sama pada file cek_login.php -->
                <input type="password" class="form-control bg-dark" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn w-100 py-2 mt-2" type="submit">Login</button>

        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>

</body>

</html>