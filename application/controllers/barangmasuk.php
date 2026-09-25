    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class barangmasuk extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('Mbarangmasuk');
            $this->load->model('Mdataroti');
        }

        public function masuk() {
            $id_pengguna = $this->session->userdata('id_pengguna');
            if (!$id_pengguna) {
                redirect('adminpanel/login');
            }

            $this->db->select('barang_masuk.*, data_roti.nama_roti');
            $this->db->from('barang_masuk');
            $this->db->join('data_roti', 'data_roti.id_roti = barang_masuk.id_roti');
            $this->db->where('barang_masuk.id_pengguna', $id_pengguna);
            $query = $this->db->get();

            $data['barang_masuk'] = $query->result_array();
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/barang/tampil_masuk', $data);
            $this->load->view('admin/layout/footer');
        }

        public function tambah_barangmasuk() {
            $id_pengguna = $this->session->userdata('id_pengguna');
            if (!$id_pengguna) {
                redirect('adminpanel/login');
            }

            $inputan = $this->input->post();
            if ($inputan) {
                // Validasi input
                if (empty($inputan['id_roti']) || empty($inputan['jumlah_masuk']) || empty($inputan['tanggal_masuk'])) {
                    $this->session->set_flashdata('error', 'Semua field wajib diisi!');
                    redirect('barangmasuk/tambah_barangmasuk', 'refresh');
                } else {
                    $inputan['id_pengguna'] = $id_pengguna;
                    // Menyimpan data barang masuk
                    $result = $this->Mbarangmasuk->simpan_barangmasuk($inputan);
                    if ($result) {
                        // Mengirim flash message success
                        $this->session->set_flashdata('success', 'Barang masuk berhasil ditambahkan!');
                        redirect('barangmasuk/masuk', 'refresh');
                    } else {
                        // Mengirim flash message error
                        $this->session->set_flashdata('error', 'Gagal menambah data barang masuk!');
                        redirect('barangmasuk/tambah_barangmasuk', 'refresh');
                    }
                }
            }

            $data['dataroti'] = $this->Mdataroti->tampil($id_pengguna);
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/barang/tambah_barangmasuk', $data);
            $this->load->view('admin/layout/footer');
        }

        public function edit_barangmasuk($id_barang_masuk) {
            $id_pengguna = $this->session->userdata('id_pengguna');
            if (!$id_pengguna) {
                redirect('adminpanel/login');
            }

            $data['barang_masuk'] = $this->Mbarangmasuk->detail_barangmasuk($id_barang_masuk, $id_pengguna);
            if (empty($data['barang_masuk'])) {
                show_error('Data tidak ditemukan atau Anda tidak memiliki akses ke data ini.', 403, 'Akses Ditolak');
            }

            $data['dataroti'] = $this->Mdataroti->tampil($id_pengguna);
            $inputan = $this->input->post();

            if ($inputan) {
                $inputan['id_pengguna'] = $id_pengguna;
                $result = $this->Mbarangmasuk->ubah_barangmasuk($inputan, $id_barang_masuk);
                if ($result) {
                    $this->session->set_flashdata('success', 'Barang masuk berhasil diedit!');
                    redirect('barangmasuk/masuk', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui data barang masuk!');
                    redirect('barangmasuk/edit_barangmasuk/'.$id_barang_masuk, 'refresh');
                }
            }

            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/barang/edit_barangmasuk', $data);
            $this->load->view('admin/layout/footer');
        }

        public function hapus_barangmasuk($id_barang_masuk) {
            $id_pengguna = $this->session->userdata('id_pengguna');
            if (!$id_pengguna) redirect('adminpanel/login');

            $barang_masuk = $this->Mbarangmasuk->get_barangmasuk_by_id($id_barang_masuk, $id_pengguna);
            if ($barang_masuk) {
                $this->Mbarangmasuk->hapus_barangmasuk($id_barang_masuk);
                $this->Mdataroti->recalculate_stok($barang_masuk['id_roti']);

                $this->session->set_flashdata('success', 'Barang masuk berhasil dihapus!');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            }

            redirect('barangmasuk/masuk', 'refresh');
        }
    }
