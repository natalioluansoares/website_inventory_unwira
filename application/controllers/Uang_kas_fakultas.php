<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_kas_fakultas extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('operator_fakultas_m', 'operator_fakultas');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('user_m', 'user');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('uang_kas_fakultas_m', 'uang_kas_fakultas');

        // check_operator_fakultas_Hukum();
        check_operator_fakultas();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $data['uang_kas_fakultas'] = $this->uang_kas_fakultas->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_fakultas/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_fakultas/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_fakultas->tambah();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_fakultas');
        }
    }
    public function edit()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['uang_kas_fakultas'] = $this->uang_kas_fakultas->get()->row_array();

        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
                $this->load->view('uang_kas_fakultas/edit.php', $data);
            $this->load->view('template/footer');
        } else {
            
        }
    }

    public function proses_edit()
    {
        $this->uang_kas_fakultas->edit();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('uang_kas_fakultas');
    }
    public function hapus($id)
    {
        $this->uang_kas_fakultas->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_fakultas');
    }

    public function uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk';
        $data['uang_kas_masuk'] = $this->uang_kas_fakultas->uang_kas_masuk()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_fakultas/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk';
        // $data['uang_kas_masuk'] = $this->uang_kas_fakultas->uang_kas_masuk()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $this->form_validation->set_rules('nama_donator','Masukan Nama Donator','required|trim');
        $this->form_validation->set_rules('gelar','Masukan Gelar Donator','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_fakultas/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_fakultas->tambah_uang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_fakultas/uang_kas_masuk');
        }
    }
    public function hapus_uang_kas_masuk($id)
    {
        $this->uang_kas_fakultas->hapus_uang_kas_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_fakultas/uang_kas_masuk');
    }

     public function uang_kas_keluar()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['uang_kas_keluar'] = $this->uang_kas_fakultas->uang_kas_keluar()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_fakultas/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
     public function tambah_uang_kas_keluar()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('nama_perbaiki','Masukan Nama Perbaiki','required|trim');
        $this->form_validation->set_rules('pembayaran','Masukan Jumlah Uang Pembayaran','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_fakultas/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_fakultas->tambah_uang_kas_keluar();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_fakultas/uang_kas_keluar');
        }
    }

    public function hapus_uang_kas_keluar($id)
    {
        $this->uang_kas_fakultas->hapus_uang_kas_keluar($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_fakultas/uang_kas_keluar');
    }

    public function uang_kas_keluar_barang()
    {
        $data['title'] = 'Uang Kas Transaksi Barang';
        $data['uang_kas_transaksi_barang'] = $this->uang_kas_fakultas->uang_kas_transaksi_barang()->result_array();
        // var_dump($data['uang_kas_transaksi_barang']);
        // die;

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_fakultas/transaksi_barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_fakultas->tambah_uang_kas_keluar();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_fakultas/uang_kas_keluar');
        }
    }

    public function tambah_uang_transaksi_barang()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('nama_perbaiki','Masukan Nama Perbaiki','required|trim');
        $this->form_validation->set_rules('pembayaran','Masukan Jumlah Uang Pembayaran','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_fakultas/tambah_transaksi_barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_fakultas->tambah_transaksi_barang();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_fakultas/uang_kas_keluar_barang');
        }
    }

    function uang_kas_fakultas()
    {
        if ($this->input->post('fakultas_id')) {
            echo $this->select->uang_kas_fakultas($this->input->post('fakultas_id'));
        }
    }
    function select_user()
    {
        if ($this->input->post('jurusan_id')) {
            echo $this->select->uang_kas_operator($this->input->post('jurusan_id'));
        }
    }
    function select_barang()
    {
        if ($this->input->post('barang_id')) {
            echo $this->select->select_barang($this->input->post('barang_id'));
        }
    }
    function select_total_barang()
    {
        if ($this->input->post('total_id')) {
            echo $this->select->select_total_barang($this->input->post('total_id'));
        }
    }
    function select_uang_kas_masuk()
    {
        if ($this->input->post('donator_id')) {
            echo $this->select->select_uang_kas_masuk($this->input->post('donator_id'));
        }
    }
    public function select_barang_rusak()
    {
        if ($this->input->post('rusak_id')) {
            echo $this->select->select_barang_rusak($this->input->post('rusak_id'));
        }
    }
    public function select_barang_rusak_uang()
    {
        if ($this->input->post('uang_id')) {
            echo $this->select->select_barang_rusak_uang($this->input->post('uang_id'));
        }
    }
}