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
        <form action="<?= base_url('admin/tambah_pinjaman'); ?>" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="soares" data-flas="<?php echo $this->session->flashdata('error'); ?>"></div>
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fakultas</label>
                                <select name="fakultas" id="fakultas" class="form-control">
                                    <option value="">Pilih Fakultas</option>
                                    <?php foreach ($fakultas as $s) : ?>
                                    <option value="<?= $s['id_fakultas'] ?>"><?= $s['nama_fakultas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('fakultas', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-control">
                                    <option value="">Pilih Jurusan</option>
                                </select>
                                <?= form_error('jurusan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Operator</label>
                                <select name="user" id="operator" class="form-control">
                                    <option value="">Pilih Operator</option>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama Barang</label>
                                    <div class="input-group">
                                        <select name="namabarang" id="barang" class="form-control">
                                            <option value="">Pilih Barang</option>
                                        </select>
                                        <?= form_error('namabarang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Stock Barang</label>
                                        <select name="stok_barang" id="stok_barang" class="form-control" readonly>
                                            <option value="">Stok Barang</option>
                                        </select>
                                        <?= form_error('namabarang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Harga Barang Pinjam</label>
                                        <select id="harga_barang_pinjam" class="form-control" readonly>
                                            <option value="">Harga Barang Pinjam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Peminjam</label>
                                <select name="peminjam" class="form-control">
                                    <option value="">Pilih Peminjam</option>
                                    <?php foreach ($peminjam as $key => $value):?>
                                    <option value="<?= $value['id_user_peminjam'];?>">
                                        <?= $value['nama_lengkap_peminjam'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Pinjaman</label>
                                <div>
                                    <input type="text" id="totalpinjaman" class="form-control"
                                        placeholder="Total Pinjaman" name="totalpinjaman"
                                        value="<?= set_value('totalpinjaman'); ?>">
                                </div>
                                <?= form_error('totalpinjaman', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Durasi Pinjaman</label>
                                        <div>
                                            <input type="text" id="durasipinjaman" class="form-control"
                                                placeholder="Durasi Pinjaman" name="durasipinjaman"
                                                value="<?= set_value('durasipinjaman'); ?>">
                                        </div>
                                        <?= form_error('durasipinjaman', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jumlah Harga Pinjam</label>
                                        <div>
                                            <input type="number" class="form-control" id="bayaran" name="jumlahharga"
                                                placeholder="Harga Barang Pinjam"
                                                value="<?= set_value('jumlahharga'); ?>">
                                        </div>
                                        <?= form_error('jumlahharga', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div>
                                    <input type="text" class="form-control" id="jumlahhargapinjam"
                                        placeholder="Harga Barang Pinjam" name="jumlahhargapinjam"
                                        value="<?= set_value('jumlahhargapinjam'); ?>">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5"><i
                                            class="fa fa-refresh"></i>
                                        Cancel
                                    </button>
                                    <a href="<?= base_url('admin/pinjaman'); ?>" class="btn btn-success"><i
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
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script>
$(function() {
    $('body').on('keyup', '#totalpinjaman', function() {
        let harga_barang_pinjam = $('#harga_barang_pinjam').val();
        let durasi = $('#durasipinjaman').val();
        let total_pinjam = $(this).val();

        $('#bayaran').val(total_pinjam * harga_barang_pinjam * durasi);


    });
});
</script>
<script>
$(function() {
    $('body').on('keyup', '#durasipinjaman', function() {
        let harga = $('#harga_barang_pinjam').val();
        let total = $('#totalpinjaman').val();
        let pinjam = $(this).val();

        $('#bayaran').val(pinjam * harga * total);


    });
});
</script>