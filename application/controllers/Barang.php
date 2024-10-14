<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('barang_m', 'barang');
        $this->load->model('ruangan_m', 'ruangan');
        $this->load->model('admin_m', 'admin');
        $this->load->model('barang_pinjaman_m', 'barang_pinjaman');
        check_operator_jurusan();
        // check_already_login();
        // check_admin();
        // check_operator_sipil();
        check_not_login();
    }
    public function index()
    {
        $data['title'] = 'Inventory Barang';
        $data['barang'] = $this->barang->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Inventory Barang';
        $data['kategori'] = $this->barang->getkategori()->result_array();
        $data['ruangan'] = $this->ruangan->get()->result_array();

        $this->form_validation->set_rules('kodebarang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang_pinjam', 'Harga Barang Pinjam', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang/tambah_barang', $data);
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
                    $this->barang->insert_barang($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    }
                    redirect('barang');
                } else {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Diupload, Silakan Coba Gambar Lain");
                    redirect('barang/tambah');
                }
            } else {
                // Jika Gambar tidak Di Upload
                $post['gambar'] = null;
                $this->barang->insert_barang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data barang Berhasil Di Tambah');
                }
                redirect('barang');
                // }
            }
        }
    }
    public function edit($id)
    {

        $data['title'] = 'Ganti Data Inventory Barang';
        $data['barang'] = $this->barang->get($id)->row_array();
        $data['kategori'] = $this->barang->getkategori()->result_array();
        $data['ruangan'] = $this->ruangan->get()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang/edit_barang', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function prosesbarang()
    {
        $this->form_validation->set_rules('kode_barang', 'Masukkan Kode Barang', 'required|trim');
        $this->form_validation->set_rules('namabarang', 'Masukkan Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang_pinjam', 'Harga Barang Pinjam', 'required|trim');

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
                $item = $this->barang->get($post['idbarang'])->row();
                if ($item->gambar != null) {
                    $target_file = '.assets/images/barang/' . $item->gambar;
                    unlink($target_file);
                }
                // Gambar Diupload
                $post['gambar'] = $this->upload->data('file_name');
                $this->barang->editbarang($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                }
                redirect('barang');
            } else {
                $this->upload->display_errors();
                $this->session->set_flashdata('error', "File Gambar Ini Tidak Tersediah Di edit Silakan Coba Gambar Lain");
                redirect('barang/edit/' . $post['idbarang']);
            }
        } else {
            // Jika Gambar tidak Di Upload
            $post['gambar'] = null;
            $this->barang->editbarang($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('barang');
            // }
        }
    }
    public function deletebarang($id)
    {
        // Hapus Gambar Di Folder
        $item = $this->barang->get($id)->row();
        if ($item->gambar != null) {
            $target_file = 'assets/images/barang/' . $item->gambar;
            unlink($target_file);
        }
        $this->barang->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('barang');
    }
    
    public function barang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        $data['masuk'] = $this->barang->get_barang_masuk()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_masuk/index', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function tambah_barang_masuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['barang'] = $this->barang->get()->result_array();
        
        $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('total_barang', 'Total Barang', 'required|trim');
        $this->form_validation->set_rules('stock_barang', 'Stock Barang', 'required|trim');
        
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('barang_masuk/tambah_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
            $this->barang->tambah_barang_masuk();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('barang/barang_masuk');
        }
    }

    public function delete_barang_masuk($id)
    {
        $this->barang->delete_barang_masuk($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('barang/barang_masuk');
    }

    public function detailbarang_masuk()
    {
        $data['title'] = 'Data Barang Masuk';
        
        if (null !== $this->input->get('filter-tanggal')) {

            $data['masuk']   = $this->barang->detail_masuk_barang()->result_array();
            // var_dump($data['masuk']);
            // die;
            
        }else{
            $data['masuk'] = $this->barang->get_barang_masuk()->result_array();
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('barang_masuk/detail_barang_masuk', $data);
            $this->load->view('template/footer');
        } else {
        }
    }
    public function laporan_barang_masuk()
    {
        $this->load->library('Mypdf');
        if (null !== $this->input->get('download-tanggal')) {
            $data['masuk']   = $this->barang->detail_masuk_barang()->result_array();
            // var_dump($data['sale']);
            // die;
        }else {
            # code...
            $data['masuk']   = $this->barang->detail_masuk_barang()->result_array();
        }
        
        $this->mypdf->generate('laporan/laporan', $data);
    }
    public function all_laporan_barang_masuk()
    {
        $this->load->library('Mypdf');

        $data['masuk'] = $this->barang->get_barang_masuk()->result_array();
        $this->mypdf->generate('laporan/all_laporan', $data);
    }

    
}