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
                <div class="flash" data-flas="<?php echo $this->session->flashdata('success'); ?>"></div>
                <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
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
                                        <th>Status Uang Masuk</th>
                                        <th>Jumlah Uang Masuk</th>
                                        <th>Nama Operator</th>
                                        <th>Nama Fakultas</th>
                                        <th>Tanggal Simpan</th>
                                        <th class="text-center">
                                            <a href="<?=base_url('uang_kas_admin/tambah_uang_kas_masuk') ?>"
                                                class="btn btn-info btn-animation mb-2"><i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($uang_kas_masuk as $kt) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $kt['status_uang_unwira']; ?></td>
                                        <td class="text-center"><?= $kt['jumlah_uang_kas_unwira']; ?></td>
                                        <td class="text-center"><?= $kt['nama_lengkap']; ?></td>
                                        <td class="text-center"><?= $kt['nama_fakultas']; ?></td>
                                        <td class="text-center"><?= $kt['tanggal_simpan_unwira']; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url('uang_kas_admin/hapus_uang_kas_masuk/' . $kt['id_uang_kas_masuk_unwira']); ?>"
                                                class="btn btn-danger mb-2" id="delete"><i
                                                    class="fa fa-trash-o"></i></a>
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