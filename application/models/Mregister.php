<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mregister extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database
    }

    public function insert_user($data) {
        // Simpan data ke tabel 'pengguna'
        return $this->db->insert('pengguna', $data);
    }
}