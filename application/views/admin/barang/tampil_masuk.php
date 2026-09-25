<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk</title>
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
        <h3 class="mb-3">Barang Masuk</h3>
        <a href="<?php echo site_url("barangmasuk/tambah_barangmasuk/") ?>" class="btn btn-primary mb-3">+ Tambah</a>


        <!-- Menampilkan pesan error atau success -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

    
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered" id="tabelku">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Barang Masuk</th>
                        <th>Nama Roti</th>
                        <th>Jumlah Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang_masuk as $key => $value): ?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo $value["id_barang_masuk"] ?></td>
                        <td><?php echo $value["nama_roti"] ?></td>
                        <td><?php echo $value["jumlah_masuk"] ?></td>
                        <td><?php echo $value["tanggal_masuk"] ?></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="<?php echo site_url("barangmasuk/edit_barangmasuk/".$value["id_barang_masuk"]) ?>" class="btn btn-success btn-sm">Edit</a>
                            <!-- Hapus Button -->
                            <a href="<?php echo site_url("barangmasuk/hapus_barangmasuk/".$value["id_barang_masuk"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
