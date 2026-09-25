<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Roti Masuk dan Keluar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFEDD9;
        }
        .navbar {
            background-color: #E06C00;
        }
        .sidebar {
            background-color: #AD3B03;
            height: 100vh;
            color: white;
            padding: 15px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .masuk {
            color: #4CAF50; /* Warna hijau terang */
        }
        .keluar {
            color: #FF0000; /* Warna merah */
        }
    </style>
</head>
<body>

    <div class="content">
        <h3>Riwayat (<?php echo $roti['nama_roti']; ?>)</h3>
        <p><strong>Stok Roti Saat Ini: </strong><?php echo $stok_roti; ?> Roti</p>

        <h4>Riwayat Masuk dan Keluar</h4>
        <?php if ($riwayat_masuk || $riwayat_keluar): ?>
            <?php 
                // Gabungkan riwayat masuk dan keluar menjadi satu array
                $riwayat = [];
                foreach ($riwayat_masuk as $masuk) {
                    $riwayat[] = [
                        'tanggal' => $masuk['tanggal_masuk'],
                        'jumlah' => $masuk['jumlah_masuk'],
                        'jenis' => 'masuk'
                    ];
                }
                foreach ($riwayat_keluar as $keluar) {
                    $riwayat[] = [
                        'tanggal' => $keluar['tanggal_keluar'],
                        'jumlah' => $keluar['jumlah_keluar'],
                        'jenis' => 'keluar'
                    ];
                }

                // Urutkan riwayat berdasarkan tanggal (baik masuk maupun keluar)
                usort($riwayat, function($a, $b) {
                    return strtotime($a['tanggal']) - strtotime($b['tanggal']);
                });
            ?>

            <?php foreach ($riwayat as $item): ?>
                <?php if ($item['jenis'] == 'masuk'): ?>
                    <p class="masuk"><?php echo $roti['nama_roti']; ?> masuk pada tanggal <?php echo $item['tanggal']; ?> dengan jumlah <?php echo $item['jumlah']; ?>.</p>
                <?php else: ?>
                    <p class="keluar"><?php echo $roti['nama_roti']; ?> keluar pada tanggal <?php echo $item['tanggal']; ?> dengan jumlah <?php echo $item['jumlah']; ?>.</p>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php else: ?>
            <p>Tidak ada riwayat masuk atau keluar untuk roti ini.</p>
        <?php endif; ?>
    </div>

</body>
</html>
