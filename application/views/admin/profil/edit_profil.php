<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
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
            justify-content: flex-start; /* Align card slightly to the left */
            align-items: center;
            height: calc(100vh - 80px); /* Adjust for header/footer height */
            box-sizing: border-box;
        }

        .edit-profil-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-left: 450px; /* Move the card slightly to the left */
        }

        .edit-profil-card h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
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

        .form-actions {
            text-align: center;
        }

        .btn-save {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #d2691e;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-save:hover {
            background-color: #b05518;
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
        <div class="edit-profil-card">
            <h1>Edit Profil</h1>
            <form action="<?php echo site_url('profil/update_profil') ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $this->session->userdata('nama') ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $this->session->userdata('username') ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
