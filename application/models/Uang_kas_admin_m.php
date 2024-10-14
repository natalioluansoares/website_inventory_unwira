<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_kas_admin_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('uang_kas_unwira');
        $this->db->join('user', 'uang_kas_unwira.operator_unwira = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('fakultas', 'uang_kas_unwira.fakultas = fakultas.id_fakultas', 'nama_fakultas', 'LEFT');
        if ($id != null) {
            $this->db->where('id_uang_kas_unwira', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_unwira', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah()
    {
        $user               = $this->input->post('user');
        $fakultas           = $this->input->post('fakultas');

        $data =[
            'operator_unwira'         =>$user,
            'status_uang_unwira'      =>'Uang Masuk',
            'fakultas'                =>$fakultas,
            'tanggal_simpan_unwira'   => date('Y-m-d'),
            'aktif_unwira'            => 1,
        ];
        // var_dump($data);
        // die;
        $this->db->insert('uang_kas_unwira', $data);
    }

    public function edit()
    {
        $id                 = $this->input->post('id');
        $user               = $this->input->post('user');

        $data =[
            'id_uang_kas_unwira'          => $id,
            'status_uang_unwira'          =>'Uang Masuk',
            'operator_unwira'             =>$user,
            'tanggal_ubah_unwira'         => date('Y-m-d'),
            'aktif_unwira'                => 1,
        ];
        // var_dump($data);
        // die;
        $this->db->where('id_uang_kas_unwira', $id);
        $this->db->update('uang_kas_unwira', $data);


    }

    public function hapus($id)
    {
        $this->db->where('id_uang_kas_unwira',$id);
        $this->db->delete('uang_kas_unwira');
    }
    public function uang_kas_masuk($id = null)
    {
        $this->db->from('uang_kas_masuk_unwira');
        
        $this->db->join('uang_kas_unwira', 'uang_kas_masuk_unwira.id_uang_kas_unwira = 
        uang_kas_unwira.id_uang_kas_unwira', 'status_uang_unwira', 'LEFT');
        $this->db->join('user', 'user.id_user = uang_kas_unwira.operator_unwira', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        if ($id != null) {
            $this->db->where('id_uang_kas_masuk_unwira', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_masuk_unwira', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_uang_masuk()
    {
            $user                       = $this->input->post('user');
            $jumlah_uang_masuk          = $this->input->post('jumlah_uang_masuk');



            $data = [
                    'jumlah_uang_kas_unwira'    =>$jumlah_uang_masuk,
                    'id_uang_kas_unwira'        =>$user,
                    'aktif_uang_kas_unwira'     =>1,
                    'tanggal_simpan_unwira'     =>date('Y-m-d'),
            ];
            $uang_kas_unwira = $this->db->get_where('uang_kas_unwira', ['id_uang_kas_unwira' => $data['id_uang_kas_unwira']])->row();
            $update = [
                'uang_masuk_unwira'=> $uang_kas_unwira->uang_masuk_unwira + (int) $data['jumlah_uang_kas_unwira'],
            ];
            $this->db->where('id_uang_kas_unwira', $data['id_uang_kas_unwira']);
            $this->db->update('uang_kas_unwira', $update);
            
            $this->db->insert('uang_kas_masuk_unwira', $data);
    }

    public function hapus_uang_kas_masuk($id)
    {
        $uang_kas_masuk_unwira = $this->db->get_where('uang_kas_masuk_unwira', ['id_uang_kas_masuk_unwira' => $id])->row();
        $uang_kas_unwira = $this->db->get_where('uang_kas_unwira', ['id_uang_kas_unwira' => $uang_kas_masuk_unwira->id_uang_kas_unwira])->row();
        $update = [
            'uang_masuk_unwira'=> $uang_kas_unwira->uang_masuk_unwira - $uang_kas_masuk_unwira->jumlah_uang_kas_unwira,
        ];
        $this->db->where('id_uang_kas_unwira', $uang_kas_masuk_unwira->id_uang_kas_unwira);
        $this->db->update('uang_kas_unwira', $update);

        $this->db->where('id_uang_kas_masuk_unwira',$id);
        $this->db->delete('uang_kas_masuk_unwira');
    }
}