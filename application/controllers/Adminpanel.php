<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index() {
        $this->load->view('admin/login'); // Tampilkan halaman login
    }

    public function dashboard() {
        // Cek apakah pengguna sudah login
        if (empty($this->session->userdata('id_pengguna'))) {
            redirect('adminpanel');
        }

        // Ambil id_pengguna dari session
        $id_pengguna = $this->session->userdata('id_pengguna');

        // Ambil data transaksi pengguna
        $data['pengguna'] = $this->session->userdata(); // Informasi pengguna login

        $data['data_roti_count'] = count($this->Madmin->get_data_roti($id_pengguna));
        $data['bahan_baku_count'] = count($this->Madmin->get_bahan_baku($id_pengguna));

        // Muat tampilan dashboard
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function login() {
        $u = $this->input->post('username');
        $p = sha1($this->input->post('password'));

        // Cek login
        $query = $this->Madmin->cek_login($u, $p);

        if ($query->num_rows() > 0) {
            $user_data = $query->row();

            // Proses login dan arahkan ke dashboard
            $data_session = array(
                'id_pengguna' => $user_data->id_pengguna,
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('adminpanel/dashboard');
        } else {
            // Jika login gagal, redirect ke halaman login
            redirect('adminpanel');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }

    public function tampilan1(){
		$this->load->view('admin/layout2/header');
		$this->load->view('admin/tampilan1');

	}

	public function tampilan2(){
		$this->load->view('landing_page');
	}
}
