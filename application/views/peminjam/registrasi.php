<body>
    <div class="content">
        <div class="container">
            <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <img src="<?= base_url('assets_pinjaman/'); ?>images/bg.svg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h3><strong><?= $title;?></strong></h3>
                                    <p class="mb-4">Registrasi Inventory UNWIRA</p>
                                </div>
                                <form action="<?= base_url('peminjam/registrasi'); ?>" method="post">
                                    <div class="form-group first">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="" name="nama_lengkap"
                                            value="<?= set_value('nama_lengkap'); ?>">
                                    </div>
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-2">', '</small>'); ?>
                                    <div class=" form-group first">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                            value="<?= set_value('jenis_kelamin'); ?>">
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group first">
                                        <label for="nomor_ktp">Nomor KTP</label>
                                        <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp"
                                            value="<?= set_value('nomor_ktp'); ?>">
                                        <?= form_error('nomor_ktp', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group first">
                                        <label for="nomor_whatsapp">Nomor Whatsapp</label>
                                        <input type="text" class="form-control" id="nomor_whatsapp"
                                            name="nomor_whatsapp" value="<?= set_value('nomor_whatsapp'); ?>">
                                        <?= form_error('nomor_whatsapp', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="conf_password">Confirmasi Kata Sandi</label>
                                        <input type="password" class="form-control" id="conf_password"
                                            name="conf_password">
                                        <?= form_error('conf_password', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn text-white btn-block btn-primary"
                                        title="Registrasi">Registrasi</button>

                                    <span class="d-block text-left my-4 text-muted"><a
                                            href="<?= base_url('peminjam'); ?>" title="Login">Login</a></span>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>