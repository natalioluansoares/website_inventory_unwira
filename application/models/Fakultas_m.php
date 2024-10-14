<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_m extends CI_Model
{
    public function get_fakultas($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('id_fakultas !=', 1);
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_fakultas_teknik($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Teknik');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_fakultas_operator($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_fakultas_ekonomi_bisnis($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_fakultas_sosial_politik($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_fakultas_filsafat($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Filsafat');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }
    
    public function get_fakultas_matematika_dan_ilmu_pengetahuan_alam($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function get_fakultas_keguruan_dan_ilmu_pendidikan($id = null)
    {
        $this->db->from('fakultas');
        $this->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        if ($id != null) {
            $this->db->where('id_fakultas', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_fakultas', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_jurusan($id = null)
    {

        $this->db->from('jurusan');
        $this->db->join('fakultas', 'jurusan.fakultas = fakultas.id_fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_jurusan !=', 'Operator Hukum');
        $this->db->where('nama_jurusan !=', 'Operator Teknik');
        $this->db->where('nama_jurusan !=', 'Operator Ekonomi Dan Bisnis');
        $this->db->where('nama_jurusan !=', 'Operator Ilmu Sosial Dan Ilmu politik');
        $this->db->where('nama_jurusan !=', 'Operator Filsafat');
        $this->db->where('nama_jurusan !=', 'Operator Matematika Dan Ilmu Pengetahuan Alam');
        $this->db->where('nama_jurusan !=', 'Operator Keguruan Dan Ilmu Pendidikan');
        $this->db->where('nama_jurusan !=', 'Operator Pasca Sarjana Manajemen');
        $this->db->where('nama_jurusan !=', 'Admin');
        if ($id != null) {
            $this->db->where('id_jurusan', $id, 'asc');
        }
        //  Urutkan Data
        $this->db->order_by('id_jurusan', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_fakultas()
    {
        $fakultas = $this->input->post('fakultas');

        $data = [
            'nama_fakultas' => $fakultas
        ];
        $this->db->insert('fakultas',$data);
    }

    public function delete_fakultas($id)
    {
        $this->db->where('id_fakultas',$id);
        $this->db->delete('fakultas');
    }

    public function tambah_jurusan()
    {
        $fakultas = $this->input->post('namafakultas');
        $jurusan = $this->input->post('jurusan');

        $data = [
            'fakultas'          =>$fakultas,
            'nama_jurusan'      =>$jurusan
        ];

        $this->db->insert('jurusan', $data);
    }

    public function edit_jurusan()
    {
        $idjurusan = $this->input->post('idjurusan');
        $fakultas = $this->input->post('namafakultas');
        $jurusan = $this->input->post('jurusan');

        $data = [
            'id_jurusan'        =>$idjurusan,
            'fakultas'          =>$fakultas,
            'nama_jurusan'      =>$jurusan
        ];

        // var_dump($data);
        // die;
        $this->db->where('id_jurusan', $idjurusan);
        $this->db->update('jurusan', $data);
    }

    public function delete_jurusan($id)
    {
        $this->db->where('id_jurusan',$id);
        $this->db->delete('jurusan');
    }
}