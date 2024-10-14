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
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Nomor KTP</th>
                                        <th class="text-center">Nomor Whatsapp</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?= $lupa_kata_sandi['nama_lengkap_peminjam']; ?></td>
                                        <td><?= $lupa_kata_sandi['jenis_kelamin']; ?></td>
                                        <td><?= $lupa_kata_sandi['nomor_ktp']; ?></td>
                                        <td><?= $lupa_kata_sandi['nomor_whatsapp']; ?></td>
                                        <td align="center">
                                            <a href="" class="btn btn-info btn-animation mb-2" data-toggle="modal"
                                                data-animation="slideInUp" data-target=".user" id="kata_sandi"
                                                data-id="<?=$lupa_kata_sandi['id_user_peminjam'] ?>"
                                                data-nomor_ktp="<?= $lupa_kata_sandi['nomor_ktp']; ?>"><i
                                                    class=" fa fa-key"></i></a>

                                            <!-- <a href="" class="btn btn-success mb-2"></a> -->
                                            <a class="btn  btn-success mb-2" href="
                                                    https://web.whatsapp.com/send?phone='
                                                .<?= $lupa_kata_sandi['nomor_whatsapp']; ?>.'
                                                &text= %0a
                                                Assalamaualaikum..Kami dari admin sudah perbaiki kata sandi anda,*Semoga dapat beruntung* dengan data berikut,%0a
                                                Nama : <?= $lupa_kata_sandi['nama_lengkap_peminjam']; ?>, %0a
                                                Jenis Kelamin : <?= $lupa_kata_sandi['jenis_kelamin']; ?>, %0a
                                                Nomor KTP : <?= $lupa_kata_sandi['nomor_ktp']; ?>, %0a
                                                Kata Sandi Baru:<?= $lupa_kata_sandi['kata_sandi_kirim']; ?>, %0a
                                                Jika ada malasah bisa%0a 
                                                hubungi kami..%0a
                                                Tolong anda dapat membantu%0a
                                                kami untuk membagi%0a
                                                transaksi barang Ini %0a
                                                untuk sesama,%0a
                                                terimakasih" title="Kirim Ke Whatsapp" target="_blank">
                                                <i class=" fa fa-whatsapp"></i>
                                            </a>

                                            <a href="<?= base_url('admin/get_lupa_kata_sandi')?>"
                                                class="btn btn-primary mb-2" title="Kirim Ke Whatsapp"><i
                                                    class="ti-control-backward "></i></a>


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- end wrapper -->
<div class="modal fade user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgba(31, 235, 12, 0.74); color: white">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Kata Snadi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="tabledit-delete-button btn btn-sm btn-dark"><i
                            class="fa fa-close"></i></span>
                </button>
            </div>
            <form action="<?= base_url('admin/ganti_kata_sandi_baru'); ?>" method="POST"
                style="background-color: rgba(12, 190, 235, 0.74); color: white">
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id_kata_sandi" id="kata_sandi">
                                <input type="hidden" class="form-control" name="nomor_ktp" id="nomor_ktp">
                            </div>
                        </div>
                    </div>
                    <label for="passwordbaru" style="color: white;">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="passwordbaru" placeholder="Kata Sandi"
                            name="kata_sandi">
                        <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-success">
                                <i class="fa fa-pencil-square-o"></i></span></div>
                    </div><br>
                    <label for="confpassword" style="color: white;">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi"
                            name="konfirmasi_Kata_sandi">
                        <div class="input-group-append bg-custom b-0"><span class="input-group-text btn btn-info">
                                <i class="fa fa-pencil"></i></span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-danger" data-dismiss="modal"
                        title="Click Untuk Kembali Tabel Menu"><i class="fa fa-refresh mr-2"></i>Kembali</button>
                    <button type="submit" class="btn btn-success" title="Click Untuk Update Data Menu"><i
                            class="ion-ios7-personadd mr-2"></i>Ubah</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#kata_sandi", function() {
    var Id = $(this).data('id');
    var Nomor = $(this).data('nomor_ktp');
    $(".user #kata_sandi").val(Id);
    $(".user #nomor_ktp").val(Nomor);
})
</script>