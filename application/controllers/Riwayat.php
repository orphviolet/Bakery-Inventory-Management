<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata("id_pengguna")) {
            redirect('/', 'refresh');
        }
        $this->load->model('Mriwayat');
    }

    public function riwayatmk($id_roti) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil ID pengguna dari session

        if (!$id_pengguna) {
            redirect('adminpanel/login'); // Redirect jika tidak ada session login
        }

        // Load model
        $this->load->model('Mriwayat');

        // Ambil riwayat barang masuk dan keluar dari model
        $riwayat_masuk = $this->Mriwayat->get_riwayat_masuk($id_roti, $id_pengguna);
        $riwayat_keluar = $this->Mriwayat->get_riwayat_keluar($id_roti, $id_pengguna);

        // Ambil informasi roti dan stok terkini dari tabel data_roti
        $roti = $this->db->get_where('data_roti', ['id_roti' => $id_roti])->row_array();
        $stok_roti = $roti['stok'];  // Mengambil stok yang ada di tabel data_roti

        // Kirim data ke view
        $data = [
            'riwayat_masuk' => $riwayat_masuk,
            'riwayat_keluar' => $riwayat_keluar,
            'roti' => $roti,
            'stok_roti' => $stok_roti
        ];

        // Load view untuk riwayat roti
        $this->load->view('admin/layout/header'); // Layout header
        $this->load->view('admin/layout/menu'); // Layout sidebar
        $this->load->view('admin/riwayat/riwayat_roti', $data); // Tampilan riwayat roti
        $this->load->view('admin/layout/footer'); // Layout footer
    }
}
