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
                            </h2><br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nomor Whatsapp</th>
                                            <th>Nomor KTP</th>
                                            <th>Aktif Akun</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                    foreach ($peminjam as $kt) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kt['nama_lengkap_peminjam']; ?></td>
                                            <td><?= $kt['jenis_kelamin']; ?></td>
                                            <td><?= $kt['nomor_whatsapp']; ?></td>
                                            <td><?= $kt['nomor_ktp']; ?></td>
                                            <td><?= $kt['aktif_akun']; ?></td>
                                            <td align="center">
                                                <a href="<?= base_url('admin/toggle_peminjam/') . $kt['id_user_peminjam'] ?>"
                                                    class="btn btn-circle
                                                    <?= $kt['aktif_akun'] ? 'btn-success' : 'btn-default' ?>"
                                                    title="<?= $kt['aktif_akun'] ?'Aktif' : 'Tidak Aktif' ?>"><i
                                                        class="fa fa-power-off"></i><?= $kt['aktif_akun'] ?'' : '' ?></a>

                                                <a href="<?= base_url('admin/delete_kategori/' . $kt['id_user_peminjam']); ?>"
                                                    class="btn btn-danger" title="Hapus Data" id="delete"><i
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