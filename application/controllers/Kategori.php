<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('kategori_m', 'kategori');
        check_operator_jurusan();
        // check_already_login();
        // check_admin();
        // check_operator_sipil();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Inventory Data Kategori';
        $data['kategori'] = $this->kategori->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('kategori/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $this->kategori->insert_kategori();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('kategori');
    }
    public function edit()
    {
        $this->kategori->edit_kategori();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('kategori');
    }
    public function delete($id)
    {
        $this->kategori->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('kategori');
    }
}