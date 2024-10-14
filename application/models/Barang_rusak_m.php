<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_rusak_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_rusak', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_rusak', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getbarang()
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function insert_barang_rusak()
    {
        $namabarang             = $this->input->post('namabarang');
        $jumlahbarangrusak      = $this->input->post('jumlahbarangrusak');
        $stok_barang            = $this->input->post('stok_barang');
        $harga_perbaiki         = $this->input->post('harga_perbaiki');
        $nama_perbaiki          = $this->input->post('nama_perbaiki');

        if ($jumlahbarangrusak > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Stok");
            redirect('barang_rusak/tambah');
        }else {
            $data = [
    
                'id_barang'                 => $namabarang,
                'jumlah_barang_rusak'       => $jumlahbarangrusak,
                'barang_rusak_temporari'    => $jumlahbarangrusak,
                'nama_perbaiki'             => $nama_perbaiki,
                'created_tanggal'           => date('Y-m-d'),
                'harga_perbaiki'            => $harga_perbaiki == '' ? null : $harga_perbaiki,
                'operator'                  => $this->session->userdata('id_user')
            ];
    
            $stok = $this->db->get_where('barang', ['id_barang' => $data['id_barang']])->row();
    
            $update = [
                'stok_barang' => $stok->stok_barang - (int) $data['jumlah_barang_rusak'],
    
            ];
            $this->db->where('id_barang', $data['id_barang']);
            $this->db->update('barang', $update);
            $this->db->insert('barang_rusak', $data);
        }
    }
    public function edit_barang_rusak()
    {
        $idrusak                = $this->input->post('idrusak');
        $namabarang             = $this->input->post('namabarang');
        $jumlahbarangrusak      = $this->input->post('jumlahbarangrusak');
        $harga_perbaiki         = $this->input->post('harga_perbaiki');
        $stok_barang            = $this->input->post('stok_barang');
        $nama_perbaiki          = $this->input->post('nama_perbaiki');

        

        if ($jumlahbarangrusak > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Stok");
            redirect('barang_rusak/edit/'.$idrusak);
        }else {
            $stok = $this->db->get_where('barang', ['id_barang' => $namabarang])->row();
            $stok_rusak = $this->db->get_where('barang_rusak', ['id_rusak' => $idrusak])->row();
                
            $cek_stok=$stok->stok_barang;
            $cek_new_stok = $cek_stok - $jumlahbarangrusak;
            if ($stok_rusak->jumlah_barang_rusak > $cek_new_stok) {
                $this->session->set_flashdata('error', "Barang Rusak Lebih Besar Dari Stok Barang");
                redirect('barang_rusak/edit/'.$idrusak);
            }else {
                $this->db->set('stok_barang', $cek_new_stok);
                $this->db->where('id_barang', $namabarang);
                $this->db->update('barang');
            }


        
            if ($stok_rusak->jumlah_barang_rusak == $stok->stok_barang) {
                $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
                redirect('barang_rusak/edit/'.$idrusak);
            }else {
                $cek_stok=$stok_rusak->barang_rusak_temporari;
                $cek_bayaran=$stok_rusak->jumlah_barang_rusak;

                $cek_new_stok = $cek_stok + $jumlahbarangrusak;
                $cek_new_bayaran = $cek_bayaran + $jumlahbarangrusak;
                $this->db->set('barang_rusak_temporari', $cek_new_stok);
                $this->db->set('jumlah_barang_rusak', $cek_new_bayaran); 
                $this->db->where('id_rusak', $idrusak);
                $this->db->update('barang_rusak');
            }
            $data = [
    
                'id_rusak'                  => $idrusak,
                'id_barang'                 => $namabarang,
                'nama_perbaiki'             => $nama_perbaiki,
                'harga_perbaiki'            => $harga_perbaiki,
                'updated_tanggal'           => date('Y-m-d'),
                'operator'                  => $this->session->userdata('id_user')
            ];
            // var_dump($data);
            // die;
    
            $this->db->where('id_rusak', $idrusak);
            $this->db->update('barang_rusak', $data);
        }
    }
    public function delete($id)
    {
        // $stok_rusak = $this->db->get_where('barang_rusak', ['id_rusak' => $id])->row();
        // $stok = $this->db->get_where('barang', ['id_barang' => $stok_rusak->id_barang])->row();

        // $update = [
        //     'stok_barang' => $stok->stok_barang + (int) $stok_rusak->jumlah_barang_rusak,
        // ];
        // $this->db->where('id_barang', $stok_rusak->id_barang);
        // $this->db->update('barang', $update);

        $this->db->where('id_rusak', $id);
        $this->db->delete('barang_rusak');
    }

    public function update_rusak()
    {
        $id_rusak               = $this->input->post('id_rusak');
        $status_pembayaran      = $this->input->post('status_pembayaran');
        $perbaiki               = $this->input->post('perbaiki');
        $rusak                  = $this->input->post('rusak');
        $bayaran                = $this->input->post('bayaran');
        $barang                 = $this->input->post('idbarang');
        if ($perbaiki > $rusak) {
            $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
            redirect('barang_rusak');
        } else {
            $stok = $this->db->get_where('barang', ['id_barang' => $barang])->row();
            $stok_pinjaman = $this->db->get_where('barang_rusak', ['id_rusak' => $id_rusak])->row();

            if ($stok) {
                $update_pinjaman = [
                    'stok_barang' => $stok->stok_barang + $perbaiki,
        
                ];
        
                $this->db->where('id_barang', $barang);
                $this->db->update('barang', $update_pinjaman);
            }else{
                $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
                redirect('admin/barang_rusak');
            }

            if ($stok_pinjaman) {
                $cek_stok=$stok_pinjaman->barang_rusak_temporari;

                $cek_new_stok = $cek_stok - $perbaiki;
                $this->db->set('barang_rusak_temporari', $cek_new_stok);
                $this->db->where('id_rusak', $id_rusak);
                $this->db->update('barang_rusak');
            }else {
                $data = [
                'id_rusak'                  => $id_rusak,
                'status_pembayaran'         => $status_pembayaran,
                'jumlah_barang_rusak'       => $rusak,
                'pembayaran'                => $bayaran,
                'id_barang'                 => $barang
                
            ];
            
            
            $this->db->where('id_rusak', $id_rusak);
            $this->db->update('barang_rusak', $data);
            }
            
            
        }
        // UPDATE STATUS
        $id_rusak               = $this->input->post('id_rusak');
        $status_pembayaran      = $this->input->post('status_pembayaran');
        
        $data = [
            'id_rusak'               => $id_rusak,
            'status_pembayaran'      => $status_pembayaran,
            
        ];
        
        
        $this->db->where('id_rusak', $id_rusak);
        $this->db->update('barang_rusak', $data);
        
    } 

     public function filter_sudah_bayar($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('status_pembayaran =','Sudah Bayar');
        $this->db->where('nama_lengkap =', $data);
        $this->db->where('created_tanggal >=', $tanggal_awal);
        $this->db->where('created_tanggal <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('created_tanggal', $id);
        }
        $this->db->order_by('id_rusak', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }

    public function sudah_bayar($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_rusak', $id);
        }
        //  Urutkan Data
        $this->db->where('status_pembayaran =','Sudah Bayar');
        $this->db->order_by('id_rusak', 'DESC');
        $query = $this->db->get();
        return $query;
    }
     public function filter_belum_bayar($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('status_pembayaran =','Belum Bayar');
        $this->db->where('nama_lengkap =', $data);
        $this->db->where('created_tanggal >=', $tanggal_awal);
        $this->db->where('created_tanggal <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('created_tanggal', $id);
        }
        $this->db->order_by('id_rusak', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }

    public function belum_bayar($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_rusak', $id);
        }
        //  Urutkan Data
        $this->db->where('status_pembayaran =','Belum Bayar');
        $this->db->order_by('id_rusak', 'DESC');
        $query = $this->db->get();
        return $query;
    }
     public function filter_proses_perbaiki($id=null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('status_pembayaran =','Masih Panjar');
        $this->db->where('nama_lengkap =', $data);
        $this->db->where('created_tanggal >=', $tanggal_awal);
        $this->db->where('created_tanggal <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('created_tanggal', $id);
        }
        $this->db->order_by('id_rusak', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }

    public function proses_perbaiki($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_rusak', $id);
        }
        //  Urutkan Data
        $this->db->where('status_pembayaran =','Masih Panjar');
        $this->db->order_by('id_rusak', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}