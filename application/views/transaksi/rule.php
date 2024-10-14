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
                                <a href="<?= base_url('transaksi/cart') ?>" class="nav-link icon fs-8"><i
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
            <section class="section">
                <div class="title">
                    <h1>Rules Transaksi</h1>
                </div>
                <div class="testimonial-center container">
                    <div class="row">
                        <?php foreach ($aturan as $key => $value): ?>
                        <div class="col-lg-6">
                            <div class="testimonial">
                                <span>&ldquo;</span>
                                <h4>
                                    <p><strong><i>Aturan</i></strong></p>
                                    <?= $value['aturan']; ?>
                                </h4>
                                <div class="img-cover">
                                    <img src="<?= base_url('assets_transaksi/');?>images/kampus.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </section>

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

        <!-- modal -->