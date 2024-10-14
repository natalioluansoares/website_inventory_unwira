<body>



    <div class="content">
        <div class="container">
            <div class="success" data-flash="<?php echo $this->session->flashdata('success'); ?>">
                <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>">
                    <div class="row">
                        <div class="col-md-6 order-md-2">
                            <img src="<?= base_url('assets_pinjaman/'); ?>images/undraw_file_sync_ot38.svg" alt="Image"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6 contents">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <h3><strong><?= $title; ?></strong></h3>
                                        <p class="mb-4">Login Inventory UNWIRA</p>
                                    </div>
                                    <form action="<?= base_url('peminjam/auth');?>" method="post">
                                        <div class="form-group first">
                                            <label for="nama_lengkap_peminjam">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap_peminjam">
                                            <?= form_error('nama_lengkap', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group last mb-4">
                                            <label for="kata_sandi">Kata Sandi</label>
                                            <input type="password" class="form-control" id="kata_sandi"
                                                name="kata_sandi">
                                            <?= form_error('kata_sandi', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="d-flex mb-5 align-items-center">
                                            <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                    me</span>
                                                <input type="checkbox" id="check" />
                                                <div class="control__indicator"></div>
                                            </label>
                                            <span class="ml-auto"><a href="<?= base_url('peminjam/lupa_kata_sandi'); ?>"
                                                    class="forgot-pass">Lupa Kata
                                                    Sandi</a></span>
                                        </div>

                                        <button type="submit" class="btn text-white btn-block btn-primary"
                                            title="Login">Login</button>

                                        <span class="d-block text-left my-4 text-muted"><a
                                                href="<?= base_url('peminjam/registrasi'); ?>"
                                                title="Registrasi">Registrasi</a></span>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <script>
            check.onclick = togglePassword;

            function togglePassword() {
                if (check.checked) kata_sandi.type = "text";
                else kata_sandi.type = "password";
            }
            </script>