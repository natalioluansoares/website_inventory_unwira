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
                                        <th>Sisa Uang</th>
                                        <th>Jumlah Rusak</th>
                                        <th>Jumlah Temporari</th>
                                        <th>Nama Perbaiki</th>
                                        <th>Tanggal Rusak</th>
                                        <th class="text-center"> <a href="<?= base_url('barang_rusak/tambah'); ?>"
                                                class="btn btn-primary form-control mb-2" title="Tambah Data"><i
                                                    class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($barang_rusak as $br) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $br['nama_barang']; ?></td>
                                        <td><?= $br['status_pembayaran']; ?></td>
                                        <td><?= $br['pembayaran_barang_rusak']; ?></td>
                                        <td><?= $br['harga_perbaiki']; ?></td>
                                        <td><?= ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']) ?>
                                        </td>
                                        <td><?= $br['pembayaran_barang_rusak'] - ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']); ?>
                                        </td>
                                        <td><?= $br['jumlah_barang_rusak']; ?></td>
                                        <td><?= $br['barang_rusak_temporari']; ?></td>
                                        <td><?= $br['nama_perbaiki']; ?></td>
                                        <td><?= $br['created_tanggal']; ?></td>
                                        <!-- <td align="center"><img
                                                src="<?= base_url() ?>assets/images/barang/<?= $br['gambar']; ?>"
                                                style="width:80px ;" class="img-thumbnail rounded-circle"></td> -->
                                        <td align="center">
                                            <a href="" class="btn btn-warning mb-2" title="Detail Operator"
                                                data-toggle="modal" data-animation="bounce" data-target=".detail"
                                                id="modaldetail" data-id="<?= $br['id_barang']; ?>"
                                                data-nama="<?= $br['nama_lengkap']; ?>"
                                                data-level="<?= $br['nama_jurusan']; ?>"><i
                                                    class="ion-android-contacts"></i></a>

                                            <a href="<?= base_url('barang_rusak/edit/' . $br['id_rusak']); ?>"
                                                class="btn btn-info mb-2" title="Ubah Data"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="" class="btn btn-success mb-2" data-toggle="modal"
                                                data-target=".stok" id="modelupdate" data-id="<?= $br['id_rusak'] ?>"
                                                data-id_barang="<?= $br['id_barang'] ?>"
                                                data-barang="<?= $br['nama_barang'] ?>"
                                                data-jumlah="<?= $br['barang_rusak_temporari'] ?>"
                                                data-jurusan="<?= $br['nama_jurusan'] ?>"
                                                data-harga_perbaiki="<?= $br['harga_perbaiki'] ?>"
                                                data-perbaiki="<?= $br['harga_perbaiki'] *  $br['jumlah_barang_rusak']; ?>"
                                                data-bayaran="<?= $br['pembayaran'] ?>"
                                                data-pembayaran="<?= $br['status_pembayaran']?>"><i
                                                    class="fa fa-paypal "></i></a>

                                            <a href="<?= base_url('barang_rusak/deletebarangrusak/' . $br['id_rusak']); ?>"
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
        <!-- end page title end breadcrumb -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->
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

<!-- end wrapper -->
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

<div class="modal fade stok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kembalian Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('barang_rusak/update_rusak'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" align="center">
                                <label>Operator</label>
                                <input type="text" class="form-control text-center" id="jurusan"
                                    placeholder="Nama Barang" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <input type="hidden" id="id_rusak" name="id_rusak" class="control" readonly>
                                <select id="status_pembayaran" name="status_pembayaran" class="form-control" readonly>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                    <option value="Masih Panjar">Masih Panjar</option>
                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                </select>
                                <?= form_error('status_pembayaran', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" id="namabarang" class="form-control" readonly>
                                <input type="hidden" id="idbarang" name="idbarang" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jumlah_harga">Jumlah Barang Rusak</label>
                                <input type="text" class="form-control" id="rusak" name="rusak" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pembayaran">Stok Perbaiki</label>
                                <input type="number" class="form-control" name="perbaiki" id="stok_perbaiki"
                                    placeholder="Stok Perbaiki" min="0" value="0">
                            </div>
                            <?= form_error('pembayaran', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5"><i
                                    class="fa fa-refresh"></i>
                                Cancel
                            </button>
                            <a href="<?= base_url('operator_fakultas/pinjaman'); ?>" class="btn btn-success"><i
                                    class="fa fa-mail-reply (alias)"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modelupdate", function() {
    var Id = $(this).data('id');
    var Jurusan = $(this).data('jurusan');
    var Pembayaran = $(this).data('pembayaran');
    var Barang = $(this).data('barang');
    var Id_barang = $(this).data('id_barang');
    var Jumlah = $(this).data('jumlah');
    var Perbaiki = $(this).data('perbaiki');
    var Bayaran = $(this).data('bayaran');
    var Harga_perbaiki = $(this).data('harga_perbaiki');


    $(".stok  #id_rusak").val(Id);
    $(".stok  #jurusan").val(Jurusan);
    $(".stok  #status_pembayaran").val(Pembayaran);
    $(".stok  #namabarang").val(Barang);
    $(".stok  #idbarang").val(Id_barang);
    $(".stok  #rusak").val(Jumlah);
    $(".stok  #harga").val(Perbaiki);
    $(".stok  #bayaran").val(Bayaran);
    $(".stok  #hargaperbaiki").val(Harga_perbaiki);

})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('barang_rusak/update_rusak'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href =
                    "<?= base_url('barang_rusak'); ?>";
            }
        });
    }));
})
</script>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script>
$(function() {
    $('body').on('keyup', '#stok_perbaiki', function() {
        let harga = $('#hargaperbaiki').val();
        let total_pinjam = $(this).val();

        $('#bayaran').val(total_pinjam * harga);


    });
});
</script>