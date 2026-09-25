<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Roti</title>
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
            <h3 class="mb-3">Data Roti</h3>
            <a href="<?php echo site_url("dataroti/tambah_roti") ?>" class="btn btn-primary mb-3">+ Tambah</a>

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
                            <th>No</th>
                            <th>Id Roti</th>
                            <th>Nama Roti</th>
                            <th>Tanggal Kadaluwarsa</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_roti as $key => $value): ?>

                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value["id_roti"] ?></td>
                            <td><?php echo $value["nama_roti"] ?></td>
                            <td><?php echo $value["tanggal_kadaluarsa"] ?></td>
                            <td><?php echo $value["stok"] ?></td>
                            <td>
                                <a href="<?php echo site_url("dataroti/edit_dataroti/".$value["id_roti"]) ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?php echo site_url("dataroti/hapus_dataroti/".$value["id_roti"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                <a href="<?php echo site_url("riwayat/riwayatmk/".$value["id_roti"]) ?>" class="btn btn-primary btn-sm">Riwayat</a>
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