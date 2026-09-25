<?php
class Mbarangmasuk extends CI_Model {

    function tampil_barangmasuk($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $q = $this->db->get('barang_masuk');
        return $q->result_array();
    }

    function simpan_barangmasuk($inputan) {
        // Mulai transaksi
        $this->db->trans_start();

        // Simpan data barang masuk
        $this->db->insert('barang_masuk', $inputan);
        
        // Ambil id_roti dan jumlah_masuk dari inputan
        $id_roti = $inputan['id_roti'];
        $jumlah_masuk = $inputan['jumlah_masuk'];

        // Update stok di tabel data_roti
        $this->db->set('stok', 'stok + ' . (int)$jumlah_masuk, FALSE);
        $this->db->where('id_roti', $id_roti);
        $this->db->update('data_roti');

        // Selesaikan transaksi
        $this->db->trans_complete();

        // Jika transaksi gagal, return false
        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        return true;
    }

    function detail_barangmasuk($id_barang_masuk, $id_pengguna) {
        // Ambil data barang masuk berdasarkan id_barang_masuk dan id_pengguna
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->where('id_pengguna', $id_pengguna);
        $query = $this->db->get('barang_masuk');

        // Kembalikan hasil query sebagai objek atau array
        return $query->row_array();
    }

    function ubah_barangmasuk($inputan, $id_barang_masuk) {
        // Ambil data barang masuk lama sebelum di-update
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $barang_masuk_lama = $this->db->get('barang_masuk')->row();

        if ($barang_masuk_lama) {
            // Hitung selisih jumlah barang masuk
            $selisih = $inputan['jumlah_masuk'] - $barang_masuk_lama->jumlah_masuk;

            // Mulai transaksi
            $this->db->trans_start();

            // Update data barang masuk
            $this->db->where('id_barang_masuk', $id_barang_masuk);
            $this->db->update('barang_masuk', $inputan);

            // Perbarui stok barang di tabel 'data_roti'
            $this->db->set('stok', "stok + ($selisih)", FALSE);
            $this->db->where('id_roti', $barang_masuk_lama->id_roti);
            $this->db->update('data_roti');

            // Selesaikan transaksi
            $this->db->trans_complete();

            // Jika transaksi gagal, return false
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true; // Sukses memperbarui
        } else {
            return false; // Jika data barang masuk tidak ditemukan
        }
    }

    function hapus_barangmasuk($id_barang_masuk) {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->delete('barang_masuk');
    }

    function get_barangmasuk_by_id($id_barang_masuk, $id_pengguna) {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('barang_masuk')->row_array();
    }
}
?>
