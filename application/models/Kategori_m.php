<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('kategori');
        $this->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_kategori', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_where($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('kategori');
        $this->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        // $this->db->where('nama_lengkap !=', $data);
        // $this->db->where('nama_lengkap =', 'Hukum');
        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }
        //  Urutkan Data
        // $this->db->order_by('id_kategori', 'asc');
        $query = $this->db->get_where();
        return $query;
    }

    public function insert_kategori()
    {
        $kategori = $this->input->post('kategori');
        $data = [
            'nama_kategori'     => $kategori,
            'operator'          => $this->session->userdata('id_user')
        ];
        $this->db->insert('kategori', $data);
    }
    public function edit_kategori()
    {
        $id = $this->input->post('idkategori');
        $kategori = $this->input->post('kategori');
        $data = [
            'id_kategori'       => $id,
            'nama_kategori'     => $kategori,
            'operator'          => $this->session->userdata('id_user')
        ];
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
}