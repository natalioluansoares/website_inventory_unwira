<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam_m extends CI_Model
{
    public function get($id = null)
    {
        // $data = $this->fungsi->user_login()->nama_lengkap_peminjam;
        $this->db->from('user_peminjam');
        // $this->db->where('nama_lengkap_peminjam =', $data);
        if ($id != null) {
            $this->db->where('id_user_peminjam', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_user_peminjam', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function aktif($id = null)
    {
        // $data = $this->fungsi->user_login()->nama_lengkap_peminjam;
        $this->db->from('user_peminjam');
        // $this->db->where('nama_lengkap_peminjam =', $data);
        $this->db->where('aktif_akun=', 0);
        if ($id != null) {
            $this->db->where('id_user_peminjam', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_user_peminjam', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function seleksi($nama, $id = null)
    {
        $this->db->from('user_peminjam');
        $this->db->where('nama_lengkap_peminjam', $nama);
        if ($id != null) {
            $this->db->where('id_user_peminjam !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }
    public function seleksi_nomor_ktp($nomor_ktp, $id = null)
    {
        $this->db->from('user_peminjam');
        $this->db->where('nomor_ktp', $nomor_ktp);
        if ($id != null) {
            $this->db->where('id_user_peminjam !=', $id);
        }
        $nato = $this->db->get();
        return $nato;
    }

    public function tambah_akun($post)
    {
        $data = [
            'nama_lengkap_peminjam'     => $post['nama_lengkap'],
            'jenis_kelamin'             => $post['jenis_kelamin'],
            'nomor_ktp'                 => $post['nomor_ktp'],
            'nomor_whatsapp'            => $post['nomor_whatsapp'],
            'level_peminjam'            => 1,
            'aktif_akun'                     => 1,
            'kata_sandi'                => password_hash($post['password'], PASSWORD_DEFAULT)
        ];
        // var_dump($data);
        // die;
        $this->db->insert('user_peminjam', $data);

    }
    public function cek_nama_lengkap($nama_lengkap)
    {
        $nama_lengkap = $this->db->get_where('user_peminjam',['nama_lengkap_peminjam' => $nama_lengkap]);
        return $nama_lengkap->num_rows();
    }
    public function cek_kata_sandi($nama)
    {
        $sandi = $this->db->get_where('user_peminjam',['nama_lengkap_peminjam' => $nama])->row_array();
        return $sandi['kata_sandi'];
    }

    public function cek_semua($semua)
    {
        $all = $this->db->get_where('user_peminjam', ['nama_lengkap_peminjam' => $semua])->row_array();
        return $all;
    }
    public function transaksi($id=null)
    {
        $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        if ($id != null) {
            $this->db->where('id_barang', $id);
        }
        //  Urutkan Data
        // $this->db->order_by('kode_barang', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function tambah_transaksi()
    {
        $stok           = $this->input->post('stok');
        $barang         = $this->input->post('barang');
        $user           = $this->input->post('user');
        $jumlah         = $this->input->post('jumlah');
        $durasi         = $this->input->post('durasi');
        $pembayaran     = $this->input->post('pembayaran');

        if ($jumlah > $stok) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar");
            redirect('transaksi/transaksi');
        }else {
            $data = [
                'operator'                  => $user,
                'id_barang'                 => $barang,
                'total_barang_pinjaman'     => $jumlah,
                'total_barang_sementara'    => $jumlah,
                'durasi_pinjaman'           => $durasi,
                'jumlah_harga_pinjam'       => $pembayaran,
                'bayar'                     => 0,
                'tanggal_pinjaman'          => date('Y-m-d'),
                'status'                    => 'Belum Bayar',
                'nama_pinjaman'             => $this->session->userdata('id_user_peminjam')
            ];
            $stok = $this->db->get_where('barang', ['id_barang' => $data['id_barang']])->row();
            $update = [
                'stok_barang' => $stok->stok_barang - (int) $data['total_barang_pinjaman'],
            ];
            $this->db->where('id_barang', $data['id_barang']);
            $this->db->update('barang', $update);
            
            $this->db->insert('barang_pinjaman', $data);
        } 
    }
    public function edit_transaksi()
    {
        $pinjaman       = $this->input->post('pinjaman');
        $stok           = $this->input->post('stok');
        $barang         = $this->input->post('barang');
        $user           = $this->input->post('user');
        $jumlah         = $this->input->post('jumlah');
        $durasi         = $this->input->post('durasi');
        $pembayaran     = $this->input->post('pembayaran');

        if ($jumlah > $stok) {
            $this->session->set_flashdata('error', "Data Pinjam Lebih Besar");
            redirect('transaksi/cart');
        }else {
            $stok = $this->db->get_where('barang', ['id_barang' => $barang])->row();
            $stok_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $pinjaman])->row();

            if ($stok_pinjaman->total_barang_pinjaman > $stok->stok_barang) {
                $this->session->set_flashdata('error', "Data Pinjam Lebih Besar");
                redirect('transaksi/cart');
            }else {
                $cek_stok = $stok->stok_barang;
                $new_cek_stok = $cek_stok - $jumlah;
                
                if ($stok_pinjaman->total_barang_pinjaman > $new_cek_stok) {
                    $this->session->set_flashdata('error', "Data Pinjam Lebih Besar");
                    redirect('transaksi/cart');
                }else {
                    $this->db->set('stok_barang', $new_cek_stok);
                    $this->db->where('id_barang', $barang);
                    $this->db->update('barang');
                }
                
            }

            if ($stok_pinjaman->total_barang_pinjaman == $stok->stok_barang) {
                $this->session->set_flashdata('error', "Data Pinjam Lebih Besar");
                    redirect('transaksi/cart');
            }else {
                $cek_stok_pinjaman = $stok_pinjaman->total_barang_pinjaman;
                $cek_stok_sementara = $stok_pinjaman->total_barang_sementara;
                $cek_bayaran = $stok_pinjaman->bayar;

                $new_stok_cek_pinjaman = $cek_stok_pinjaman + $jumlah;
                $new_stok_cek_sementara = $cek_stok_sementara + $jumlah;
                $new_cek_bayaran = $cek_bayaran + $pembayaran;

                $this->db->set('total_barang_pinjaman', $new_stok_cek_pinjaman);
                $this->db->set('total_barang_sementara', $new_stok_cek_sementara);
                $this->db->set('bayar', $new_cek_bayaran);
                $this->db->where('id_pinjaman', $pinjaman);
                $this->db->update('barang_pinjaman');
            }
            $data = [
                'id_pinjaman'               => $pinjaman,
                'operator'                  => $user,
                'id_barang'                 => $barang,
                // 'total_barang_pinjaman'     => $jumlah,
                // 'total_barang_sementara'    => $jumlah,
                'durasi_pinjaman'           => $durasi,
                // 'jumlah_harga_pinjam'       => $pembayaran,
                'bayar'                     => 0,
                'tanggal_pinjaman'          => date('Y-m-d'),
                'status'                    => 'Belum Bayar',
                'nama_pinjaman'             => $this->session->userdata('id_user_peminjam')
            ];
            // var_dump($data);
            // die;
            // $update_pinjaman = [
            //     'stok_barang' => $stock->stok_barang + $stok_pinjaman->total_barang_pinjaman -
            //      (int) $data['total_barang_pinjaman'],
    
            // ];
            // $this->db->where('id_barang', $data['id_barang']);
            // $this->db->update('barang', $update_pinjaman);
            
            $this->db->where('id_pinjaman', $pinjaman);
            $this->db->update('barang_pinjaman', $data);
        } 
    }

    public function pinjaman($id = null)
    {
        $data = $this->fungsi->user_login_peminjam()->nama_lengkap_peminjam;
        $this->db->from('barang_pinjaman');
        $this->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->db->join('user_peminjam', 'barang_pinjaman.nama_pinjaman = user_peminjam.id_user_peminjam', 
        'nama_lengkap_peminjam','nomor_whatsapp', 'nomor_ktp', 'LEFT');
        $this->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->db->join('ruangan', 'ruangan.id_ruangan = barang.ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->db->where('aktif=', 0);
        $this->db->where('nama_lengkap_peminjam =', $data);
        if ($id != null) {
            $this->db->where('id_pinjaman', $id);
        }
        //  Urutkan Data
        $this->db->order_by('id_pinjaman', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function search($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_barang', $keyword);
        }
        // $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $query = $this->db->get('barang',$limit, $start)->result_array();
        return $query;
    }
    public function search_jurusan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('jurusan', $keyword);
        }
        // $this->db->from('barang');
        $this->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        // $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        // $this->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        // $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $query = $this->db->get('barang',$limit, $start)->result_array();
        return $query;
    }

    public function hapus_barang($id)
    {
        $stock_barang_pinjaman = $this->db->get_where('barang_pinjaman', ['id_pinjaman' => $id])->row();

        $stok = $this->db->get_where('barang', ['id_barang' => $stock_barang_pinjaman->id_barang])->row();

        $update = [
            'stok_barang' => $stok->stok_barang + (int) $stock_barang_pinjaman->total_barang_sementara,
        ];
        $this->db->where('id_barang', $stock_barang_pinjaman->id_barang);
        $this->db->update('barang', $update);

        if ($stock_barang_pinjaman->status == 'Sudah Bayar') {
        $update_aktif = [
            'id_pinjaman'   => $id,
            'aktif'         => 1,

        ];

        $this->db->where('id_pinjaman',$id);
        $this->db->update('barang_pinjaman',$update_aktif);
        $this->session->set_flashdata('success', "Data Berhasil Di Hapus");
        redirect('transaksi/cart');
        
        }elseif ($stock_barang_pinjaman->status == 'Masih Panjar') {
            $this->session->set_flashdata('error', "Anda Masih Panjar");
            redirect('transaksi/cart');
            
       
        }else {
            $this->db->where('id_pinjaman', $id);
            $this->db->where('status','Belum Bayar');
            $this->db->delete('barang_pinjaman');
        
        }
    }
    public function toggle_peminjam($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    public function update_peminjam($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function lupa_kata_sandi($post)
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nomor_ktp = $this->input->post('nomor_ktp');
        $nomor_whatsapp = $this->input->post('nomor_whatsapp');
        // $foto = $this->input->post('foto');
        // var_dump($nama_lengkap);
        // die;
        $data = [
            'nama_lengkap'      => $post['nama_lengkap'],
            'jenis_kelamin'     => $jenis_kelamin,
            'nomor_ktp'         => $nomor_ktp,
            'foto'              => $post['foto'],
            'nomor_whatsapp'    => $nomor_whatsapp
        ];
    //    var_dump($data);
    //     die;
        $this->db->insert('lupa_kata_sandi',$data);
    }

    public function get_lupa_kata_sandi($id= null)
    {
        $this->db->from('lupa_kata_sandi');
        if ($id != null) {
            $this->db->where('id_lupa_kata_sandi', $id);
        }
        return $this->db->get();

    }
    public function getUsers($postData)
    {

        $response = array();
        $this->db->select('*');
        if ($postData['search']) {

            // Select record
            $this->db->where("nama_lengkap_peminjam like '%" . $postData['search'] . "%' ");

            $records = $this->db->get('user_peminjam')->result();

            foreach ($records as $row) {
                $response[] = array(
                    "value" => $row->id_user_peminjam,
                    "label" => $row->nama_lengkap_peminjam
                );
            }
        }

        return $response;
    }

    public function ganti_kata_sandi_baru()
    {
        $id_kata_sandi              = $this->input->post('id_kata_sandi');
        $kata_sandi                 = $this->input->post('kata_sandi');

        $data = [
                'id_user_peminjam'          => $id_kata_sandi,
                'kata_sandi'                => password_hash($kata_sandi, PASSWORD_DEFAULT),
                'kata_sandi_kirim'          => $kata_sandi,
        ];
        // var_dump($data);
        // die;

        $this->db->where('id_user_peminjam',$id_kata_sandi);
        $this->db->update('user_peminjam',$data);
    }
}