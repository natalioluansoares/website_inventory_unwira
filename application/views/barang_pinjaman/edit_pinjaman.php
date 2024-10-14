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
        <form action="<?= base_url('barang_pinjaman/prosesbarangpinjaman'); ?>" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php $this->view('error') ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" placeholder="Nama Pinjaman"
                                        name="idpinjaman" value="<?= $pinjaman['id_pinjaman']; ?>">
                                    <div class="form-group">
                                        <label>Nama Barang</label>

                                        <select name="namabarang" id="barang_jurusan" class="form-control">
                                            <option value="<?= $pinjaman['id_barang']; ?>">
                                                <?= $pinjaman['nama_barang']; ?></option>

                                            <?php foreach ($barang as $key => $value):?>
                                            <option value="<?= $value['id_barang'];?>">
                                                <?= $value['nama_barang'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('namabarang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Stock Barang</label>
                                        <select name="stok_barang" id="stok_barang_jurusan" class="form-control"
                                            readonly>
                                            <option value="<?= $pinjaman['stok_barang']; ?>">
                                                <?= $pinjaman['stok_barang']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Harga Barang Pinjam</label>
                                        <select id="harga_barang_pinjam_jurusan" class="form-control" readonly>
                                            <option value="<?= $pinjaman['harga_barang_pinjam']; ?>">
                                                <?= $pinjaman['harga_barang_pinjam']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Peminjam</label>
                                <select name="peminjam" class="form-control">
                                    <!-- <option value="">Pilih Peminjam</option> -->
                                    <option value="<?= $pinjaman['id_user_peminjam']; ?>">
                                        <?= $pinjaman['nama_lengkap_peminjam']; ?></option>
                                    <?php foreach ($peminjam as $key => $value):?>
                                    <option value="<?= $value['id_user_peminjam'];?>">
                                        <?= $value['nama_lengkap_peminjam'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Total Pinjaman</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Total Pinjaman"
                                        name="totalpinjaman" id="totalpinjaman_jurusan" value="1" min="1">
                                </div>
                                <?= form_error('totalpinjaman', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Durasi Pinjaman</label>
                                        <div>
                                            <input type="number" id="durasipinjaman_jurusan" class="form-control"
                                                placeholder="Durasi Pinjaman" name="durasipinjaman"
                                                value="<?= $pinjaman['durasi_pinjaman']; ?>">
                                        </div>
                                        <?= form_error('durasipinjaman', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jumlah Harga Pinjam</label>
                                        <div>
                                            <input type="number" class="form-control" id="jumlahharga_jurusan"
                                                name="jumlahharga" placeholder="Harga Barang Pinjam"
                                                value="<?= $pinjaman['durasi_pinjaman'] * $pinjaman['harga_barang_pinjam']; ?>">
                                        </div>
                                        <?= form_error('jumlahharga', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
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
                                    <a href="<?= base_url('barang_pinjaman'); ?>" class="btn btn-success"><i
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
    $('body').on('keyup', '#totalpinjaman_jurusan', function() {
        let harga_barang_pinjam = $('#harga_barang_pinjam_jurusan').val();
        let durasi = $('#durasipinjaman_jurusan').val();
        let total_pinjam = $(this).val();

        $('#jumlahharga_jurusan').val(total_pinjam * harga_barang_pinjam * durasi);


    });
});
</script>
<script>
$(function() {
    $('body').on('keyup', '#durasipinjaman_jurusan', function() {
        let harga = $('#harga_barang_pinjam_jurusan').val();
        let total = $('#totalpinjaman_jurusan').val();
        let pinjam = $(this).val();

        $('#jumlahharga_jurusan').val(pinjam * harga * total);


    });
});
</script>