<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('admin_m', 'admin');
        $this->load->model('fakultas_m', 'fakultas');
        $this->load->model('select_tow_barang_m', 'select');
        $this->load->model('peminjam_m', 'peminjam');

        check_admin();
        check_not_login();
    }
    public function peminjam()
    {
        $data['title'] = 'Akun Peminjam';
        $data['peminjam'] = $this->peminjam->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/peminjam', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function toggle_peminjam($getId)
    {
        $id = encode_php_tags($getId);
        $status = $this->peminjam->toggle_peminjam('user_peminjam', ['id_user_peminjam' => $id])['aktif_akun'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        // $toggle = $status ?: 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'Sudah Aktif.' : 'Belum Akfit.';

        if ($this->peminjam->update_peminjam('user_peminjam', 'id_user_peminjam', $id, ['aktif_akun' => $toggle])) {
            $this->session->set_flashdata('success', 'Akun Berhasil Aktif / Tidak Aktif');
        }
        redirect('admin/peminjam');
    }
    

    public function kategori()
    {
        $data['title'] = 'Inventory Barang Kategori';
        $data['kategori'] = $this->admin->getkategori()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        $this->form_validation->set_rules('user','Masukkan Operator','trim|required');
        $this->form_validation->set_rules('kategori','Masukkan Kategori','trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->admin->insert_kategori();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('admin/kategori');
        }
    }
    public function edit_kategori($id)
    {
        $data['title'] = 'Update Kategori';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['kategori'] = $this->admin->getkategori($id)->row_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $this->form_validation->set_rules('user','Masukkan Operator','trim|required');
        $this->form_validation->set_rules('kategori','Masukkan Kategori','trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/edit_kategori', $data);
            $this->load->view('template/footer');
        } else {
       
        }
    }

    public function proses_kategori()
    {
        $this->admin->edit_kategori();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/kategori');
    }
    public function delete_kategori($id)
    {
        $this->admin->delete_kategori($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/kategori');
    }
    public function barang()
    {
        $data['title'] = 'Inventory Barang';
        $data['barang'] = $this->admin->getbarang()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/barang', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function tambah_barang()
    {
        $data['title'] = 'Tambah Inventory Barang';
        $data['kategori'] = $this->admin->getkategori()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['barang'] = $this->admin->getbarang()->row_array();

        $this->form_validation->set_rules('user', 'Masukkan Operator', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Masukkan Kategori Barang', 'required|trim');
        $this->form_validation->set_rules('kodebarang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Masukkan Ruangan', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'Masukkan Harga Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang_pinjam', 'Masukkan Harga Barang Pinjam', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_barang', $data);
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
                    $this->admin->insert_barang($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('admin/barang');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                    redirect('admin/tambah_barang');
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['gambar'] = null;
                $this->admin->insert_barang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data barang Berhasil Di Tambah');
                }
                redirect('admin/barang');
                // }
            }
        }
    }
    public function edit_barang($id)
    {

        $data['title'] = 'Ganti Data Inventory Barang';
        $data['barang'] = $this->admin->getbarang($id)->row_array();
        $data['kategori'] = $this->admin->getkategori()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/edit_barang', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarang()
    {
        $this->form_validation->set_rules('kode_barang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Masukkan Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Masukkan Operator', 'required|trim');
       $this->form_validation->set_rules('harga_barang', 'Masukkan Harga Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang_pinjam', 'Masukkan Harga Barang Pinjam', 'required|trim');

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
                $item = $this->admin->getbarang($post['idbarang'])->row();
                if ($item->gambar != null) {
                    $target_file = '.assets/images/barang/' . $item->gambar;
                    unlink($target_file);
                }
                // Gambar Diupload
                $post['gambar'] = $this->upload->data('file_name');
                $this->admin->editbarang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('admin/barang');
            } else {
                $this->upload->display_errors();
                $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                redirect('admin/edit_barang/' . $post['idbarang']);
            }
        } else {
            // Jika Gambar tidak Di Upload
            $post['gambar'] = null;
            $this->admin->editbarang($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('admin/barang');
            // }
        }
    }
    public function deletebarang($id)
    {
        // Hapus Gambar Di Folder
        $item = $this->admin->getbarang($id)->row();
        if ($item->gambar != null) {
            $target_file = 'assets/images/barang/' . $item->gambar;
            unlink($target_file);
        }
        $this->admin->delete_barang($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/barang');
    }
    public function barang_rusak()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['barang_rusak'] = $this->admin->getrusak()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_barang_rusak()
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $data['user'] = $this->admin->getuser()->result_array();
        $data['barang'] = $this->admin->getbarang()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
            $this->admin->insert_barang_rusak();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('admin/barang_rusak');
        }
    }
    public function edit_barang_rusak($id)
    {
        $data['title'] = 'Inventory Barang Rusak';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();
        $data['barang'] = $this->admin->getbarang()->result_array();
        $data['barangrusak'] = $this->admin->getrusak($id)->row();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/edit_barang_rusak', $data);
            $this->load->view('template/footer');
        } else {
        }
    }

    public function prosesbarangrusak()
    {
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlahbarangrusak', 'Masukkan Jumlah Barang Rusak', 'required|trim');

        $this->admin->edit_barang_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/barang_rusak');
    }

    public function deletebarangrusak($id)
    {
        $this->admin->delete_rusak($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('admin/barang_rusak');
    }

    public function pinjaman()
    {
        $data['title'] = 'Inventory Barang Pinjaman';
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/pinjaman', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_pinjaman()
    {
        $data['title'] = 'Tambah Data Inventory Barang Pinjaman';
        $data['barang'] = $this->admin->getbarangpinjaman()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        $data['peminjam'] = $this->peminjam->aktif()->result_array();

        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        // $this->form_validation->set_rules('namapinjaman', 'Masukkan Nama Pinjaman', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');
        $this->form_validation->set_rules('jumlahharga', 'Masukkan Harga Pinjam', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Peminjam', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
            $this->admin->insert_pinjaman();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('admin/pinjaman');
        }
    }
    public function edit_pinjaman($id)
    {
        $data['title'] = 'Update Data Inventory Barang Pinjaman';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['pinjaman'] = $this->admin->aktif($id)->row_array();
        $data['user'] = $this->admin->getuser()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/edit_pinjaman', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarangpinjaman()
    {
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('namapinjaman', 'Masukkan Nama Pinjaman', 'required|trim');
        $this->form_validation->set_rules('totalpinjaman', 'Masukkan Total Pinjaman', 'required|trim');
        $this->form_validation->set_rules('durasipinjaman', 'Masukkan Durasi Pinjaman', 'required|trim');
        $this->form_validation->set_rules('peminjam', 'Masukkan Peminjam', 'required|trim');
        $this->admin->edit_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/pinjaman');
    }

    public function update_pembayaran()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Masukkan Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('pembayaran', 'Masukkan Pembayaran', 'required|trim');
        $this->form_validation->set_rules('jumlah_harga', 'Masukkan Aktik', 'required|trim');
        $this->admin->update_pinjaman();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/pinjaman');
    }
    public function update_stok()
    {
        $this->form_validation->set_rules('status_kembalian', 'Masukkan Status Kembalian', 'required|trim');
        $this->form_validation->set_rules('totalbarang', 'Masukkan Jumlah Stok Pinjaman', 'required|trim');
            // Koding Gambar
        $this->admin->update_stok();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/pinjaman');
    }
    public function update_rusak()
    {
        $this->form_validation->set_rules('status_pembayaran', 'Masukkan Status Pembayaran', 'required|trim');
        $this->form_validation->set_rules('rusak', 'Masukkan Jumlah Stok Barang Rusak', 'required|trim');
            // Koding Gambar
        $this->admin->update_rusak();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/barang_rusak');
    }
    public function delete_pinjaman($id)
    {
        $this->admin->delete_pinjaman($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/pinjaman');
    }

    public function barang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        $data['masuk'] = $this->admin->get_barang_masuk()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_barang_masuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['user'] = $this->admin->getuser()->result_array();
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('total_barang', 'Total Barang', 'required|trim');
        $this->form_validation->set_rules('stock_barang', 'Stock Barang', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
            $this->admin->tambah_barang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('admin/barang_masuk');
        }
    }
    
    public function delete_barang_masuk($id)
    {
        $this->admin->delete_barang_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/barang_masuk');
    }
    public function ruangan()
    {
        $data['title'] = 'Ruangan';
        $data['ruangan'] = $this->admin->getruangan()->result_array();
        $data['user'] = $this->admin->getuser()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/ruangan', $data);
            $this->load->view('template/footer');
        } else {
            // $this->admin->tambah_barang_masuk();
            // redirect('admin/barang_masuk');
        }
    }

    public function tambah_ruangan()
    {
        $data['title'] = 'Tambah Ruangan';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama Operator', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/tambah_ruangan', $data);
            $this->load->view('template/footer');
        } else {
            $this->admin->tambah_ruangan();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
           redirect('admin/ruangan');
        }

    }

    public function edit_ruangan($id)
    {
        $data['title'] = 'Edit Ruangan';
        $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
        $data['ruangan'] = $this->admin->getruangan($id)->row_array();
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Nama Ruangan', 'required|trim');
        $this->form_validation->set_rules('user', 'Nama Operator', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/edit_ruangan', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function sudah_bayar()
    {
        $data['title'] = 'Sudah Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->admin->sudah_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->admin->sudahpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/sudah_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function belum_bayar()
    {
        $data['title'] = 'Belum Transaksi';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->admin->belum_transaksi()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->admin->belumpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/belum_bayar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }
    public function transaksi_panjar()
    {
        $data['title'] = 'Transaksi Masih Panjar';
        if (null !== $this->input->get('filter-tanggal')) {

            $data['pinjaman']   = $this->admin->transaksi_masih_panjar()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['pinjaman'] = $this->admin->panjarpinjaman()->result_array();
        }

        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/transaksi_panjar', $data);
            $this->load->view('template/footer');
        } else {

        }
    }

    public function proses_ruangan()
    {
        $this->admin->edit_ruangan();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/ruangan');
    }
    public function delete_ruangan($id)
    {
        $this->admin->delete_ruangan($id);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/ruangan');
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
        if ($this->input->post('ruangan_id')) {
            echo $this->select->select_ruangan($this->input->post('ruangan_id'));
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

    public function detailbarang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['masuk']   = $this->admin->detail_masuk_barang()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['masuk'] = $this->admin->get_barang_masuk()->result_array();
        }
        $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/detail_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_barang_masuk()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['masuk']   = $this->admin->detail_masuk_barang()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['masuk']   = $this->admin->detail_masuk_barang()->result_array();
        }
        
        $this->mypdf->generate('laporan/laporan', $data);
    }
    public function sudah_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->admin->sudah_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->admin->sudah_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/sudah_transaksi', $data);
    }

    public function belum_transaksi()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->admin->belum_transaksi()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->admin->belum_transaksi()->result_array();
        }
        
        $this->mypdf->generate('laporan/belum_transaksi', $data);
    }
    public function transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['pinjaman']   = $this->admin->transaksi_masih_panjar()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['pinjaman']   = $this->admin->transaksi_masih_panjar()->result_array();
        }
        
        $this->mypdf->generate('laporan/transaksi_masih_panjar', $data);
    }
    public function all_laporan_barang_masuk()
    {
        $this->load->library('Mypdf');

        $data['masuk'] = $this->admin->get_barang_masuk()->result_array();
        $this->mypdf->generate('laporan/all_laporan', $data);
    }
    public function semua_sudah_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->admin->sudahpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_sudah_transaksi', $data);
    }
    public function semua_belum_transaksi()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->admin->belumpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_belum_transaksi', $data);
    }
    public function semua_transaksi_masih_panjar()
    {
        $this->load->library('Mypdf');

        $data['pinjaman'] = $this->admin->panjarpinjaman()->result_array();
        $this->mypdf->generate('laporan/semua_transaksi_masih_panjar', $data);
    }
    
    public function fakultas()
    {
            $data['title'] = 'Fakultas';
            $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
            $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();
    
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header');
                $this->load->view('template/sidebar',$data);
                $this->load->view('fakultas/index', $data);
                $this->load->view('template/footer');
        }
    }

    public function tambah_fakultas()
    {
        $this->fakultas->tambah_fakultas();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/fakultas');
    }

    public function delete_fakultas($id)
    {
        $this->fakultas->delete_fakultas($id);
        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/fakultas');
    }
    public function jurusan()
    {
            $data['title'] = 'Jurusan';
            $data['jurusan'] = $this->fakultas->get_jurusan()->result_array();
            $data['fakultas'] = $this->fakultas->get_fakultas()->result_array();
            $data['barang_pinjaman'] = $this->admin->getpinjaman()->result_array();

            $this->form_validation->set_rules('fakultas', 'Masukan Nama Fakultas', 'trim|required');
            $this->form_validation->set_rules('jurusan', 'Masukan Nama jurusan', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header');
                $this->load->view('template/sidebar',$data);
                $this->load->view('jurusan/index', $data);
                $this->load->view('template/footer');
        }else {
            
        }
    }
    public function tambah_jurusan()
    {
        $this->fakultas->tambah_jurusan();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('admin/jurusan');
    }
    public function edit_jurusan()
    {
        $this->fakultas->edit_jurusan();
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('admin/jurusan');
    }

    public function delete_jurusan($id)
    {
        $this->fakultas->delete_jurusan($id);
        if($this->db->affected_rows > 0)
        {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('admin/jurusan');
    }

    public function aturan()
    {
            $data['title'] = 'Aturan Transaksi';
            $data['aturan'] = $this->admin->aturan()->result_array();

            $this->form_validation->set_rules('fakultas', 'Masukan Nama Fakultas', 'trim|required');
            $this->form_validation->set_rules('jurusan', 'Masukan Nama jurusan', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header');
                $this->load->view('template/sidebar',$data);
                $this->load->view('admin/aturan', $data);
                $this->load->view('template/footer');
        }else {
            
        }
    }

    public function tambah_aturan()
    {
        $aturan = $this->input->post('aturan');
        if ($aturan == null) {
            $this->session->set_flashdata('error', 'Data Aturan Masih Kosong');
            redirect('admin/aturan');
        }else{
           $this->admin->tambah_aturan(); 
           $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
            redirect('admin/aturan');
        }
    }
    public function edit_aturan()
    {
        $aturan = $this->input->post('aturan');
        if ($aturan == null) {
            $this->session->set_flashdata('error', 'Data Aturan Masih Kosong');
            redirect('admin/aturan');
        }else{
           $this->admin->edit_aturan(); 
           $this->session->set_flashdata('success', 'Data Berhasil Di Simpan');
            redirect('admin/aturan');
        }
    }
    public function delete_aturan($id)
    {
        $this->admin->delete_aturan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        }
        redirect('admin/aturan');

    }

    public function get_lupa_kata_sandi()
    {
        $data['title'] = 'Ganti Kata Sandi';
        $data['lupa_kata_sandi'] = $this->peminjam->get_lupa_kata_sandi()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/lupa_kata_sandi', $data);
            $this->load->view('template/footer');
        }else {
            
        }
    }

    public function ganti_kata_sandi($post)
    {
        $data['title'] = 'Ganti Kata Sandi';
        $data['lupa_kata_sandi'] =$this->db->get_where('user_peminjam',['nomor_ktp'=>$post])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar',$data);
            $this->load->view('admin/ganti_kata_sandi', $data);
            $this->load->view('template/footer');
        }else {
            
        }
    }
    public function ganti_kata_sandi_baru()
    {
        $kata_sandi                 = $this->input->post('kata_sandi');
        $konfirmasi_kata_sandi      = $this->input->post('konfirmasi_Kata_sandi');
        $nomor_ktp                  = $this->input->post('nomor_ktp');

        if ($kata_sandi == null) {
            $this->session->set_flashdata('error', "Kata Sandi Masih Kosong");
            redirect('admin/ganti_kata_sandi/'.$nomor_ktp);
        }elseif ($kata_sandi != $konfirmasi_kata_sandi) {
            $this->session->set_flashdata('error', "Kata Sandi Dengan Konfirmasi Kata Sandi Tidak Sama");
            redirect('admin/ganti_kata_sandi/'.$nomor_ktp);
        }else {
            $this->peminjam->ganti_kata_sandi_baru();
            $this->session->set_flashdata('success', "Kata Sandi Anda Berhasil Di Ganti");
            redirect('admin/ganti_kata_sandi/'.$nomor_ktp);
        }
    }
}