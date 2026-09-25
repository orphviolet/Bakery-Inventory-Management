<div class="content-wrapper">
    <!-- Konten Utama -->
    <section class="content">
        <div style="margin: 20px auto; width: 60%; background-color: #FDF2E9; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="padding: 20px; border-bottom: none;">
                <h3 style="color: #6E3F26; font-weight: bold;">+ Tambah Barang Keluar</h3>
            </div>
            <div style="padding: 20px;">
                <form method="POST">
                    <div style="margin-bottom: 20px;">
                        <label for="id_roti" style="color: #6E3F26; display: block; margin-bottom: 5px;">Nama Roti</label>
                        <select name="id_roti" class="form_control form_select" style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">    
                        <option class="form_control" value="">Pilih</option>
                            <?php foreach ($dataroti as $key =>     $value): ?>
                            <option class="form_control" value="<?php echo $value['id_roti'] ?>">
                                <?php echo $value['nama_roti'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="jumlah_keluar" style="color: #6E3F26; display: block; margin-bottom: 5px;">Jumlah Keluar</label>
                        <input type="number" name="jumlah_keluar" class="form_control" 
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="tanggal_keluar" style="color: #6E3F26; display: block; margin-bottom: 5px;">Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar" class="form_control" 
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <button type="submit" 
                            style="background-color: #FF8C42; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </section>

</div>
