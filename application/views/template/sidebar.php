<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            <div class="menu-extras topbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->
            <div class="clearfix"></div>
        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->
    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="<?= base_url('dashboard'); ?>"><i class="mdi mdi-airplay"></i>Dashboard</a>
                    </li>
                    <?php if ($this->fungsi->user_login()->level == 'Admin') { ?>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-layers"></i>Data Profil</a>
                        <ul class="submenu">
                            <li><a
                                    href="<?= base_url('profil'); ?>"><?= ($this->fungsi->user_login()->nama_lengkap); ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-gauge"></i>Data User</a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="#">Operator</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url('user'); ?>">Data Operator</a></li>
                                    <li><a href="<?= base_url('admin/peminjam'); ?>">Akun Peminjam</a></li>
                                    <li><a href="<?= base_url('admin/get_lupa_kata_sandi'); ?>">Lupa Kata Sandi</a>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Fakultas/Jurusan</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url('admin/fakultas'); ?>">Data Fakultas</a></li>
                                    <li><a href="<?= base_url('admin/jurusan'); ?>">Data Jurusan</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Aturan Transaksi</a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url('admin/aturan'); ?>">Data Aturan Transaksi</a></li>
                            </li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Uang Kas Fakultas</a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('uang_kas_admin'); ?>">Data Uang Kas Fakultas</a>
                            <li><a href="<?= base_url('uang_kas_admin/uang_kas_masuk'); ?>">Data Uang Kas
                                    Masuk</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </li>
                <li class="has-submenu">
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Kategori & Barang & Rusak &
                        Pinjaman</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('admin/kategori'); ?>">Data Kategori</a></li>
                        <li><a href="<?= base_url('admin/barang'); ?>">Data Barang</a></li>
                        <li><a href="<?= base_url('admin/ruangan'); ?>">Data Ruangan</a></li>
                        <li><a href="<?= base_url('admin/barang_masuk'); ?>">Data Barang Masuk</a></li>
                        <li><a href="<?= base_url('admin/barang_rusak'); ?>">Data Barang Rusak</a></li>
                        <li><a href="<?= base_url('admin/pinjaman'); ?>">Data Barang Pinjaman</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="fa fa-folder-open"></i>
                        (P/<?= ($this->fungsi->count_pinjaman()); ?>)</a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Pinjam Barang</a>
                            <ul class="submenu" style="font-family:Times New Roman; color:red">
                                <?php foreach ($barang_pinjaman as $key => $value) :?>
                                <li><a href="<?= base_url('admin/barang_rusak'); ?>"><?=$value['nama_pinjaman']; ?>
                                        (<?=$value['level']; ?>)///(<?=$value['total_barang_pinjaman']; ?>)</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Laporan</a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Barang Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('admin/detailbarang_masuk'); ?>">Data Barang Masuk</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Transaksik</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('admin/sudah_bayar'); ?>">Data Sudah Transaksi</a></li>
                                <li><a href="<?= base_url('admin/belum_bayar'); ?>">Data Belum Transaksi</a></li>
                                <li><a href="<?= base_url('admin/transaksi_panjar'); ?>">Data Transaksi Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Uang Kas Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('admin/sudah_bayar'); ?>">Data Sudah Transaksi</a></li>
                                <li><a href="<?= base_url('admin/belum_bayar'); ?>">Data Belum Transaksi</a></li>
                                <li><a href="<?= base_url('admin/transaksi_panjar'); ?>">Data Transaksi Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UKang Kas Keluar</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('admin/sudah_bayar'); ?>">Data Sudah Transaksi</a></li>
                                <li><a href="<?= base_url('admin/belum_bayar'); ?>">Data Belum Transaksi</a></li>
                                <li><a href="<?= base_url('admin/transaksi_panjar'); ?>">Data Transaksi Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($this->fungsi->user_login()->level == 'Operator_Jurusan') { ?>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Profil</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('profil'); ?>"><?= ($this->fungsi->user_login()->nama_lengkap); ?></a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data
                        <?= ($this->fungsi->user_login()->nama_jurusan); ?></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Barang Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('barang/barang_masuk'); ?>">Data Barang Masuk</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Kategori/Ruangan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('kategori'); ?>">Data Kategori</a></li>
                                <li><a href="<?= base_url('ruangan'); ?>">Data Ruangan</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Masuk Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('uang_kas_jurusan'); ?>">Data Uang Kas Jurusan</a>
                                <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_masuk'); ?>">Data Uang Kas
                                        Masuk</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Keluar Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_keluar_barang'); ?>">Data UK
                                        Pembayaran
                                        Barang
                                    </a>
                                </li>
                                <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_keluar'); ?>">Data UK
                                        Pembayaran
                                        Barang Rusak
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Barang
                        <?= ($this->fungsi->user_login()->nama_jurusan); ?></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Barang / Pinjaman</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('barang'); ?>">Data Barang</a></li>
                                <li><a href="<?= base_url('barang_pinjaman'); ?>">Data Barang Pinjaman</a></li>
                                <li><a href="<?= base_url('barang_rusak'); ?>">Data Barang Rusak</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Laporan</a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Barang Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('barang/detailbarang_masuk'); ?>">Data Barang Masuk</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Transaksik</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('barang_pinjaman/sudah_bayar'); ?>">Data Sudah Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('barang_pinjaman/belum_bayar'); ?>">Data Belum Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('barang_pinjaman/transaksi_panjar'); ?>">Data Transaksi Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Barang Rusak</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('barang_rusak/sudah_bayar'); ?>">Sudah Perbaiki</a>
                                </li>
                                <li><a href="<?= base_url('barang_rusak/belum_bayar'); ?>">Belum Perbaiki</a>
                                </li>
                                <li><a href="<?= base_url('barang_rusak/proses_perbaiki'); ?>">Dalam Proses
                                        Perbaiki</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Uang Kas Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_jurusan'); ?>">Uang Kas Jurusan</a>
                                </li>
                                <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_masuk_jurusan'); ?>">UK Masuk
                                        Jurusan</a>
                                </li>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Uang Kas Keluar</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_pembayaran_barang'); ?>">Uang Kas
                                Pembayaran Barang</a></li>
                        <li><a href="<?= base_url('uang_kas_jurusan/uang_kas_pembayaran_barang_rusak'); ?>">Uang Kas
                                Pembayaran Barang Rusak</a></li>
                    </ul>
                </li>
                </ul>
                </li>
                <?php } ?>

                <?php if ($this->fungsi->user_login()->level == 'Operator_Fakultas' ) { ?>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Profil</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('profil'); ?>"><?= ($this->fungsi->user_login()->nama_lengkap); ?></a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data
                        <?= ($this->fungsi->user_login()->nama_fakultas); ?></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Operator Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/operator'); ?>">Data User</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Kategori/Ruangan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/kategori'); ?>">Data Kategori</a></li>
                                <li><a href="<?= base_url('operator_fakultas/ruangan'); ?>">Data Ruangan</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Masuk Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('uang_kas_fakultas'); ?>">Data Uang Kas Fakultas</a>
                                <li><a href="<?= base_url('uang_kas_fakultas/uang_kas_masuk'); ?>">Data Uang Kas
                                        Masuk</a>
                                </li>
                                <li><a href="<?= base_url('uang_kas_fakultas/uang_kas_keluar_barang'); ?>">Data UK
                                        Pembayaran
                                        Barang
                                    </a>
                                </li>
                                <li><a href="<?= base_url('uang_kas_fakultas/uang_kas_keluar'); ?>">Data UK
                                        Pembayaran
                                        Barang Rusak
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Keluar Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('uang_kas_fakultas/uang_kas_keluar_barang'); ?>">Data UK
                                        Pembayaran
                                        Barang
                                    </a>
                                </li>
                                <li><a href="<?= base_url('uang_kas_fakultas/uang_kas_keluar'); ?>">Data UK
                                        Pembayaran
                                        Barang Rusak
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Barang & Pinjaman & Rusak</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('operator_fakultas/barang'); ?>">Data Barang</a></li>
                        <li><a href="<?= base_url('operator_fakultas/barang_masuk'); ?>">Data Barang Masuk</a></li>
                        <li><a href="<?= base_url('operator_fakultas/pinjaman'); ?>">Data Barang Pinjaman</a>
                        </li>
                        <li><a href="<?= base_url('operator_fakultas/barang_rusak'); ?>">Data Barang Rusak</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Data Laporan</a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Barang Masuk</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/detailbarang_masuk'); ?>">Data Barang
                                        Masuk</a>
                                </li>

                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Transaksi Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/sudah_bayar'); ?>">Data Sudah
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/belum_bayar'); ?>">Data Belum
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/transaksi_panjar'); ?>">Data Transaksi
                                        Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Masuk Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/sudah_bayar'); ?>">Data Sudah
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/belum_bayar'); ?>">Data Belum
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/transaksi_panjar'); ?>">Data Transaksi
                                        Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">UK Keluar Jurusan</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('operator_fakultas/sudah_bayar'); ?>">Data Sudah
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/belum_bayar'); ?>">Data Belum
                                        Transaksi</a>
                                </li>
                                <li><a href="<?= base_url('operator_fakultas/transaksi_panjar'); ?>">Data Transaksi
                                        Masih
                                        Panjar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <li class="has-submenu">
                    <a href="<?= base_url('auth/logout') ?>" title="Click Untuk Kembali Ke Login">
                        <i class="fa fa-arrow-circle-right"></i>Logout</a>
                </li>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>