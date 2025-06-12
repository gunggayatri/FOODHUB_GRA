<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #A5A94C;
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .btn {
      background-color: #6c710b;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      padding: 8px 15px;
      border: none;
    }

    .btn:hover {
      background-color: #c4c963;
    }

    .mb-4 {
      border-radius: 50%;
    }

    /* Supaya label di form-floating kelihatan di bg-dark */
    .form-control.bg-dark {
      color: #dee2e6;
      background-color: #212529;
      border: 1px solid #495057;
    }

    .form-control.bg-dark::placeholder {
      color: #dee2e6;
      opacity: 1;
    }

    .form-floating > label {
      color: #adb5bd;
    }

    .register-link-login {
      margin-top: 10px;
      color: #212529;
    }

    .register-link-login a {
      color:rgb(95, 95, 209);
      text-decoration: underline;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4">
  <main class="form-signin w-25 m-auto">
    <form method="POST" action="prosesregister.php">
      <img class="mb-4" src="img/logo/logo.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 fw-normal text-dark">Register</h1>

     <!-- Ganti form-floating jadi input biasa -->
      <div class="mb-2">
        <input type="text" class="form-control bg-dark text-light" placeholder="Nama Lengkap" name="username" required>
      </div>
      <div class="mb-2">
        <input type="email" class="form-control bg-dark text-light" placeholder="Email" name="email" required>
      </div>
      <div class="mb-2">
        <input type="password" class="form-control bg-dark text-light" placeholder="Password" name="password" required>
      </div>
      <div class="mb-2">
        <input type="password" class="form-control bg-dark text-light" placeholder="Konfirmasi Password" name="password2" required>
      </div>

      <button class="btn w-100 py-2 mt-2" type="submit">Register</button>

      <div class="register-link-login">
        Sudah punya akun? <a href="login.php">Login di sini</a>
      </div>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>