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
                <div class="card m-b-30">
                    <div class="card-body">
                        <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong>
                        </h2>
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th width="20%">Nama Lengkap</th>
                                        <th width="15%">Nama Fakultas</th>
                                        <th width="15%">Nama Jurusan</th>
                                        <th>Operator</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center" style="width: 20%;"><a href="<?= base_url('user'); ?>"
                                                class="btn btn-warning form-control mb-2" title="Kembali"><i
                                                    class="fa fa-backward "></i></a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $u) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><a href="" class="btn-animation text-center"
                                                title="Click Untuk Ubah Password Anda" data-toggle="modal"
                                                data-animation="swing" data-target=".user"
                                                style="font-family:Times New Roman" id="modaluser"
                                                data-user="<?= $u['id_user']; ?>"><i
                                                    class="fa mdi mdi-key-variant  mr-1"></i><?= $u['nama_lengkap']; ?>
                                                <i class="fa mdi mdi-key-variant  mr-1"></i></a>
                                        </td>
                                        <td><?= $u['nama_fakultas']; ?></td>
                                        <td><?= $u['nama_jurusan']; ?></td>
                                        <td><?= $u['nama_jurusan']; ?></td>
                                        <td align="center"><img
                                                src="<?= base_url() ?>assets/images/user/<?= $u['foto']; ?>"
                                                style="width:80px ;" class="img-thumbnail rounded-circle"></td>
                                        <td align="center" style="width:300px;">
                                            <a href="" class="btn btn-info mb-2" title="Detail Operator"
                                                data-toggle="modal" data-animation="bounce" data-target=".detail"
                                                id="modaldetail" data-id="<?= $u['id_user']; ?>"
                                                data-nama="<?= $u['nama_lengkap']; ?>"
                                                data-level="<?= $u['nama_jurusan']; ?>"
                                                data-depan="<?= $u['nama_depan']; ?>"
                                                data-belakang="<?= $u['nama_belakang']; ?>"><i
                                                    class="ion-android-contacts"></i></a>

                                            <li class="list-inline-item dropdown notification-list">
                                                <a class="nav-link dropdown-toggle arrow-none waves-effect"
                                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                                    <?php 
                                                    $aktif_akun = 0;
                                                    foreach ($aktif as $key => $value):
                                                    ?>
                                                    <?php 
                                                
                                                    $aktif_akun +=$value['aktif_akun_inventori'];
                                                    endforeach;
                                                    ?>
                                                    <span class="badge badge-success noti-icon-badge"><?= $aktif_akun?>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg"
                                                    style="height: 300px; overflow-y: scroll; ">
                                                    <!-- item-->
                                                    <div class="dropdown-item noti-title">
                                                        <?php 
                                                    $aktif_akun = 0;
                                                    foreach ($aktif as $key => $value):
                                                    ?>
                                                        <?php 
                                                
                                                    $aktif_akun +=$value['aktif_akun_inventori'];
                                                    endforeach;
                                                    ?>
                                                        <h5>Akun Masih Aktif (<?= $aktif_akun ?>)</h5>
                                                    </div>

                                                    <!-- item-->
                                                    <?php 
                                                    foreach ($aktif as $key => $value):
                                                    ?>
                                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                        <div class="notify-icon">
                                                            <img src="<?= base_url() ?>assets/images/user/<?= $value['foto']; ?>"
                                                                style="width:80px ;"
                                                                class="img-thumbnail rounded-circle">
                                                        </div>
                                                        <p class="notify-details">
                                                            <b><?= $value['nama_lengkap'] ?></b><small
                                                                class="text-muted"><?= $value['nama_fakultas'] ?></small>
                                                        </p>
                                                    </a>
                                                    <?php endforeach;?>
                                                    <!-- All-->
                                                    <!-- <a href="javascript:void(1);" class="dropdown-item notify-item">
                                                        View All
                                                    </a> -->

                                                </div>
                                            </li>
                                            <a href="<?= base_url('user/toggle_operator_fakultas/') . $u['id_user'] ?>"
                                                class="btn btn-circle mb-2
                                                    <?= $u['aktif_akun_inventori'] ? 'btn-dark' : 'btn-default' ?>"
                                                title="<?= $u['aktif_akun_inventori'] ?'Aktif' : 'Tidak Aktif' ?>"><i
                                                    class="fa fa-power-off"></i><?= $u['aktif_akun_inventori'] ?'' : '' ?>
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
                            <th class="text-center"><strong>Nama Depan</strong></th>
                            <th class="text-center"><strong>Nama Belakang</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="depan" class="form-control text-center" readonly></td>
                            <td><input type="text" id="belakang" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
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
    var Depan = $(this).data('depan');
    var Belakang = $(this).data('belakang');


    $(".detail #idoperator").val(Id);
    $(".detail #user").val(Nama);
    $(".detail #operator").val(Level);
    $(".detail #depan").val(Depan);
    $(".detail #belakang").val(Belakang);
})
</script>

<div class="modal fade user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgba(31, 235, 12, 0.74); color: white">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE PASSWORD USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="tabledit-delete-button btn btn-sm btn-dark"><i
                            class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="<?= base_url('user/changepassword'); ?>" method="POST"
                style="background-color: rgba(12, 190, 235, 0.74); color: white">
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id" id="iduser">
                            </div><!-- input-group -->
                        </div>
                    </div>
                    <label for="passwordbaru" style="color: white;">Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="passwordbaru" placeholder="Password Baru"
                            name="passwordbaru">
                        <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-success">
                                <i class="fa fa-pencil-square-o"></i></span></div>
                    </div><br>
                    <label for="confpassword" style="color: white;">Confirmasi Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confpassword" placeholder="Confirmasi Password"
                            name="confpassword">
                        <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-info">
                                <i class="fa fa-pencil"></i></span></div>
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
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modaluser", function() {
    var User = $(this).data('user');
    $(".user #iduser").val(User);
})
</script>