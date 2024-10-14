<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('ruangan_m', 'ruangan');
        $this->load->model('admin_m', 'admin');
        check_operator_jurusan();
        // check_already_login();
        // check_admin();
        // check_operator_sipil();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Inventory Ruangan';
        $data['ruangan'] = $this->ruangan->get()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('ruangan/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_ruangan()
    {
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama Operator', 'required|trim');

        $this->ruangan->tambah_ruangan();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('ruangan');
    }

    public function edit_ruangan()
    {
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama Operator', 'required|trim');

        $this->ruangan->edit_ruangan();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('ruangan');
    }
    public function delete_ruangan($id)
    {
        $this->admin->delete_ruangan($id);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('ruangan');
    }
}