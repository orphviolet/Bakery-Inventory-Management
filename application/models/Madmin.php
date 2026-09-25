<?php

class Madmin extends CI_Model {

    public function cek_login($u, $p) {
        // Jalankan query untuk mencari pengguna
        $q = $this->db->get_where('pengguna', array('username' => $u, 'password' => $p));

        // Jika ditemukan, simpan ke session
        if ($q->num_rows() > 0) {
            $cekpengguna = $q->row_array();
            $this->session->set_userdata("id_pengguna", $cekpengguna["id_pengguna"]);
            $this->session->set_userdata("nama", $cekpengguna["nama"]);
            $this->session->set_userdata("email", $cekpengguna["email"]);
            $this->session->set_userdata("username", $cekpengguna["username"]);
            $this->session->set_userdata("alamat", $cekpengguna["alamat"]);
        }

        return $q; // Mengembalikan objek query
    }

    public function get_data_roti($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $query = $this->db->get('data_roti');
        return $query->result_array();
    }

    public function get_bahan_baku($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $query = $this->db->get('bahan_baku');
        return $query->result_array();
    }

    public function get_pengguna() {
        $query = $this->db->get('pengguna');
        return $query->result_array();
    }
}
