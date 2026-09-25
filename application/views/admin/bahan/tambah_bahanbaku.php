<div class="content-wrapper">
    <!-- Konten Utama -->
    <section class="content">
        <div style="margin: 20px auto; width: 60%; background-color: #FDF2E9; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="padding: 20px; border-bottom: none;">
                <h3 style="color: #6E3F26; font-weight: bold;">+ Tambah Bahan Baku</h3>
            </div>
            <div style="padding: 20px;">
                <form method="POST">
                    <div style="margin-bottom: 20px;">
                        <label for="nama_bahan" style="color: #6E3F26; display: block; margin-bottom: 5px;">Nama Bahan</label>
                        <input type="text" name="nama_bahan" class="form_control" 
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="stok" style="color: #6E3F26; display: block; margin-bottom: 5px;">Stok</label>
                        <input type="number" name="stok" class="form_control" 
                               style="width: 100%; padding: 10px; border: 1px solid #E5E5E5; border-radius: 5px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="satuan" style="color: #6E3F26; display: block; margin-bottom: 5px;">Satuan</label>
                        <input type="text" name="satuan" class="form_control" 
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
