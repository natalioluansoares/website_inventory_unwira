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
            <div class=" col-md-3">
                <a href="<?=base_url("barang_rusak/semua_barang_rusak_proses_perbaiki"); ?>" id="cetaklaporansm"
                    class="btn btn-success btn-block">
                    Cetak laporan PDF</a>
            </div>
            <div class=" col-md-3">
                <a href="<?=base_url("operator_fakultas/all_laporan_barang_masuk"); ?>" id="cetaklaporansm"
                    class="btn btn-primary btn-block">
                    Cetak laporan EXL</a>
            </div>
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle btn-block" type="button" id="filterTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter tanggal
                    </button>
                    <?php if (isset($_GET['filter-tanggal'])) { ?>
                    <a href="<?= base_url('barang_rusak/filter_proses_perbaiki'); ?>"
                        class="btn btn-danger text-white btn-block"><i class=" fa fas fa-eye"
                            title="Tampilkan semua"></i>
                        Tampilkan semua</a>
                    <?php } ?>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('barang_rusak/filter_proses_perbaiki'); ?>" method='GET'>
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
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle btn-block" type="button" id="filterTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Laporan EXL
                    </button>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('operator_fakultas/laporan_barang_masuk') ?>" method='GET'>
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
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle btn-block" type="button" id="filterTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Laporan PDF
                    </button>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('barang_rusak/laporan_filter_proses_perbaiki') ?>" method='GET'>
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
                <div class="flash" data-flas="<?php echo $this->session->flashdata('success'); ?>"></div>
                <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
                <div class="card m-b-30">
                    <div class="card-body">
                        <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong></h2>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Status Pembayaran</th>
                                        <th>Pembayaran</th>
                                        <th>Harga Perbaiki</th>
                                        <th>Jumlah Harga</th>
                                        <th>Jumlah Rusak</th>
                                        <th>Sisa Uang</th>
                                        <th>Jumlah Temporari</th>
                                        <th>Nama Perbaiki</th>
                                        <th>Tanggal Rusak</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                        $pembayaran = 0;
                                        $harga = 0;
                                        $total = 0;
                                        $sisa = 0;
                                        $perbaiki = 0;
                                    foreach ($barang_rusak as $br) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $br['nama_barang']; ?></td>
                                        <td><?= $br['status_pembayaran']; ?></td>
                                        <td><?= $br['pembayaran_barang_rusak']; ?></td>
                                        <td><?= $br['harga_perbaiki']; ?></td>
                                        <td><?= ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']) ?>
                                        </td>
                                        <td><?= $br['jumlah_barang_rusak']; ?></td>
                                        <td><?= $br['pembayaran_barang_rusak'] - ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']); ?>
                                        </td>
                                        <td><?= $br['barang_rusak_temporari']; ?></td>
                                        <td><?= $br['nama_perbaiki']; ?></td>
                                        <td><?= $br['created_tanggal']; ?></td>
                                        <td align="center"><img
                                                src="<?= base_url() ?>assets/images/barang/<?= $br['gambar']; ?>"
                                                style="width:80px ;" class="img-thumbnail rounded-circle"></td>
                                    </tr>
                                    <?php 
                                        $pembayaran +=$br['pembayaran_barang_rusak'];
                                        $harga +=$br['harga_perbaiki'] *  $br['jumlah_barang_rusak'];
                                        $perbaiki +=$br['harga_perbaiki'];
                                        $total +=$br['jumlah_barang_rusak'];
                                        $sisa +=$br['pembayaran_barang_rusak'] - ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']);;
                                    endforeach; ?>
                                </tbody>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td colspan="3" title="Total">
                                            <h3><b>Jumlah Barang Rusak</b></h3>
                                        </td>
                                        <td title="<?= $pembayaran; ?>">
                                            <h3><b><?= $pembayaran; ?></b></h3>
                                        </td>
                                        <td title="<?= $perbaiki; ?>">
                                            <h3><b><?= $perbaiki; ?></b></h3>
                                        </td>
                                        <td title="<?= $harga; ?>">
                                            <h3><b><?= $harga; ?></b></h3>
                                        </td>
                                        <td title="<?= $total; ?>">
                                            <h3><b><?= $total; ?></b></h3>
                                        </td>
                                        <td title="<?= $sisa; ?>">
                                            <h3><b><?= $sisa; ?></b></h3>
                                        </td>
                                        <td title="<?= $sisa+$pembayaran+$perbaiki+$harga; ?>">
                                            <h2><b><?= $sisa+$pembayaran+$perbaiki+$harga;  ?></b></h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->