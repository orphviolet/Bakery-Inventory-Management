<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mbahanbaku'); 
        // Pastikan pengguna sudah login
        if (empty($this->session->userdata('id_pengguna'))) {
            redirect('adminpanel');
        }
    }

    // Menampilkan halaman data bahan baku
    public function tampil_bahanbaku() {
        // Ambil id_pengguna dari session
        $id_pengguna = $this->session->userdata('id_pengguna');
        
        // Ambil data bahan baku berdasarkan id_pengguna
        $data['bahan_baku'] = $this->Mbahanbaku->tampil_bahanbaku($id_pengguna);

        // Tampilkan view
        $this->load->view('admin/layout/header'); // Layout header
        $this->load->view('admin/layout/menu'); // Layout menu
        $this->load->view('admin/bahan/tampil', $data); // Halaman utama
        $this->load->view('admin/layout/footer'); // Layout footer
    }

    // Fungsi untuk menambah bahan baku baru
    public function tambah_bahanbaku() {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna
        $inputan = $this->input->post();

        if ($inputan) {
            // Tambahkan id_pengguna ke inputan
            $inputan['id_pengguna'] = $id_pengguna;
            $this->Mbahanbaku->simpan_bahanbaku($inputan);
            $this->session->set_flashdata('message', 'Bahan baku berhasil ditambahkan!');
            redirect('bahan/tampil_bahanbaku', 'refresh');
        }

        // Tampilkan form tambah bahan baku
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/bahan/tambah_bahanbaku'); // Form tambah bahan baku
        $this->load->view('admin/layout/footer');
    }

    // Menampilkan form edit data bahan baku
    public function edit_bahanbaku($id_bahan) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna

        // Ambil detail bahan baku berdasarkan id_pengguna dan id_bahan
        $data['bahan_baku'] = $this->Mbahanbaku->detail_bahanbaku($id_pengguna, $id_bahan);

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mbahanbaku->ubah_bahanbaku($inputan, $id_pengguna, $id_bahan);
            $this->session->set_flashdata('message', 'Bahan baku berhasil diedit!');
            redirect('bahan/tampil_bahanbaku', 'refresh');
        }

        // Tampilkan form edit bahan baku
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/bahan/edit_bahanbaku', $data); // Form edit bahan baku
        $this->load->view('admin/layout/footer');
    }

    // Menghapus data bahan baku
    public function hapus_bahanbaku($id_bahan) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna

        // Hapus data bahan baku berdasarkan id_pengguna dan id_bahan
        $this->Mbahanbaku->hapus_bahanbaku($id_pengguna, $id_bahan);
        $this->session->set_flashdata('message', 'Bahan baku berhasil dihapus!');
        redirect('bahan/tampil_bahanbaku', 'refresh');
    }
}
