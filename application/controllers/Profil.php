<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Madmin'); 
        $this->load->model('Mprofil'); 
    }

    // Function to display the profile page
    public function tampil_profil() {
        $username = $this->session->userdata('username');
        $data['user'] = $this->Mprofil->get_user_by_username($username); // Mengambil data pengguna

        // Mengatur session dengan data nama pengguna
        $this->session->set_userdata('nama', $data['user']['nama']); // Menyimpan nama pengguna ke session

        // Memuat tampilan
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/profil/tampil_profil', $data);
        $this->load->view('admin/layout/footer');
    }

    // Function to display the edit profile form
    public function edit_profil() {
        $username = $this->session->userdata('username');
        $data['user'] = $this->Mprofil->get_user_by_username($username);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/profil/edit_profil', $data);
        $this->load->view('admin/layout/footer');
    }

    // Function to handle profile updates
    public function update_profil() {
        $username = $this->session->userdata('username');

        // Get data from the form
        $new_nama = $this->input->post('nama');
        $new_username = $this->input->post('username');

        // Data to update
        $data_to_update = [
            'nama' => $new_nama,
            'username' => $new_username
        ];

        // Update user data
        $this->Mprofil->update_user($username, $data_to_update);

        // Update session data with the new username
        $this->session->set_userdata('username', $new_username);

        // Redirect to the profile display page
        redirect('profil/tampil_profil');
    }
}
