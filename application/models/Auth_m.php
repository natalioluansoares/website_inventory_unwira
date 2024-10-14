<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function user($id = null)
    {
        $data = $this->fungsi->user_login()->id_user;
        $this->db->from('user');
        $this->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('id_user', $data);
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}