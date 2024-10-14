<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->library('session');
        // cek_betul_login();
        $this->load->helper('url');
        $this->load->model('peminjam_m', 'peminjam');
    }
    public function index()
    {
        cek_betul_login();
        $data['title']  = 'INVENTORY UNWIRA';
        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|trim');
        $this->form_validation->set_rules('kata_sandi','Kata Sandi','required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_pinjaman/header', $data);
            $this->load->view('peminjam/login', $data);
            $this->load->view('template_pinjaman/footer');
        } else {
        }
    }
    public function registrasi()
    {
        // check_already_login();
        $data['title']  = 'INVENTORY UNWIRA';
        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|trim');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|trim');
        $this->form_validation->set_rules('nomor_ktp','Nomor KTP','trim|required');
        $this->form_validation->set_rules('nomor_whatsapp','Nomor Whatsapp','required|trim');
        $this->form_validation->set_rules('nomor_whatsapp','Nomor Whatsapp','required|trim');
        $this->form_validation->set_rules('password','Kata Sandi','required|trim|min_length[3]|matches[conf_password]',
        ['matches'=>'Kata Sandi Tidak Cocok!',
        'min_length' =>'Kata Sandi Terlalu Pendek']);
        $this->form_validation->set_rules('conf_password','Konfirmasi','required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_pinjaman/header', $data);
            $this->load->view('peminjam/registrasi', $data);
            $this->load->view('template_pinjaman/footer');
        } else {
            $post = $this->input->post(NULL, TRUE);
            if ($this->peminjam->seleksi($post['nama_lengkap'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nama: $post[nama_lengkap] Sudah Ada, Tolong Input Nama Lain");
                redirect('peminjam/registrasi');
            }elseif ($this->peminjam->seleksi_nomor_ktp($post['nomor_ktp'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor KTP: $post[nomor_ktp] Sudah Ada, Tolong Input Nomor KTP Lain");
                redirect('peminjam/registrasi');
            }else{
                $this->peminjam->tambah_akun($post);
                $this->session->set_flashdata('success', "Data Registrasi Berhasil Di Simpan");
                redirect('peminjam');
            }
        }
        
    }
    public function auth()
    {
        $this->form_validation->set_rules('nama_lengkap_peminjam', 'Username', 'required|trim');
        $this->form_validation->set_rules('kata_sandi', 'Password', 'required|trim');
        $input = $this->input->post(null, true);
        $cek_username = $this->peminjam->cek_nama_lengkap($input['nama_lengkap_peminjam']);
        if ($cek_username > 0) {

            $password = $this->peminjam->cek_kata_sandi($input['nama_lengkap_peminjam']);
            
            if (password_verify($input['kata_sandi'], $password)) {

                $user_db = $this->peminjam->cek_semua($input['nama_lengkap_peminjam']);
                
                if ($user_db['aktif_akun'] != 1) {
                    $this->session->set_flashdata('error', "Your Account Is Inactive. Please Contact peminjam.");
                    redirect('peminjam');
                } else {
                    $data = [
                        'id_user_peminjam' => $user_db['id_user_peminjam'],
                        'level_peminjam'  => $user_db['level_peminjam'],
                        'timestamp' => time()
                    ];
                    $this->session->set_userdata($data);
                    redirect('transaksi');
                }
            } else {
                $this->session->set_flashdata('error', "wrong password.");
                redirect('peminjam');
            }
        } else {
            $this->session->set_flashdata('error', "Unregistered Username.");
            redirect('peminjam');
        }
    }

    public function lupa_kata_sandi()
    {
        $data['title']  = 'INVENTORY UNWIRA';
        $this->form_validation->set_rules('nama_lengkap', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('nomor_ktp', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('nomor_whatsapp', 'Masukkan Nama Barang', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_pinjaman/header', $data);
            $this->load->view('peminjam/lupa_kata_sandi', $data);
            $this->load->view('template_pinjaman/footer');
        } else {
        $config['upload_path']          = 'assets/ktp/';
        $config['allowed_types']        = 'git|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        $id_user_peminjam = $this->input->post('id_user_peminjam');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $nomor_ktp = $this->input->post('nomor_ktp');
        $nomor_whatsapp = $this->input->post('nomor_whatsapp');

        $peminjam = $this->db->get_where('user_peminjam', ['id_user_peminjam'=>$id_user_peminjam])->row();

            if ($peminjam->nama_lengkap_peminjam != $nama_lengkap) {
                $this->session->set_flashdata('error', "Nama Tidak Sesuai Dengan Nama Sebelumnya");
                redirect('peminjam');
            } elseif ($peminjam->nomor_ktp != $nomor_ktp) {
                $this->session->set_flashdata('error', "Nomor KTP Tidak Sesuai Dengan Nomor KTP Sebelumnya");
                redirect('peminjam');
            }elseif ($peminjam->nomor_whatsapp != $nomor_whatsapp) {
                $this->session->set_flashdata('error', "Nomor Whatsapp Tidak Sesuai Dengan Nomor Whatsapp Sebelumnya");
                redirect('peminjam');
            }else {
            // Koding foto

            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    // foto Diupload
                    $post['foto'] = $this->upload->data('file_name');
                    $this->peminjam->lupa_kata_sandi($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
                    }
                    redirect('peminjam');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File foto Ini Tidak Tersediah Diupload, Silakan Coba foto Lain");
                    redirect('peminjam/lupa_kata_sandi');
                }
            } else {
                // Jika foto tidak Di Upload
                $post['foto'] = null;
                $this->peminjam->lupa_kata_sandi($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data barang Berhasil Di Tambah');
                }
                redirect('peminjam');
                }
            }
        }
    }

    

    public function logout()
    {
        $params = array('id_user_peminjam', 'level_peminjam');
        $this->session->unset_userdata($params);
        redirect('peminjam');
    }
    public function userList()
	{
		$postData = $this->input->post();

		// get data
		$data = $this->peminjam->getUsers($postData);

		echo json_encode($data);
	}
}