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
                                            <th>Kode</th>
                                            <th>Kategori</th>
                                            <th>Barang</th>
                                            <th>Ruangan</th>
                                            <th>Stock</th>
                                            <th>Total</th>
                                            <th>Harga Trasaksi</th>
                                            <th>Pembayaran</th>
                                            <th>Nama Operator</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center"><a href="<?= base_url('admin/tambah_barang'); ?>"
                                                    class="btn btn-primary form-control mb-2" title="Tambah Data"><i
                                                        class="fa fa-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($barang as $br) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $br['kode_barang']; ?></td>
                                            <td><?= $br['nama_kategori']; ?></td>
                                            <td><?= $br['nama_barang']; ?></td>
                                            <td><?= $br['nama_ruangan']; ?></td>
                                            <td><?= $br['stok_barang']; ?></td>
                                            <td><?= $br['total_barang']; ?></td>
                                            <td><?= $br['total_barang'] * $br['harga_barang']; ?></td>
                                            <td><?= $br['pembayaran']; ?></td>
                                            <td><?= $br['nama_lengkap']; ?></td>
                                            <td><?= $br['created']; ?></td>
                                            <td align="center"><img
                                                    src="<?= base_url() ?>assets/images/barang/<?= $br['gambar']; ?>"
                                                    style="width:80px ;" class="img-thumbnail rounded-circle"></td>
                                            <td align="center">
                                                <a href="" class="btn btn-warning mb-2" title="Detail Operator"
                                                    data-toggle="modal" data-animation="bounce" data-target=".detail"
                                                    id="modaldetail" data-id="<?= $br['id_barang']; ?>"
                                                    data-nama="<?= $br['nama_lengkap']; ?>"
                                                    data-level="<?= $br['nama_jurusan']; ?>"
                                                    data-harga="<?= $br['harga_barang']; ?>"
                                                    data-pinjam="<?= $br['harga_barang_pinjam']; ?>"><i
                                                        class="ion-android-contacts"></i></a>

                                                <a href="<?= base_url('admin/edit_barang/' . $br['id_barang']); ?>"
                                                    class="btn btn-info mb-2" title="Ubah Data"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('admin/deletebarang/' . $br['id_barang']); ?>"
                                                    class="btn btn-danger mb-2" title="Hapus Data" id="delete"><i
                                                        class="ion-android-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end wrapper -->
    <div class="modal fade detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Detail</h5>
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
                        <thead>
                            <tr>
                                <th class="text-center"><strong>Harga Barang</strong></th>
                                <th class="text-center"><strong>Harga Barang Pinjam</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" id="harga" class="form-control text-center" readonly></td>
                                <td><input type="text" id="pinjam" class="form-control text-center" readonly></td>
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
    var Harga = $(this).data('harga');
    var Pinjam = $(this).data('pinjam');


    $(".detail #idoperator").val(Id);
    $(".detail #user").val(Nama);
    $(".detail #operator").val(Level);
    $(".detail #harga").val(Harga);
    $(".detail #pinjam").val(Pinjam);
})
</script>