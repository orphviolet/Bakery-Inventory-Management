<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mregister'); // Load model Mregister
        $this->load->library('form_validation'); // Load library form_validation
        $this->lang->load('form_validation', 'indonesian');
        $this->lang->load('db', 'indonesian');
    }

    public function index() {
        // Menampilkan view form registrasi
        $this->load->view('adminpanel/tampilan1'); // Pastikan file view ada di folder admin
    }

    public function submit() {
        // Validasi input dari form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna.email]');
        $this->form_validation->set_rules('nomor_hp', 'Telepon', 'required|numeric');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pengguna.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, simpan data form dan pesan error di session
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('form_data', $this->input->post());
            redirect('adminpanel/tampilan1'); // Redirect kembali ke form
        } else {
            // Jika validasi berhasil, ambil data dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('password')), // Password menggunakan SHA-1
                'alamat' => $this->input->post('alamat'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'username' => $this->input->post('username')
            ];

            // Simpan data ke database menggunakan model
            if ($this->Mregister->insert_user($data)) {
                // Jika berhasil, tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Registrasi berhasil!');
                redirect('adminpanel/tampilan1'); // Redirect ke form setelah registrasi sukses
            } else {
                // Jika gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data. Coba lagi.');
                redirect('adminpanel/tampilan1'); // Redirect ke form jika gagal
            }
        }
    }
}
