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
        <form action="<?= base_url('user/tambah_operator'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h2 class="text-center" style="font-family:Times New Roman"><strong><?= $title; ?></strong>
                            </h2>
                            <?php $this->view('error') ?>
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nama Depan" name="namadepan"
                                        value="<?= set_value('namadepan'); ?>">
                                </div>
                                <?= form_error('namadepan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nama Belakang"
                                        name="namabelakang" value="<?= set_value('namabelakang'); ?>">
                                </div>
                                <?= form_error('namabelakang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap"
                                        name="namalengkap" value="<?= set_value('namalengkap'); ?>">
                                </div>
                                <?= form_error('namalengkap', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="<?= set_value('email'); ?>">
                                </div>
                                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div>
                                    <input type="Password" class="form-control" placeholder="Password" name="password1"
                                        value="">
                                </div>
                                <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Conf Password</label>
                                <div>
                                    <input type="Password" class="form-control" placeholder=" Conf Password"
                                        name="password2" value="">
                                </div>
                                <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Fakultas</label>
                                <div>
                                    <select name="fakultas" id="fakultas" class="form-control">
                                        <option value="">Pilih Fakultas</option>
                                        <?php foreach ($fakultas as $key => $value) : ?>
                                        <option value="<?=$value['id_fakultas']?>"><?= $value['nama_fakultas'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('fakultas', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <div>
                                    <select name="jurusan" id="jurusan" class="form-control">
                                        <option value="">Pilih Jurusan</option>
                                    </select>
                                </div>
                                <?= form_error('jurusan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Operator Fakultas</label>
                                <div>
                                    <select name="level" class="form-control">

                                    </select>
                                </div>
                                <?= form_error('level', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="file" id="input-file-now" class="dropify" name="foto">
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
                                    <a href="<?= base_url('user'); ?>" class="btn btn-success"><i
                                            class="fa fa-mail-reply (alias)"></i>Kembali</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end page title end breadcrumb -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->