<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mprofil extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('pengguna'); // Asumsikan tabelnya bernama 'pengguna'
        return $query->row_array(); // Mengembalikan satu baris data sebagai array
    }

    public function update_user($username, $data) {
        $this->db->where('username', $username);
        return $this->db->update('pengguna', $data); // Mengupdate data di tabel 'pengguna'
    }
}
