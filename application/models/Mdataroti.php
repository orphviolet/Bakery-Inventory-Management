<?php

class Mdataroti extends CI_Model {

    // Menampilkan data roti berdasarkan id_pengguna
    function tampil($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $q = $this->db->get('data_roti');
        return $q->result_array();
    }

    // Menyimpan data roti baru
    function simpan($inputan) {
        $this->db->insert('data_roti', $inputan);
    }

    // Menampilkan detail data roti berdasarkan id_pengguna dan id_roti
    function detail($id_pengguna, $id_roti) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_roti', $id_roti);
        $q = $this->db->get('data_roti');
        return $q->row_array();
    }

    // Mengubah data roti berdasarkan id_pengguna dan id_roti
    function ubah($inputan, $id_pengguna, $id_roti) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_roti', $id_roti);
        $this->db->update('data_roti', $inputan);
    }

    // Menghapus data roti berdasarkan id_pengguna dan id_roti
    function hapus_dataroti($id_pengguna, $id_roti) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_roti', $id_roti);
        $this->db->delete('data_roti');
    }

    // Fungsi baru untuk mengurangi stok ketika data barang masuk dihapus
    function update_stok_on_delete($id_roti, $jumlah_masuk) {
        // Kurangi stok pada tabel data_roti untuk id_roti yang sesuai
        $this->db->set('stok', 'stok - ' . (int)$jumlah_masuk, FALSE);
        $this->db->where('id_roti', $id_roti);
        $this->db->update('data_roti');
    }


    // Memperbarui stok roti berdasarkan id_pengguna dan id_roti
    function update_stok($id_pengguna, $id_roti, $jumlah_masuk) {
        // Ambil stok saat ini berdasarkan id_pengguna dan id_roti
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_roti', $id_roti);
        $q = $this->db->get('data_roti');
        $roti = $q->row_array();

        // Pastikan roti ditemukan sebelum memperbarui stok
        if ($roti) {
            // Hitung stok baru
            $new_stok = $roti['stok'] + $jumlah_masuk;

            // Update stok di database
            $this->db->where('id_pengguna', $id_pengguna);
            $this->db->where('id_roti', $id_roti);
            $this->db->update('data_roti', array('stok' => $new_stok));
        }
    }

    // Fungsi untuk cek stok roti
    function cek_stok($id_pengguna, $id_roti) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_roti', $id_roti);
        $q = $this->db->get('data_roti');
        
        if ($q->num_rows() > 0) {
            $roti = $q->row_array();
            return $roti['stok']; // Mengembalikan jumlah stok
        } else {
            return 0; // Jika roti tidak ditemukan, stok dianggap 0
        }
    }
    
    function recalculate_stok($id_roti) {
        $this->db->select('SUM(jumlah_masuk) as total_masuk');
        $this->db->where('id_roti', $id_roti);
        $masuk = $this->db->get('barang_masuk')->row()->total_masuk;

        $this->db->select('SUM(jumlah_keluar) as total_keluar');
        $this->db->where('id_roti', $id_roti);
        $keluar = $this->db->get('barang_keluar')->row()->total_keluar;

        $stok_baru = ($masuk ?: 0) - ($keluar ?: 0);

        $this->db->set('stok', $stok_baru);
        $this->db->where('id_roti', $id_roti);
        $this->db->update('data_roti');
    }
}
?>
