<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_pinjaman extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('barang_pinjaman_m', 'barang_pinjaman');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('peminjam_m', 'peminjam');
        check_operator_jurusan();
        // check_already_login();
        // check_admin();
        // check_operator_sipil();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Inventory Barang Pinjaman';
        $data['barang_pinjaman'] = $this->barang_pinjaman->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_pinjaman/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data Barang Pinjaman';

        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');
        $data['barang'] = $this->barang_pinjaman->getbarangpinjaman()->result_array();
        $data['peminjam'] = $this->peminjam->aktif()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_pinjaman/tambah_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
            $this->barang_pinjaman->insert_pinjaman();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('barang_pinjaman');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Update Data Inventory Barang Pinjaman';
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');
        $data['pinjaman'] = $this->barang_pinjaman->get($id)->row_array();
        $data['peminjam'] = $this->peminjam->aktif()->result_array();
        $data['barang'] = $this->barang_pinjaman->getbarangpinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_pinjaman/edit_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarangpinjaman()
    {
        $this->barang_pinjaman->edit_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('barang_pinjaman');
    }
    public function delete($id)
    {
        $this->barang_pinjaman->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('barang_pinjaman');
    }
    public function update_pembayaran()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Masukkan Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('pembayaran', 'Masukkan Pembayaran', 'required|trim');
        $this->form_validation->set_rules('jumlah_harga', 'Masukkan Aktik', 'required|trim');
        $this->barang_pinjaman->update_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('barang_pinjaman');
    }
    public function update_stok()
    {
        $this->form_validation->set_rules('status_kembalian', 'Masukkan Status Kembalian', 'required|trim');
        $this->form_validation->set_rules('totalbarang', 'Masukkan Jumlah Stok Pinjaman', 'required|trim');
            // Koding Gambar
        $this->barang_pinjaman->update_stok();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('barang_pinjaman');
    }
    public function select_barang()
    {
        if ($this->input->post('barang_id')) {
            echo $this->select->select_barang($this->input->post('barang_id'));
        }
    }
    public function select_kode()
    {
        if ($this->input->post('kode_id')) {
            echo $this->select->select_kode_barang($this->input->post('kode_id'));
        }
    }
    public function select_harga()
    {
        if ($this->input->post('harga_barang_pinjam_id')) {
            echo $this->select->select_harga_barang_pinjam($this->input->post('harga_barang_pinjam_id'));
        }
    }


    public function sudah_bayar()
    {
        $data['title'] = 'Sudah Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->barang_pinjaman->sudah_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->barang_pinjaman->sudahpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->barang_pinjaman->get()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_pinjaman/sudah_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function belum_bayar()
    {
        $data['title'] = 'Belum Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->barang_pinjaman->belum_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->barang_pinjaman->belumpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->barang_pinjaman->get()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_pinjaman/belum_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function transaksi_panjar()
    {
        $data['title'] = 'Transaksi Masih Panjar';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->barang_pinjaman->transaksi_masih_panjar()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->barang_pinjaman->panjarpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->barang_pinjaman->get()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_pinjaman/transaksi_panjar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }

    public function semua_sudah_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->barang_pinjaman->sudahpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_sudah_transaksi', $data);
    }

    public function semua_belum_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->barang_pinjaman->belumpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_belum_transaksi', $data);
    }
    public function semua_transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->barang_pinjaman->panjarpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_transaksi_masih_panjar', $data);
    }
     public function sudah_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->barang_pinjaman->sudah_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->barang_pinjaman->sudah_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/sudah_transaksi', $data);
    }

    public function belum_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->barang_pinjaman->belum_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->barang_pinjaman->belum_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/belum_transaksi', $data);
    }
    public function transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->barang_pinjaman->transaksi_masih_panjar()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->barang_pinjaman->transaksi_masih_panjar()->result_array();
        }
        
        $this->mypdf->generate('laporan/transaksi_masih_panjar', $data);
    }
}