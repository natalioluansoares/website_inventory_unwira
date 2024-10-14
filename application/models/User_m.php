<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nama_lengkap', $post['username']);
        $this->db->where('kata_sandi', sha1($post['password1']));
        $query = $this->db->get();
        return $query;
    }

    public function user_name($nama_lengkap)
    {
        $nama_lengkap = $this->db->get_where('user',['nama_lengkap'=>$nama_lengkap]);
        return $nama_lengkap->num_rows();
    }
    public function kata_sandi($nama)
    {
        $kata_sandi = $this->db->get_where('user', ['nama_lengkap'=> $nama])->row_array();
        return $kata_sandi['kata_sandi'];
    }

    public function semua($semua)
    {
        $semua = $this->db->get_where('user', ['nama_lengkap' =>$semua])->row_array();
        return $semua;
    }
    public function get($id = null)
    {

        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        //  Urutkan Data
        $this->db->order_by('nama_lengkap', 'asc');
        $query = $this->db->get();
        return $query;
    }

    
    public function rahasia($id = null)
    {
        $data = $this->fungsi->user_login()->level;
        $this->db->from('user');
        $this->db->where('level =', $data);
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        //  Urutkan Data
        $this->db->order_by('nama_lengkap', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function getnamalengkap($kode, $id = null)
    {
        $this->db->from('user');
        $this->db->where('nama_lengkap', $kode);
        if ($id != null) {
            $this->db->where('id_user !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function getemail($kode, $id = null)
    {
        $this->db->from('user');
        $this->db->where('email', $kode);
        if ($id != null) {
            $this->db->where('id_user !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }

    public function result($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Admin');
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $this->db->order_by('id_user', 'DESC');
        $nato = $this->db->get();
        return $nato;
    }
    public function result_operator_jurusan($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $this->db->order_by('id_user', 'DESC');
        $nato = $this->db->get();
        return $nato;
    }
    public function operator_jurusan($id=null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function result_operator_fakultas($id=null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Jurusan');
        // $query = $this->db->get('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    
    
    public function operator_hukum($id=null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('user');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan','misi','visi', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    

    public function inputuser($post)
    {
        $namadepan          = htmlspecialchars($this->input->post('namadepan', true));
        $namabelakang       = htmlspecialchars($this->input->post('namabelakang', true));
        $namalengkap        = htmlspecialchars($this->input->post('namalengkap', true));
        $email              = htmlspecialchars($this->input->post('email', true));
        // $password           = $this->input->post('password1');
        $level              = ($this->input->post('level'));
        $jurusan           = ($this->input->post('jurusan'));
        // var_dump($namadepan);
        // die;
        $data               = [
            'nama_depan'             => $namadepan,
            'nama_belakang'          => $namabelakang,
            'nama_lengkap'           => $namalengkap,
            'email'                  => $email,
            'kata_sandi'             => password_hash($post['password1'], PASSWORD_DEFAULT),
            'level'                  => $level,
            'jurusan'               => $jurusan,
            'aktif_akun_inventori'  => 1,
            'created_akun'           => time(),
            'foto'                   => $post['foto'],
        ];

        $this->db->insert('user', $data);
    }

    public function edituser($post)
    {
        $id                 = $this->input->post('iduser');
        $namadepan          = htmlspecialchars($this->input->post('namadepan', true));
        $namabelakang       = htmlspecialchars($this->input->post('namabelakang', true));
        $namalengkap        = htmlspecialchars($this->input->post('namalengkap', true));
        $email              = htmlspecialchars($this->input->post('email', true));
        $level              = ($this->input->post('level'));
        $jurusan            = ($this->input->post('jurusan'));
        // var_dump($namadepan);
        // die;
        $data               = [
            'id_user'                => $id,
            'nama_depan'             => $namadepan,
            'nama_belakang'          => $namabelakang,
            'nama_lengkap'           => $namalengkap,
            'email'                  => $email,
            'jurusan'               => $jurusan,
            'level'                  => $level,
        ];

        if ($post['foto'] != null) {
            # code...
            $data['foto'] = $post['foto'];
        }
        // var_dump($data);
        // die;
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function misi()
    {
        $jurusan    = $this->input->post('jurusan');
        $misi       = $this->input->post('misi');

            $data = [
                'id_jurusan'    => $jurusan,
                'misi'          => $misi
            ];
            $this->db->where('id_jurusan', $jurusan);
            $this->db->update('jurusan', $data);

    }

    public function visi()
    {
        $jurusan    = $this->input->post('jurusan');
        $visi       = $this->input->post('visi');

            $data = [
                'id_jurusan'    => $jurusan,
                'visi'          => $visi
            ];
            $this->db->where('id_jurusan', $jurusan);
            $this->db->update('jurusan', $data);
        
    }

    public function aktif_akun_fakultas()
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif_akun_inventori =',1);
        $this->db->where('level !=','Operator_Jurusan');
        $this->db->where('level !=','Admin');
        return $this->db->get();
    }
    public function aktif_akun_jurusan()
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif_akun_inventori =',1);
        $this->db->where('level !=','Operator_Fakultas');
        $this->db->where('level !=','Admin');
        return $this->db->get();
    }
    public function aktif_akun_operator()
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif_akun_inventori =',1);
        $this->db->where('level !=','Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->where('level !=','Admin');
        return $this->db->get();
    }

    public function toggle_user($table, $data = null, $where = null)
    {
        if ($data != null) {
           $row = $this->db->get_where($table, $data)->row_array();
           return $row;
        }else {
            $result = $this->db->get_where($table, $where)->result_array();

            return $result;
        }
    }
    public function toggle_update_user($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        $update = $this->db->update($table, $data);
        return $result;
    }
}