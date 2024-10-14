<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_m', 'dashboard');
        $this->load->model('admin_m', 'admin');
    }

    public  function index()
    {
        check_not_login();
        $data['title'] = 'user';
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        // $data['barang_pinjaman'] = $this->admin->getpi()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
}