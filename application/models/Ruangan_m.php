<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ruangan_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('ruangan');
        $this->db->join('user', 'ruangan.operator = user.id_user', 'nama_lengkap',  'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_ruangan', $id, 'ASC');
        }
        //  Urutkan Data
        $this->db->order_by('id_ruangan', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_ruangan()
    {
        $kode       = $this->input->post('kode');
        $ruangan    = $this->input->post('ruangan');

        $data = [
            'kode_ruangan' => $kode,
            'nama_ruangan' => $ruangan,
            'operator'     => $this->session->userdata('id_user')
        ];
        $this->db->insert('ruangan',$data);
    }

    public function edit_ruangan()
    {
        $idruangan      = $this->input->post('idruangan');
        $user           = $this->input->post('user');
        $kode           = $this->input->post('kode');

        $data = [
            'id_ruangan'    => $idruangan,
            'kode_ruangan'  => $kode,
            'nama_ruangan'  => $ruangan,
            'operator'     => $this->session->userdata('id_user')
        ];
        $this->db->where('id_ruangan',$idruangan);
        $this->db->update('ruangan',$data);
    }

    public function delete_ruangan($id)
    {
        $this->db->where('id_ruangan',$id);
        $this->db->delete('ruangan');

    }
}