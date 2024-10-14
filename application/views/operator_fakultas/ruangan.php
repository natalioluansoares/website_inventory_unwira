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
                                            <th>Kode Ruangan</th>
                                            <th class="text-center">Nama Ruangan</th>
                                            <th class="text-center">Operator</th>
                                            <th class="text-center">Nama Operator</th>
                                            <th class="text-center"><a
                                                    href="<?= base_url('operator_fakultas/tambah_ruangan')?>"
                                                    class="btn btn-success btn-animation form-control"
                                                    data-target=".tambah" title="Tambah Data"><i
                                                        class="fa fa-user-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                    foreach ($ruangan as $rg) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $rg['kode_ruangan']; ?></td>
                                            <td class="text-center"><?= $rg['nama_ruangan']; ?></td>
                                            <td class="text-center"><?= $rg['nama_jurusan']; ?></td>
                                            <td class="text-center"><?= $rg['nama_lengkap']; ?></td>
                                            <td align="center">
                                                <a href="" class="btn btn-warning mb-2" title="Detail Operator"
                                                    data-toggle="modal" data-animation="bounce" data-target=".detail"
                                                    id="modaldetail" data-id="<?= $rg['id_ruangan']; ?>"
                                                    data-nama="<?= $rg['nama_lengkap']; ?>"
                                                    data-level="<?= $rg['nama_jurusan']; ?>"><i
                                                        class="ion-android-contacts"></i></a>

                                                <a href="<?= base_url('operator_fakultas/edit_ruangan/'.$rg['id_ruangan'])?>"
                                                    class="btn btn-info btn-animation mb-2" title="Ubah Data"><i
                                                        class="fa fa-edit"></i></a>

                                                <a href="<?= base_url('operator_fakultas/delete_ruangan/' . $rg['id_ruangan']); ?>"
                                                    class="btn btn-danger mb-2" title="Hapus Data" id="delete"><i
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