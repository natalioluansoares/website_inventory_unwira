<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_tow_barang_m extends CI_Model
{
    function select_fakultas($id_fakutas)
    {
        $data = $this->fungsi->user_login()->nama_jurusan;
        $this->db->where('fakultas', $id_fakutas);
        $this->db->order_by('nama_jurusan', 'DESC');
        $this->db->where('nama_jurusan !=', $data);
        // $this->db->where('nama_jurusan !=', 'Operator Hukum');
        // $this->db->where('nama_jurusan !=', 'Operator Teknik');
        // $this->db->where('nama_jurusan !=', 'Operator Ekonomi Dan Bisnis');
        // $this->db->where('nama_jurusan !=', 'Operator Ilmu Sosial Dan Ilmu politik');
        // $this->db->where('nama_jurusan !=', 'Operator Filsafat');
        // $this->db->where('nama_jurusan !=', 'Operator Matematika Dan Ilmu Pengetahuan Alam');
        // $this->db->where('nama_jurusan !=', 'Operator Keguruan Dan Ilmu Pendidikan');
        // $this->db->where('nama_jurusan !=', 'Operator PDESCa Sarjana Manajemen');
        $query = $this->db->get('jurusan');
        $output = '<option value="">Pilih Jurusan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_jurusan . '">' . $row->nama_jurusan . '</option>';
        }
        return $output;
    }
    function uang_kas_fakultas($id_fakutas)
    {
        $data = $this->fungsi->user_login()->nama_jurusan;
        $this->db->where('fakultas', $id_fakutas);
        $this->db->where('nama_jurusan !=', $data);
        $this->db->order_by('nama_jurusan', 'DESC');
        $query = $this->db->get('jurusan');
        $output = '<option value="">Pilih Jurusan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_jurusan . '">' . $row->nama_jurusan . '</option>';
        }
        return $output;
    }
    function uang_kas_operator($id_jurusan)
    {
        // $data = $this->fungsi->user_login()->nama_jurusan;
        $this->db->where('jurusan', $id_jurusan);
        $this->db->order_by('nama_lengkap', 'DESC');
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan','level', 'LEFT');
        // $this->db->where('nama_jurusan =', $data);
        $query = $this->db->get();
        $output = '<option value="">Pilih Operator</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_user . '">' . $row->nama_lengkap . '</option>';
        }
        return $output;
    }
    function select_admin($id_fakutas)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->where('fakultas', $id_fakutas);
        $this->db->order_by('nama_jurusan', 'DESC');
        $this->db->from('jurusan');
        $this->db->join('fakultas', 'jurusan.fakultas = fakultas.id_fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $query = $this->db->get();
        $output = '<option value="">Pilih Jurusan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_jurusan . '">' . $row->nama_jurusan . '</option>';
        }
        return $output;
    }
    function select_user($id_jurusan)
    {
        // $data = $this->fungsi->user_login()->nama_jurusan;
        $this->db->where('jurusan', $id_jurusan);
        $this->db->order_by('nama_lengkap', 'DESC');
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan','level', 'LEFT');
        // $this->db->where('level !=', 'Admin');
        // $this->db->where('level !=', 'Admin_Hukum');
        // $this->db->where('level !=', 'Admin_Teknik');
        // $this->db->where('level !=', 'Admin_Ekonomi_Dan_Bisnis');
        // $this->db->where('level !=', 'Admin_Ilmu_Sosial_Dan_Ilmu_politik');
        // $this->db->where('level !=', 'Admin_Hukum');
        // $this->db->where('level !=', 'Admin_Filsafat');
        // $this->db->where('level !=', 'Admin_Matematika_Dan_Ilmu_Pengetahuan_Alam');
        // $this->db->where('level !=', 'Admin_Keguruan_Dan_Ilmu_Pendidikan');
        $this->db->where('level !=', 'Operator_Fakultas');
        // $this->db->where('nama_jurusan =', $data);
        $query = $this->db->get();
        $output = '<option value="">Pilih Operator</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_user . '">' . $row->nama_lengkap . '</option>';
        }
        return $output;
    }
    function select_kategori($id_operator)
    {
        $this->db->where('operator', $id_operator);
        $this->db->order_by('nama_kategori', 'DESC');
        $query = $this->db->get('kategori');
        $output = '<option value="">Pilih Kategori</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_kategori . '">' . $row->nama_kategori . '</option>';
        }
        return $output;
    }
    function select_barang($id_user)
    {
        $this->db->where('operator', $id_user);
        $this->db->order_by('nama_barang', 'DESC');
        $query = $this->db->get('barang');
        $output = '<option value="">Pilih Barang</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_barang . '">' . $row->nama_barang . '</option>';
        }
        return $output;
    }

    function select_total_barang($id_user)
    {
        $this->db->where('id_barang', $id_user);
        $this->db->order_by('total_barang', 'DESC');
        $query = $this->db->get('barang');
        // $output = '<option value="">Stock Barang</option>';
        foreach ($query->result() as $row) {
            $output .='<option value="' . $row->total_barang . '">' . $row->total_barang * $row->harga_barang . '</option>';
        }
        return $output;
    }

    function select_uang_kas_masuk($id_user)
    {
        
        $this->db->where('operator_fakultas_jurusan', $id_user);
        $this->db->order_by('jumlah_uang_kas_fakultas_jurusan', 'DESC');
        $query = $this->db->get('uang_kas_fakultas_jurusan');
        $output = '<option value="">Jumlah Uang Jurusan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_uang_kas_fakultas_jurusan . '">' . $row->jumlah_uang_kas_fakultas_jurusan . '</option>';
        }
        return $output;
    }
    
    function select_kode_barang($id_user)
    {
        $this->db->where('id_barang', $id_user);
        $this->db->order_by('stok_barang', 'DESC');
        $query = $this->db->get('barang');
        // $output = '<option value="">Stock Barang</option>';
        foreach ($query->result() as $row) {
            $output .='<option value="' . $row->stok_barang . '">' . $row->stok_barang . '</option>';
        }
        return $output;
    }
    
    function select_kode($id_user)
    {
        $this->db->where('id_barang', $id_user);
        $this->db->order_by('stok_barang', 'DESC');
        $query = $this->db->get('barang');
        // $output = '<option value="">Stock Barang</option>';
        foreach ($query->result() as $row) {
            $output .='<option value="' . $row->id_barang . '">' . $row->stok_barang . '</option>';
        }
        return $output;
    }
    
    function select_harga($id_user)
    {
        $this->db->where('id_barang', $id_user);
        $this->db->order_by('stok_barang', 'DESC');
        $query = $this->db->get('barang');
        // $output = '<option value="">Stock Barang</option>';
        foreach ($query->result() as $row) {
            $output .='<option value="' . $row->stok_barang . '">' . $row->stok_barang . '</option>';
        }
        return $output;
    }
    
    function select_harga_barang_pinjam($id_user)
    {
        $this->db->where('id_barang', $id_user);
        $this->db->order_by('harga_barang_pinjam', 'DESC');
        $query = $this->db->get('barang');
        // $output = '<option value="">Harga Barang Pinjam</option>';
        foreach ($query->result() as $row) {
            $output .='<option value="' . $row->harga_barang_pinjam. '">' . $row->harga_barang_pinjam . '</option>';
        }
        return $output;
    }

    function select_pinjaman($id_user)
    {
        $this->db->where('operator', $id_user);
        $this->db->order_by('nama_barang', 'DESC');
        $query = $this->db->get('barang');
        $output = '<option value="">Pilih Barang</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_barang . '">' . $row->nama_barang . '</option>';
        }
        return $output;
    }
    function select_ruangan($id_user)
    {
        $this->db->where('operator', $id_user);
        $this->db->order_by('nama_ruangan', 'DESC');
        $query = $this->db->get('ruangan');
        $output = '<option value="">Pilih Ruangan</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_ruangan . '">' . $row->nama_ruangan . '</option>';
        }
        return $output;
    }
    function select_barang_rusak($id_user)
    {
         $this->db->where('operator', $id_user);
        $this->db->order_by('nama_perbaiki', 'DESC');
        $query = $this->db->get('barang_rusak');
        $output = '<option value="">Nama Perbaiki</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_rusak . '">' . $row->nama_perbaiki . '</option>';
        }
        return $output;
    
    }
    function select_barang_rusak_uang($id_user)
    {
         $this->db->where('id_rusak', $id_user);
        $this->db->order_by('harga_perbaiki', 'DESC');
        $query = $this->db->get('barang_rusak');
        // $output = '<option value="">Jumlah Uang Perbaiki</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->harga_perbaiki * $row->jumlah_barang_rusak . '">' . $row->harga_perbaiki * $row->jumlah_barang_rusak. '</option>';
        }
        return $output;
    
    }
    public function getUsers($postData)
    {

        $response = array();
        $this->db->select('*');
        if ($postData['search']) {

            // Select record
            $this->db->where("nama_barang like '%" . $postData['search'] . "%' ");

            $records = $this->db->get('barang')->result();

            foreach ($records as $row) {
                $response[] = array(
                    "value" => $row->stok_barang,
                    "value1" => $row->harga_barang_pinjam,
                    "label" => $row->nama_barang
                );
            }
        }

        return $response;
    }
}