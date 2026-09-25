<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mbarangkeluar');
        $this->load->model('Mdataroti');
    }

    public function keluar() {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil ID pengguna dari session

        if (!$id_pengguna) {
            redirect('adminpanel/login'); // Redirect jika tidak ada session login
        }

        $this->db->select('barang_keluar.*, data_roti.nama_roti'); // Pilih semua kolom dari barang_keluar dan nama_roti dari data_roti
        $this->db->from('barang_keluar');
        $this->db->join('data_roti', 'data_roti.id_roti = barang_keluar.id_roti'); // Join dengan tabel data_roti
        $this->db->where('barang_keluar.id_pengguna', $id_pengguna); // Filter berdasarkan id_pengguna
        $query = $this->db->get();

        $data['barang_keluar'] = $query->result_array(); // Ambil hasil query 

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/barang/tampil_keluar', $data); // Halaman utama  
        $this->load->view('admin/layout/footer');
    }

    public function tambah_barangkeluar() {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil ID pengguna dari session

        if (!$id_pengguna) {
            redirect('adminpanel/login'); // Redirect jika tidak ada session login
        }

        $inputan = $this->input->post();

        if ($inputan) {
            if (empty($inputan['id_roti']) || empty($inputan['jumlah_keluar']) || empty($inputan['tanggal_keluar'])) {
                $this->session->set_flashdata('error', 'Semua field wajib diisi!');
                redirect('barangkeluar/tambah_barangkeluar', 'refresh');
            } else {
                // Tambahkan ID pengguna ke data inputan
                $inputan['id_pengguna'] = $id_pengguna;

                // Simpan barang keluar dan update stok roti
                $result = $this->Mbarangkeluar->simpan_barangkeluar($inputan);

                if ($result) {
                    $this->session->set_flashdata('success', 'Barang keluar berhasil ditambahkan!');
                    redirect('barangkeluar/keluar', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Stok tidak mencukupi untuk melakukan pengeluaran!');
                    redirect('barangkeluar/tambah_barangkeluar', 'refresh');
                }
            }
        }

        $data['dataroti'] = $this->Mdataroti->tampil($id_pengguna); // Hanya data roti milik pengguna ini

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/barang/tambah_barangkeluar', $data); // Form tambah 
        $this->load->view('admin/layout/footer');
    }

    public function edit_barangkeluar($id_barang_keluar) {
        $id_pengguna = $this->session->userdata('id_pengguna'); // Ambil ID pengguna dari session

        if (!$id_pengguna) {
            redirect('adminpanel/login'); // Redirect jika tidak ada session login
        }

        // Ambil detail barang keluar lama, pastikan berdasarkan ID pengguna
        $data['barang_keluar'] = $this->Mbarangkeluar->detail_barangkeluar($id_barang_keluar, $id_pengguna);

        if (empty($data['barang_keluar'])) {
            show_error('Data tidak ditemukan atau Anda tidak memiliki akses ke data ini.', 403, 'Akses Ditolak');
        }

        // Ambil data roti yang sesuai dengan pengguna
        $data['dataroti'] = $this->Mdataroti->tampil($id_pengguna);

        $inputan = $this->input->post();

        if ($inputan) {
            // Pastikan ID pengguna tetap
            $inputan['id_pengguna'] = $id_pengguna;

            // Update barang keluar dan stok
            $result = $this->Mbarangkeluar->ubah_barangkeluar($inputan, $id_barang_keluar);

            if ($result) {
                $this->session->set_flashdata('success', 'Barang keluar berhasil diedit!');
                redirect('barangkeluar/keluar', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Stok tidak mencukupi untuk melakukan perubahan!');
                redirect('barangkeluar/edit_barangkeluar/'.$id_barang_keluar, 'refresh');
            }
        }

        // Load view untuk form edit
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/barang/edit_barangkeluar', $data);
        $this->load->view('admin/layout/footer');
    }

    public function hapus_barangkeluar($id_barang_keluar) {
        $id_pengguna = $this->session->userdata('id_pengguna');
        if (!$id_pengguna) redirect('adminpanel/login');

        $barang_keluar = $this->Mbarangkeluar->get_barangkeluar_by_id($id_barang_keluar, $id_pengguna);
        if ($barang_keluar) {
            $this->Mbarangkeluar->hapus_barangkeluar($id_barang_keluar);
            $this->Mdataroti->recalculate_stok($barang_keluar['id_roti']);

            $this->session->set_flashdata('success', 'Barang keluar berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
        }

        redirect('barangkeluar/keluar', 'refresh');
    }

}
?>
