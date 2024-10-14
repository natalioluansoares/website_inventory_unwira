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
        <form action="<?= base_url('uang_kas_jurusan/tambah_uang_kas_keluar'); ?>" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Operator</label>
                                <select name="user" id="uang_operator" class="form-control">
                                    <option value="">Pilih Nama Anda</option>
                                    <option value="<?=$this->fungsi->user_login()->id_user ?>">
                                        <?=$this->fungsi->user_login()->nama_lengkap ?></option>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Perbaiki</label>
                                        <select name="nama_perbaiki" id="perbaiki" class="form-control">
                                            <option value="">Nama Perbaiki</option>
                                            <?php foreach ($rusak as $key => $value) :?>
                                            <option value="<?= $value['id_rusak'];?>"><?= $value['nama_perbaiki'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('nama_perbaiki', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jumlah Uang Perbaiki</label>
                                        <select id="jumlahuangpembayaran" name="pembayaran" class="form-control">
                                            <option value="">Jumlah Uang Perbaiki</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Uang Kas Jurusan</label>
                                <select name="jumlah_uang_jurusan" class="form-control">
                                    <option value="">Pilih Uang Kas Jurusan</option>
                                    <option value="<?= $uang['id_uang_kas_fakultas_jurusan'] ?>">
                                        <?= $uang['jumlah_uang_kas_fakultas_jurusan'] ?></option>
                                </select>
                                <?= form_error('jumlah_uang_jurusan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Uang Kas Keluar</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Jumlah Uang Kas Masuk"
                                        name="jumlah_uang_kas_masuk" value="<?= set_value('jumlah_uang_kas_masuk'); ?>">
                                </div>
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
                                    <a href="<?= base_url('uang_kas_fakultas/uang_kas_keluar'); ?>"
                                        class="btn btn-success"><i class="fa fa-mail-reply (alias)"></i>Kembali</a>
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