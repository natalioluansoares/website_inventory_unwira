<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('user_m', 'user');
        $this->load->model('admin_m', 'admin');
        $this->load->model('profile_m', 'profile');
        // check_already_login();
        // check_admin();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'user';
        $data['user'] = $this->user->rahasia()->row_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('profil/profil', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password Baru';
        $data['users'] = $this->db->get('user')->row_array();
        $this->form_validation->set_rules(
            'passwordbaru',
            'Masukan Password Baruu',
            'required|trim|min_length[3]|matches[confpassword]',
            [
                'matches' => 'Password Dont Match!',
                'min_length' => 'Password Too Short!'
            ]
        );
        $this->form_validation->set_rules(
            'confpassword',
            'Masukan Confirm Password Baruu',
            'required|trim|min_length[3]|matches[passwordbaru]'
        );


            $id             = $this->input->post('id');
            $password       = $this->input->post('passwordbaru');
            $confpassword   = $this->input->post('confpassword');

            if ($password ==null) {
                $this->session->set_flashdata('error', 'Password Masih Kosong');
                redirect('profil');
            }elseif ($password != $confpassword) {
                $this->session->set_flashdata('error', 'Password Dengan Confirmasi Password Tidak Sama');
                redirect('profil');
            }else{
                $data = [
                    'id_user'         => $id,
                    'kata_sandi'      => password_hash($password, PASSWORD_DEFAULT),

                ];
                // var_dump($data);
                // die;
                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('success', 'Password Anda Berhasil Di Ganti');
                redirect('profil');

            }
    }
    public function alamatstatus()
    {
            $data['title'] = 'Alamat & Status';
            $data['users'] = $this->db->get('user')->row_array();
            
            $id     = $this->input->post('id');
            $alamat = $this->input->post('alamat');
            if ($alamat == null) {
                $this->session->set_flashdata('error', 'Alamat Anda Masih Kosong');
                redirect('profil');
            }else {
                $data = [
                    'id_user'   => $id,
                    'alamat'    => $alamat,
                ];
                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('success', 'Data Alamat');
                redirect('profil');
            }
    }

    public function picture()
    {
        $config['upload_path']          = 'assets/images/user/';
        $config['allowed_types']        = 'git|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);

            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {

                    // Quando Ganti Gambar Maka Gambar Primeiro akan terhapus Sendiri
                    $item = $this->user->get($post['id'])->row();
                    if ($item->foto != null) {
                        $target_file = 'assets/images/user/' . $item->foto;
                        unlink($target_file);
                    }
                    // Gambar Diupload
                    $post['foto'] = $this->upload->data('file_name');
                    $this->profile->get($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('profil');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                    redirect('profil/profile');
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['foto'] = null;
                $this->user->edituser($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('profil');
            }
        
    }
    public function error()
    {
            $this->load->view('error/error');
    }
    public function user()
    {
            $this->load->view('error/user');
    }

    public function misi()
    {
        $misi =$this->input->post('misi');
        if ($misi == null) {
            $this->session->set_flashdata('error', 'Harus Isi Tidak Boleh Kosong');
            redirect('profil');
        }else {
        $this->user->misi();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('profil');
        }

    }
    public function visi()
    {
        $visi =$this->input->post('visi');
        if ($visi == null) {
            $this->session->set_flashdata('error', 'Harus Isi Tidak Boleh Kosong');
            redirect('profil');
        }else {
        $this->user->visi();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('profil');
        }
    }
}