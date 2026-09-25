<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataroti extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata("id_pengguna")) {
            redirect('/', 'refresh');
        }
        $this->load->model('Mdataroti');
    }

    // Menampilkan halaman data roti
    public function index() {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna dari session
        $data['data_roti'] = $this->Mdataroti->tampil($id_pengguna); // Mengambil data roti milik pengguna
        $this->load->view('admin/layout/header'); // Layout header
        $this->load->view('admin/layout/menu'); // Layout sidebar
        $this->load->view('admin/dataroti/tampil', $data); // Halaman utama Data Roti
        $this->load->view('admin/layout/footer'); // Layout footer
    }

    // Fungsi untuk menambah roti baru
    public function tambah_roti() {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna dari session
        $inputan = $this->input->post();

        if ($inputan) {
            // Tambahkan id_pengguna ke data inputan
            $inputan['id_pengguna'] = $id_pengguna;
            $this->Mdataroti->simpan($inputan); // Simpan data roti baru
            $this->session->set_flashdata('message', 'Roti berhasil ditambahkan!');
            redirect('dataroti', 'refresh');
        }

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dataroti/formAdd'); // Form tambah roti
        $this->load->view('admin/layout/footer');
    }

    // Menampilkan form edit data roti
    public function edit_dataroti($id_roti) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna dari session
        $data['data_roti'] = $this->Mdataroti->detail($id_pengguna, $id_roti); // Ambil data roti milik pengguna

        // Jika data roti tidak ditemukan, arahkan kembali ke halaman utama
        if (empty($data['data_roti'])) {
            redirect('dataroti', 'refresh');
        }

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mdataroti->ubah($inputan, $id_pengguna, $id_roti); // Perbarui data roti
            $this->session->set_flashdata('message', 'Roti berhasil diedit!');
            redirect('dataroti', 'refresh');
        }

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dataroti/formEdit', $data); // Form edit roti
        $this->load->view('admin/layout/footer');
    }

    // Menghapus data roti
    public function hapus_dataroti($id_roti) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil id_pengguna dari session
        $this->Mdataroti->hapus_dataroti($id_pengguna, $id_roti); // Hapus data roti milik pengguna
        $this->session->set_flashdata('message', 'Roti berhasil dihapus!');
        redirect('dataroti', 'refresh');
    }
}
