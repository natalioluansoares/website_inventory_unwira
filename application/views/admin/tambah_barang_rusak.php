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
        <form action="<?= base_url('admin/tambah_barang_rusak'); ?>" method="POST">
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
                                <div class="col-lg-6">
                                    <label>Nama Barang</label>
                                    <div class="input-group">
                                        <select name="namabarang" id="barang" class="form-control">
                                            <option value="">Pilih Barang</option>
                                        </select>
                                        <?= form_error('namabarang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Stock Barang</label>
                                        <select name="stok_barang" id="stok_barang" class="form-control" readonly>
                                            <option value="">Pilih Stok</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Perbaiki</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Boleh Di Isi / Tidak Di Isi"
                                        name="harga_perbaiki" value="<?= set_value('harga_perbaiki'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang Rusak</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="Jumlah Barang Rusak"
                                        name="jumlahbarangrusak" value="<?= set_value('jumlahbarangrusak'); ?>">
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
                                    <a href="<?= base_url('admin/barang_rusak'); ?>" class="btn btn-success"><i
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
<div class="modal modal-info fade ubah" id="modal-item" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgba(31, 235, 12, 0.74); color: white">
                <h4 class="modal-title">Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="background-color: rgba(31, 235, 12, 0.74); color: white">
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead style="background: #3366cc;">
                            <tr role="row">
                                <th class="sorting">Nama Barang</th>
                                <th class="sorting text-center">Stock Barang</th>
                                <th class="sorting text-center">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><input type="text" id="nama" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            <!-- <td>
                                <button class="btn btn-xs btn-success" id="select" data-id="<?= $pro->product_id; ?>"
                                    data-barcode="<?= $pro->product_code; ?>" data-name="<?= $pro->product_name ?>"
                                    data-unit="<?= $pro->unitid ?>" data-stock="<?= $pro->number_product ?>"
                                    data-total="<?= $pro->product_price ?>" data-grand="<?= $pro->product_price ?>">
                                    <i class="fa fa-check"></i>Select
                                </button>
                            </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modelkategori", function() {
    // var Id = $(this).data('id');
    var Nama = $(this).data('nama');


    // $(".ubah #idkategori").val(Id);
    $(".ubah #nama").val(Nama);
})
</script>