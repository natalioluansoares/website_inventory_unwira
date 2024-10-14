<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_barang', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getkategori()
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        $result = $this->db->get();
        return $result;
    }


    public function getkodebarang($kode, $id = null)
    {
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        if ($id != null) {
            $this->db->where('id_barang !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }


    public function getnamabarang($kode, $id = null)
    {
        $this->db->from('barang');
        $this->db->where('nama_barang', $kode);
        if ($id != null) {
            $this->db->where('id_barang !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function insert_barang($post)
    {
        $kategori               = $this->input->post('kategori');
        $kodebarang             = $this->input->post('kodebarang');
        $namabarang             = $this->input->post('namabarang');
        $ruangan                = $this->input->post('ruangan');
        $harga_barang           = $this->input->post('harga_barang');
        $harga_barang_pinjam    = $this->input->post('harga_barang_pinjam');

        $data = [
            'id_kategori'           => $kategori,
            'kode_barang'           => $kodebarang,
            'nama_barang'           => $namabarang,
            'ruangan'               => $ruangan,
            'harga_barang'          => $harga_barang,
            'harga_barang_pinjam'   => $harga_barang_pinjam,
            'gambar'                => $post['gambar'],
            'created'               => date('Y-m-d'),
            'operator'              => $this->session->userdata('id_user')
        ];
        // var_dump($data);
        // die;
        $this->db->insert('barang', $data);
    }
    public function editbarang($post)
    {
        $id                     = $this->input->post('idbarang');
        $kategori               = $this->input->post('kategori');
        $kodebarang             = $this->input->post('kode_barang');
        $namabarang             = $this->input->post('namabarang');
        $ruangan                = $this->input->post('ruangan');
        $harga_barang           = $this->input->post('harga_barang');
        $harga_barang_pinjam    = $this->input->post('harga_barang_pinjam');
        

        $data = [
            'id_barang'             => $id,
            'id_kategori'           => $kategori,
            'kode_barang'           => $kodebarang,
            'nama_barang'           => $namabarang,
            'ruangan'               => $ruangan,
            'harga_barang'          => $harga_barang,
            'harga_barang_pinjam'   => $harga_barang_pinjam,
            'updated'               => date('Y-m-d'),
            'operator'              => $this->session->userdata('id_user'),
        ];
        if ($post['gambar'] != null) {
            $data['gambar'] = $post['gambar'];
            // var_dump($data);
            // die;
        }
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }
    
    public function get_barang_masuk($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'harga_barang', 'LEFT');
        $this->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_barang_masuk',$id);
        }
        $this->db->order_by('id_barang_masuk', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_barang_masuk()
    {
        $user           = $this->input->post('user');
        $namabarang     = $this->input->post('namabarang');
        $total_barang   = $this->input->post('total_barang');
        $stock_barang   = $this->input->post('stock_barang');

        $data   = [
                'id_barang'             => $namabarang,
                'total_barang_masuk'    => $total_barang,
                'stock_barang_masuk'    => $stock_barang,
                'operator'              => $user,
                'tanggal_barang_masuk'  => date('Y-m-d'),
                'operator'              => $this->session->userdata('id_user'),
        ];
        // var_dump($data);
        // die;
        $stok = $this->db->get_where('barang', ['id_barang' => $data['id_barang']])->row();
        $update = [
            'stok_barang' => $stok->stok_barang + (int) $data['stock_barang_masuk'],
            'total_barang' => $stok->total_barang + (int) $data['total_barang_masuk'],
        ];
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $update);

        $this->db->insert('barang_masuk',$data);
    }
    public function delete_barang_masuk($id)
    {
        $stock_barang_masuk = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id])->row();

        $stok = $this->db->get_where('barang', ['id_barang' => $stock_barang_masuk->id_barang])->row();

        $update = [
            'stok_barang' => $stok->stok_barang - (int) $stock_barang_masuk->stock_barang_masuk,
            'total_barang' => $stok->total_barang - (int) $stock_barang_masuk->total_barang_masuk,
        ];
        $this->db->where('id_barang', $stock_barang_masuk->id_barang);
        $this->db->update('barang', $update);

        $this->db->where('id_barang_masuk',$id);
        $this->db->delete('barang_masuk');
    }
    
    public function detail_masuk_barang($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'nama_lengkap', 'LEFT');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('tanggal_barang_masuk >=', $tanggal_awal);
        $this->db->where('tanggal_barang_masuk <=', $tanggal_akhir);
        $this->db->where('nama_lengkap =', $data);

        if ($id != null) {
            $this->db->where('tanggal_barang_masuk', $id);
        }
        $this->db->order_by('id_barang_masuk', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    
    
}