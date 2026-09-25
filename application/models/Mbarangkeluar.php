<?php

class Mbarangkeluar extends CI_Model {

    function tampil_barangkeluar($id_pengguna) {
        // Filter data berdasarkan id_pengguna
        $this->db->where('id_pengguna', $id_pengguna);
        $q = $this->db->get('barang_keluar');
        return $q->result_array();
    }

    function simpan_barangkeluar($inputan) {
        // Validasi stok roti sebelum disimpan
        $id_roti = $inputan['id_roti'];
        $jumlah_keluar = $inputan['jumlah_keluar'];
        
        // Ambil stok dari tabel data_roti
        $this->db->where('id_roti', $id_roti);
        $this->db->where('id_pengguna', $inputan['id_pengguna']);
        $q = $this->db->get('data_roti');
        $roti = $q->row_array();

        if ($roti && $roti['stok'] >= $jumlah_keluar) {
            // Stok cukup, simpan data barang keluar
            $this->db->insert('barang_keluar', $inputan);

            // Update stok di tabel data_roti
            $this->db->set('stok', 'stok - ' . (int)$jumlah_keluar, FALSE);
            $this->db->where('id_roti', $id_roti);
            $this->db->update('data_roti');
            return true;
        } else {
            // Stok tidak cukup
            return false;
        }
    }

    function detail_barangkeluar($id_barang_keluar, $id_pengguna) {
        // Filter data berdasarkan id_barang_keluar dan id_pengguna
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->where('id_pengguna', $id_pengguna);
        $q = $this->db->get('barang_keluar');
        return $q->row_array();
    }

    function ubah_barangkeluar($inputan, $id_barang_keluar) {
        // Ambil data barang keluar lama sebelum di-update
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $barang_keluar_lama = $this->db->get('barang_keluar')->row();

        if ($barang_keluar_lama) {
            // Hitung selisih jumlah barang keluar
            $selisih = $inputan['jumlah_keluar'] - $barang_keluar_lama->jumlah_keluar;

            // Validasi stok setelah perubahan
            $this->db->where('id_roti', $barang_keluar_lama->id_roti);
            $q = $this->db->get('data_roti');
            $roti = $q->row_array();

            if ($roti && $roti['stok'] + $selisih >= 0) {
                // Update data barang keluar
                $this->db->where('id_barang_keluar', $id_barang_keluar);
                $this->db->update('barang_keluar', $inputan);

                // Perbarui stok barang di tabel 'data_roti'
                $this->db->set('stok', 'stok - ' . (int)$selisih, FALSE);
                $this->db->where('id_roti', $barang_keluar_lama->id_roti);
                $this->db->update('data_roti');
                
                return true; // Sukses memperbarui
            } else {
                return false; // Stok tidak mencukupi
            }
        } else {
            return false; // Jika data barang keluar tidak ditemukan
        }
    }

    function hapus_barangkeluar($id_barang_keluar) {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->delete('barang_keluar');
    }

    function get_barangkeluar_by_id($id_barang_keluar, $id_pengguna) {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('barang_keluar')->row_array();
    }

}
?>
