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
                <a href="<?=base_url("uang_kas_jurusan/laporan_uang_kas_jurusan"); ?>" id="cetaklaporansm"
                    class="btn btn-success btn-block">
                    Cetak laporan PDF</a>
            </div>
            <div class=" col-md-3">
                <a href="<?=base_url("barang_rusak/semua_barang_rusak_sudah_bayar"); ?>" id="cetaklaporansm"
                    class="btn btn-info btn-block">
                    Cetak laporan EXCEL</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="flash" data-flas="<?php echo $this->session->flashdata('success'); ?>"></div>
                <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
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
                                        <th>Nama Operator</th>
                                        <th>Nama Jurusan</th>
                                        <th>Jumlah Uang Jurusan</th>
                                        <th>Tanggal Simpan</th>
                                        <th>Tanggal Ubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $uang = 0;
                                    foreach ($uang_kas_jurusan as $kt) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $kt['nama_lengkap']; ?></td>
                                        <td class="text-center"><?= $kt['nama_jurusan']; ?></td>
                                        <td class="text-center"><?= $kt['jumlah_uang_kas_fakultas_jurusan']; ?></td>
                                        <td class="text-center"><?= $kt['tanggal_simpan_fakultas_jurusan']; ?></td>
                                        <td class="text-center"><?= $kt['tanggal_ubah_fakultas_jurusan']; ?></td>
                                    </tr>
                                    <?php 
                                    $uang +=$kt['jumlah_uang_kas_fakultas_jurusan'];
                                    endforeach; ?>
                                </tbody>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td colspan="3" title="Total">
                                            <h3><b>Jumlah Uang Kas Jurusan</b></h3>
                                        </td>
                                        <td title="<?= $uang; ?>" align="center">
                                            <h3><b><?= $uang; ?></b></h3>
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