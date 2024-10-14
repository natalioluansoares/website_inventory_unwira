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
                                            <th width="60%">Fakultas</th>
                                            <th class="text-center"><a href=""
                                                    class="btn btn-primary form-control btn-animation mb-2"
                                                    data-animation="zoomIn" data-toggle="modal" data-target=".tambah"
                                                    title="Tambah Data"><i class="fa fa-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                    foreach ($fakultas as $kt) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kt['nama_fakultas']; ?></td>
                                            <td align="center">

                                                <a href="" class="btn btn-info btn-animation mb-2"
                                                    data-animation="shake" data-toggle="modal" data-target=".ubah"
                                                    id="modelkategori" data-id="<?= $kt['id_fakultas']; ?>"
                                                    data-kategori="<?= $kt['nama_fakultas']; ?>"><i
                                                        class="fa fa-edit"></i></a>

                                                <a href="<?= base_url('admin/delete_fakultas/' . $kt['id_fakultas']); ?>"
                                                    class="btn btn-danger mb-2" id="delete"><i
                                                        class="ion-android-trash "></i></a>
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
    <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Fakultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tambah_fakultas'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="">Kategori</label>
                        <div class="input-group">
                            <input type="text" name="fakultas" id="" class="form-control" placeholder="Fakultas">
                            <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-info">
                                    <i class="fa fa-pencil-square-o"></i></span></div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                                title="Click Untuk Kembali Tabel Konsultasi"><i
                                    class="fa fa-refresh mr-2"></i>Kembali</button>
                            <button type="submit" class="btn btn-success" title="Click Untuk Input Data Konsultasi"><i
                                    class="fa fa-send (alias) mr-2"></i>Tambah</button>
                        </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade ubah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edit_fakultas'); ?>" method="POST">
                <div class="modal-body">
                    <label for="">Fakultas</label>
                    <div class="input-group">
                        <input type="hidden" name="idfakultas" id="idfakultas" placeholder="Fakultas"
                            class="form-control">
                        <input type="text" name="fakultas" id="kategori" placeholder="Fakultas" class="form-control">
                        <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-info">
                                <i class="fa fa-pencil-square-o"></i></span></div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                            title="Click Untuk Kembali Tabel Konsultasi"><i
                                class="fa fa-refresh mr-2"></i>Kembali</button>
                        <button type="submit" class="btn btn-success" title="Click Untuk Input Data Konsultasi"><i
                                class="fa fa-send (alias) mr-2"></i>Tambah</button>
                    </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modelkategori", function() {
    var Id = $(this).data('id');
    var Kategori = $(this).data('kategori');


    $(".ubah #idkategori").val(Id);
    $(".ubah #kategori").val(Kategori);
})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('kategori/edit'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href = "<?= base_url('kategori'); ?>";
            }
        });
    }));
})
</script>