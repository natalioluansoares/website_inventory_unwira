<body>
    <!-- Header -->
    <div class="success" data-flash="<?php echo $this->session->flashdata('success'); ?>">
        <div class="soares fs-2" data-flas="<?php echo $this->session->flashdata('error'); ?>">
            <header id="home" class="header">
                <!-- Navigation -->
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

            <!-- Main -->
            <main>
                <!-- Testimonials -->
                <div class="container-md cart">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">KemBarang</th>
                            <th class="text-center">Pembayaran</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php
                        $harga=0;
                        $bayar=0;
                        $qty=0;
                        foreach ($pinjaman as $key => $value) :?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="<?= base_url() ?>assets/images/barang/<?= $value['gambar']; ?>" alt="">
                                    <div>

                                        <h4>Barang :<?= $value['nama_barang'] ?></h4>
                                        <h4>Quantity :<?= $value['total_barang_pinjaman'] ?></h4>
                                        <h4>Durasi :<?= $value['durasi_pinjaman'] ?></h4>
                                        <h4>Price: $<?= $value['harga_barang'] ?></h4>
                                        <h4>Tanggal :<?= $value['tanggal_pinjaman'] ?></h4>
                                        <h4>Jurusan :<?= $value['nama_jurusan'] ?></h4>
                                        <a
                                            href="<?= base_url('transaksi/hapus_barang/'.$value['id_pinjaman'])?>">remove</a>
                                        <a href="" class="text-info" data-bs-toggle="modal"
                                            data-pinjaman="<?= $value['id_pinjaman']; ?>"
                                            data-id="<?= $value['id_barang']; ?>"
                                            data-barang="<?= $value['nama_barang']; ?>"
                                            data-stok="<?= $value['stok_barang'] ?>"
                                            data-harga="<?= $value['harga_barang_pinjam']?>"
                                            data-operator="<?= $value['nama_lengkap'] ?>"
                                            data-jurusan="<?= $value['nama_jurusan'] ?>" data-total="1"
                                            data-durasi="<?= $value['durasi_pinjaman'] ?>"
                                            data-pinjam="<?= $value['durasi_pinjaman'] * $value['harga_barang_pinjam'] ?>"
                                            data-user="<?= $value['operator'] ?>" data-bs-target="#barang"
                                            id="modelbarang">Update</a>


                                        <a href="#" class="text-primary">Detail</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><?= $value['total_barang_sementara'] ?>
                            </td>
                            <td class="text-center">$<?= $value['bayar'] ?></td>
                            <td>$<?= $value['jumlah_harga_pinjam'] ?></td>
                        </tr>
                        <?php 
                            $harga += $value['jumlah_harga_pinjam'];
                            $bayar += $value['bayar'];
                            $qty += $value['total_barang_pinjaman'];
                        endforeach;?>
                    </table>

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Quantity</td>
                                <td><?= $qty; ?></td>
                            </tr>
                            <tr>
                                <td>Pembayaran</td>
                                <td>$<?= $bayar ?></td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>$<?=$harga; ?></td>
                            </tr>
                        </table>
                        <a href="<?= base_url('transaksi/laporan_transaksi')?>" class="checkout btn fs-5">Proceed To
                            Checkout</a>

                    </div>

                </div> <i class="bx bx-star"></i>


                <!-- Brands -->
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
            </main>

        </div>
    </div>

    <div class="modal fade" id="barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-3" id="exampleModalLabel">Tambah Data Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('transaksi/edit_transaksi'); ?>" method="post">
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

                                    <input type="hidden" class="form-control fs-4" id="pinjaman" name="pinjaman"
                                        class="form-control fs-4" placeholder="Total Barang Pinjam" readonly>

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
                                            <input type="text" class="form-control fs-4" id="harga"
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
                                            <input type="text" class="form-control fs-4" id="jumlah" name="jumlah"
                                                min="1" class="form-control fs-4" placeholder="Total Barang Pinjam">
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
                                            <input type="number" class="form-control fs-4" id="pembayaran"
                                                name="pembayaran" class="form-control fs-4"
                                                placeholder="Total Barang Pinjam">
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
        var Durasi = $(this).data('durasi');
        var Total = $(this).data('total');
        var Pinjam = $(this).data('pinjam');
        var Pinjaman = $(this).data('pinjaman');
        // var Ruangan = $(this).data('ruangan');
        // var Operator = $(this).data('operator');


        $("#barang #item").val(Id);
        $("#barang #barang").val(Barang);
        $("#barang #stok").val(Stok);
        $("#barang #harga").val(Harga);
        $("#barang #operator").val(Operator);
        $("#barang #jurusan").val(Jurusan);
        $("#barang #user").val(User);
        $("#barang #durasi").val(Durasi);
        $("#barang #jumlah").val(Total);
        $("#barang #pembayaran").val(Pinjam);
        $("#barang #pinjaman").val(Pinjaman);
        // $(".ubah #ruangan").val(Ruangan);
        // $(".ubah #user").val(Operator);
    })
    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('transaksi/edit_transaksi'); ?>',
                type: 'POST',
                data: new FormatData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function() {
                    document.location.href = "<?= base_url('transaksi'); ?>";
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