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
        <div class="flash" data-flas="<?php echo $this->session->flashdata('success'); ?>">
            <div class="row">
                <div class="col-lg-7 center">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-2" style="font-family:Times New Roman">My Profile</h4>
                            <p class="text-muted m-b-30 font-14 mr-4" style="font-family:Times New Roman">
                                Data Ini Hanya Dapat Melihat Profile Anda Saja.</p>
                            <div class="row g-0">
                                <div class="col-md-4" align="center">
                                    <img src="<?= base_url('assets/images/user/') . ucfirst($this->fungsi->user_login()->foto) ?>"
                                        class="img-thumbnail rounded-circle">
                                    <p class="card-text"><small class="text-muted">
                                            Member Since :<?= date('d F Y', $user['created_akun']); ?></small></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">

                                        <p class="card-title"> Email :<?= ucfirst($this->fungsi->user_login()->email) ?>
                                        </p>
                                        <p class="card-text">Nama
                                            :<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?></p>
                                        <p class="card-text"> Alamat
                                            :<?= ucfirst($this->fungsi->user_login()->alamat) ?></p>

                                        <h6 class="card-title" style="font-family:Times New Roman">
                                            <p><strong>Misi</strong></p>
                                            <?= ucfirst($this->fungsi->user_login()->misi) ?>
                                        </h6>
                                        <h6 class="card-title" style="font-family:Times New Roman">
                                            <p><strong>Visi</strong></p>
                                            <?= ucfirst($this->fungsi->user_login()->visi) ?>
                                        </h6>
                                        <!-- <h6 class="card-title" style="font-family:Times New Roman">Semoga Hidup Kamu diberkati Oleh Tuhan, Jangan Terlalu sibuk untuk Hal Hal Yang Tidak Berguna</h6> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-5 center">
                    <div class="flash" data-flas1="<?php echo $this->session->flashdata('success'); ?>"></div>
                    <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-2" style="font-family:Times New Roman">
                                <?= ucfirst($this->fungsi->user_login()->nama_jurusan) ?></h4>
                            <p class="text-muted m-b-30 font-14" style="font-family:Times New Roman">
                                Data Ini Hanya Dapat Mengubah Username Anda Saja.</p>
                            <form action="<?= base_url('profil/picture'); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Email</h6>
                                    <div>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" name="id"
                                                value="<?= ucfirst($this->fungsi->user_login()->id_user) ?>">
                                            <input type="text" class="form-control text-center" placeholder="Email"
                                                readonly value="<?= ucfirst($this->fungsi->user_login()->email) ?>">
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-primary">
                                                    <i class="fa fa-user"></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Nama</h6>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" class="form-control text-center" placeholder="Username"
                                                name="username"
                                                value="<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>"
                                                readonly>
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-warning">
                                                    <i class="fa fa fa-user-circle-o"></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Alamat</h6>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-paper-plane "></i></span></div>
                                            <a href="" class="form-control btn-animation text-center"
                                                title="Click Untuk Ubah Alamat Anda" data-toggle="modal"
                                                data-animation="zoomInUp" data-target=".status" readonly
                                                style="font-family:Times New Roman"> Ubah Alamat Anda</a>
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-paper-plane "></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <?= form_error('alamat', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <?= form_error('status', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Password</h6>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                            <a href="" class="form-control btn-animation text-center"
                                                title="Click Untuk Ubah Password Anda" data-toggle="modal"
                                                data-animation="swing" data-target=".user" readonly
                                                style="font-family:Times New Roman">Ubah Password</a>
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <?= form_error('alamat', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <?= form_error('status', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Misi</h6>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                            <a href="" class="form-control btn-animation text-center"
                                                title="Click Untuk Ubah Password Anda" data-toggle="modal"
                                                data-animation="swing" data-target=".misi" readonly
                                                style="font-family:Times New Roman">Misi</a>
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <?= form_error('alamat', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <?= form_error('status', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Visi</h6>
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                            <a href="" class="form-control btn-animation text-center"
                                                title="Click Untuk Ubah Password Anda" data-toggle="modal"
                                                data-animation="swing" data-target=".visi" readonly
                                                style="font-family:Times New Roman">Visi</a>
                                            <div class="input-group-append bg-custom b-0"><span
                                                    class="input-group-text btn btn-dark">
                                                    <i class="fa fa-user-circle-o"></i></span></div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                <?= form_error('passwordbaru', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <?= form_error('confpassword', '<h6 class="text-danger pl-2"style="font-family:Times New Roman;">', '</h6>'); ?>
                                <div class="form-group">
                                    <h6 class="text-muted fw-400">Picture</h6>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="<?= base_url('assets/images/user/') . ucfirst($this->fungsi->user_login()->foto) ?>"
                                                    class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="foto">
                                                    <label for="image" class="custom-file-label mb-2">Choose
                                                        File</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="img-preview mb-2" style="margin-bottom:2px"></div>
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-success" title="Ubah User"><i
                                                    class="fa fa-save mr-2"></i>Ubah</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <form action="<?= base_url('profil/changepassword'); ?>" method="POST"
                style="background-color: rgba(12, 190, 235, 0.74); color: white">
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id"
                                    value="<?= ucfirst($this->fungsi->user_login()->id_user) ?>">
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade status" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgba(12, 153, 235, 0.74); color:white">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE ALAMAT ANDA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="tabledit-delete-button btn btn-sm btn-dark"><i
                            class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="<?= base_url('profil/alamatstatus'); ?>" method="POST"
                style="background-color: rgba(3, 79, 194, 0.685); color:white">
                <div class="modal-body">
                    <label for="alamat" style="color: white;">Alamat User</label>
                    <input type="hidden" class="form-control" name="id"
                        value="<?= ucfirst($this->fungsi->user_login()->id_user) ?>">
                    <div class="input-group">
                        <textarea name="alamat" id="" cols="30" rows="4"
                            class="form-control"><?= ucfirst($this->fungsi->user_login()->alamat) ?></textarea>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                        title="Click Untuk Kembali Tabel Menu"><i class="fa fa-refresh mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-success" title="Click Untuk Update Data Menu"><i
                            class="ion-ios7-personadd mr-2"></i>Ubah</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal-dialog -->

<div class="modal fade misi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Misi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('profil/misi') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="jurusan"
                            value="<?= ucfirst($this->fungsi->user_login()->jurusan) ?>">
                        <label for="misi">Misi</label>
                        <textarea class="form-control" name="misi" id="misi" cols="30"
                            rows="3"><?= ucfirst($this->fungsi->user_login()->misi) ?></textarea>
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
CKEDITOR.replace('misi');
</script>

<div class="modal fade visi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Visi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('profil/visi') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="jurusan"
                        value="<?= ucfirst($this->fungsi->user_login()->jurusan) ?>">
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea class="form-control" name="visi" id="visi" cols="30"
                            rows="3"><?= ucfirst($this->fungsi->user_login()->visi) ?></textarea>
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
CKEDITOR.replace('visi');
</script>