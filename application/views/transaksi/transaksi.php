<header id="home" class="header">
    <!-- Navigation -->
    <div class="soares fs-2" data-flas="<?php echo $this->session->flashdata('error'); ?>">
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <h1>UNWIRA</h1>
                </div>

                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>UNWIRA</h1>
                        </div>
                        <div class="close">
                            <i class="bx bx-x"></i>
                        </div>
                    </div>

                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi') ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/transaksi') ?>" class="nav-link">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/rule') ?>" class="nav-link">Rule</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/about') ?>" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('peminjam/logout') ?>" class="nav-link">Keluar</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/cart') ?>" class="nav-link icon"><i
                                    class="bx bx-shopping-bag"></i></a>
                        </li>
                    </ul>
                </div>

                <a href="<?= base_url('transaksi/cart') ?>" class="cart-icon fs-8"><i
                        class="bx bx-shopping-bag"></i></a>

                <div class="hamburger">
                    <i class="bx bx-menu"></i>
                </div>
            </div>
        </nav>

        <!-- Hero -->
        <img src="<?= base_url('assets_transaksi/');?>images/rumah.jpg" alt="" class="hero-img" />

        <div class="hero-content">
            <h1>
                <span>UNIVERSITAS KATOLIK WIDYA</span>
                <span>MANDIRA KUPANG</span>
                <span>(UNWIRA)</span>
            </h1>
            <h2><span class="discount"></span>INVENTORY</h2>
        </div>
</header>
<section class="section all-products" id="products">
    <div class="top container">
        <h1><b>TRANSAKSI</b></h1>
    </div>
    <div class="product-center container">
        <?php foreach ($transaksi as $key => $value): ?>
        <div class="product">
            <div class="product-header">
                <img src="<?= base_url() ?>assets/images/barang/<?= $value['gambar']; ?>" alt="">
                <ul class="icons">
                    <a href="" data-bs-toggle="modal" data-id="<?= $value['id_barang']; ?>"
                        data-barang="<?= $value['nama_barang']; ?>" data-stok="<?= $value['stok_barang'] ?>"
                        data-harga="<?= $value['harga_barang_pinjam']?>" data-operator="<?= $value['nama_lengkap'] ?>"
                        data-jurusan="<?= $value['nama_jurusan'] ?>" data-user="<?= $value['operator'] ?>"
                        data-bs-target="#barang" id="modelbarang"><span><i class="bx bx-shopping-bag"></i></span></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#search"><span><i
                                class="bx bx-search"></i></span></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#jurusan"><span><i class="fas fa-search-plus"
                                aria-hidden="true"></i></span></a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#kembali"><span><i class="fas fa-undo"
                                aria-hidden="true"></i></span></a>
                </ul>
            </div>
            <div class="product-footer">
                <a href="#">
                    <h4><?= $value['nama_barang'] ?></h4>
                    <h4><?= $value['nama_jurusan'] ?></h4>
                </a>
                <div class="rating">
                    <a href="#">
                        <h4>Stock:<?= $value['stok_barang'] ?></h4>
                    </a>
                </div>
                <h7 class="price">$<?= $value['harga_barang'] ?></h7>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="section">
    <div class="brands-center container">
        <div class="brand">
            <a href="https://www.grab.com/id/en/driver/drive/">
                <img src="<?= base_url('assets_transaksi/');?>images/grappng.png" alt="" />
            </a>
        </div>
        <div class="brand">
            <a
                href="https://www.google.com/maps/place/Universitas+Katolik+Widya+Mandira/@-10.1599969,123.5840472,17z/data=!4m6!3m5!1s0x2c569af56996b081:0x9f17620810aac9eb!8m2!3d-10.1600022!4d123.5866221!16s%2Fg%2F1216lm6s?entry=ttu">
                <img src="<?= base_url('assets_transaksi/');?>images/maps.png" alt="" />
            </a>
        </div>
        <div class="brand">
            <a href="https://id.taximaxim.com/id/driver/">
                <img src="<?= base_url('assets_transaksi/');?>images/maksim.png" alt="">
            </a>
        </div>
        <div class="brand">
            <a href="https://www.youtube.com/@universitaskatolikwidyaman4919">
                <img src="<?= base_url('assets_transaksi/');?>images/yout.jpg" alt="" />
            </a>
        </div>
        <div class="brand">
            <a href="https://instagram.com/unwira151001?igshid=NTc4MTIwNjQ2YQ==">
                <img src="<?= base_url('assets_transaksi/');?>images/ing.jpg" alt="" />
            </a>
        </div>
        <div class="brand">
            <a href="https://facebook.com/groups/1676878579202705/">
                <img src="<?= base_url('assets_transaksi/');?>images/fb.png" alt="" />
            </a>
        </div>
    </div>
</section>

<!-- <section class="pagination">
    <div class=" container">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span><i class='bx bx-right-arrow-alt'></i></span>
    </div>
</section> -->
<!-- </div>
</div> -->
<div class="modal fade" id="jurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="exampleModalLabel">Cari Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transaksi/transaksi_jurusan'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <select name="cari" id="" class="form-control fs-4">
                                    <option value="">Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $key => $value):?>
                                    <option value="<?= $value['id_jurusan'];?>"><?= $value['nama_jurusan'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Search" class="btn fs-5" name="buka">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="kembali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="exampleModalLabel">Kembali</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transaksi/transaksi'); ?>" method="post">
                <div class="modal-body">
                    <table>
                        <thead>
                            <th>
                                <img src="<?= base_url('assets_transaksi/');?>images/kampus.png" alt="" class="center">
                            </th>
                            <th>
                                <img src="<?= base_url('assets_transaksi/');?>images/kampus.png" alt="" class="center">
                            </th>
                        </thead>
                    </table>
                    <div>
                        <input type="hidden" class="form-control fs-4" name="search" class="form-control fs-4"
                            placeholder="Search">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Kembali" class="btn fs-5" name="input">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="exampleModalLabel">Cari Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transaksi/transaksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <input type="text" class="form-control fs-4" name="search" class="form-control fs-4"
                                    placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Search" class="btn fs-5" name="input">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="exampleModalLabel">Tambah Data Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transaksi/tambah_transaksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" class="form-control fs-4" id="item" class="form-control fs-4"
                            placeholder="Total Barang Pinjam" name="barang">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                                <input type="text" class="form-control fs-4" id="jurusan" class="form-control fs-4"
                                    placeholder="Total Barang Pinjam" readonly>

                                <input type="hidden" class="form-control fs-4" id="user" name="user"
                                    class="form-control fs-4" placeholder="Total Barang Pinjam" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                            Operator</label>
                                        <input type="text" class="form-control fs-4" id="operator"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                            Barang</label>
                                        <input type="text" class="form-control fs-4" id="barang"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Stok
                                            Barang</label>
                                        <input type="text" class="form-control fs-4" id="stok" name="stok"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Harga
                                            Barang
                                            Pinjam</label>
                                        <input type="number" class="form-control fs-4" id="harga"
                                            class="form-control fs-4" placeholder="Harga Barang Pinjam" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jumlah
                                            Barang
                                            Pinjam</label>
                                        <input type="number" class="form-control fs-4" id="jumlah" name="jumlah" min="0"
                                            value="0" class="form-control fs-4" placeholder="Total Barang Pinjam">

                                        <input type="hidden" class="form-control fs-4" id="jumlahharga"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Durasi
                                            Pinjaman</label>
                                        <input type="number" class="form-control fs-4" id="durasi" name="durasi"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jumlah Uang
                                            Pembayaran</label>
                                        <input type="number" class="form-control fs-4" id="pembayaran" name="pembayaran"
                                            class="form-control fs-4" placeholder="Total Barang Pinjam">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fs-5">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets_transaksi/');?>js/jquery-3.7.0.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#modelbarang", function() {
    var Id = $(this).data('id');
    var Barang = $(this).data('barang');
    var Stok = $(this).data('stok');
    var Harga = $(this).data('harga');
    var Operator = $(this).data('operator');
    var Jurusan = $(this).data('jurusan');
    var User = $(this).data('user');
    // var Ruangan = $(this).data('ruangan');
    // var Operator = $(this).data('operator');


    $("#barang #item").val(Id);
    $("#barang #barang").val(Barang);
    $("#barang #stok").val(Stok);
    $("#barang #harga").val(Harga);
    $("#barang #operator").val(Operator);
    $("#barang #jurusan").val(Jurusan);
    $("#barang #user").val(User);
    // $(".ubah #ruangan").val(Ruangan);
    // $(".ubah #user").val(Operator);
})
$(document).ready(function(e) {
    $("#form").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('ruangan/edit_ruangan'); ?>',
            type: 'POST',
            data: new FormatData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function() {
                document.location.href = "<?= base_url('ruangan'); ?>";
            }
        });
    }));
})
</script>


<script>
$(function() {
    $('body').on('keyup', '#jumlah', function() {
        let harga_barang_pinjam = $('#harga').val();
        let durasi_pinjaman = $('#durasi').val();
        let total_pinjam = $(this).val();

        // $('#jumlahharga').val(total_pinjam * harga_barang_pinjam);
        // $('#durasi').val(0);
        $('#pembayaran').val(total_pinjam * harga_barang_pinjam * durasi_pinjaman);
    });
});
</script>

<script>
$(function() {
    $('body').on('keyup', '#durasi', function() {
        let harga = $('#harga').val();
        let jumlah = $('#jumlah').val();
        let jumlah_barang = $(this).val();

        $('#pembayaran').val(jumlah_barang * jumlah * harga);
        // $('#grand_total2').val(total - uang);
    });
});
</script>