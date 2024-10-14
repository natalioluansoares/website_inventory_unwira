<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_pinjaman_m extends CI_Model
{
    public function get($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    
    public function aktif($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif_akun=', 0);
        $this->db->where('nama_lengkap =', $data);
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getbarangpinjaman()
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_barang', 'DESC');
        $result = $this->db->get();
        return $result;
    }
    public function insert_pinjaman()
    {

        $namabarang         = $this->input->post('namabarang');
        $peminjam           = $this->input->post('peminjam');
        $totalpinjaman      = $this->input->post('totalpinjaman');
        $durasipinjaman     = $this->input->post('durasipinjaman');
        $stok_barang        = $this->input->post('stok_barang');
        $jumlahharga        = $this->input->post('jumlahharga');
        // $bayar              = $this->input->post('bayar');
       if ($totalpinjaman > $stok_barang) {
        $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Stok");
        redirect('barang_pinjaman/tambah');
       }else {
           $data = [
               'id_barang'                  => $namabarang,
               'nama_pinjaman'              => $peminjam,
               'total_barang_pinjaman'      => $totalpinjaman,
               'total_barang_sementara'     => $totalpinjaman,
               'durasi_pinjaman'            => $durasipinjaman,
               'jumlah_harga_pinjam'        => $jumlahharga,
               'status'                     => 'Belum Bayar',
               'aktif'                      => 0,
               'tanggal_pinjaman'           => date('Y-m-d'),
               'operator'                   => $this->session->userdata('id_user')
           ];
   
           $stok = $this->db->get_where('barang', ['id_barang' => $data['id_barang']])->row();
           $update = [
               'stok_barang' => $stok->stok_barang - (int) $data['total_barang_pinjaman'],
           ];
           $this->db->where('id_barang', $data['id_barang']);
           $this->db->update('barang', $update);
           // var_dump($data);
           // die;
           $this->db->insert('barang_pinjaman', $data);
       }
    }
    public function edit_pinjaman()
    {
        $idpinjaman         = $this->input->post('idpinjaman');
        $namabarang         = $this->input->post('namabarang');
        $peminjam           = $this->input->post('peminjam');
        $totalpinjaman      = $this->input->post('totalpinjaman');
        $stok_barang        = $this->input->post('stok_barang');
        $durasipinjaman     = $this->input->post('durasipinjaman');
        $jumlahharga        = $this->input->post('jumlahharga');
        
        if ($totalpinjaman > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Stok");
            redirect('barang_pinjaman/edit/'.$idpinjaman);
        }else {
            $stok = $this->db->get_where('barang', ['id_barang' => $namabarang])->row();
            $stok_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $idpinjaman])->row();

            if ($stok_pinjaman->total_barang_pinjaman > $stok->stok_barang) {
                $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Sto");
                redirect('barang_pinjaman/edit/'.$idpinjaman);

            }else {
                $cek_stok = $stok->stok_barang;
                $new_cek_stok = $cek_stok - $totalpinjaman;
                
                if ($stok_pinjaman->total_barang_pinjaman > $new_cek_stok) {
                    $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data");
                    redirect('barang_pinjaman/edit/'.$idpinjaman);

                }else {
                    $this->db->set('stok_barang', $new_cek_stok);
                    $this->db->where('id_barang', $namabarang);
                    $this->db->update('barang');

                }
            }

            
        if ($stok_pinjaman->total_barang_pinjaman ==  $stok->stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih  Data Stok");
            redirect('barang_pinjaman/edit/'.$idpinjaman);
        }else {
            $cek_stok = $stok_pinjaman ->total_barang_sementara;
            $cek_pinjaman = $stok_pinjaman ->total_barang_pinjaman;
            $cek_bayaran = $stok_pinjaman ->jumlah_harga_pinjam;

            $new_cek_stok = $cek_stok + $totalpinjaman;
            $new_cek_pinjaman = $cek_pinjaman + $totalpinjaman;
            $new_cek_bayaran = $cek_bayaran + $jumlahharga;

            $this->db->set('total_barang_sementara', $new_cek_stok);
            $this->db->set('total_barang_pinjaman', $new_cek_pinjaman);
            $this->db->set('jumlah_harga_pinjam', $new_cek_bayaran);
            $this->db->where('id_pinjaman', $idpinjaman);
            $this->db->update('barang_pinjaman');
        }
        $data = [
            'id_pinjaman'               => $idpinjaman,
            'id_barang'                 => $namabarang,
            'nama_pinjaman'             => $peminjam,
            'durasi_pinjaman'           => $durasipinjaman,
            'tanggal_pinjaman'          => date('Y-m-d'),
            'operator'                  => $this->session->userdata('id_user')
        ];
        // die;
        $this->db->where('id_pinjaman', $idpinjaman);
        $this->db->update('barang_pinjaman', $data);
        }
    }

    public function delete($id)
    {
        $this->db->where('id_pinjaman', $id);
        $this->db->delete('barang_pinjaman');
    }

    public function update_pinjaman()
    {
        $idpembayaran       = $this->input->post('id_pembayaran');
        $pembayaran         = $this->input->post('pembayaran');
        $status             = $this->input->post('status_pembayaran');
        $aktif              = $this->input->post('aktif');
        
        $stok_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $idpembayaran])->row();
        
        if ($stok_pinjaman != null) {
            $cek_bayaran = $stok_pinjaman->bayar;

            $new_cek_bayaran = $cek_bayaran + $pembayaran;
            $this->db->set('bayar', $new_cek_bayaran);
            $this->db->where('id_pinjaman', $idpembayaran);
            $this->db->update('barang_pinjaman');
        }else {
            $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
            redirect('barang_pinjaman');
        }
        $data = [
            'id_pinjaman'               => $idpembayaran,
            'status'                    => $status,
            'aktif'                     => $aktif
        ];
        $this->db->where('id_pinjaman', $idpembayaran);
        $this->db->update('barang_pinjaman', $data);

    }
    public function update_stok()
    {
        $id_stok            = $this->input->post('id_pembayaran');
        $status             = $this->input->post('status_kembalian');
        $jumlah             = $this->input->post('jumlahkembalian');
        $total              = $this->input->post('totalbarang');
        $barang             = $this->input->post('idbarang');
        if ($jumlah> $total) {
            $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
            redirect('barang_pinjaman');
        } else {
            $stok = $this->db->get_where('barang', ['id_barang' => $barang])->row();
            $stok_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $id_stok])->row();

            if ($stok) {
                $update_pinjaman = [
                    'stok_barang' => $stok->stok_barang + $jumlah,
        
                ];
        
                $this->db->where('id_barang', $barang);
                $this->db->update('barang', $update_pinjaman);
            }else{
                
            }

            if ($stok_pinjaman) {
                $cek_stok=$stok_pinjaman->total_barang_sementara;

                $cek_new_stok = $cek_stok - $jumlah;
                $this->db->set('total_barang_sementara', $cek_new_stok);
                $this->db->where('id_pinjaman', $id_stok);
                $this->db->update('barang_pinjaman');
            }else {
                $data = [
                'id_pinjaman'               => $id_stok,
                'status_kembalian'          => $status,
                'total_barang_sementara'    => $jumlah,
                // 'total_barang_pinjaman'     => $total,
                'id_barang'                 => $barang
                
            ];
            
            
            $this->db->where('id_pinjaman', $id_stok);
            $this->db->update('barang_pinjaman', $data);
            }
            
            
        }
        // UPDATE STATUS
        $id_stok            = $this->input->post('id_pembayaran');
        $status             = $this->input->post('status_kembalian');
        
        $data = [
            'id_pinjaman'               => $id_stok,
            'status_kembalian'          => $status,
            
        ];
        
        
        $this->db->where('id_pinjaman', $id_stok);
        $this->db->update('barang_pinjaman', $data);  
        
    }
    public function sudah_transaksi($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Sudah Bayar');
        $this->db->where('tanggal_pinjaman >=', $tanggal_awal);
        $this->db->where('tanggal_pinjaman <=', $tanggal_akhir);
        if ($id != null) {
            $this->db->where('tanggal_barang_masuk', $id);
        }
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    public function belum_transaksi($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Belum Bayar');
        $this->db->where('tanggal_pinjaman >=', $tanggal_awal);
        $this->db->where('tanggal_pinjaman <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('tanggal_barang_masuk', $id);
        }
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    public function transaksi_masih_panjar($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->select('*');
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Masih Panjar');
        $this->db->where('tanggal_pinjaman >=', $tanggal_awal);
        $this->db->where('tanggal_pinjaman <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('tanggal_barang_masuk', $id);
        }
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }

    public function belumpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Belum Bayar');
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function panjarpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Masih Panjar');
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function sudahpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_lengkap;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('status=','Sudah Bayar');
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_lengkap =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}