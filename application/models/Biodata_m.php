<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata_m extends CI_Model
{
    public function admin_teknik($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Teknik');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_teknik($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Teknik');
        $this->db->where('nama_fakultas=', 'Teknik');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_hukum($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Hukum');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_hukum($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Hukum');
        $this->db->where('nama_fakultas=', 'Hukum');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_ekonomi($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Ekonomi Dan Bisnis');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_ekonomi($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Ekonomi Dan Bisnis');
        $this->db->where('nama_fakultas=', 'Ekonomi Dan Bisnis');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_filsafat($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Filsafat');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_filsafat($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Filsafat');
        $this->db->where('nama_fakultas=', 'Filsafat');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_sosial($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Ilmu Sosial Dan Ilmu Politik');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_sosial($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Ilmu Sosial Dan Ilmu Politik');
        $this->db->where('nama_fakultas=', 'Ilmu Sosial Dan Ilmu Politik');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_matematika($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Matematika Dan Ilmu Pengetahuan Alam');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_matematika($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Matematika Dan Ilmu Pengetahuan Alam');
        $this->db->where('nama_fakultas=', 'Matematika Dan Ilmu Pengetahuan Alam');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function admin_keguruan($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan =', 'Operator Keguruan Dan Ilmu Pendidikan');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    public function operator_keguruan($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Keguruan Dan Ilmu Pendidikan');
        $this->db->where('nama_fakultas=', 'Keguruan Dan Ilmu Pendidikan');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function operator_fakultas($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Jurusan');
        $this->db->where('level !=', 'Admin');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }

    public function operator_jurusan($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('level !=', 'Admin');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function edit_profile()
    {
        $id_user_peminjam = $this->input->post('id_user_peminjam');
        $password = $this->input->post('kata_sandi_baru');
        $konfirmasi = $this->input->post('konfirmasi_kata_sandi');
        if ($password != $konfirmasi) {
            $this->session->set_flashdata('error', 'Kata Sandi Tidak Sesuai');
            redirect('transaksi');
        } else {
            $data = [
                'id_user_peminjam'      => $id_user_peminjam,
                'kata_sandi'            =>password_hash($password, PASSWORD_DEFAULT) 
            ];
            // var_dump($data);
            // die;
            $this->db->where('id_user_peminjam', $id_user_peminjam);
            $this->db->update('user_peminjam', $data);
        }
    }

}