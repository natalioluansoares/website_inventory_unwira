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
                <a href="<?=base_url("operator_fakultas/all_laporan_barang_masuk"); ?>" id="cetaklaporansm"
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
                    <a href="<?= base_url('operator_fakultas/detailbarang_masuk'); ?>"
                        class="btn btn-danger text-white btn-block"><i class=" fa fas fa-eye"
                            title="Tampilkan semua"></i>
                        Tampilkan semua</a>
                    <?php } ?>
                    <div class="dropdown-menu lg" aria-labelledby="dropdownMenuButton">
                        <form action="<?= base_url('operator_fakultas/detailbarang_masuk'); ?>" method='GET'>
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
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong></h2>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Operator</th>
                                        <th>Nama Operator</th>
                                        <th>Stock Barang</th>
                                        <th>Total Barang</th>
                                        <!-- <th class="text-center">Operator</th> -->
                                        <th>Tanggal</th>
                                        <th class="text-center">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $stock = 0;
                                    $total = 0;
                                    foreach ($masuk as $br) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $br['kode_barang']; ?></td>
                                        <td><?= $br['nama_barang']; ?></td>
                                        <td><?= $br['nama_jurusan']; ?></td>
                                        <td><?= $br['nama_lengkap']; ?></td>
                                        <td><?= $br['stock_barang_masuk']; ?></td>
                                        <td><?= $br['total_barang_masuk']; ?></td>
                                        <td><?= $br['tanggal_barang_masuk']; ?></td>
                                        <td align="center"><img
                                                src="<?= base_url() ?>assets/images/barang/<?= $br['gambar']; ?>"
                                                style="width:80px ;" class="img-thumbnail rounded-circle"></td>
                                    </tr>
                                    <?php 
                                        $stock +=$br['stock_barang_masuk'];
                                        $total +=$br['total_barang_masuk'];
                                    endforeach; ?>
                                </tbody>

                                <thead>
                                    <tr role="row" class="odd">
                                        <th colspan="5" title="Total">
                                            <h3><b>Jumlah Barang Masuk</b></h3>
                                        </th>
                                        <th title="<?= $stock; ?>">
                                            <h3><b><?= $stock; ?></b></h3>
                                        </th>
                                        <th title="<?= $total; ?>">
                                            <h3><b><?= $total; ?></b></h3>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <td><input type="hidden" id="idoperator" class="control" readonly></td>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Nama Lengkap</strong></th>
                            <th class="text-center"><strong>Operator</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="user" class="form-control text-center" readonly></td>
                            <td><input type="text" id="operator" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modaldetail", function() {
    var Id = $(this).data('id');
    var Nama = $(this).data('nama');
    var Level = $(this).data('level');


    $(".detail #idoperator").val(Id);
    $(".detail #user").val(Nama);
    $(".detail #operator").val(Level);
})
</script>