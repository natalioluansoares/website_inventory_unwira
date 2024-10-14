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
                <a href="<?=base_url("uang_kas_jurusan/laporan_filter_semua_uang_kas_masuk_jurusan"); ?>"
                    id="cetaklaporansm" class="btn btn-success btn-block">
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
                    <a href="<?= base_url('uang_kas_jurusan/uang_kas_masuk_jurusan'); ?>"
                        class="btn btn-danger text-white btn-block"><i class=" fa fas fa-eye"
                            title="Tampilkan semua"></i>
                        Tampilkan semua</a>
                    <?php } ?>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('uang_kas_jurusan/filter_uang_kas_masuk_jurusan'); ?>" method='GET'>
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
                        <form action="<?= base_url('uang_kas_jurusan/laporan_filter_uang_kas_masuk_jurusan') ?>"
                            method='GET'>
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
                        <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong>
                        </h2>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Donator</th>
                                        <th>Status Uang Masuk</th>
                                        <th>Total Uang Jurusan</th>
                                        <th>Jumlah Uang Masuk</th>
                                        <th>Nama Operator</th>
                                        <th>Nama Jurusan</th>
                                        <th>Tanggal Simpan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $uang = 0;
                                    $uang1 = 0;
                                    foreach ($uang_kas_masuK_jurusan as $kt) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $kt['nama_donator']; ?><sup
                                                class="text-danger">(<?= $kt['gelar_donator']; ?>)</sup>
                                        </td>
                                        <td class="text-center"><?= $kt['status_uang_keluar_masuk']; ?></td>
                                        <td class="text-center"><?= $kt['jumlah_uang_kas_fakultas_jurusan']; ?></td>
                                        <td class="text-center"><?= $kt['uang_kas_masuk_keluar']; ?></td>
                                        <td class="text-center"><?= $kt['nama_lengkap']; ?></td>
                                        <td class="text-center"><?= $kt['nama_jurusan']; ?></td>
                                        <td class="text-center"><?= $kt['tanggaL_simpan_uang_kas']; ?></td>
                                        </td>
                                    </tr>
                                    <?php 
                                    $uang +=$kt['jumlah_uang_kas_fakultas_jurusan'];
                                    $uang1 +=$kt['uang_kas_masuk_keluar'];
                                    endforeach; ?>
                                </tbody>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td colspan="3" title="Total">
                                            <h3><b>Jumlah Uang Kas Masuk Jurusan</b></h3>
                                        </td>
                                        <td title="<?= $uang; ?>" align="center">
                                            <h3><b><?= $uang; ?></b></h3>
                                        </td>
                                        <td title="<?= $uang1; ?>" align="center">
                                            <h3><b><?= $uang1; ?></b></h3>
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