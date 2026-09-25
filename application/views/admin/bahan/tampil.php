<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Baku</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFEDD9; /* Warna latar belakang */
        }
        .navbar {
            background-color: #E06C00; /* Warna navbar */
        }
        .sidebar {
            background-color:  #AD3B03;
            height: 100vh;
            color: white;
            padding: 15px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .table th {
            background-color: #FF8C00;
            color: white;
        }
    </style>
</head>
<body>

        <!-- Main Content -->
        <div class="content">
            <h3 class="mb-3">Bahan Baku</h3>
            <a href="<?php echo site_url("bahan/tambah_bahanbaku/") ?>" class="btn btn-primary mb-3">+ Tambah</a>

            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelku">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bahan_baku as $key => $value): ?>

                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value["id_bahan"] ?></td>
                            <td><?php echo $value["nama_bahan"] ?></td>
                            <td><?php echo $value["stok"] ?></td>
                            <td><?php echo $value["satuan"] ?></td>
                            <td>
                                <a href="<?php echo site_url("bahan/edit_bahanbaku/".$value["id_bahan"]) ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?php echo site_url("bahan/hapus_bahanbaku/".$value["id_bahan"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>