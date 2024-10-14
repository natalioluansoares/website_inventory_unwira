<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-info">
                                    <tr>
                                        <th data-priority="1" class="text-center">
                                            <img src="<?= base_url('assets/'); ?>/images/logo2.png" width="140px">
                                        </th>
                                        <th data-priority="1">
                                            <div class="text-center">
                                                <font size="3" style="font-family:Wide Latin">
                                                    <b>Website Inventory UNWIRA</b><br>
                                                    <span style="font-family:Times New Roman">JL.Jend. Ahmad Yani 50-52
                                                        Kupang - 85225, NTT - Indonesia<br>
                                                        Telp.(0380)833395- 831194</span>
                                                </font><br>
                                                Web:<span style="font-family:Times New Roman; color:#3366cc">
                                                    http//www.unwira.ac.id</span>
                                                Email:<span style="font-family:Times New Roman; color:#3366cc">
                                                    riung.info@unwira.ac.id</span>
                                                <hr width="80%">
                                            </div>
                                        </th>
                                        <th data-priority="1" class="text-center">
                                            <img src="<?= base_url('assets/'); ?>/images/logo2.png" width="140px">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-4">
                <a href="<?=base_url("operator_fakultas/semua_sudah_transaksi"); ?>" id="cetaklaporansm"
                    class="btn btn-success btn-block">
                    Cetak
                    laporan</a>
            </div>
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle btn-block" type="button" id="filterTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter tanggal
                    </button>
                    <?php if (isset($_GET['filter-tanggal'])) { ?>
                    <a href="<?= base_url('operator_fakultas/sudah_bayar'); ?>"
                        class="btn btn-danger text-white btn-block"><i class=" fa fas fa-eye"
                            title="Tampilkan semua"></i>
                        Tampilkan semua</a>
                    <?php } ?>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('operator_fakultas/sudah_bayar'); ?>" method='GET'>
                            <div class="form-group">
                                <label for="">start</label>
                                <input type="date" class="form-control" id="filter-tanggal-sm-awal" name="tanggal_awal">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-center">end</label>
                                <input type="date" class="form-control" name="tanggal_akhir">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="filter-tanggal"
                                    class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle btn-block" type="button" id="filterTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter tanggal Laporan
                    </button>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('operator_fakultas/sudah_transaksi') ?>" method='GET'>
                            <div class="form-group">
                                <label for="">start</label>
                                <input type="date" class="form-control" id="filter-tanggal-sm-awal" name="tanggal_awal">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-center">end</label>
                                <input type="date" class="form-control" name="tanggal_akhir">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="downloal-tanggal"
                                    class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="flash" data-flas="<?php echo $this->session->flashdata('success'); ?>">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong>
                            </h2>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Kode Barang</th> -->
                                            <th>Barang</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Kembalian</th>
                                            <th>Durasi Pinjaman</th>
                                            <th>Total Pinjaman</th>
                                            <th>Kembalian Barang</th>
                                            <th>Total Uang</th>
                                            <th>Total Bayar</th>
                                            <th>Sisa Uang</th>
                                            <th>Ruangan</th>
                                            <th>Peminjan</th>
                                            <th>Operator</th>
                                            <th>Nama Operator</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                         $jumlah = 0;
                                         $kembalian = 0;
                                         $sementara = 0;
                                         $durasi = 0;
                                         $total = 0;
                                         $bayar = 0;
                                         $sisa = 0;
                                    foreach ($pinjaman as $bp) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <!-- <td><?= $bp['kode_barang']; ?></td> -->
                                            <td><?= $bp['nama_barang']; ?></td>
                                            <td><?= $bp['status']; ?></td>
                                            <td><?= $bp['status_kembalian']; ?></td>
                                            <!-- <td><?= $bp['nama_ruangan']; ?></td> -->
                                            <td><?= $bp['durasi_pinjaman']; ?></td>
                                            <td><?= $bp['total_barang_pinjaman']; ?></td>
                                            <td><?= $bp['total_barang_sementara']; ?></td>
                                            <td><?= $bp['jumlah_harga_pinjam']; ?></td>
                                            <td><?= $bp['bayar']; ?></td>
                                            <td><?=$bp['bayar'] - $bp['jumlah_harga_pinjam']; ?></td>
                                            <td><?= $bp['nama_ruangan']; ?></td>
                                            <td><?= $bp['nama_pinjaman']; ?></td>
                                            <td><?= $bp['nama_jurusan']; ?></td>
                                            <td><?= $bp['nama_lengkap']; ?></td>
                                            <td><?= $bp['tanggal_pinjaman']; ?></td>
                                            <td align="center"><img
                                                    src="<?= base_url() ?>assets/images/barang/<?= $bp['gambar']; ?>"
                                                    style="width:80px ;" class="img-thumbnail rounded-circle"></td>
                                        </tr>
                                        <?php 
                                        $jumlah +=$bp['total_barang_pinjaman'];
                                        $sementara +=$bp['total_barang_sementara'];
                                        $total +=$bp['durasi_pinjaman'];
                                        $durasi +=$bp['durasi_pinjaman'];
                                        $bayar +=$bp['bayar'];
                                        $kembalian +=$bp['jumlah_harga_pinjam'];
                                        $sisa +=$bp['bayar'] - $bp['jumlah_harga_pinjam'];
                                    endforeach; ?>
                                    </tbody>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td colspan="4" title="Total">
                                                <h3><b>Jumlah Uang</b></h3>
                                            </td>
                                            <td title="<?= $durasi; ?>">
                                                <h3><b><?= $durasi; ?></b></h3>
                                            </td>
                                            <td title="<?= $jumlah; ?>">
                                                <h3><b><?= $jumlah; ?></b></h3>
                                            </td>
                                            <td title="<?= $sementara; ?>">
                                                <h3><b><?= $sementara; ?></b></h3>
                                            </td>
                                            <td title="<?= $kembalian; ?>">
                                                <h3><b><?= $kembalian; ?></b></h3>
                                            </td>
                                            <td title="<?= $bayar; ?>">
                                                <h3><b><?= $bayar; ?></b></h3>
                                            </td>
                                            <td title="<?= $sisa; ?>">
                                                <h3><b><?= $sisa; ?></b></h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->