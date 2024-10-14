<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('user_m', 'user');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('admin_m', 'admin');
        $this->load->model('select_tow_barang_m', 'select');
        // check_already_login();
        check_admin();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Operator Sistem Jurusan';
        $data['user'] = $this->user->result()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/user', $data);
            $this->load->view('template/footer');
        }
    }
     public function toggle_operator_fakultas($getId)
    {
        $id = encode_php_tags($getId);
        $status = $this->user->toggle_user('user', ['id_user' => $id])['aktif_akun_inventori'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        // $toggle = $status ?: 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'Sudah Aktif.' : 'Belum Akfit.';

        if ($this->user->toggle_update_user('user', 'id_user', $id, ['aktif_akun_inventori' => $toggle])) {
            $this->session->set_flashdata('success', 'Akun Berhasil Aktif / Tidak Aktif');
        }
        redirect('user/operator_fakultas');
    }
     public function toggle_operator_jurusan($getId)
    {
        $id = encode_php_tags($getId);
        $status = $this->user->toggle_user('user', ['id_user' => $id])['aktif_akun_inventori'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        // $toggle = $status ?: 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'Sudah Aktif.' : 'Belum Akfit.';

        if ($this->user->toggle_update_user('user', 'id_user', $id, ['aktif_akun_inventori' => $toggle])) {
            $this->session->set_flashdata('success', 'Akun Berhasil Aktif / Tidak Aktif');
        }
        redirect('user/operator_jurusan');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Operator';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        $this->form_validation->set_rules('namadepan', 'Masukkan Nama Depan Name Anda', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Masukkan Nama Belakang Name Anda', 'required|trim');
        $this->form_validation->set_rules('namalengkap', 'Masukkan Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Masukan Email Anda', 'required|trim|valid_email');
        $this->form_validation->set_rules('level', 'Masukan Level Anda', 'required|trim');

        $this->form_validation->set_rules('password1', ' Masukan Password Anda', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Dont Match!',
            'min_length' => 'Password Too Short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password Anda', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/tambah_user', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']          = 'assets/images/user/';
            $config['allowed_types']        = 'git|jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
            $this->load->library('upload', $config);
            $post = $this->input->post(null, TRUE);

            if ($this->user->getnamalengkap($post['namalengkap'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nama User $post[namalengkap] Sudah Ada, Tolong Input Nama User Lain");
                redirect('user/tambah');
            } elseif ($this->user->getemail($post['email'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Alamat Email $post[email] Sudah Ada, Tolong Input Alamat Email Lain");
                redirect('user/tambah');
            } else {
                // Koding Gambar

                if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                        // Gambar Diupload
                        $post['foto'] = $this->upload->data('file_name');
                        $this->user->inputuser($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                        }
                        redirect('user');
                    } else {
                        $this->upload->display_errors();
                        $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                        redirect('user/tambah');
                    }
                } else {
                    // Jika Gambar tidak Di Upload
                    $post['foto'] = null;
                    $this->user->inputuser($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data User Berhasil Di Tambah');
                    }
                    redirect('user');
                }
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Operator';
        $data['user'] = $this->user->get($id)->row_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/edit_user', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function prosesuser()
    {
        $this->form_validation->set_rules('namadepan', 'Masukkan Nama Depan Name Anda', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Masukkan Nama Belakang Name Anda', 'required|trim');
        $this->form_validation->set_rules('namalengkap', 'Masukkan Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Masukan Email Anda', 'required|trim|valid_email');
        $this->form_validation->set_rules('level', 'Masukan Level Anda', 'required|trim');

        $config['upload_path']          = 'assets/images/user/';
        $config['allowed_types']        = 'git|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);

        if ($this->user->getnamalengkap($post['namalengkap'], $post['iduser'])->num_rows() > 0) {
            $this->session->set_flashdata('error', "Nama User $post[namalengkap] Sudah Ada, Tolong Input Nama User Lain");
            redirect('user/edit/' . $post['iduser']);
        } elseif ($this->user->getemail($post['email'], $post['iduser'])->num_rows() > 0) {
            $this->session->set_flashdata('error', "Alamat Email $post[email] Sudah Ada, Tolong Input Alamat Email Lain");
            redirect('user/edit/' . $post['iduser']);
        } else {

            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {

                    // Quando Ganti Gambar Maka Gambar Primeiro akan terhapus Sendiri
                    $item = $this->user->get($post['iduser'])->row();
                    if ($item->foto != null) {
                        $target_file = 'assets/images/user/' . $item->foto;
                        unlink($target_file);
                    }
                    // Gambar Diupload
                    $post['foto'] = $this->upload->data('file_name');
                    $this->user->edituser($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('user');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                    redirect('user/edit/' . $post['iduser']);
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['foto'] = null;
                $this->user->edituser($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('user');
            }
        }
    }
    public function deleteuser($id)
    {
        // Hapus Gambar Di Folder
        $item = $this->user->get($id)->row();
        if ($item->foto != null) {
            $target_file = 'assets/images/user/' . $item->foto;
            unlink($target_file);
        }
        $this->user->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('user');
    }
    public function changepassword()
    {
        // $data['users'] = $this->db->get('user')->row_array();
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

            if ($password == null) {
                $this->session->set_flashdata('error', 'Password Masih Kosong');
                redirect('user');
            }elseif ($password != $confpassword) {
                $this->session->set_flashdata('error', 'Password Dengan Confirmasi Password Tidak Sama');
                redirect('user');
            }else {
                $data = [
                    'id_user'         => $id,
                    'kata_sandi'      => password_hash($password, PASSWORD_DEFAULT),
                ];
    
                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('success', 'Kata Sandi Berhasil Di Ubah');
                redirect('user');
            }
    }
    public function operator_fakultas()
    {
        $data['title'] = 'Operator Sistem Fakultas';
        $data['user'] = $this->user->result_operator_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['aktif'] = $this->user->aktif_akun_fakultas()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/operator_fakultas', $data);
            $this->load->view('template/footer');
        }
    }
    public function operator_jurusan()
    {
        $data['title'] = 'Operator Sistem Jurusan';
        $data['user'] = $this->user->result_operator_jurusan()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['aktif'] = $this->user->aktif_akun_jurusan()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/operator_jurusan', $data);
            $this->load->view('template/footer');
        }
    }
    public function tambah_operator()
    {
        $data['title'] = 'Operator Sistem';
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
    
        $this->form_validation->set_rules('namadepan', 'Masukkan Nama Depan Name Anda', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Masukkan Nama Belakang Name Anda', 'required|trim');
        $this->form_validation->set_rules('namalengkap', 'Masukkan Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Masukan Email Anda', 'required|trim|valid_email');
        $this->form_validation->set_rules('level', 'Masukan Level Anda', 'required|trim');
        $this->form_validation->set_rules('fakultas', 'Masukan Operator', 'required|trim');

        $this->form_validation->set_rules('password1', ' Masukan Password Anda', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Dont Match!',
            'min_length' => 'Password Too Short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password Anda', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('user/tambah_operator', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']          = 'assets/images/user/';
            $config['allowed_types']        = 'git|jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
            $this->load->library('upload', $config);
            $post = $this->input->post(null, TRUE);

            if ($this->user->getnamalengkap($post['namalengkap'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nama User $post[namalengkap] Sudah Ada, Tolong Input Nama User Lain");
                redirect('user/tambah_operator');
            } elseif ($this->user->getemail($post['email'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Alamat Email $post[email] Sudah Ada, Tolong Input Alamat Email Lain");
                redirect('user/tambah_operator');
            } else {
                // Koding Gambar

                if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                        // Gambar Diupload
                        $post['foto'] = $this->upload->data('file_name');
                        $this->user->inputuser($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                        }
                        redirect('user');
                    } else {
                        $this->upload->display_errors();
                        $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                        redirect('user/tambah_operator');
                    }
                } else {
                    // Jika Gambar tidak Di Upload
                    $post['foto'] = null;
                    $this->user->inputuser($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data User Berhasil Di Tambah');
                    }
                    redirect('user');
                }
            }
        }
    }
    
    function select_fakultas()
    {
        if ($this->input->post('fakultas_id')) {
            echo $this->select->select_fakultas($this->input->post('fakultas_id'));
        }
    }
    function select_jurusan()
    {
        if ($this->input->post('jurusan_id')) {
            echo $this->select->select_user($this->input->post('jurusan_id'));
        }
    }
}