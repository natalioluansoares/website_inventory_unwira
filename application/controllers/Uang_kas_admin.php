<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_kas_admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('operator_fakultas_m', 'operator_fakultas');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('user_m', 'user');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('uang_kas_admin_m', 'uang_kas_admin');
        $this->load->model('admin_m', 'admin');
        check_admin();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $data['uang_kas_admin'] = $this->uang_kas_admin->get()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_admin/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        $this->form_validation->set_rules('fakultas','Masukan Nama Fakultas','required|trim');
        $data['user'] = $this->user->result_operator_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_admin/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_admin->tambah();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_admin');
        }
    }
    public function edit()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $data['user'] = $this->user->result_operator_fakultas()->result_array();
        $data['uang_kas_admin'] = $this->uang_kas_admin->get()->row_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_admin/edit.php', $data);
            $this->load->view('template/footer');
        } else {
            
        }
    }

    public function proses_edit()
    {
        $this->uang_kas_admin->edit();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('uang_kas_admin');
    }
    public function hapus($id)
    {
        $this->uang_kas_admin->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_admin');
    }

    public function uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk Fakultas';
        $data['uang_kas_masuk'] = $this->uang_kas_admin->uang_kas_masuk()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_admin/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk';
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['user'] = $this->uang_kas_admin->get()->result_array();
        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        $this->form_validation->set_rules('jumlah_uang_masuk','Masukan Jumlah Uang Masuk','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_admin/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_admin->tambah_uang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_admin/uang_kas_masuk');
        }
    }
    public function hapus_uang_kas_masuk($id)
    {
        $this->uang_kas_admin->hapus_uang_kas_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_admin/uang_kas_masuk');
    }

}