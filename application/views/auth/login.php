    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
            <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="#" class="logo logo-admin"><img src="<?= base_url('assets/'); ?>images/logo2.png"
                            height="80" alt="logo"></a>
                    <h4 style="font-family:Times New Roman" class="text-center">UNWIRA</h4>
                </h3>

                <div class="p-3">
                    <form class="" action="<?= base_url('auth/process'); ?>" method="POST">
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_lengkap">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" placeholder="Kata Sandi" name="kata_sandi">
                            </div>
                        </div>
                        <div class=" form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-warning btn-block waves-effect waves-light" type="submit"
                                    name="login">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>