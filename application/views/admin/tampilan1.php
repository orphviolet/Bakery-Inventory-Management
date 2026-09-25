<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Registrasi</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css');?>">
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #fbe9d7;
          margin: 0;
          padding: 0;
      }

      .container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
      }

      .form-container {
          background-color: #fef4e8;
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          text-align: center;
          width: 100%;
          max-width: 400px;
      }

      .form-container h2 {
          font-family: 'Georgia', serif;
          color: #5c3a2c;
          margin-bottom: 20px;
      }

      form input, form textarea {
          width: 100%;
          margin-bottom: 15px;
          padding: 10px;
          border: 1px solid #e0e0e0;
          border-radius: 5px;
          font-size: 14px;
          background-color: #fffaf2;
      }

      form button {
          background-color: #d2691e;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 16px;
          text-transform: uppercase;
      }

      form button:hover {
          background-color: #b55316;
      }

      .alert {
          margin-bottom: 20px;
          padding: 10px;
          background-color: #f8d7da;
          color: #721c24;
          border-radius: 5px;
      }

      .alert-success {
          background-color: #d4edda;
          color: #155724;
      }

      .alert-danger {
          background-color: #f8d7da;
          color: #721c24;
      }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>-- Form Registrasi --</h2>

      <!-- Menampilkan pesan error jika ada -->
      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <!-- Menampilkan pesan sukses jika ada -->
      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>

      <form action="<?php echo site_url('register/submit'); ?>" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?php echo set_value('nama', isset($this->session->flashdata('form_data')['nama']) ? $this->session->flashdata('form_data')['nama'] : ''); ?>">
        <div><?php echo form_error('nama'); ?></div>

        <input type="email" name="email" placeholder="Email" value="<?php echo set_value('email', isset($this->session->flashdata('form_data')['email']) ? $this->session->flashdata('form_data')['email'] : ''); ?>">
        <div><?php echo form_error('email'); ?></div>

        <input type="text" name="nomor_hp" placeholder="Telepon" value="<?php echo set_value('nomor_hp', isset($this->session->flashdata('form_data')['nomor_hp']) ? $this->session->flashdata('form_data')['nomor_hp'] : ''); ?>">
        <div><?php echo form_error('nomor_hp'); ?></div>

        <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username', isset($this->session->flashdata('form_data')['username']) ? $this->session->flashdata('form_data')['username'] : ''); ?>">
        <div><?php echo form_error('username'); ?></div>

        <input type="password" name="password" placeholder="Password">
        <div><?php echo form_error('password'); ?></div>

        <textarea name="alamat" placeholder="Alamat"><?php echo set_value('alamat', isset($this->session->flashdata('form_data')['alamat']) ? $this->session->flashdata('form_data')['alamat'] : ''); ?></textarea>
        <div><?php echo form_error('alamat'); ?></div>

        <button type="submit">Daftar</button>
    </form>
    </div>
  </div>
</body>
</html>
