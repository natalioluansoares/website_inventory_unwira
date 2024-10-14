<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('user_m', 'user');
    }
    public function index()
    {
        check_already_login();
        $data['title']  = 'Data Parawisata';
        if ($this->form_validation->run() == false) {
            $this->load->view('template_login/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('template_login/footer');
        } else {
        }
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Masukan Nama Lengkap','trim|required');
        $this->form_validation->set_rules('kata_sandi', 'Masukan Kata Sandi','trim|required');

        $input = $this->input->post(null, true);
        $nama_lengkap = $this->user->user_name($input['nama_lengkap']);
        if ($nama_lengkap > 0) {
                $kata_sandi = $this->user->kata_sandi($input['nama_lengkap']);
                
            if (password_verify($input['kata_sandi'], $kata_sandi)) {

                $semua = $this->user->semua($input['nama_lengkap']);
                
                if ($semua['aktif_akun_inventori'] != 1) {
                    $this->session->set_flashdata('error', "Akun Anda Belum Di Aktif.. Tolong Hubungi Admin");
                    redirect('auth');
                }else {
                    $data = [
                        'id_user' => $semua['id_user'],
                        'level'  => $semua['level']
                        // 'timestamp' => time()
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                }
            }else {
                $this->session->set_flashdata('error', "Kata Sandi Anda Salah.. Silahkan Coba Lagi.");
                redirect('auth');
            }
        }else {
            $this->session->set_flashdata('error', "Nama Pengguna Yang Tidak Terdaftar.");
            redirect('auth');
        }
    }



    public function logout()
    {
        $params = array('id_user', 'level');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}



?>