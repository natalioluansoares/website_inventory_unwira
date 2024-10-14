<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_rusak extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('barang_rusak_m', 'barang_rusak');
        check_operator_jurusan();
        // check_already_login();
        // check_admin();
        // check_operator_sipil();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['barang_rusak'] = $this->barang_rusak->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $data['barang'] = $this->barang_rusak->getbarang()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/tambah_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
            $this->barang_rusak->insert_barang_rusak();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('barang_rusak');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Inventory Barang Rusak';
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $data['barang'] = $this->barang_rusak->getbarang()->result_array();
        $data['barangrusak'] = $this->barang_rusak->get($id)->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/edit_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function prosesbarangrusak()
    {
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $this->barang_rusak->edit_barang_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('barang_rusak');
    }

    public function deletebarangrusak($id)
    {
        $this->barang_rusak->delete($id);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('barang_rusak');
    }
    public function update_rusak()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Masukkan Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('rusak', 'Masukkan Jumlah Stok Barang Rusak', 'required|trim');
            // Koding Gambar
        $this->barang_rusak->update_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('barang_rusak');
    }

    public function sudah_bayar()
    {
        $data['title'] = 'Inventory Barang Rusak Sudah Bayar';
        $data['barang_rusak'] = $this->barang_rusak->sudah_bayar()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/sudah_bayar', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
     public function filter_sudah_bayar()
    {
        $data['title'] = 'Inventory Barang Rusak Sudah Bayar';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['barang_rusak']   = $this->barang_rusak->filter_sudah_bayar()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['barang_rusak'] = $this->barang_rusak->sudah_bayar()->result_array();
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_rusak/sudah_bayar', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_filter_sudah_bayar()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['barang_rusak']   = $this->barang_rusak->filter_sudah_bayar()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['barang_rusak']   = $this->barang_rusak->filter_sudah_bayar()->result_array();
        }
        
        $this->mypdf->generate('laporan_barang_rusak/barang_rusak_sudah_bayar', $data);
    }

    public function semua_barang_rusak_sudah_bayar()
    {
        $this->load->library('Mypdf');

        $data['barang_rusak'] = $this->barang_rusak->sudah_bayar()->result_array();
        $this->mypdf->generate('laporan_barang_rusak/semua_barang_rusak_sudah_bayar', $data);
    }
    public function belum_bayar()
    {
        $data['title'] = 'Inventory Barang Rusak Belum Bayar';
        $data['barang_rusak'] = $this->barang_rusak->belum_bayar()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/belum_bayar', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
     public function filter_belum_bayar()
    {
        $data['title'] = 'Inventory Barang Rusak Belum Bayar';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['barang_rusak']   = $this->barang_rusak->filter_belum_bayar()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['barang_rusak'] = $this->barang_rusak->belum_bayar()->result_array();
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_rusak/belum_bayar', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_filter_belum_bayar()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['barang_rusak']   = $this->barang_rusak->filter_belum_bayar()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['barang_rusak']   = $this->barang_rusak->filter_belum_bayar()->result_array();
        }
        
        $this->mypdf->generate('laporan_barang_rusak/barang_rusak_belum_bayar', $data);
    }

    public function semua_barang_rusak_belum_bayar()
    {
        $this->load->library('Mypdf');

        $data['barang_rusak'] = $this->barang_rusak->belum_bayar()->result_array();
        $this->mypdf->generate('laporan_barang_rusak/semua_barang_rusak_belum_bayar', $data);
    }
    public function proses_perbaiki()
    {
        $data['title'] = 'Inventory Barang Rusak Proses Perbaiki';
        $data['barang_rusak'] = $this->barang_rusak->proses_perbaiki()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_rusak/proses_perbaiki', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
     public function filter_proses_perbaiki()
    {
        $data['title'] = 'Inventory Barang Rusak Prose Perbaiki';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['barang_rusak']   = $this->barang_rusak->filter_proses_perbaiki()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['barang_rusak'] = $this->barang_rusak->proses_perbaiki()->result_array();
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_rusak/proses_perbaiki', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_filter_proses_perbaiki()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['barang_rusak']   = $this->barang_rusak->filter_proses_perbaiki()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['barang_rusak']   = $this->barang_rusak->filter_proses_perbaiki()->result_array();
        }
        
        $this->mypdf->generate('laporan_barang_rusak/barang_rusak_proses_perbaiki', $data);
    }

    public function semua_barang_rusak_proses_perbaiki()
    {
        $this->load->library('Mypdf');

        $data['barang_rusak'] = $this->barang_rusak->proses_perbaiki()->result_array();
        $this->mypdf->generate('laporan_barang_rusak/semua_barang_rusak_proses_perbaiki', $data);
    }
}