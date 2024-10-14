<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->library('session');
        // cek_betul_login();
        $this->load->helper('url');
        cek_login_tidak_benar();
        $this->load->model('peminjam_m', 'peminjam');
        $this->load->model('biodata_m', 'biodata');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('admin_m', 'admin');
    }
    public function index()
    {
        $data['transaksi'] = $this->peminjam->transaksi()->result_array();
        $data['jurusan'] = $this->fakultas->get_jurusan()->result_array();
        $data['operator_fakultas'] = $this->biodata->operator_fakultas()->result_array();
        $data['operator_jurusan'] = $this->biodata->operator_jurusan()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/index',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
        }
    }
    public function rule()
    {
        $data['transaksi'] = $this->peminjam->transaksi()->result_array();
        $data['aturan'] = $this->admin->aturan()->result_array();
        $data['profile'] = $this->biodata->operator_fakultas()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/rule',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
        }
    }
    public function transaksi()
    {
        $data['transaksi'] = $this->peminjam->transaksi()->result_array();
        $data['jurusan'] = $this->fakultas->get_jurusan()->result_array();
        $this->load->library('pagination');

        if ($this->input->post('input')) {
            $data['search'] = $this->input->post('search');
            $this->session->set_userdata('search', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('search');
        }

        // config
        $this->db->like('nama_barang', $data['search']);
        
        $data['start'] = $this->uri->segment(3);
        $data['transaksi'] = $this->peminjam->search($data['start'], $data['search']);

        
        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/transaksi',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
        }
    }
    public function transaksi_jurusan()
    {
        $data['transaksi'] = $this->peminjam->transaksi()->result_array();
        $data['jurusan'] = $this->fakultas->get_jurusan()->result_array();
        $this->load->library('pagination');


        if ($this->input->post('buka')) {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari', $data['cari']);
        } else {
            $data['cari'] = $this->session->userdata('cari');
        }

        // config
        $this->db->like('jurusan', $data['cari']);
        // $this->db->from('barang');

        $data['start'] = $this->uri->segment(3);
        $data['transaksi'] = $this->peminjam->search_jurusan($data['start'], $data['cari']);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/transaksi',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
        }
    }
    public function about()
    {
        $data['transaksi'] = $this->peminjam->transaksi()->result_array();
        $data['aturan'] = $this->admin->aturan()->result_array();
        $data['biodata_teknik_admin'] = $this->biodata->admin_teknik()->result_array();
        $data['biodata_teknik_operator'] = $this->biodata->operator_teknik()->result_array();
        $data['biodata_hukum_admin'] = $this->biodata->admin_hukum()->result_array();
        $data['biodata_hukum_operator'] = $this->biodata->operator_hukum()->result_array();
        $data['biodata_ekonomi_admin'] = $this->biodata->admin_ekonomi()->result_array();
        $data['biodata_ekonomi_operator'] = $this->biodata->operator_ekonomi()->result_array();
        $data['biodata_filsafat_admin'] = $this->biodata->admin_filsafat()->result_array();
        $data['biodata_filsafat_operator'] = $this->biodata->operator_filsafat()->result_array();
        $data['biodata_sosial_admin'] = $this->biodata->admin_sosial()->result_array();
        $data['biodata_sosial_operator'] = $this->biodata->operator_sosial()->result_array();
        $data['biodata_matematika_admin'] = $this->biodata->admin_matematika()->result_array();
        $data['biodata_matematika_operator'] = $this->biodata->operator_matematika()->result_array();
        $data['biodata_keguruan_admin'] = $this->biodata->admin_keguruan()->result_array();
        $data['biodata_keguruan_operator'] = $this->biodata->operator_keguruan()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/about',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
        }
    }
    public function cart()
    {
        $data['pinjaman'] = $this->peminjam->pinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template_transaksi/header',$data);
            $this->load->view('transaksi/cart',$data);
            $this->load->view('template_transaksi/footer',$data);
        } else {
            $this->peminjam->edit_transaksi();
            $this->session->set_flashdata('success', "Data Berhasil Di Pinjam");
            redirect('transaksi/cart');
        }
    }

    public function tambah_transaksi()
    {
        $this->peminjam->tambah_transaksi();
        $this->session->set_flashdata('success', "Data Berhasil Di Pinjam");
        redirect('transaksi/cart');
    }

    public function edit_transaksi()
    {
        $this->peminjam->edit_transaksi();
        $this->session->set_flashdata('success', "Data Berhasil Di Pinjam");
        redirect('transaksi/cart');
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('kata_sandi_baru', 'Password', 'required|trim|min_length[3]|matches[konfirmasi_kata_sandi]', [
        'matches' => 'Password Dont Match!',
        'min_length' => 'Password Too Short!'
    ]);
    $this->form_validation->set_rules('konfirmasi_kata_sandi', 'Conf Password', 'required|trim|matches[kata_sandi_baru]');
        $this->biodata->edit_profile();
        $this->session->set_flashdata('success', "Akun Berhasil Di Simpan");
        redirect('transaksi');
    }

    public function hapus_barang($id)
    {
        // $pinjama_hapus = $this->db->get_where('pinjaman',['id_pinjaman'=>$id])->row_array();
        $this->peminjam->hapus_barang($id);
            $this->session->set_flashdata('success', "Akun Berhasil Di Hapus");
        redirect('transaksi/cart');
    }
    public function laporan_transaksi()
    {
        $this->load->library('Mytransaksi');

        $data['transaksi'] = $this->peminjam->pinjaman()->result_array();
        $this->mytransaksi->generate('transaksi/laporan_transaksi', $data);
    }
}