<?php

class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        // $this->ci->load->model('menu_model','menu');
    }

    function user_login()
    {
        $this->ci->load->model('auth_m', 'auth');
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->auth->get($id_user)->row();
        return $user_data;
    }
    // function user_login_jurusan()
    // {
    //     $this->ci->load->model('auth_m', 'auth');
    //     $id_user = $this->ci->session->userdata('id_user');
    //     $user_data = $this->ci->auth->get_jurusan($id_user)->row();
    //     return $user_data;
    // }
    function user_login_peminjam()
    {
        $this->ci->load->model('peminjam_m', 'peminjam');
        $id_user = $this->ci->session->userdata('id_user_peminjam');
        $user_data = $this->ci->peminjam->get($id_user)->row();
        return $user_data;
    }

    public function count_user()
    {

        $this->ci->db->select('*');
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'user.jurusan = jurusan.id_jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', 'Admin');
        return $this->ci->db->get()->num_rows();
    }
    public function count_barang()
    {
        return $this->ci->db->get('barang')->num_rows();
    }
    public function count_kategori()
    {
        return $this->ci->db->get('kategori')->num_rows();
    }
    public function count_barang_rusak()
    {
        return $this->ci->db->get('barang_rusak')->num_rows();
    }
    public function count_barang_masuk()
    {
        return $this->ci->db->get('barang_masuk')->num_rows();
    }
    public function count_ruangan()
    {
        return $this->ci->db->get('ruangan')->num_rows();
    }
    public function count_pinjaman()
    {
        return $this->ci->db->get('barang_pinjaman')->num_rows();
    }
    public function count_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->select('*');
        $this->ci->db->from('user');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function count_barang_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->select('*');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function count_kategori_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->select('*');
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function count_barang_rusak_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->select('*');
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }

    public function count_pinjaman_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->select('*');
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    
    public function count_ruangan_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function count_barang_masuk_operator()
    {
        $data = $this->ci->fungsi->user_login()->nama_lengkap;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->where('nama_lengkap =', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        $this->ci->db->where('level !=', $data);
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_hukum_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Hukum');
        return $this->ci->db->get()->num_rows();
    }

    public function operator_ekonomi_bisnis()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_ekonomi_bisnis_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        return $this->ci->db->get()->num_rows();
    }
    
    public function operator_teknik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_teknik_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        return $this->ci->db->get()->num_rows();
    }

    public function operator_matematika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_matematika_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_filsafat_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        return $this->ci->db->get()->num_rows();
    }

    public function operator_sosial()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_sosial_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('user');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('level !=', 'Admin');
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_pinjaman()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_pinjaman');
        $this->ci->db->join('user', 'barang_pinjaman.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('barang', 'barang_pinjaman.id_barang = barang.id_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_barang_rusak()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('barang_rusak');
        $this->ci->db->join('barang', 'barang_rusak.id_barang = barang.id_barang', 'kode_barang', 'nama_barang', 'gambar', 'LEFT');
        $this->ci->db->join('user', 'barang_rusak.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_ruangan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('ruangan');
        $this->ci->db->join('user', 'ruangan.operator = user.id_user', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    public function operator_keguruan_kategoti()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->from('kategori');
        $this->ci->db->join('user', 'kategori.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        return $this->ci->db->get()->num_rows();
    }
    function sum_barang_teknik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_teknik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Teknik');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_hukum()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_jurusan =', 'Hukum');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_hukum()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_jurusan =', 'Hukum');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_filsafat()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_filsafat()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Filsafat');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_sosial_politik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_sosial_politik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ilmu Sosial Dan Ilmu Politik');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_matematika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_matematika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Matematika Dan Ilmu Pengetahuan Alam');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_ekonomi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_ekonomi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Ekonomi Dan Bisnis');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_keguruan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_keguruan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $this->ci->db->where('nama_fakultas =', 'Keguruan Dan Ilmu Pendidikan');
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function operator_sum_barang()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function operator_sum_barang_masuk()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_teknik_sipil()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Teknik Sipil');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_teknik_sipil()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Teknik Sipil');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_arsitek()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Arsitektur');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_arsitek()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Arsitektur');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_ilmu_komputer()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Komputer');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_ilmu_komputer()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Komputer');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_biologi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Biologi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_biologi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Biologi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_kimia()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Kimia');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_kimia()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Kimia');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_manajemen()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Manajemen (S1)');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_manajemen()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Manajemen (S1)');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_akuntasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Akuntasi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_akuntasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Akuntasi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_pembangunan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ekonomi Pembangunan');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pembangunan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ekonomi Pembangunan');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_komunikasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Komunikasi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_komunikasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Komunikasi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_administrasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Administrasi Negara');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_administrasi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Administrasi Negara');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_pemerintahan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Pemerintahan');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pemerintahan()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Ilmu Pemerintahan');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_konseling()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Bimbingan Dan Konseling');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_masuk_konseling()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Bimbingan Dan Konseling');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    
    function sum_barang_inggris()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Bahasa Inggris');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_inggris()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Bahasa Inggris');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }

    function sum_barang_pebiologi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Biologi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pebiologi()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Biologi');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_pefisika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Fisika');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pefisika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Fisika');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_pekimia()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Kimia');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pekimia()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Kimia');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_musik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Sendratasik (Musik)');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_musik()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Sendratasik (Musik)');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_pematematika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stok_barang','stock');
        $this->ci->db->from('barang');
        $this->ci->db->join('user', 'barang.operator = user.id_user', 'nama_lengkap', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'nama_kategori', 'LEFT');
        $this->ci->db->join('ruangan', 'barang.ruangan = ruangan.id_ruangan', 'nama_ruangan', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Matematika');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
    function sum_barang_masuk_pematematika()
    {
        $data = $this->ci->fungsi->user_login()->level;
        $this->ci->db->select_sum('stock_barang_masuk','stock');
        $this->ci->db->from('barang_masuk');
        $this->ci->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'kode_barang','nama_barang','ruangan', 'LEFT');
        $this->ci->db->join('user', 'barang_masuk.operator = user.id_user', 'nama_lengkap', 'level', 'LEFT');
        $this->ci->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan', 'nama_jurusan', 'LEFT');
        $this->ci->db->join('fakultas', 'fakultas.id_fakultas = jurusan.fakultas', 'nama_fakultas', 'LEFT');
        $this->ci->db->where('nama_jurusan =', 'Pendidikan Matematika');
        $this->ci->db->where('level !=', $data);
        $nato = $this->ci->db->get()->row()->stock;
        return $nato;
    }
}