<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #faebd7;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            display: flex;
            justify-content: flex-start; /* Align to the left */
            align-items: center;
            height: calc(100vh - 80px); /* Adjust for header/footer height */
            box-sizing: border-box;
            padding-left: 500px; /* Offset for sidebar width */
        }

        .profil-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .btn-edit {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
            background-color: #d2691e;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            text-decoration: none;
            text-align: center;
        }

        .btn-edit:hover {
            background-color: #b05518;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }

        .breadcrumb a {
            color: #d2691e;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profil-card">
            <a href="<?php echo site_url('profil/edit_profil') ?>" class="btn-edit">Edit Profil</a>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" value="<?php echo $this->session->userdata('nama') ?>" readonly>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="<?php echo $this->session->userdata('username') ?>" readonly>
            </div>
        </div>
    </div>
</body>
</html>
