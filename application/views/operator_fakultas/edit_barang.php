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
        <form action="<?= base_url('operator_fakultas/prosesbarang'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php $this->view('error') ?>
                            <div class="form-group">
                                <label>Fakultas</label>
                                <select name="fakultas" id="hukumhukum" class="form-control">
                                    <option value="">Pilih Fakultas</option>
                                    <?php foreach ($fakultas as $s) : ?>
                                    <option value="<?= $s['id_fakultas'] ?>"><?= $s['nama_fakultas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select name="jurusan" id="hukum" class="form-control">
                                    <option value="">Pilih Jurusan</option>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Operator</label>
                                <select name="user" id="operatorhukum" class="form-control">
                                    <option value="<?= $barang['id_user']?>"><?= $barang['nama_lengkap']?></option>
                                </select>
                                <?= form_error('user', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" id="katehukum" class="form-control">
                                    <option value="<?= $barang['id_kategori'] ?>"><?= $barang['nama_kategori'] ?>
                                    </option>
                                </select>
                                <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="hidden" class="form-control" placeholder="Kode Barang" name="idbarang"
                                    value="<?= $barang['id_barang'] ?>">
                                <input type="text" class="form-control" placeholder="Kode Barang" name="kode_barang"
                                    value="<?= $barang['kode_barang'] ?>">
                                <?= form_error('kodebarang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Nama Barang" name="namabarang"
                                        value="<?= $barang['nama_barang'] ?>">
                                </div>
                                <?= form_error('namabarang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Harga Barang"
                                        name="harga_barang" value="<?= $barang['harga_barang'] ?>">
                                </div>
                                <?= form_error('harga_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang Pinjam</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Harga Barang Pinjam"
                                        name="harga_barang_pinjam" value="<?= $barang['harga_barang_pinjam'] ?>">
                                </div>
                                <?= form_error('harga_barang_pinjam', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <select name="ruangan" id="ruanganhukum" class="form-control">
                                    <option value="<?= $barang['ruangan'] ?>"><?= $barang['nama_ruangan'] ?>
                                    </option>
                                </select>
                                <?= form_error('ruangan', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="file" id="input-file-now" class="dropify" name="gambar">
                                <div class="col-sm-6">
                                    <img src="<?= base_url() ?>assets/images/barang/<?= $barang['gambar']; ?>"
                                        class="img-thumbnail" width="200px">
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
                                    <a href="<?= base_url('operator_fakultas/barang'); ?>" class="btn btn-success"><i
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