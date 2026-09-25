<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bakery Management | Login</title>

  <!-- Link ke Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0TgF8Jz1JIs2tUqzA7vlg+fFsi17eU4Vxk2EO12/M6KHfD3R" crossorigin="anonymous">
  <!-- Link ke Font Awesome untuk ikon mata -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  
  <style>
    /* Body background dengan gradasi */
    body {
      background: linear-gradient(to right, #ff6f61, #d17f4f); /* Gradasi oranye ke coklat */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    /* Container login */
    .login-container {
      width: 100%;
      max-width: 420px;
      background: #FFEDD9;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      position: relative;
      overflow: hidden;
      animation: slideIn 1s ease-out;
      z-index: 10;
    }

    /* Efek animasi untuk kotak login */
    @keyframes slideIn {
      from {
        transform: translateY(100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Efek animasi background */
    .background-animation {
      position: absolute;
      top: 0;
      left: 50%;
      width: 200%;
      height: 200%;
      background: rgba(233, 125, 48, 0.1);
      border-radius: 50%;
      animation: pulse 4s infinite;
      z-index: -1; /* Pastikan animasi tidak menutupi form */
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        opacity: 0.2;
      }
      50% {
        transform: scale(1.5);
        opacity: 0.4;
      }
      100% {
        transform: scale(1);
        opacity: 0.2;
      }
    }

    /* Logo */
    .login-logo img {
      width: 150px;
      margin-bottom: 30px;
      border-radius: 50%;
      transition: all 0.3s ease;
    }

    /* Efek hover pada logo */
    .login-logo img:hover {
      transform: scale(1.1);
    }

    /* Judul */
    .login-title {
      font-size: 26px;
      font-weight: bold;
      color: #4f4f4f;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Input form */
    .form-control {
      background-color: #f3f3f3;
      border: 1px solid #ddd;
      padding: 14px;
      border-radius: 8px;
      font-size: 16px;
      margin-bottom: 15px;
      transition: all 0.3s ease;
    }

    /* Efek hover pada input */
    .form-control:focus {
      border-color: #e97d30;
      box-shadow: 0 0 5px rgba(233, 125, 48, 0.5);
    }

    /* Tombol login */
    .btn-primary {
      background-color: #E97D30;
      border-color: #E97D30;
      font-size: 16px;
      font-weight: 600;
      padding: 12px 30px;
      width: 100%;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #CF6A26;
      border-color: #CF6A26;
      transform: translateY(-5px);
    }

    /* Pesan error */
    .alert {
      margin-bottom: 20px;
      font-size: 16px;
      padding: 12px;
      background-color: #f44336;
      color: white;
      border-radius: 8px;
    }

    /* Footer dengan tombol lainnya */
    .footer-links {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
    }

    .footer-links a {
      color: #4f4f4f;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-links a:hover {
      color: #E97D30;
    }

    /* Eye icon */
    .eye-icon {
      position: absolute;
      right: 70px;  /* Posisi lebih dekat dengan form */
      top: 37%;     /* Posisikan vertikal di tengah */
      transform: translateY(-50%); /* Menyelaraskan posisi vertikal */
      cursor: pointer;
      color: #e97d30;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <!-- Animasi background -->
    <div class="background-animation"></div>

    <!-- Logo -->
    <div class="login-logo">
      <img src="<?php echo base_url('assets/logo_bakery.png'); ?>" alt="Logo">
    </div>

    <!-- Judul Login -->
    <div class="login-title">Silahkan Login</div>

    <!-- Form Login -->
    <form action="<?php echo site_url('adminpanel/login');?>" method="post">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <div class="password-wrapper" style="position: relative;">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <i class="fas fa-eye eye-icon" id="togglePassword"></i> <!-- Eye Icon -->
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>

    <!-- Footer links for Register and Home -->
    <div class="footer-links">
      <a href="<?php echo site_url('adminpanel/tampilan1'); ?>">Register</a>
      <a href="<?php echo site_url('adminpanel/tampilan2'); ?>">Home</a>
    </div>
  </div>

  <!-- Link ke Bootstrap JS dan Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyN4pX6g7lpxhRLt+jf5g1Zl5u9C3LMw7tV9V6gD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0TgF8Jz1JIs2tUqzA7vlg+fFsi17eU4Vxk2EO12/M6KHfD3R" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0TgF8Jz1JIs2tUqzA7vlg+fFsi17eU4Vxk2EO12/M6KHfD3R" crossorigin="anonymous"></script>

  <!-- Script untuk toggle password visibility -->
  <script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
      const passwordField = document.getElementById('password');
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
