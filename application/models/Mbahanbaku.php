<?php

class Mbahanbaku extends CI_Model {

    // Menampilkan data bahan baku berdasarkan id_pengguna
    function tampil_bahanbaku($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna); // Filter berdasarkan id_pengguna
        $q = $this->db->get('bahan_baku');
        return $q->result_array(); // Mengembalikan array data
    }

    // Menyimpan data bahan baku untuk pengguna tertentu
    function simpan_bahanbaku($inputan) {
        $this->db->insert('bahan_baku', $inputan); // Simpan data langsung
    }

    // Mengambil detail bahan baku berdasarkan id_bahan dan id_pengguna
    function detail_bahanbaku($id_pengguna, $id_bahan) {
        $this->db->where('id_pengguna', $id_pengguna); // Filter berdasarkan id_pengguna
        $this->db->where('id_bahan', $id_bahan); // Filter berdasarkan id_bahan
        $q = $this->db->get('bahan_baku');
        return $q->row_array(); // Mengembalikan satu baris data
    }

    // Mengubah data bahan baku
    function ubah_bahanbaku($inputan, $id_pengguna, $id_bahan) {
        $this->db->where('id_pengguna', $id_pengguna); // Filter berdasarkan id_pengguna
        $this->db->where('id_bahan', $id_bahan); // Filter berdasarkan id_bahan
        $this->db->update('bahan_baku', $inputan); // Update data
    }

    // Menghapus data bahan baku
    function hapus_bahanbaku($id_pengguna, $id_bahan) {
        $this->db->where('id_pengguna', $id_pengguna); // Filter berdasarkan id_pengguna
        $this->db->where('id_bahan', $id_bahan); // Filter berdasarkan id_bahan
        $this->db->delete('bahan_baku'); // Hapus data
    }
}	