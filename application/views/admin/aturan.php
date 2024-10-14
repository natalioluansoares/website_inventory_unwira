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
                        <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong>
                        </h2>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Aturan</th>
                                        <th class="text-center"><a href="" class="btn btn-primary form-control mb-2"
                                                title="Tambah Aturan" data-toggle="modal" data-animation="swing"
                                                data-target=".aturan"><i class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($aturan as $br) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $br['aturan']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-info mb-2" title="Ubah Aturan" data-toggle="modal"
                                                id="modalaturan" data-target=".rule" data-id="<?=$br['id_aturan'] ?>"
                                                data-aturan=" <?=$br['aturan'] ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('admin/delete_aturan/' . $br['id_aturan']); ?>"
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
</div>
<div class="modal fade aturan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_aturan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="aturan">Aturan</label>
                        <textarea class="form-control" name="aturan" id="aturan" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                        title="Click Untuk Kembali Tabel Menu"><i class="fa fa-refresh mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-success" title="Click Untuk Update Data Menu"><i
                            class="ion-ios7-personadd mr-2"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets/ckeditores/ckeditor4/ckeditor.js"></script>
<script>
CKEDITOR.replace('aturan');
</script>
<div class="modal fade rule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edit_aturan') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_aturan" id="id_aturan">
                    <div class="form-group">
                        <label for="aturan">Aturan</label>
                        <textarea class="form-control" name="aturan" id="rule" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                        title="Click Untuk Kembali Tabel Menu"><i class="fa fa-refresh mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-success" title="Click Untuk Update Data Menu"><i
                            class="ion-ios7-personadd mr-2"></i>Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets/ckeditores/ckeditor4/ckeditor.js"></script>
<script>
CKEDITOR.replace('rule');
</script>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modalaturan", function() {
    var Id = $(this).data('id');
    var Aturan = $(this).data('aturan');



    $(".rule #id_aturan").val(Id);
    $(".rule #rule").val(Aturan);
    CKEDITOR.instances['rule'].setData(rule);


})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('admin/update_pembayaran'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href = "<?= base_url('admin/pinjaman'); ?>";
            }
        });
    }));
})
</script>