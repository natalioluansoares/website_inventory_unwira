<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_kas_jurusan_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('uang_kas_fakultas_jurusan');
        $this->db->join('user', 'uang_kas_fakultas_jurusan.operator_fakultas_jurusan = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_uang_kas_fakultas_jurusan', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_fakultas_jurusan', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah()
    {
        $user               = $this->input->post('user');

        $data =[
            'operator_fakultas_jurusan'         =>$user,
            'tanggal_simpan_fakultas_jurusan'   => date('Y-m-d'),
            'aktif_fakultas_jurusan'            => 1,
        ];
        // var_dump($data);
        // die;
        $this->db->insert('uang_kas_fakultas_jurusan', $data);
    }

    public function edit()
    {
        $id                 = $this->input->post('id');
        $user               = $this->input->post('user');

        $data =[
            'id_uang_kas_fakultas_jurusan'      => $id,
            'operator_fakultas_jurusan'         =>$user,
            'tanggal_ubah_fakultas_jurusan'     => date('Y-m-d'),
            'aktif_fakultas_jurusan'            => 1,
        ];
        // var_dump($data);
        // die;
        $this->db->where('id_uang_kas_fakultas_jurusan', $id);
        $this->db->update('uang_kas_fakultas_jurusan', $data);


    }

    public function hapus($id)
    {
        $data = $this->fungsi->user_login()->aktif_akun_inventori;
        $uang_kas_fakultas = $this->db->get_where('uang_kas_fakultas_jurusan', ['id_uang_kas_fakultas_jurusan' => $id])->row();

        if ($uang_kas_fakultas->aktif_fakultas_jurusan == $data) {
             $this->session->set_flashdata('error', "Data Ini Tidak Bisa Di Hapus");
             redirect('uang_kas_jurusan');
        }else {
            $this->db->where('id_uang_kas_fakultas_jurusan',$id);
            $this->db->delete('uang_kas_fakultas_jurusan');
        }
    }
    public function uang_kas_masuk($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('uang_kas_masuk_keluar');
        $this->db->join('user', 'uang_kas_masuk_keluar.operator_uang_kas = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('uang_kas_fakultas_jurusan', 'uang_kas_masuk_keluar.id_uang_kas = 
        uang_kas_fakultas_jurusan.id_uang_kas_fakultas_jurusan', 'jumlah_uang_kas_fakultas_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status_uang_keluar_masuk =', 'Uang Masuk');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_uang_kas_masuk_keluar', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_masuk_keluar', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_uang_masuk()
    {
        $fakultas                   = $this->input->post('fakultas');
        $jumlah_uang_kas_masuk      = $this->input->post('jumlah_uang_kas_masuk');
        $jumlah_uang_jurusan        = $this->input->post('jumlah_uang_jurusan');
        $nama_donator               = $this->input->post('nama_donator');
        $gelar                      = $this->input->post('gelar');
        $user                       = $this->input->post('user');



        $uang_kas_unwira = $this->db->get_where('uang_kas_unwira', ['fakultas' => $fakultas])->row();
        $update = [
            'uang_masuk_unwira'=> $uang_kas_unwira->uang_masuk_unwira - $jumlah_uang_kas_masuk,
        ];
        $this->db->where('id_uang_kas_unwira', $uang_kas_unwira->id_uang_kas_unwira);
        $this->db->update('uang_kas_unwira', $update);


            $data = [
                    'uang_kas_masuk_keluar'     =>$jumlah_uang_kas_masuk,
                    'id_uang_kas'               =>$jumlah_uang_jurusan,
                    'nama_donator'              => $nama_donator,
                    'gelar_donator'             => $gelar,
                    'operator_uang_kas'         =>$user,
                    'aktif_uang_kas'            =>1,
                    'tanggaL_simpan_uang_kas'   =>date('Y-m-d'),
                    'status_uang_keluar_masuk'  =>'Uang Masuk'
            ];
            $uang_kas_fakultas = $this->db->get_where('uang_kas_fakultas_jurusan', ['id_uang_kas_fakultas_jurusan' => $data['id_uang_kas']])->row();
            $update = [
                'jumlah_uang_kas_fakultas_jurusan'=> $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan + (int) $data['uang_kas_masuk_keluar'],
            ];
            $this->db->where('id_uang_kas_fakultas_jurusan', $data['id_uang_kas']);
            $this->db->update('uang_kas_fakultas_jurusan', $update);
            
            
            $this->db->insert('uang_kas_masuk_keluar', $data);
    }

    public function hapus_uang_kas_masuk($id)
    {
        $data = $this->fungsi->user_login()->aktif_akun_inventori;
        $uang_kas_fakultas = $this->db->get_where('uang_kas_masuk_keluar', ['id_uang_kas_masuk_keluar' => $id])->row();

        if ($uang_kas_fakultas->aktif_uang_kas == $data) {
             $this->session->set_flashdata('error', "Data Ini Tidak Bisa Di Hapus");
             redirect('uang_kas_jurusan/uang_kas_masuk');
        }else {
            $this->db->where('id_uang_kas_masuk_keluar',$id);
            $this->db->delete('uang_kas_masuk_keluar');
        }
    }

    public function uang_kas_keluar($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('uang_kas_masuk_keluar');
        $this->db->join('user', 'uang_kas_masuk_keluar.operator_uang_kas = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('barang_rusak', 'uang_kas_masuk_keluar.barang_rusak = barang_rusak.id_rusak','jumlah_barang_rusak','harga_perbaiki', 'LEFT');
        $this->db->join('barang', 'barang.id_barang = barang_rusak.id_barang', 'nama_barang','LEFT');
        $this->db->join('uang_kas_fakultas_jurusan', 'uang_kas_masuk_keluar.id_uang_kas = 
        uang_kas_fakultas_jurusan.id_uang_kas_fakultas_jurusan', 'jumlah_uang_kas_fakultas_jurusan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status_uang_keluar_masuk =', 'Uang Keluar');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_uang_kas_masuk_keluar', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_masuk_keluar', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function tambah_uang_kas_keluar()
    {
        $jumlah_uang_kas_masuk      = $this->input->post('jumlah_uang_kas_masuk');
        $jumlah_uang_jurusan        = $this->input->post('jumlah_uang_jurusan');
        $nama_perbaiki              = $this->input->post('nama_perbaiki');
        $user                       = $this->input->post('user');


            $data = [
                    'uang_kas_masuk_keluar'     =>$jumlah_uang_kas_masuk,
                    'id_uang_kas'               =>$jumlah_uang_jurusan,
                    'barang_rusak'              => $nama_perbaiki,
                    'operator_uang_kas'         =>$user,
                    'aktif_uang_kas'            =>1,
                    'tanggaL_simpan_uang_kas'   =>date('Y-m-d'),
                    'status_uang_keluar_masuk'  =>'Uang Keluar'
            ];
            // var_dump($data);
            // die;
            $uang_kas_fakultas = $this->db->get_where('uang_kas_fakultas_jurusan',['id_uang_kas_fakultas_jurusan' => $data['id_uang_kas']])->row();
            
            if ($data['uang_kas_masuk_keluar'] > $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan) {
             $this->session->set_flashdata('error', "Uang Transaksi Lebih Besar Dari Uang Kas Jurusan");
             redirect('uang_kas_jurusan/tambah_uang_kas_keluar');
            }else {
                $update_kas = [
                    'jumlah_uang_kas_fakultas_jurusan'=> $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan - (int) $data['uang_kas_masuk_keluar'],
                ];
                $this->db->where('id_uang_kas_fakultas_jurusan', $data['id_uang_kas']);
                $this->db->update('uang_kas_fakultas_jurusan', $update_kas);
            }


            $rusak = $this->db->get_where('barang_rusak', ['id_rusak' => $data['barang_rusak']])->row();
            $update_rusak = [
                'pembayaran_barang_rusak'=> $rusak->pembayaran_barang_rusak + (int) $data['uang_kas_masuk_keluar'],
            ];
            $this->db->where('id_rusak', $data['barang_rusak']);
            $this->db->update('barang_rusak', $update_rusak);
            
            $this->db->insert('uang_kas_masuk_keluar', $data);
    }

    public function hapus_uang_kas_keluar($id)
    {
        $data = $this->fungsi->user_login()->aktif_akun_inventori;
        $uang_kas_fakultas = $this->db->get_where('uang_kas_masuk_keluar', ['id_uang_kas_masuk_keluar' => $id])->row();

        if ($uang_kas_fakultas->aktif_uang_kas == $data) {
             $this->session->set_flashdata('error', "Data Ini Tidak Bisa Di Hapus");
             redirect('uang_kas_fakultas/uang_kas_keluar');
        }else {
            $this->db->where('id_uang_kas_masuk_keluar',$id);
            $this->db->delete('uang_kas_masuk_keluar');
        }
    }
    public function uang_kas_transaksi_barang($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('uang_kas_masuk_keluar');
        $this->db->join('barang', 'uang_kas_masuk_keluar.beli_barang = barang.id_barang','nama_barang','total_barang', 'harga_barang', 'LEFT');
        $this->db->join('user', 'uang_kas_masuk_keluar.operator_uang_kas = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('uang_kas_fakultas_jurusan', 'uang_kas_masuk_keluar.id_uang_kas = 
        uang_kas_fakultas_jurusan.id_uang_kas_fakultas_jurusan', 'jumlah_uang_kas_fakultas_jurusan', 'LEFT');
        
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status_uang_keluar_masuk =', 'Transaksi Barang');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_uang_kas_masuk_keluar', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_masuk_keluar', 'DESC');
        $query = $this->db->get();
        
        return $query;
    }
    public function tambah_transaksi_barang()
    {
        // $fakultas                   = $this->input->post('fakultas');
        $jumlah_uang_kas_masuk      = $this->input->post('jumlah_uang_kas_masuk');
        $jumlah_uang_jurusan        = $this->input->post('jumlah_uang_jurusan');
        $nama_perbaiki              = $this->input->post('nama_perbaiki');
        $user                       = $this->input->post('user');

            
    $data = [
            'uang_kas_masuk_keluar'     =>$jumlah_uang_kas_masuk,
            'id_uang_kas'               =>$jumlah_uang_jurusan,
            'beli_barang'              => $nama_perbaiki,
            'operator_uang_kas'         =>$user,
            'aktif_uang_kas'            =>1,
            'tanggaL_simpan_uang_kas'   =>date('Y-m-d'),
            'status_uang_keluar_masuk'  =>'Transaksi Barang'
    ];
        // var_dump($data);
        // die;
        $barang = $this->db->get_where('barang',['id_barang' => $data['beli_barang']])->row();
        $uang_kas_fakultas = $this->db->get_where('uang_kas_fakultas_jurusan',['id_uang_kas_fakultas_jurusan' => $data['id_uang_kas']])->row();
        if ($data['uang_kas_masuk_keluar'] > $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan) {
            $this->session->set_flashdata('error', "Uang Transaksi Lebih Besar Dari Uang Kas Jurusan");
            redirect('uang_kas_jurusan/uang_kas_keluar_barang');
        }else {
            $update_barang = [
                'pembayaran'=> $barang->pembayaran + (int) $data['uang_kas_masuk_keluar'],
            ];
            $this->db->where('id_barang', $data['beli_barang']);
            $this->db->update('barang', $update_barang);
        }
    
        
        if ($data['uang_kas_masuk_keluar'] > $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan) {
        $this->session->set_flashdata('error', "Uang Transaksi Lebih Besar Dari Uang Kas Jurusan");
        redirect('uang_kas_jurusan/uang_kas_keluar_barang');
        }else {
            $update_kas = [
                'jumlah_uang_kas_fakultas_jurusan'=> $uang_kas_fakultas->jumlah_uang_kas_fakultas_jurusan - (int) $data['uang_kas_masuk_keluar'],
            ];
            $this->db->where('id_uang_kas_fakultas_jurusan', $data['id_uang_kas']);
            $this->db->update('uang_kas_fakultas_jurusan', $update_kas);
        }

        
        $this->db->insert('uang_kas_masuk_keluar', $data);
    }

    public function uang_kas_jurusan($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('uang_kas_fakultas_jurusan');
        $this->db->join('user', 'uang_kas_fakultas_jurusan.operator_fakultas_jurusan = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('level !=', 'Admin');
        $this->db->where('nama_lengkap =', $data);
        $this->db->where('tanggal_ubah_fakultas_jurusan >=', $tanggal_awal);
        $this->db->where('tanggal_ubah_fakultas_jurusan <=', $tanggal_akhir);
        
        if ($id != null) {
            $this->db->where('tanggal_ubah_fakultas_jurusan', $id);
        }
        $this->db->order_by('id_uang_kas_fakultas_jurusan', 'DESC');
        $nato = $this->db->get();
        return $nato;
        
    }
    
    public function filter_uang_kas_masuk_jurusan($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('uang_kas_masuk_keluar');
        $this->db->join('user', 'uang_kas_masuk_keluar.operator_uang_kas = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('uang_kas_fakultas_jurusan', 'uang_kas_masuk_keluar.id_uang_kas = 
        uang_kas_fakultas_jurusan.id_uang_kas_fakultas_jurusan', 'jumlah_uang_kas_fakultas_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status_uang_keluar_masuk =', 'Uang Masuk');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('level !=', 'Admin');
        $this->db->where('nama_lengkap =', $data);

        $this->db->where('tanggaL_simpan_uang_kas >=', $tanggal_awal);
        $this->db->where('tanggaL_simpan_uang_kas <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('id_uang_kas_masuk_keluar', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_uang_kas_masuk_keluar', 'DESC');
        $query = $this->db->get();
        
        return $query;
    }
}