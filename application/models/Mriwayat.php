<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mriwayat extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil riwayat barang masuk berdasarkan id roti dan id pengguna
    public function get_riwayat_masuk($id_roti, $id_pengguna) {
        $this->db->select('tanggal_masuk, jumlah_masuk');
        $this->db->from('barang_masuk');
        $this->db->where('id_roti', $id_roti);
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->order_by('tanggal_masuk', 'ASC'); // Urutkan berdasarkan tanggal masuk
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mengambil riwayat barang keluar berdasarkan id roti dan id pengguna
    public function get_riwayat_keluar($id_roti, $id_pengguna) {
        $this->db->select('tanggal_keluar, jumlah_keluar');
        $this->db->from('barang_keluar');
        $this->db->where('id_roti', $id_roti);
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->order_by('tanggal_keluar', 'ASC'); // Urutkan berdasarkan tanggal keluar
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan stok roti terkini berdasarkan id roti
    public function get_stok_roti($id_roti) {
        // Mengambil stok roti saat ini dari data_roti
        $this->db->select('stok');
        $this->db->from('data_roti');
        $this->db->where('id_roti', $id_roti);
        $query = $this->db->get();
        $result = $query->row_array();
        return isset($result['stok']) ? $result['stok'] : 0;
    }
}
