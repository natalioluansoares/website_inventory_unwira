<?php
defined('BASEPATH') or exit('No direct script access allowed');

class operator_fakultas extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('operator_fakultas_m', 'operator_fakultas');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('user_m', 'user');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('peminjam_m', 'peminjam');

        // check_operator_fakultas_Hukum();
        check_operator_fakultas();
        check_not_login();
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
        redirect('operator_fakultas/operator');
    }
    public function kategori()
    {
        $data['title'] = 'Inventory Barang Kategori';
        $data['kategori'] = $this->operator_fakultas->getkategori()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/kategori', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        $this->form_validation->set_rules('user','Masukkan operator_fakultas','trim|required');
        $this->form_validation->set_rules('kategori','Masukkan Kategori','trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->operator_fakultas->insert_kategori();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('operator_fakultas/kategori');
        }
    }
    public function edit_kategori($id)
    {
        $data['title'] = 'Update Kategori';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['kategori'] = $this->operator_fakultas->getkategori($id)->row_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        $this->form_validation->set_rules('user','Masukkan operator_fakultas','trim|required');
        $this->form_validation->set_rules('kategori','Masukkan Kategori','trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_kategori', $data);
            $this->load->view('template/footer');
        } else {
       
        }
    }

    public function proses_kategori()
    {
        $this->operator_fakultas->edit_kategori();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/kategori');
    }
    public function delete_kategori($id)
    {
        $this->operator_fakultas->delete_kategori($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('operator_fakultas/kategori');
    }
    public function barang()
    {
        $data['title'] = 'Inventory Barang';
        $data['barang'] = $this->operator_fakultas->getbarang()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/barang', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function tambah_barang()
    {
        $data['title'] = 'Tambah Inventory Barang';
        $data['kategori'] = $this->operator_fakultas->getkategori()->result_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        $this->form_validation->set_rules('user', 'Masukkan operator_fakultas', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Masukkan Kategori Barang', 'required|trim');
        $this->form_validation->set_rules('kodebarang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Masukkan Ruangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_barang', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']          = 'assets/images/barang/';
            $config['allowed_types']        = 'git|jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
            $this->load->library('upload', $config);
            $post = $this->input->post(null, TRUE);
            // if ($this->barang->getkodebarang($post['kodebarang'])->num_rows() > 0) {
            //     $this->session->set_flashdata('error', "Kode Barang $post[kodebarang] Sudah Ada, Tolong Input Kode Barang Lain");
            //     redirect('barang/tambah');
            // } elseif ($this->barang->getnamabarang($post['namabarang'])->num_rows() > 0) {
            //     $this->session->set_flashdata('error', "Nama Barang $post[namabarang] Sudah Ada, Tolong Input Nama Barang Lain");
            //     redirect('barang/tambah');
            // } else {
            // Koding Gambar

            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    // Gambar Diupload
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->operator_fakultas->insert_barang($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('operator_fakultas/barang');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                    redirect('operator_fakultas/tambah_barang');
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['gambar'] = null;
                $this->operator_fakultas->insert_barang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data barang Berhasil Di Tambah');
                }
                redirect('operator_fakultas/barang');
                // }
            }
        }
    }
    public function edit_barang($id)
    {

        $data['title'] = 'Ganti Data Inventory Barang';
        $data['barang'] = $this->operator_fakultas->getbarang($id)->row_array();
        $data['kategori'] = $this->operator_fakultas->getkategori()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_barang', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarang()
    {
        $this->form_validation->set_rules('kode_barang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Masukkan Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Masukkan operator_fakultas', 'required|trim');

        $config['upload_path']          = 'assets/images/barang/';
        $config['allowed_types']        = 'git|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0.10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);

        // if ($this->barang->getkodebarang($post['kode_barang'], $post['idbarang'])->num_rows() > 0) {
        //     $this->session->set_flashdata('error', "Kode Barang $post[kode_barang] Sudah Ada, Tolong Input Kode Barang Lain");
        //     redirect('barang/edit/' . $post['idbarang']);
        // } else if ($this->barang->getnamabarang($post['namabarang'], $post['idbarang'])->num_rows() > 0) {
        //     $this->session->set_flashdata('error', "Nama Barang $post[namabarang] Sudah Ada, Tolong Input Nama Barang Lain");
        //     redirect('barang/edit/' . $post['idbarang']);
        // } else {

        if (@$_FILES['gambar']['name'] != null) {
            if ($this->upload->do_upload('gambar')) {

                // Quando Ganti Gambar Maka Gambar Primeiro akan terhapus Sendiri
                $item = $this->operator_fakultas->getbarang($post['idbarang'])->row();
                if ($item->gambar != null) {
                    $target_file = '.assets/images/barang/' . $item->gambar;
                    unlink($target_file);
                }
                // Gambar Diupload
                $post['gambar'] = $this->upload->data('file_name');
                $this->operator_fakultas->editbarang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('operator_fakultas/barang');
            } else {
                $this->upload->display_errors();
                $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                redirect('operator_fakultas/edit_barang/' . $post['idbarang']);
            }
        } else {
            // Jika Gambar tidak Di Upload
            $post['gambar'] = null;
            $this->operator_fakultas->editbarang($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('operator_fakultas/barang');
            // }
        }
    }
    public function deletebarang($id)
    {
        // Hapus Gambar Di Folder
        $item = $this->operator_fakultas->getbarang($id)->row();
        if ($item->gambar != null) {
            $target_file = 'assets/images/barang/' . $item->gambar;
            unlink($target_file);
        }
        $this->operator_fakultas->delete_barang($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('operator_fakultas/barang');
    }
    public function barang_rusak()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['barang_rusak'] = $this->operator_fakultas->getrusak()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_barang_rusak()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('user', 'Masukkan Nama Nama User', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');
        $this->form_validation->set_rules('nama_perbaiki', 'Masukkan Nama Perbaiki', 'required|trim');
        // $this->form_validation->set_rules('harga_perbaiki', 'Masukkan Harga Perbaiki', 'required|trim');

        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['barang'] = $this->operator_fakultas->getbarang()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
            $this->operator_fakultas->insert_barang_rusak();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('operator_fakultas/barang_rusak');
        }
    }
    public function edit_barang_rusak($id)
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['barang'] = $this->operator_fakultas->getbarang()->result_array();
        $data['barangrusak'] = $this->operator_fakultas->getrusak($id)->row();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('user', 'Masukkan Nama Nama User', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');
        $this->form_validation->set_rules('nama_perbaiki', 'Masukkan Nama Perbaiki', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function prosesbarangrusak()
    {
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $this->operator_fakultas->edit_barang_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/barang_rusak');
    }

    public function deletebarangrusak($id)
    {
        $this->operator_fakultas->delete_rusak($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('operator_fakultas/barang_rusak');
    }

    public function pinjaman()
    {
        $data['title'] = 'Inventory Barang Pinjaman';
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/pinjaman', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_pinjaman()
    {
        $data['title'] = 'Tambah Data Inventory Barang Pinjaman';
        $data['barang'] = $this->operator_fakultas->getbarangpinjaman()->result_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        $data['peminjam'] = $this->peminjam->aktif()->result_array();

        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
            $this->operator_fakultas->insert_pinjaman();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('operator_fakultas/pinjaman');
        }
    }
    public function edit_pinjaman($id)
    {
        $data['title'] = 'Update Data Inventory Barang Pinjaman';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        // $data['pinjaman'] = $this->operator_fakultas->getpinjaman($id)->row_array();
        $data['pinjaman'] = $this->operator_fakultas->aktif($id)->row_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarangpinjaman()
    {
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');
        $this->operator_fakultas->edit_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/pinjaman');
    }
    public function update_pembayaran()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Masukkan Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('pembayaran', 'Masukkan Pembayaran', 'required|trim');
        $this->form_validation->set_rules('jumlah_harga', 'Masukkan Aktik', 'required|trim');
        $this->operator_fakultas->update_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/pinjaman');
    }
    public function update_stok()
    {
        $this->form_validation->set_rules('status_kembalian', 'Masukkan Status Kembalian', 'required|trim');
        $this->form_validation->set_rules('totalbarang', 'Masukkan Jumlah Stok Pinjaman', 'required|trim');
            // Koding Gambar
        $this->operator_fakultas->update_stok();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/pinjaman');
    }

    public function update_rusak()
    {
        $this->form_validation->set_rules('perbaiki', 'Masukkan Barang Sudah Perbaiki', 'required|trim');
        $this->form_validation->set_rules('rusak', 'Masukkan Jumlah Stok Barang Rusak', 'required|trim');
            // Koding Gambar
        $this->operator_fakultas->update_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/barang_rusak');
    }
    public function delete_pinjaman($id)
    {
        $this->operator_fakultas->delete_pinjaman($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('operator_fakultas/pinjaman');
    }

    public function barang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        $data['masuk'] = $this->operator_fakultas->get_barang_masuk()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_barang_masuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('total_barang', 'Total Barang', 'required|trim');
        $this->form_validation->set_rules('stock_barang', 'Stock Barang', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
            $this->operator_fakultas->tambah_barang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('operator_fakultas/barang_masuk');
        }
    }
    
    public function delete_barang_masuk($id)
    {
        $this->operator_fakultas->delete_barang_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('operator_fakultas/barang_masuk');
    }
    public function ruangan()
    {
        $data['title'] = 'Ruangan';
        $data['ruangan'] = $this->operator_fakultas->getruangan()->result_array();
        $data['user'] = $this->operator_fakultas->getuser()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/ruangan', $data);
            $this->load->view('template/footer');
        } else {
            // $this->operator_fakultas->tambah_barang_masuk();
            // redirect('operator_fakultas/barang_masuk');
        }
    }

    public function tambah_ruangan()
    {
        $data['title'] = 'Tambah Ruangan';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama operator_fakultas', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/tambah_ruangan', $data);
            $this->load->view('template/footer');
        } else {
            $this->operator_fakultas->tambah_ruangan();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
           redirect('operator_fakultas/ruangan');
        }

    }

    public function edit_ruangan($id)
    {
        $data['title'] = 'Edit Ruangan';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        $data['ruangan'] = $this->operator_fakultas->getruangan($id)->row_array();
        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama operator_fakultas', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_ruangan', $data);
            $this->load->view('template/footer');
        } else {

        }
    }

    public function proses_ruangan()
    {
        $this->operator_fakultas->edit_ruangan();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('operator_fakultas/ruangan');
    }
    public function delete_ruangan($id)
    {
        $this->operator_fakultas->delete_ruangan($id);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('operator_fakultas/ruangan');
    }


    // Select Tow Barang
    function select_fakultas()
    {
        if ($this->input->post('fakultas_id')) {
            echo $this->select->select_fakultas($this->input->post('fakultas_id'));
        }
    }
    function select_user()
    {
        if ($this->input->post('jurusan_id')) {
            echo $this->select->select_user($this->input->post('jurusan_id'));
        }
    }
    function select_kategori()
    {
        if ($this->input->post('operator_id')) {
            echo $this->select->select_kategori($this->input->post('operator_id'));
        }
    }
    function select_pinjaman()
    {
        if ($this->input->post('level_id')) {
            echo $this->select->select_barang($this->input->post('level_id'));
        }
    }
    public function select_ruangan()
    {
        if ($this->input->post('level_id')) {
            echo $this->select->select_ruangan($this->input->post('level_id'));
        }
    }
    public function select_barang()
    {
        if ($this->input->post('barang_id')) {
            echo $this->select->select_barang($this->input->post('barang_id'));
        }
    }
    public function select_kode_barang()
    {
        if ($this->input->post('kode_id')) {
            echo $this->select->select_kode_barang($this->input->post('kode_id'));
        }
    }
    public function select_harga_barang_pinjam()
    {
        if ($this->input->post('harga_barang_pinjam_id')) {
            echo $this->select->select_harga_barang_pinjam($this->input->post('harga_barang_pinjam_id'));
        }
    }
    public function sudah_bayar()
    {
        $data['title'] = 'Sudah Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->operator_fakultas->sudah_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->operator_fakultas->sudahpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/sudah_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function belum_bayar()
    {
        $data['title'] = 'Belum Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->operator_fakultas->belum_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->operator_fakultas->belumpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/belum_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function transaksi_panjar()
    {
        $data['title'] = 'Transaksi Masih Panjar';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->operator_fakultas->transaksi_masih_panjar()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->operator_fakultas->panjarpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/transaksi_panjar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function detailbarang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['masuk']   = $this->operator_fakultas->detail_masuk_barang()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['masuk'] = $this->operator_fakultas->get_barang_masuk()->result_array();
        }
        // $data['barang_pinjaman'] = $this->operator_fakultas->getpinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/detail_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_barang_masuk()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['masuk']   = $this->operator_fakultas->detail_masuk_barang()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['masuk']   = $this->operator_fakultas->detail_masuk_barang()->result_array();
        }
        
        $this->mypdf->generate('laporan/laporan', $data);
    }
    public function sudah_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->operator_fakultas->sudah_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->operator_fakultas->sudah_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/sudah_transaksi', $data);
    }

    public function belum_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->operator_fakultas->belum_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->operator_fakultas->belum_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/belum_transaksi', $data);
    }
    public function transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->operator_fakultas->transaksi_masih_panjar()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->operator_fakultas->transaksi_masih_panjar()->result_array();
        }
        
        $this->mypdf->generate('laporan/transaksi_masih_panjar', $data);
    }
    public function all_laporan_barang_masuk()
    {
        $this->load->library('Mypdf');

        $data['masuk'] = $this->operator_fakultas->get_barang_masuk()->result_array();
        $this->mypdf->generate('laporan/all_laporan', $data);
    }
    public function semua_sudah_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->operator_fakultas->sudahpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_sudah_transaksi', $data);
    }
    public function semua_belum_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->operator_fakultas->belumpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_belum_transaksi', $data);
    }
    public function semua_transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->operator_fakultas->panjarpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_transaksi_masih_panjar', $data);
    }
    public function operator()
    {
        $data['title'] = 'Operator Sistem Jurusan';
        $data['user'] = $this->user->operator_jurusan()->result_array();
        $data['aktif'] = $this->user->aktif_akun_operator()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/user', $data);
            $this->load->view('template/footer');
        }
    }
    public function tambah_operator_fakultastor()
    {
        $data['title'] = 'Tambah operator_fakultastor Hukum';
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        
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
            $this->load->view('operator_fakultas/tambah_user', $data);
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
                redirect('operator_fakultas/tambah_operator_fakultastor');

            } elseif ($this->user->getemail($post['email'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Alamat Email $post[email] Sudah Ada, Tolong Input Alamat Email Lain");
                redirect('operator_fakultas/tambah_operator_fakultastor');
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
                        redirect('operator_fakultas/operator_fakultastor');
                    } else {
                        $this->upload->display_errors();
                        $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                        redirect('operator_fakultas/tambah_operator_fakultastor');
                    }
                } else {
                    // Jika Gambar tidak Di Upload
                    $post['foto'] = null;
                    $this->user->inputuser($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data User Berhasil Di Tambah');
                    }
                    redirect('operator_fakultas/operator_fakultastor');
                }
            }
        }
    }

    public function edit_operator_fakultastor($id)
    {
        $data['title'] = 'Ubah operator_fakultastor IS Dan IP';
        $data['user'] = $this->user->get($id)->row_array();
        $data['fakultas'] = $this->fakultas->get_fakultas_operator()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('operator_fakultas/edit_user', $data);
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
            redirect('operator_fakultas/edit_operator_fakultastor/' . $post['iduser']);

        } elseif ($this->user->getemail($post['email'], $post['iduser'])->num_rows() > 0) {
            $this->session->set_flashdata('error', "Alamat Email $post[email] Sudah Ada, Tolong Input Alamat Email Lain");
            redirect('operator_fakultas/edit_operator_fakultastor/' . $post['iduser']);
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
                    redirect('operator_fakultas/operator_fakultastor');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                    redirect('operator_fakultas/edit_operator_fakultastor/' . $post['iduser']);
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['foto'] = null;
                $this->user->edituser($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('operator_fakultas/operator_fakultastor');
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
        redirect('operator_fakultas/operator_fakultastor');
    }
    public function changepassword()
    {
        // $data['title'] = 'Change Password Baru';
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
                redirect('operator_fakultas/operator');
            }elseif ($password != $confpassword) {
                $this->session->set_flashdata('error', 'Password Dengan Confirmasi Password Tidak Sama');
                redirect('operator_fakultas/operator');
            }else {
                $data = [
                    'id_user'         => $id,
                    'kata_sandi'      => password_hash($password, PASSWORD_DEFAULT),
    
                ];
    
                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('success', 'Kata Sandi Berhasil Di Ubah');
                redirect('operator_fakultas/operator');
            }

    }
}