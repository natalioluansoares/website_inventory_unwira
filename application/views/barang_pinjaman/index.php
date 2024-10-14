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
                    <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h2 class="text-center" style="font-family:Times New Roman">
                                    <strong><?= $title; ?></strong>
                                </h2>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatable">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <!-- <th>Kode Barang</th> -->
                                                <th>Barang</th>
                                                <th>Total Pinjaman</th>
                                                <th>Kembalian Barang</th>
                                                <th>Durasi Pinjaman</th>
                                                <th>Total Uang</th>
                                                <th>Total Bayar</th>
                                                <th>Sisa Uang</th>
                                                <th>Status Pembayaran</th>
                                                <th>Peminjan</th>
                                                <th>Operator</th>
                                                <th>Tanggal</th>
                                                <!-- <th>Nama Pinjaman</th> -->
                                                <th class="text-center"><a
                                                        href="<?= base_url('barang_pinjaman/tambah'); ?>"
                                                        class="btn btn-primary form-control mb-2" title="Tambah Data"><i
                                                            class="fa fa-plus"></i></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                    foreach ($barang_pinjaman as $bp) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <!-- <td><?= $bp['kode_barang']; ?></td> -->
                                                <td><?= $bp['nama_barang']; ?></td>
                                                <!-- <td><?= $bp['nama_ruangan']; ?></td> -->
                                                <td><?= $bp['total_barang_pinjaman']; ?></td>
                                                <td><?= $bp['total_barang_sementara']; ?></td>
                                                <td><?= $bp['durasi_pinjaman']; ?>(Hari)</td>
                                                <td><?= $bp['jumlah_harga_pinjam']; ?></td>
                                                <td><?= $bp['bayar']; ?></td>
                                                <td><?=$bp['bayar'] - $bp['jumlah_harga_pinjam']; ?></td>
                                                <td><?= $bp['status']; ?></td>
                                                <td><?= $bp['nama_lengkap_peminjam']; ?></td>
                                                <td><?= $bp['nama_jurusan']; ?></td>
                                                <td><?= $bp['tanggal_pinjaman']; ?></td>
                                                <td align="center">
                                                    <a href="" class="btn btn-warning form-control mb-2"
                                                        title="Detail Data" data-toggle="modal" data-animation="bounce"
                                                        data-target=".detail" id="modaldetail"
                                                        data-pinjaman="<?= $bp['id_pinjaman'] ?>"
                                                        data-nama="<?= $bp['nama_lengkap'] ?>"
                                                        data-ktp="<?= $bp['nomor_ktp'] ?>"
                                                        data-hp="<?= $bp['nomor_whatsapp'] ?>"
                                                        data-operator="<?= $bp['nama_jurusan'] ?>"
                                                        data-harga="<?= $bp['harga_barang_pinjam'] ?>"
                                                        data-stok="<?= $bp['stok_barang'] ?>"
                                                        data-ruangan="<?= $bp['nama_ruangan'] ?>"
                                                        data-sementara="<?= $bp['total_barang_sementara'] ?>"
                                                        data-kembalian="<?= $bp['status_kembalian'] ?>"
                                                        data-jumlah="<?= $bp['jumlah_harga_pinjam'] ?>"><i class="
                                                ion-android-contacts"></i></a>

                                                    <a href="<?= base_url('barang_pinjaman/edit/' . $bp['id_pinjaman']); ?>"
                                                        class="btn btn-info form-control mb-2" title="Ubah Data"><i
                                                            class="fa fa-edit"></i></a>

                                                    <a href="<?= base_url('barang_pinjaman/delete/' . $bp['id_pinjaman']); ?>"
                                                        class="btn btn-danger form-control mb-2" id="delete"><i
                                                            class="ion-android-trash "></i></a>

                                                    <a href="" data-toggle="modal" data-target=".ubah"
                                                        id="modelkategori" data-id="<?= $bp['id_pinjaman'] ?>"
                                                        data-status="<?= $bp['status'] ?>"
                                                        data-jumlah="<?= $bp['jumlah_harga_pinjam'] - $bp['bayar'] ?>"
                                                        data-aktif="<?= $bp['aktif'] ?>"
                                                        class="btn btn-success form-control mb-2" title="Pembayaran"
                                                        title="Data Pembayaran"><i class="fa fa-paypal "></i>
                                                    </a>

                                                    <a href="" data-toggle="modal" data-target=".stok" id="modelupdate"
                                                        data-id="<?= $bp['id_pinjaman'] ?>"
                                                        data-nama="<?= $bp['nama_barang'] ?>"
                                                        data-sementara="<?= $bp['total_barang_sementara'] ?>"
                                                        data-total="<?= $bp['total_barang_sementara']?>"
                                                        data-status="<?= $bp['status'] ?>"
                                                        data-kembalian="<?= $bp['status_kembalian'] ?>"
                                                        data-barang="<?= $bp['id_barang'] ?>"
                                                        class="btn btn-dark mb-2 form-control" title="Kembalian Barang"
                                                        title="Data Pembayaran"><i class="fa fa-briefcase "></i>
                                                    </a>
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
    </div>
</div>
<!-- end wrapper -->
<div class="modal fade detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Pinjaman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <td><input type="hidden" id="idpinjaman" class="control" readonly></td>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Operator</strong></th>
                            <th class="text-center"><strong>Nama Operator</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="operator" class="form-control text-center" readonly></td>
                            <td><input type="text" id="pinjaman" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Nomor KTP</strong></th>
                            <th class="text-center"><strong>Nomor HP</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="ktp" class="form-control text-center" readonly></td>
                            <td><input type="text" id="hp" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Harga Barang</strong></th>
                            <th class="text-center"><strong>Stok Barang</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="harga" class="form-control text-center" readonly></td>
                            <td><input type="text" id="stok" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Jumlah Harga Pinjam</strong></th>
                            <th class="text-center"><strong>Ruangan</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="jumlah" class="form-control text-center" readonly></td>
                            <td><input type="text" id="ruangan" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" align="center">
                                <label>Stok Barang Sementara</label>
                                <input type="text" class="form-control text-center" id="sementara"
                                    placeholder="Nama Barang" required readonly>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Status Kembalian</strong></th>
                            <td><input type="text" id="kembalian" class="form-control text-center" readonly></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modaldetail", function() {
    var Pinjaman = $(this).data('pinjaman');
    var Nama = $(this).data('nama');
    var Ktp = $(this).data('ktp');
    var Hp = $(this).data('hp');
    var Operator = $(this).data('operator');
    var Harga = $(this).data('harga');
    var Stok = $(this).data('stok');
    var Jumlah = $(this).data('jumlah');
    var Ruangan = $(this).data('ruangan');
    var Sementara = $(this).data('sementara');
    var Kembalian = $(this).data('kembalian');


    $(".detail #idpinjaman").val(Pinjaman);
    $(".detail #pinjaman").val(Nama);
    $(".detail #ktp").val(Ktp);
    $(".detail #hp").val(Hp);
    $(".detail #operator").val(Operator);
    $(".detail #harga").val(Harga);
    $(".detail #stok").val(Stok);
    $(".detail #jumlah").val(Jumlah);
    $(".detail #ruangan").val(Ruangan);
    $(".detail #sementara").val(Sementara);
    $(".detail #kembalian").val(Kembalian);
})
</script>


<div class="modal fade ubah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('barang_pinjaman/update_pembayaran'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" class="control" readonly>
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
                                <label for="jumlah_harga">Jumlah Harga</label>
                                <input type="text" class="form-control" id="jumlah_harga" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pembayaran">Pembayaran</label>
                                <input type="text" class="form-control" name="pembayaran" id="pembayaran"
                                    placeholder="Pembayaran" min="0" value="0">
                            </div>
                            <?= form_error('pembayaran', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="sisa_pembayaran">Sisa Pembayaran</label>
                                <input type="text" class="form-control" id="sisa_pembayaran"
                                    placeholder="Sisa Pembayaran" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Aktif</label>
                                <select id="aktif" name="aktif" class="form-control" readonly>
                                    <option value="0">Belum Aktif</option>
                                    <option value="1">Sudah Aktif</option>
                                </select>
                                <?= form_error('aktif', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
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
                            <a href="<?= base_url('admin/pinjaman'); ?>" class="btn btn-success"><i
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
$(document).on("click", "#modelkategori", function() {
    var Id = $(this).data('id');
    var Status = $(this).data('status');
    var Jumlah = $(this).data('jumlah');
    var Aktif = $(this).data('aktif');


    $(".ubah #id_pembayaran").val(Id);
    $(".ubah #status_pembayaran").val(Status);
    $(".ubah #jumlah_harga").val(Jumlah);
    $(".ubah #aktif").val(Aktif);
    $(".ubah #sisa_pembayaran").val(Bayar - Jumlah);
})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('barang_pinjaman/update_pembayaran'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href = "<?= base_url('barang_pinjaman'); ?>";
            }
        });
    }));
})
</script>
<script>
$(function() {
    $('body').on('keyup', '#pembayaran', function() {
        let harga_barang_pinjam = $('#jumlah_harga').val();
        let total_pinjam = $(this).val();

        $('#sisa_pembayaran').val(total_pinjam - harga_barang_pinjam);
        // $('#grand_total2').val(total - uang);
    });
});
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
            <form action="<?= base_url('barang_pinjaman/update_stok'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" align="center">
                                <label>Status</label>
                                <input type="text" class="form-control text-center" id="status_pembayaran"
                                    placeholder="Nama Barang" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status Kembalian</label>
                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" class="control" readonly>
                                <select id="status_kembalian" name="status_kembalian" class="form-control" readonly>
                                    <option value="Belum Dikembalikan">Belum Dikembalikan</option>
                                    <option value="Masih Ada">Masih Ada</option>
                                    <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                </select>
                                <?= form_error('status_pembayaran', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" class="control" readonly>
                                <label>Nama Barang</label>
                                <!-- <select name="namabarang" id="namabarangg" class="form-control" readonly>
                                        <option value="">Nama</option>
                                    </select> -->
                                <input type="text" id="namabarangg" class="form-control" readonly>
                                <input type="hidden" id="idbarang" name="idbarang" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jumlah_harga">Jumlah Pinjaman</label>
                                <input type="text" class="form-control" id="totalbarang" name="totalbarang" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pembayaran">Kembalian Barang/Stok</label>
                                <input type="number" class="form-control" name="jumlahkembalian"
                                    placeholder="Pembayaran" min="0" value="0">
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
                            <a href="<?= base_url('admin/pinjaman'); ?>" class="btn btn-success"><i
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
    var Nama = $(this).data('nama');
    var Status = $(this).data('status');
    var Kembalian = $(this).data('kembalian');
    var Barang = $(this).data('barang');
    var Sementara = $(this).data('sementara');
    var Total = $(this).data('total');


    $(".stok  #id_pembayaran").val(Id);
    $(".stok  #namabarangg").val(Nama);
    $(".stok  #totalbarang").val(Total);
    $(".stok  #status_kembalian").val(Kembalian);
    $(".stok  #status_pembayaran").val(Status);
    $(".stok  #idbarang").val(Barang);
    $(".stok  #jumlahkembalian").val(Sementara);

})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('barang_pinjaman/update_stok'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href =
                    "<?= base_url('barang_pinjaman'); ?>";
            }
        });
    }));
})
</script>