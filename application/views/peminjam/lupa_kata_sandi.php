<body>
    <div class="content">
        <div class="container">
            <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <img src="<?= base_url('assets_pinjaman/'); ?>images/register.svg" alt="Image"
                            class="img-fluid">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h3><strong><?= $title;?></strong></h3>
                                    <p class="mb-4">Lupa Kata Sandi</p>
                                </div>
                                <form action="<?= base_url('peminjam/lupa_kata_sandi'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group first">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            id="namalengkappeminjam" value="<?= set_value('nama_lengkap'); ?>">
                                    </div>
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-2">', '</small>'); ?>

                                    <input type="hidden" class="form-control" name="id_user_peminjam"
                                        id="iduserpeminjam">
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
                                    <div class="form-group">
                                        <h7>Foto KTP</h7><br>
                                        <input type="file" name="foto">
                                    </div>
                                    <button type="submit" class="btn text-white btn-block btn-primary"
                                        title="Registrasi">Kirim</button>

                                    <span class="d-block text-left my-4 text-muted"><a
                                            href="<?= base_url('peminjam'); ?>" title="Login">Login</a></span>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>