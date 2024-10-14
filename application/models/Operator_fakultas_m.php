<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_fakultas_m extends CI_Model
{
    public function getuser()
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level !=', 'Admin');
        $this->db->where('level !=', 'Admin_Hukum');
        $this->db->where('level !=', 'Admin_Teknik');
        $this->db->where('level !=', 'Admin_Ekonomi_Dan_Bisnis');
        $this->db->where('level !=', 'Admin_Ilmu_Sosial_Dan_Ilmu_politik');
        $this->db->where('level !=', 'Admin_Hukum');
        $this->db->where('level !=', 'Admin_Filsafat');
        $this->db->where('level !=', 'Admin_Matematika_Dan_Ilmu_Pengetahuan_Alam');
        $this->db->where('level !=', 'Admin_Keguruan_Dan_Ilmu_Pendidikan');
        $this->db->order_by('level', 'ASC');
        $result = $this->db->get();
        return $result;
    }
    public function getkategori($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('kategori');
        $this->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        // if ($id) {
        // }else {
        //     $this->db->where('nama_fakultas =', 'Hukum');
        // }
        // $this->db->where('level =', '');
        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_kategori', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function insert_kategori()
    {
        $kategori = $this->input->post('kategori');
        $user = $this->input->post('user');
        $data = [
            'nama_kategori'     => $kategori,
            'operator'          => $user
        ];
        
        $this->db->insert('kategori', $data);
    }
    public function edit_kategori()
    {
        $id = $this->input->post('idkategori');
        $kategori = $this->input->post('kategori');
        $user = $this->input->post('user');
        $data = [
            'id_kategori'       => $id,
            'nama_kategori'     => $kategori,
            'operator'          => $user
        ];
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function delete_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
    public function getbarang($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_barang', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    // public function result()
    // {

    //     $this->db->select('*');
    //     $this->db->from('barang');
    //     $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
    //     $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
    //     $query = $this->db->get();
    //     return $query;
    // }



    // public function getkodebarang($kode, $id = null)
    // {
    //     $this->db->from('barang');
    //     $this->db->where('kode_barang', $kode);
    //     if ($id != null) {
    //         $this->db->where('id_barang !=', $id);
    //     }
    //     $nato = $this->db->get();
    //     return $nato;
    // }


    // public function getnamabarang($kode, $id = null)
    // {
    //     $this->db->from('barang');
    //     $this->db->where('nama_barang', $kode);
    //     if ($id != null) {
    //         $this->db->where('id_barang !=', $id);
    //     }
    //     $nato = $this->db->get();
    //     return $nato;
    // }
    public function insert_barang($post)
    {
        $kategori               = $this->input->post('kategori');
        $kodebarang             = $this->input->post('kodebarang');
        $namabarang             = $this->input->post('namabarang');
        $harga_barang           = $this->input->post('harga_barang');
        $harga_barang_pinjam    = $this->input->post('harga_barang_pinjam');
        $ruangan                = $this->input->post('ruangan');
        $user                   = $this->input->post('user');

        $data = [
            'id_kategori'           => $kategori,
            'kode_barang'           => $kodebarang,
            'nama_barang'           => $namabarang,
            'ruangan'               => $ruangan,
            'harga_barang'          => $harga_barang,
            'harga_barang_pinjam'   => $harga_barang_pinjam,
            'gambar'                => $post['gambar'],
            'created'               => date('Y-m-d'),
            'operator'              => $user
        ];
        $this->db->insert('barang', $data);
    }
    public function editbarang($post)
    {
        $id                     = $this->input->post('idbarang');
        $kategori               = $this->input->post('kategori');
        $kodebarang             = $this->input->post('kode_barang');
        $namabarang             = $this->input->post('namabarang');
        $harga_barang           = $this->input->post('harga_barang');
        $harga_barang_pinjam    = $this->input->post('harga_barang_pinjam');
        $ruangan                = $this->input->post('ruangan');
        $user                   = $this->input->post('user');

        $data = [
            'id_barang'             => $id,
            'id_kategori'           => $kategori,
            'kode_barang'           => $kodebarang,
            'nama_barang'           => $namabarang,
            'ruangan'               => $ruangan,
            'harga_barang'          => $harga_barang,
            'harga_barang_pinjam'   => $harga_barang_pinjam,
            'updated'               => date('Y-m-d'),
            'created'               => date('Y-m-d'),
            'operator'              => $user
        ];
        if ($post['gambar'] != null) {
            $data['gambar'] = $post['gambar'];
            // var_dump($data);
            // die;
        }
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function delete_barang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    public function getrusak($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_rusak', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_rusak', 'DESC');
        $query = $this->db->get();
        return $query;
    }



    public function insert_barang_rusak()
    {
        $namabarang             = $this->input->post('namabarang');
        $jumlahbarangrusak      = $this->input->post('jumlahbarangrusak');
        $harga_perbaiki         = $this->input->post('harga_perbaiki');
        $stok_barang            = $this->input->post('stok_barang');
        $nama_perbaiki          = $this->input->post('nama_perbaiki');
        $user                   = $this->input->post('user');
        if ($jumlahbarangrusak > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Stok");
            redirect('operator_fakultas/tambah_barang_rusak');
        }else {
        $data = [

            'id_barang'                 => $namabarang,
            'jumlah_barang_rusak'       => $jumlahbarangrusak,
            'barang_rusak_temporari'    => $jumlahbarangrusak,
            'nama_perbaiki'             => $nama_perbaiki,
            'harga_perbaiki'            => $harga_perbaiki == '' ? null : $harga_perbaiki,
            'status_pembayaran'         => 'Belum Bayar',
            'aktif_rusak'               => 1,
            'created_tanggal'           => date('Y-m-d'),
            'operator'                  => $user
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
        $nama_perbaiki          = $this->input->post('nama_perbaiki');
        $stok_barang            = $this->input->post('stok_barang');
        $user                   = $this->input->post('user');

        if ($jumlahbarangrusak > $stok_barang) {
            $this->session->set_flashdata('error', "Barang Rusak Lebih Besar Dari Stok Barang");
            redirect('operator_fakultas/edit_barang_rusak/'.$idrusak);
        }else {
            $stok = $this->db->get_where('barang', ['id_barang' => $namabarang])->row();
            $stok_rusak = $this->db->get_where('barang_rusak', ['id_rusak' => $idrusak])->row();

            if ($stok_rusak->jumlah_barang_rusak > $stok->stok_barang) {
                $this->session->set_flashdata('error', "Barang Rusak Lebih Besar Dari Stok Barang");
                redirect('operator_fakultas/edit_barang_rusak/'.$idrusak);

            }else{
                $cek_stok=$stok->stok_barang;
                $cek_new_stok = $cek_stok - $jumlahbarangrusak;
                if ($stok_rusak->jumlah_barang_rusak > $cek_new_stok) {
                    $this->session->set_flashdata('error', "Barang Rusak Lebih Besar Dari Stok Barang");
                    redirect('operator_fakultas/edit_barang_rusak/'.$idrusak);
                }else {
                    $this->db->set('stok_barang', $cek_new_stok);
                    $this->db->where('id_barang', $namabarang);
                    $this->db->update('barang');
                }
            }

        
            if ($stok_rusak->jumlah_barang_rusak == $stok->stok_barang) {
                $this->session->set_flashdata('error', "Barang Rusak Lebih Besar Dari Stok Barang");
                redirect('admioperator_fakultas/edit_barang_rusak/'.$idrusak);
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
                    'aktif_rusak'               => 1,
                    'updated_tanggal'           => date('Y-m-d'),
                    'operator'                  => $user
                ];
                // var_dump($data);
                // die;
        
                $this->db->where('id_rusak', $idrusak);
                $this->db->update('barang_rusak', $data);
            }        
        }
    public function delete_rusak($id)
    {
        $data = $this->fungsi->user_login()->aktif_akun_inventori;
        $uang_kas_fakultas = $this->db->get_where('barang_rusak', ['id_rusak' => $id])->row();

        if ($uang_kas_fakultas->aktif_rusak == $data) {
             $this->session->set_flashdata('error', "Data Ini Tidak Bisa Di Hapus");
             redirect('operator_fakultas/barang_rusak');
        }else {
            $this->db->where('id_rusak', $id);
            $this->db->delete('barang_rusak');

        }
    }

    public function getpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function belumpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function panjarpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function sudahpinjaman($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function aktif($id = null)
    {
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif_akun=', 0);
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
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
            redirect('operator_fakultas/pinjaman');
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
                $this->session->set_flashdata('error', "Data Kembalian Lebih Besar");
                redirect('operator_fakultas/pinjaman');
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
            redirect('operator_fakultas/barang_rusak');
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
                redirect('operator_fakultas/barang_rusak');
            }

            if ($stok_pinjaman) {
                $cek_stok=$stok_pinjaman->barang_rusak_temporari;
                // $cek_bayaran=$stok_pinjaman->pembayaran;

                $cek_new_stok = $cek_stok - $perbaiki;
                // $cek_new_bayaran = $cek_bayaran + $bayaran;
                $this->db->set('barang_rusak_temporari', $cek_new_stok);
                // $this->db->set('pembayaran', $cek_new_bayaran);
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

    public function getbarangpinjaman()
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_barang', 'DESC');
        $result = $this->db->get();
        return $result;
    }
    public function insert_pinjaman()
    {
        $namabarang         = $this->input->post('namabarang');
        $peminjam           = $this->input->post('peminjam');
        $totalpinjaman      = $this->input->post('totalpinjaman');
        $stok_barang        = $this->input->post('stok_barang');
        $durasipinjaman     = $this->input->post('durasipinjaman');
        $jumlahharga        = $this->input->post('jumlahharga');
        $user               = $this->input->post('user');

        if ($totalpinjaman > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Stok");
            redirect('operator_fakultas/tambah_pinjaman');
        }else{
            $data = [
                'id_barang'                 => $namabarang,
                'nama_pinjaman'             => $peminjam,
                'total_barang_pinjaman'     => $totalpinjaman,
                'total_barang_sementara'    => $totalpinjaman,
                'durasi_pinjaman'           => $durasipinjaman,
                'jumlah_harga_pinjam'       => $jumlahharga,
                'status'                    => 'Belum Bayar',
                'tanggal_pinjaman'          => date('Y-m-d'),
                'operator'                  => $user
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
        $durasipinjaman     = $this->input->post('durasipinjaman');
        $jumlahharga        = $this->input->post('jumlahharga');
        $stok_barang        = $this->input->post('stok_barang');
        $user               = $this->input->post('user');
        
        if ($totalpinjaman > $stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Stok");
            redirect('operator_fakultas/edit_pinjaman/'.$idpinjaman);
        }else {
            $stok = $this->db->get_where('barang', ['id_barang' => $namabarang])->row();
            $stok_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $idpinjaman])->row();

            if ($stok_pinjaman->total_barang_pinjaman > $stok->stok_barang) {
                $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data Sto");
                redirect('operator_fakultas/edit_pinjaman/'.$idpinjaman);

            }else {
                $cek_stok = $stok->stok_barang;
                $new_cek_stok = $cek_stok - $totalpinjaman;
                
                if ($stok_pinjaman->total_barang_pinjaman > $new_cek_stok) {
                    $this->session->set_flashdata('error', "Data Pinjam Lebih Besar Data");
                    redirect('operator_fakultas/edit_pinjaman/'.$idpinjaman);

                }else {
                    $this->db->set('stok_barang', $new_cek_stok);
                    $this->db->where('id_barang', $namabarang);
                    $this->db->update('barang');

                }
            }

            
        if ($stok_pinjaman->total_barang_pinjaman ==  $stok->stok_barang) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih  Data Stok");
            redirect('operator_fakultas/edit_pinjaman/'.$idpinjaman);
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
            // 'total_barang_pinjaman'     => $totalpinjaman,
            'durasi_pinjaman'           => $durasipinjaman,
            // 'jumlah_harga_pinjam'       => $jumlahharga,
            'tanggal_pinjaman'          => date('Y-m-d'),
            'operator'                  => $user
        ];
        // die;
        $this->db->where('id_pinjaman', $idpinjaman);
        $this->db->update('barang_pinjaman', $data);
        }
    }

    public function delete_pinjaman($id)
    {
        // $stok_pinjam = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $id])->row();
        // $stok = $this->db->get_where('barang', ['id_barang' => $stok_pinjam->id_barang])->row();

        // $update = [
        //     'stok_barang' => $stok->stok_barang + (int) $stok_pinjam->total_barang_pinjaman,
        // ];
        // $this->db->where('id_barang', $stok_pinjam->id_barang);
        // $this->db->update('barang', $update);


        $this->db->where('id_pinjaman', $id);
        $this->db->delete('barang_pinjaman');
    }

    public function get_barang_masuk($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_barang_masuk',$id);
        }
        $this->db->order_by('id_barang_masuk', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function tambah_barang_masuk()
    {
        $user           = $this->input->post('user');
        $namabarang     = $this->input->post('namabarang');
        $total_barang   = $this->input->post('total_barang');
        $stock_barang   = $this->input->post('stock_barang');

        $data   = [
                'id_barang'             => $namabarang,
                'total_barang_masuk'    => $total_barang,
                'stock_barang_masuk'    => $stock_barang,
                'operator'              => $user,
                'tanggal_barang_masuk'  => date('Y-m-d')
        ];
        // var_dump($data);
        // die;
        $stok = $this->db->get_where('barang', ['id_barang' => $data['id_barang']])->row();
        $update = [
            'stok_barang' => $stok->stok_barang + (int) $data['stock_barang_masuk'],
            'total_barang' => $stok->total_barang + (int) $data['total_barang_masuk'],
        ];
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $update);

        $this->db->insert('barang_masuk',$data);
    }
    
    public function detail_masuk_barang($id=null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->where('tanggal_barang_masuk >=', $tanggal_awal);
        $this->db->where('tanggal_barang_masuk <=', $tanggal_akhir);

        if ($id != null) {
            $this->db->where('tanggal_barang_masuk', $id);
        }
        $this->db->order_by('id_barang_masuk', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }

    public function delete_barang_masuk($id)
    {
        $stock_barang_masuk = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id])->row();

        $stok = $this->db->get_where('barang', ['id_barang' => $stock_barang_masuk->id_barang])->row();

        $update = [
            'stok_barang' => $stok->stok_barang - (int) $stock_barang_masuk->stock_barang_masuk,
            'total_barang' => $stok->total_barang - (int) $stock_barang_masuk->total_barang_masuk,
        ];
        $this->db->where('id_barang', $stock_barang_masuk->id_barang);
        $this->db->update('barang', $update);

        $this->db->where('id_barang_masuk',$id);
        $this->db->delete('barang_masuk');
    }

    public function getruangan($id = null)
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->from('ruangan');
        $this->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        if ($id != null) {
            $this->db->where('id_ruangan', $id,'ASC');
        }
        //  Urutkan Data
        // $this->db->order_by('id_kategori', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function tambah_ruangan()
    {
        $user       = $this->input->post('user');
        $kode       = $this->input->post('kode');
        $ruangan    = $this->input->post('ruangan');

        $data = [
            'kode_ruangan' => $kode,
            'nama_ruangan' => $ruangan,
            'operator'     => $user
        ];
        $this->db->insert('ruangan',$data);
    }

    public function edit_ruangan()
    {
        $idruangan      = $this->input->post('idruangan');
        $user           = $this->input->post('user');
        $kode           = $this->input->post('kode');
        $ruangan        = $this->input->post('ruangan');

        $data = [
            'id_ruangan'    => $idruangan,
            'kode_ruangan'  => $kode,
            'nama_ruangan'  => $ruangan,
            'operator'      => $user
        ];
        $this->db->where('id_ruangan',$idruangan);
        $this->db->update('ruangan',$data);
    }

    public function delete_ruangan($id)
    {
        $this->db->where('id_ruangan',$id);
        $this->db->delete('ruangan');

    }   
    public function sudah_transaksi($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    public function belum_transaksi($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    public function transaksi_masih_panjar($id=null)
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data = $this->fungsi->user_login()->nama_fakultas;
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
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $this->db->order_by('id_pinjaman', 'DESC');
        $nato = $this->db->get();
        return $nato;

    }
    public function count_pinjaman()
    {
        $data = $this->fungsi->user_login()->nama_fakultas;
        $this->db->select_sum('id_pinjaman', 'total');
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('level !=', 'Operator_Fakultas');
        $this->db->where('nama_fakultas =', $data);
        $query = $this->db->get()->row()->total;
        return $query;
    }
}