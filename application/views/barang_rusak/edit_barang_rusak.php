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
        <form action="<?= base_url('barang_rusak/prosesbarangrusak'); ?>" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php $this->view('error') ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="hidden" class="form-control" placeholder="Jumlah Barang Rusak"
                                            name="idrusak" value="<?= $barangrusak['id_rusak']; ?>">
                                        <select name="namabarang" id="barang_jurusan" class="form-control">
                                            <option value="<?= $barangrusak['id_barang']; ?>">
                                                <?= $barangrusak['nama_barang']; ?></option>
                                            <?php foreach ($barang as $br) : ?>
                                            <option value="<?= $br['id_barang']; ?>"><?= $br['nama_barang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('kodebarang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Stock Barang</label>
                                        <select name="stok_barang" id="stok_barang_jurusan" class="form-control"
                                            readonly>
                                            <option value="<?= $barangrusak['stok_barang']; ?>">
                                                <?= $barangrusak['stok_barang']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Perbaiki</label>
                                <div>
                                    <input type="text" class="form-control"
                                        value="<?= $barangrusak['nama_perbaiki']; ?>" placeholder="Nama Perbaiki"
                                        name="nama_perbaiki">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Perbaiki</label>
                                <div>
                                    <input type="number" class="form-control"
                                        value="<?= $barangrusak['harga_perbaiki']; ?>"
                                        placeholder="Boleh Di Isi / Tidak Di Isi" name="harga_perbaiki">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang Rusak</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Jumlah Barang Rusak"
                                        name="jumlahbarangrusak" value="1" min="1">
                                </div>
                                <?= form_error('jumlahbarangrusak', '<small class="text-danger pl-2">', '</small>'); ?>
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
                                    <a href="<?= base_url('barang_rusak'); ?>" class="btn btn-success"><i
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