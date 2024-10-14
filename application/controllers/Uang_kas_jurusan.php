<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_kas_jurusan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('operator_fakultas_m', 'operator_fakultas');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('user_m', 'user');
        $this->load->model('barang_m', 'barang');
        $this->load->model('barang_rusak_m', 'barang_rusak');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('uang_kas_jurusan_m', 'uang_kas_jurusan');

        // check_operator_fakultas_Hukum();
        check_operator_jurusan();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Uang Kas Jurusan';
        $data['uang_kas_jurusan'] = $this->uang_kas_jurusan->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_jurusan/index.php', $data);
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
            $this->load->view('uang_kas_jurusan/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_jurusan->tambah();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_jurusan');
        }
    }
    public function edit()
    {
        $data['title'] = 'Uang Kas Fakultas';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['uang_kas_jurusan'] = $this->uang_kas_jurusan->get()->row_array();

        $this->form_validation->set_rules('user','Masukan Nama Operator','required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
                $this->load->view('uang_kas_jurusan/edit.php', $data);
            $this->load->view('template/footer');
        } else {
            
        }
    }

    public function proses_edit()
    {
        $this->uang_kas_jurusan->edit();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('uang_kas_jurusan');
    }
    public function hapus($id)
    {
        $this->uang_kas_jurusan->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_jurusan');
    }

    public function uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk';
        $data['uang_kas_masuk'] = $this->uang_kas_jurusan->uang_kas_masuk()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_jurusan/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_uang_kas_masuk()
    {
        $data['title'] = 'Uang Kas Masuk';
        $data['uang'] = $this->uang_kas_jurusan->get()->row_array();
        $data['user'] = $this->auth->user()->row_array();
        $this->form_validation->set_rules('nama_donator','Masukan Nama Donator','required|trim');
        $this->form_validation->set_rules('gelar','Masukan Gelar Donator','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_jurusan/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_jurusan->tambah_uang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_jurusan/uang_kas_masuk');
        }
    }
    public function hapus_uang_kas_masuk($id)
    {
        $this->uang_kas_jurusan->hapus_uang_kas_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_jurusan/uang_kas_masuk');
    }

     public function uang_kas_keluar()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['uang_kas_keluar'] = $this->uang_kas_jurusan->uang_kas_keluar()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_jurusan/index.php', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
     public function tambah_uang_kas_keluar()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['uang'] = $this->uang_kas_jurusan->get()->row_array();

        $data['rusak'] = $this->barang_rusak->get()->result_array();
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('nama_perbaiki','Masukan Nama Perbaiki','required|trim');
        $this->form_validation->set_rules('pembayaran','Masukan Jumlah Uang Pembayaran','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_jurusan/tambah.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_jurusan->tambah_uang_kas_keluar();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_jurusan/uang_kas_keluar');
        }
    }

    public function hapus_uang_kas_keluar($id)
    {
        $this->uang_kas_jurusan->hapus_uang_kas_keluar($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('uang_kas_jurusan/uang_kas_keluar');
    }

    public function uang_kas_keluar_barang()
    {
        $data['title'] = 'Uang Kas Transaksi Barang';
        $data['uang_kas_transaksi_barang'] = $this->uang_kas_jurusan->uang_kas_transaksi_barang()->result_array();
        // var_dump($data['uang_kas_transaksi_barang']);
        // die;

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_jurusan/transaksi_barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_jurusan->tambah_uang_kas_keluar();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_jurusan/uang_kas_keluar');
        }
    }

    public function tambah_uang_transaksi_barang()
    {
        $data['title'] = 'Uang Kas Keluar';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['uang'] = $this->uang_kas_jurusan->get()->row_array();

        $data['barang'] = $this->barang->get()->result_array();
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('jumlah_uang_kas_masuk','Masukan Jumlah Uang Kas','required|trim');
        $this->form_validation->set_rules('nama_perbaiki','Masukan Nama Perbaiki','required|trim');
        $this->form_validation->set_rules('pembayaran','Masukan Jumlah Uang Pembayaran','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_jurusan/tambah_transaksi_barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->uang_kas_jurusan->tambah_transaksi_barang();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('uang_kas_jurusan/uang_kas_keluar_barang');
        }
    }

    public function uang_kas_jurusan()
    {
        $data['title'] = 'Uang Kas Jurusan';
        
       
            $data['uang_kas_jurusan'] = $this->uang_kas_jurusan->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_jurusan/uang_kas_jurusan.php', $data);
            $this->load->view('template/footer');
        } else {

        }
    }

    public function laporan_uang_kas_jurusan()
    {
        $this->load->library('Mypdf');

        $data['uang_kas_jurusan'] = $this->uang_kas_jurusan->get()->result_array();
        $this->mypdf->generate('laporan_uang_kas_jurusan/uang_kas_jurusan', $data);
    }

    
    function select_total_barang()
    {
        if ($this->input->post('total_id')) {
            echo $this->select->select_total_barang($this->input->post('total_id'));
        }
    }
    public function select_barang_rusak_uang()
    {
        if ($this->input->post('uang_id')) {
            echo $this->select->select_barang_rusak_uang($this->input->post('uang_id'));
        }
    }

    public function uang_kas_masuk_jurusan()
    {
        $data['title'] = 'Uang Kas Masuk Jurusan';

            $data['uang_kas_masuK_jurusan']   = $this->uang_kas_jurusan->uang_kas_masuk()->result_array();
            
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_jurusan/uang_kas_masuk_jurusan.php', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function filter_uang_kas_masuk_jurusan()
    {
        $data['title'] = 'Uang Kas Masuk Jurusan';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['uang_kas_masuK_jurusan']   = $this->uang_kas_jurusan->filter_uang_kas_masuk_jurusan()->result_array();
            
        }else{
            $data['uang_kas_masuK_jurusan'] = $this->uang_kas_jurusan->filter_uang_kas_masuk_jurusan()->result_array();

        }
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_masuk_jurusan/uang_kas_masuk_jurusan.php', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function laporan_filter_uang_kas_masuk_jurusan()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['uang_kas_masuk']   = $this->uang_kas_jurusan->filter_uang_kas_masuk_jurusan()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['uang_kas_masuk']   = $this->uang_kas_jurusan->filter_uang_kas_masuk_jurusan()->result_array();
        }
        
        $this->mypdf->generate('laporan_uang_kas_masuk_jurusan/uang_kas_masuk_jurusan', $data);
    }
    public function laporan_filter_semua_uang_kas_masuk_jurusan()
    {
        $this->load->library('Mypdf');
        $data['uang_kas_masuK_jurusan']   = $this->uang_kas_jurusan->uang_kas_masuk()->result_array();
        $this->mypdf->generate('laporan_uang_kas_masuk_jurusan/semua_uang_kas_masuk_jurusan', $data);
    }

    public function uang_kas_pembayaran_barang()
    {
        $data['title'] = 'Uang Kas Pembayaran Barang';

            $data['uang_kas_transaksi_barang']   = $this->uang_kas_jurusan->uang_kas_transaksi_barang()->result_array();
            
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('uang_kas_keluar_jurusan/uang_kas_pembayaran_barang.php', $data);
            $this->load->view('template/footer');
        } else {

        }
    }

    public function laporan_filter_semua_uang_kas_transaksi_barang()
    {
         $this->load->library('Mypdf');

        $data['uang_kas_transaksi_barang'] =$this->uang_kas_jurusan->uang_kas_transaksi_barang()->result_array();
        $this->mypdf->generate('laporan_uang_kas_transaksi_barang/semua_uang_kas_transaksi_barang', $data);
    }
}