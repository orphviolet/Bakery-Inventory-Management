<div class="content-wrapper">
    <!-- Konten Utama -->
    <section class="content">
        <div style="margin: 20px auto; width: 60%; background-color: #FDF2E9; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="padding: 20px; border-bottom: none;">
                <h3 style="color: #6E3F26; font-weight: bold;">Edit Roti</h3>
            </div>
            <div style="padding: 20px;">
                <form method="POST">
                    <div style="margin-bottom: 20px;">
                        <label for="nama_roti" style="color: #6E3F26; display: block; margin-bottom: 5px;">Nama Roti</label>
                        <input type="text" name="nama_roti" class="form_control" value="<?php echo $data_roti['nama_roti'] ?>"
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="tanggal_Kadaluarsa" style="color: #6E3F26; display: block; margin-bottom: 5px;">Tanggal Kedaluwarsa</label>
                        <input type="date" name="tanggal_kadaluarsa" class="form_control" value="<?php echo $data_roti['tanggal_kadaluarsa'] ?>"
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="stok" style="color: #6E3F26; display: block; margin-bottom: 5px;">Stok</label>
                        <input type="number" name="stok" class="form_control" value="<?php echo $data_roti['stok'] ?>"
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
