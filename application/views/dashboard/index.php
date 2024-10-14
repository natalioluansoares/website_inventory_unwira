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
        <?php if ($this->fungsi->user_login()->level == 'Admin') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_user()) ?></h5>
                                    <p class="mb-0" style="color: white">Operator</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_kategori()) ?></h5>
                                    <p class="mb-0" style="color: white">Kategori</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_barang()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_barang_rusak()) ?></h5>
                                    <p class="mb-0 " style="color: white">Barang Rusak</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_pinjaman()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_barang()) ?></h5>
                                    <p class="mb-0" style="color: white">Laporan</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id="container"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id="adminfakultas"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id="chart-wrap">
                            <figure class="highcharts-figure">
                                <div id="adminfakultasmatematika" class="mb-2"></div><br>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="chart-wrap">
                            <label id="patterns-enabled-label">
                                <input type="checkbox" id="patterns-enabled" checked>
                                Aktifkan pola warna
                            </label>

                            <figure class="highcharts-figure">
                                <div id="adminfakultasekonomi"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="adminfakultasteknik"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div id="adminfakultashukum"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div id="adminfakultassosial"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div id="adminfakultasfilsafat"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div id="adminfakultaskeguruan"></div>
                </div>
            </div>
        </div>
        <?php } ?>


        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Teknik') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/operator') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('operator_teknik/kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_barang_rusak()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Rusak</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Laporan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/ruangan') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_teknik/barang_masuk') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_teknik_barang_masuk()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultasteknik"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultasteknik"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->level == 'Operator_Jurusan') { ?>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_kategori_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_barang_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_barang_rusak_operator()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Rusak</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_pinjaman_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_masuk') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_barang_masuk_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('ruangan') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_ruangan_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang/detailbarang_masuk') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_pinjaman_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Laporan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="adminfakultasteknik"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Hukum') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator Hukum</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('operator_fakultas/kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_fakultas/barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_fakultas/barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum_barang_rusak()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Rusak</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_hukum_barang_masuk()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Masuk</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_hukum_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_hukum_pinjaman()) ?></h5>
                                    <p class="mb-0" style="color: white">Laporan</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultashukum"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultashukum"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Ekonomi Dan Bisnis') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/operator') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_barang_rusak()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Rusak</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Laporan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/ruangan') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('operator_ekonomi_bisnis/barang_masuk') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_ekonomi_bisnis_barang_masuk()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultasekonomi"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultasekonomi"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Filsafat') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_kategori_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_barang_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_barang_rusak_operator()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Rusak</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->count_pinjaman_operator()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->count_barang_masuk_operator()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Masuk</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Ilmu Sosial Dan Ilmu Politik') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator Sosial Dan IP</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial_barang_masuk()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_sosial_barang_rusak()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Rusak</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_sosial_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_sosial_pinjaman()) ?></h5>
                                    <p class="mb-0" style="color: white">Laporan</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultassosial"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultassosial"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Operator Matematika Dan Ilmu Pengetahuan Alam') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator MTK Dan PA</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika_barang_masuk()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_matematika_barang_rusak()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Rusak</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_matematika_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_matematika_pinjaman()) ?></h5>
                                    <p class="mb-0" style="color: white">Laporan</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultasmatematika"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultasmatematika"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->fungsi->user_login()->nama_jurusan == 'Keguruan Dan Ilmu Pendidikan') { ?>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('profil') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan()) ?></h5>
                                        <p class="mb-0" style="color: white">Operator Keguruan Dan IP</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-down"></i>
                                    <span>5.26%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-6 text-center align-self-center">
                                <a href="<?= base_url('kategori') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan_kategoti()) ?></h5>
                                        <p class="mb-0" style="color: white">Kategori</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-up"></i>
                                    <span>8.68%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan_barang()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-rocket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_rusak') ?>">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan_barang_masuk()) ?></h5>
                                        <p class="mb-0 " style="color: white">Barang Masuk</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-white"> <i class="mdi mdi-arrow-up"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan_pinjaman()) ?></h5>
                                        <p class="mb-0" style="color: white">Barang Pinjaman</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_keguruan_barang_rusak()) ?></h5>
                                    <p class="mb-0" style="color: white">Barang Rusak</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(50, 129, 233); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <a href="<?= base_url('barang_pinjaman') ?>">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner" style="color: white">
                                            <?= ($this->fungsi->operator_keguruan_ruangan()) ?></h5>
                                        <p class="mb-0" style="color: white">Ruangan</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body" style="background-color: rgb(239, 243, 26); color: white">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-basket"></i>
                                </div>
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0 round-inner" style="color: white">
                                        <?= ($this->fungsi->operator_keguruan_pinjaman()) ?></h5>
                                    <p class="mb-0" style="color: white">Laporan</p>
                                </div>
                            </div>
                            <div class="col-3 align-self-end align-self-center">
                                <h6 class="m-0 float-right text-center text-primary"> <i class="mdi mdi-arrow-down"></i>
                                    <span>2.35%</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="operatorfakultaskeguruan"></div><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body timbul" style="cursor:pointer">
                        <div id="fakultaskeguruan"></div><br><br>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- end page title end breadcrumb -->

    </div> <!-- end container -->
</div>
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<!-- end wrapper -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/funnel.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/modules/funnel.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
<script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<!-- <script src="https://code.highcharts.com/modules/cylinder.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/funnel3d.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/funnel3d.js"></script>
<script src="https://code.highcharts.com/modules/pyramid3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
// Set up the chart
Highcharts.chart('adminfakultas', {
    chart: {
        type: 'pyramid3d',
        options3d: {
            enabled: true,
            alpha: 10,
            depth: 50,
            viewDistance: 50
        }
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },
    subtitle: {
        text: 'Semua Data Fakultas'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                allowOverlap: true,
                x: 10,
                y: -5
            },
            width: '60%',
            height: '80%',
            center: ['50%', '45%']
        }
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator', <?= $this->fungsi->count_user(); ?>],
            ['Kategori', <?= $this->fungsi->count_kategori(); ?>],
            ['Barang', <?= $this->fungsi->count_barang(); ?>],
            // ['Stok', <?= $this->fungsi->sum_barang_teknik(); ?>],
            ['Barang Rusak', <?= $this->fungsi->count_barang_rusak(); ?>],
            ['Barang Masuk', <?= $this->fungsi->count_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->count_ruangan(); ?>],
            ['Pinjam', <?= $this->fungsi->count_pinjaman(); ?>]
        ]
    }]
});
</script>

<script>
Highcharts.chart('adminfakultasmatematika', {
    chart: {
        type: 'funnel3d',
        options3d: {
            enabled: true,
            alpha: 10,
            depth: 50,
            viewDistance: 50
        }
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },
    subtitle: {
        text: 'Fakultas Matematika Dan Ilmu Pengetahuan Alam'
    },
    accessibility: {
        screenReaderSection: {
            beforeChartFormat: '<{headingTagName}>{chartTitle}</{headingTagName}><div>{typeDescription}</div><div>{chartSubtitle}</div><div>{chartLongdesc}</div>'
        }
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                allowOverlap: true,
                y: 10
            },
            neckWidth: '30%',
            neckHeight: '25%',
            width: '80%',
            height: '80%'
        }
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator', <?= $this->fungsi->operator_matematika(); ?>],
            ['Kategori', <?= $this->fungsi->operator_matematika_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_matematika_barang(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_matematika_barang_rusak(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_matematika_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_matematika_ruangan(); ?>],
            ['Pinjam', <?= $this->fungsi->operator_matematika_pinjaman(); ?>]
        ]
    }]
});
</script>

<script>
var clrs = Highcharts.getOptions().colors;
var pieColors = [clrs[2], clrs[0], clrs[3], clrs[1], clrs[4]];

// Get a default pattern, but using the pieColors above.
// The i-argument refers to which default pattern to use
function getPattern(i) {
    return {
        pattern: Highcharts.merge(Highcharts.patterns[i], {
            color: pieColors[i]
        })
    };
}

// Get 5 patterns
var patterns = [0, 1, 2, 3, 4].map(getPattern);

var chart = Highcharts.chart('adminfakultasekonomi', {
    chart: {
        type: 'pie'
    },

    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },

    subtitle: {
        text: 'Fakultas Ekonomi Dan Bisnis'
    },

    colors: patterns,

    tooltip: {
        valueSuffix: '',
        borderColor: '#8ae'
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                connectorColor: '#777',
                format: '<b>{point.name}</b>: {point.y}'
            },
            point: {
                events: {
                    click: function() {
                        window.location.href = this.website;
                    }
                }
            },
            cursor: 'pointer',
            borderWidth: 3
        }
    },

    series: [{
        name: 'Penyakit Tubercolosis',
        data: [{
            name: 'Operator',
            y: <?= $this->fungsi->operator_ekonomi_bisnis(); ?>,
            website: 'https://www.nvaccess.org',
            accessibility: {
                description: 'This is the most used desktop screen reader'
            }
        }, {
            name: 'Kategori',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_kategoti(); ?>,
            website: 'https://www.freedomscientific.com/Products/Blindness/JAWS'
        }, {
            name: 'Barang',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_barang(); ?>,
            website: 'http://www.apple.com/accessibility/osx/voiceover'
        }, {
            name: 'Barang Masuk',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_barang_masuk(); ?>,
            website: 'http://www.zoomtext.com/products/zoomtext-magnifierreader'
        }, {
            name: 'Barang Rusak',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_barang_rusak(); ?>,
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php'
        }, {
            name: 'Barang Pinjam',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_pinjaman(); ?>,
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php'
        }, {
            name: 'Ruangan',
            y: <?= $this->fungsi->operator_ekonomi_bisnis_ruangan(); ?>,
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php'
        }]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            format: '<b>{point.name}</b>'
                        }
                    }
                }
            }
        }]
    }
});

// Toggle patterns enabled
document.getElementById('patterns-enabled').onclick = function() {
    chart.update({
        colors: this.checked ? patterns : pieColors
    });
};
</script>

<script>
// Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
Highcharts.chart('adminfakultasteknik', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },
    subtitle: {
        text: 'Fakultas Teknik'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator', <?= $this->fungsi->operator_teknik(); ?>],
            ['Kategori', <?= $this->fungsi->operator_teknik_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_teknik_barang(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_teknik_barang_rusak(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_teknik_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_teknik_ruangan(); ?>],
            ['Pinjam', <?= $this->fungsi->operator_teknik_pinjaman(); ?>]

        ]
    }]
});
</script>

<script>
Highcharts.chart('adminfakultashukum', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },
    subtitle: {
        text: 'Fakultas Hukum'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Hukum',
        colorByPoint: true,
        data: [{
            name: 'Operator',
            y: <?= $this->fungsi->operator_hukum(); ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Kategori',
            y: <?= $this->fungsi->operator_hukum_kategoti(); ?>,
        }, {
            name: 'Barang',
            y: <?= $this->fungsi->operator_hukum_barang(); ?>,
        }, {
            name: 'Barang Masuk',
            y: <?= $this->fungsi->operator_hukum_barang_masuk(); ?>,
        }, {
            name: 'Barang Pinjam',
            y: <?= $this->fungsi->operator_hukum_pinjaman(); ?>,
        }, {
            name: 'Barang Rusak',
            y: <?= $this->fungsi->operator_hukum_barang_rusak(); ?>,
        }, {
            name: 'Ruangan',
            y: <?= $this->fungsi->operator_hukum_ruangan(); ?>,
        }]
    }]
});
</script>

<script>
Highcharts.chart('adminfakultassosial', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'center'
    },
    subtitle: {
        text: '' +
            '<a href="https://www.counterpointresearch.com/global-smartphone-share/"' +
            'target="_blank">Fakultas Ilmu Sosial Dan Ilmu Politik</a>',
        align: 'center'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        format: '<b>{point.name}</b> ({point.y:,.0f})',
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Jumlah',
        data: [
            ['Operator', <?= $this->fungsi->operator_sosial(); ?>],
            ['Kategori', <?= $this->fungsi->operator_sosial_kategoti(); ?>],
            {
                name: 'Barang',
                y: <?= $this->fungsi->operator_sosial_barang(); ?>,
                sliced: true,
                selected: true
            },
            ['Barang Masuk', <?= $this->fungsi->operator_sosial_barang_masuk(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_sosial_pinjaman(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_sosial_barang_rusak(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_sosial_ruangan(); ?>]
        ]
    }]
});
</script>

<script>
Highcharts.chart('adminfakultasfilsafat', {
    chart: {
        type: 'funnel'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>'
    },
    subtitle: {
        text: 'Fakultas Filsafat'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['40%', '50%'],
            neckWidth: '30%',
            neckHeight: '25%',
            width: '80%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Unique users',
        data: [
            ['Operator', <?= $this->fungsi->operator_filsafat(); ?>],
            ['Kategori', <?= $this->fungsi->operator_filsafat_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_filsafat_barang(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_filsafat_barang_rusak(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_filsafat_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_filsafat_ruangan(); ?>],
            ['Pinjam', <?= $this->fungsi->operator_filsafat_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>

<script>
Highcharts.chart('adminfakultaskeguruan', {
    chart: {
        type: 'pie'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'center'
    },
    subtitle: {
        text: 'Fakultas Keguruan Dan Ilmu Pendidikan',
        align: 'center'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            borderRadius: 5,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Jumlah<br/>'
    },

    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
                name: 'Kategori',
                y: <?= $this->fungsi->operator_keguruan(); ?>,
                drilldown: 'Kategori'
            },
            {
                name: 'Barang Pinjam',
                y: <?= $this->fungsi->operator_keguruan_pinjaman(); ?>,
                drilldown: 'Barang Pinjam'
            },
            {
                name: 'Barang Rusak',
                y: <?= $this->fungsi->operator_keguruan_barang_rusak(); ?>,
                drilldown: 'Barang Rusak'
            },
            {
                name: 'Ruangan',
                y: <?= $this->fungsi->operator_keguruan_ruangan(); ?>,
                drilldown: 'Ruangan'
            },
            {
                name: 'Barang',
                y: <?= $this->fungsi->operator_keguruan_barang(); ?>,
                drilldown: 'Ruangan'
            },
            {
                name: 'Barang Masuk',
                y: <?= $this->fungsi->operator_keguruan_barang_masuk(); ?>,
                drilldown: 'Ruangan'
            },
            {
                name: 'Operator',
                y: <?= $this->fungsi->operator_keguruan(); ?>,
                drilldown: null
            }
        ]
    }],

});
</script>


<script>
Highcharts.chart('container', {
    title: {
        text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
        align: 'left'
    },
    xAxis: {
        categories: ['Barang F.Teknik', 'Barang F.Hukum', 'Barang F.Filsafat',
            'Barang F.IS Dan IP', 'Barang F.MTK Dan PA',
            'Barang F.Ekonomi', 'Barang F.Keguruan Dan IP'
        ]
    },
    yAxis: {
        title: {
            text: 'Stock Barang & Stock Barang Masuk'
        }
    },
    tooltip: {
        valueSuffix: ' Barang'
    },
    plotOptions: {
        series: {
            borderRadius: '25%'
        }
    },
    series: [{
        type: 'column',
        name: 'Stok Barang',
        data: [<?= $this->fungsi->sum_barang_teknik(); ?>,
            <?= $this->fungsi->sum_barang_hukum(); ?>,
            <?= $this->fungsi->sum_barang_filsafat(); ?>,
            <?= $this->fungsi->sum_barang_sosial_politik(); ?>,
            <?= $this->fungsi->sum_barang_matematika(); ?>,
            <?= $this->fungsi->sum_barang_ekonomi(); ?>,
            <?= $this->fungsi->sum_barang_keguruan(); ?>
        ]
    }, {
        type: 'column',
        name: 'Stock Barang Masuk',
        data: [<?= $this->fungsi->sum_barang_masuk_teknik(); ?>,
            <?= $this->fungsi->sum_barang_masuk_hukum(); ?>,
            <?= $this->fungsi->sum_barang_masuk_filsafat(); ?>,
            <?= $this->fungsi->sum_barang_masuk_sosial_politik(); ?>,
            <?= $this->fungsi->sum_barang_masuk_matematika(); ?>,
            <?= $this->fungsi->sum_barang_masuk_ekonomi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_keguruan(); ?>
        ]
    }, {
        type: 'spline',
        name: 'Jumlah S.Barang & S. Barang Masuk',
        data: [<?= $this->fungsi->sum_barang_teknik(); ?> +
            <?= $this->fungsi->sum_barang_masuk_teknik(); ?>,
            <?= $this->fungsi->sum_barang_hukum(); ?> +
            <?= $this->fungsi->sum_barang_masuk_hukum(); ?>,
            <?= $this->fungsi->sum_barang_filsafat(); ?> +
            <?= $this->fungsi->sum_barang_masuk_filsafat(); ?>,
            <?= $this->fungsi->sum_barang_sosial_politik(); ?> +
            <?= $this->fungsi->sum_barang_masuk_sosial_politik(); ?>,
            <?= $this->fungsi->sum_barang_matematika(); ?> +
            <?= $this->fungsi->sum_barang_masuk_matematika(); ?>,
            <?= $this->fungsi->sum_barang_ekonomi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_ekonomi(); ?>,
            <?= $this->fungsi->sum_barang_keguruan(); ?> +
            <?= $this->fungsi->sum_barang_masuk_keguruan(); ?>
        ],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }, {
        type: 'pie',
        name: 'Total',
        data: [{
                name: 'Stock Barang',
                y: <?= $this->fungsi->operator_sum_barang(); ?>,
                color: Highcharts.getOptions().colors[0], // 2020 color
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    format: '{point.total} S',
                    style: {
                        fontSize: '15px'
                    }
                }
            }, {
                name: 'Stock Barang Masuk',
                y: <?= $this->fungsi->operator_sum_barang_masuk(); ?>,
                color: Highcharts.getOptions().colors[1] // 2021 color
            },
            // {
            //     name: '2022',
            //     y: 647,
            //     color: Highcharts.getOptions().colors[2] // 2022 color
            // }

        ],
        center: [75, 65],
        size: 100,
        innerSize: '70%',
        showInLegend: false,
        dataLabels: {
            enabled: false

        }

    }]
});
</script>

<script>
Highcharts.chart('fakultasteknik', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Teknik',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Teknik Sipil',
        data: [<?= $this->fungsi->sum_barang_teknik_sipil(); ?>,
            <?= $this->fungsi->sum_barang_masuk_teknik_sipil(); ?>,
            <?= $this->fungsi->sum_barang_teknik_sipil(); ?> +
            <?= $this->fungsi->sum_barang_masuk_teknik_sipil(); ?>
        ]
    }, {
        name: 'Prodi Arsitek',
        data: [<?= $this->fungsi->sum_barang_arsitek(); ?>,
            <?= $this->fungsi->sum_barang_masuk_arsitek(); ?>,
            <?= $this->fungsi->sum_barang_arsitek(); ?> +
            <?= $this->fungsi->sum_barang_masuk_arsitek(); ?>
        ]
    }, {
        name: 'Prodi Ilmu Komputer',
        data: [<?= $this->fungsi->sum_barang_ilmu_komputer(); ?>,
            <?= $this->fungsi->sum_barang_masuk_ilmu_komputer(); ?>,
            <?= $this->fungsi->sum_barang_ilmu_komputer(); ?> +
            <?= $this->fungsi->sum_barang_masuk_ilmu_komputer(); ?>
        ]
    }]
});
</script>

<script>
Highcharts.chart('operatorfakultasteknik', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Teknik',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_teknik(); ?>],
            ['Kategori', <?= $this->fungsi->operator_teknik_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_teknik_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_teknik_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_teknik_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_teknik_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_teknik_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>

<script>
Highcharts.chart('fakultashukum', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Hukum',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Hukum',
        data: [<?= $this->fungsi->sum_barang_hukum(); ?>,
            <?= $this->fungsi->sum_barang_masuk_hukum(); ?>,
            <?= $this->fungsi->sum_barang_hukum(); ?> +
            <?= $this->fungsi->sum_barang_masuk_hukum(); ?>
        ]
    }]
});
</script>

<script>
Highcharts.chart('operatorfakultashukum', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Hukum',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_hukum(); ?>],
            ['Kategori', <?= $this->fungsi->operator_hukum_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_hukum_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_hukum_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_hukum_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_hukum_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_hukum_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>


<script>
Highcharts.chart('fakultasmatematika', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Matematika Dan Pengetahuan Alam',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Biologi',
        data: [<?= $this->fungsi->sum_barang_biologi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_biologi(); ?>,
            <?= $this->fungsi->sum_barang_biologi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_biologi(); ?>
        ]
    }, {
        name: 'Prodi Kimia',
        data: [<?= $this->fungsi->sum_barang_kimia(); ?>,
            <?= $this->fungsi->sum_barang_masuk_kimia(); ?>,
            <?= $this->fungsi->sum_barang_kimia(); ?> +
            <?= $this->fungsi->sum_barang_masuk_kimia(); ?>
        ]
    }]
});
</script>

<script>
Highcharts.chart('operatorfakultasmatematika', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Matematika Dan Pengetahuan Alam',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_matematika(); ?>],
            ['Kategori', <?= $this->fungsi->operator_matematika_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_matematika_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_matematika_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_matematika_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_matematika_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_matematika_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>

<script>
Highcharts.chart('fakultasekonomi', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Ekonomi Dan Bisnis',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Manajemen',
        data: [<?= $this->fungsi->sum_barang_manajemen(); ?>,
            <?= $this->fungsi->sum_barang_masuk_manajemen(); ?>,
            <?= $this->fungsi->sum_barang_manajemen(); ?> +
            <?= $this->fungsi->sum_barang_masuk_manajemen(); ?>
        ]
    }, {
        name: 'Prodi Akuntasi',
        data: [<?= $this->fungsi->sum_barang_akuntasi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_akuntasi(); ?>,
            <?= $this->fungsi->sum_barang_akuntasi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_akuntasi(); ?>
        ]
    }, {
        name: 'Prodi Ekonomi Pembangunan',
        data: [<?= $this->fungsi->sum_barang_ilmu_komputer(); ?>,
            <?= $this->fungsi->sum_barang_masuk_ilmu_komputer(); ?>,
            <?= $this->fungsi->sum_barang_ilmu_komputer(); ?> +
            <?= $this->fungsi->sum_barang_masuk_ilmu_komputer(); ?>
        ]
    }]
});
</script>

<script>
Highcharts.chart('operatorfakultasekonomi', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Ekonomi Dan Bisnis',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_ekonomi_bisnis(); ?>],
            ['Kategori', <?= $this->fungsi->operator_ekonomi_bisnis_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_ekonomi_bisnis_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_ekonomi_bisnis_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_ekonomi_bisnis_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_ekonomi_bisnis_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_ekonomi_bisnis_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>

<script>
Highcharts.chart('fakultassosial', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Ilmu Sosial Dan Ilmu Politik',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Ilmu Komunikasi',
        data: [<?= $this->fungsi->sum_barang_komunikasi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_komunikasi(); ?>,
            <?= $this->fungsi->sum_barang_komunikasi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_komunikasi(); ?>
        ]
    }, {
        name: 'Prodi Administrasi Negara',
        data: [<?= $this->fungsi->sum_barang_administrasi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_administrasi(); ?>,
            <?= $this->fungsi->sum_barang_administrasi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_administrasi(); ?>
        ]
    }, {
        name: 'Prodi Ilmu Pemerintahan',
        data: [<?= $this->fungsi->sum_barang_pemerintahan(); ?>,
            <?= $this->fungsi->sum_barang_masuk_pemerintahan(); ?>,
            <?= $this->fungsi->sum_barang_pemerintahan(); ?> +
            <?= $this->fungsi->sum_barang_masuk_pemerintahan(); ?>
        ]
    }]
});
</script>

<script>
Highcharts.chart('operatorfakultassosial', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Ilmu Sosial Dan Ilmu Politik',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_sosial(); ?>],
            ['Kategori', <?= $this->fungsi->operator_sosial_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_sosial_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_sosial_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_sosial_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_sosial_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_sosial_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>

<script>
Highcharts.chart('fakultaskeguruan', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
        align: 'left'
    },
    subtitle: {
        text: 'Fakultas Ilmu Sosial Dan Ilmu Politik',
        align: 'left'
    },
    xAxis: {
        categories: ['Stock Barang', 'Stock  Barang Masuk', 'Jumlah SB Dan SBM'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Stock Barang Dan Stock Barang Masuk',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: 'Jumlah'
    },
    plotOptions: {
        bar: {
            borderRadius: '120%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Prodi Bimbingan Dan Konseling',
        data: [<?= $this->fungsi->sum_barang_konseling(); ?>,
            <?= $this->fungsi->sum_barang_masuk_konseling(); ?>,
            <?= $this->fungsi->sum_barang_konseling(); ?> +
            <?= $this->fungsi->sum_barang_masuk_konseling(); ?>
        ]
    }, {
        name: 'Prodi Pendidikan Bahasa Inggris',
        data: [<?= $this->fungsi->sum_barang_inggris(); ?>,
            <?= $this->fungsi->sum_barang_masuk_inggris(); ?>,
            <?= $this->fungsi->sum_barang_inggris(); ?> +
            <?= $this->fungsi->sum_barang_masuk_inggris(); ?>
        ]
    }, {
        name: 'Prodi Pendidikan Biologi',
        data: [<?= $this->fungsi->sum_barang_pebiologi(); ?>,
            <?= $this->fungsi->sum_barang_masuk_pebiologi(); ?>,
            <?= $this->fungsi->sum_barang_pebiologi(); ?> +
            <?= $this->fungsi->sum_barang_masuk_pebiologi(); ?>
        ]
    }, {
        name: 'Prodi Pendidikan Fisika',
        data: [<?= $this->fungsi->sum_barang_pefisika(); ?>,
            <?= $this->fungsi->sum_barang_masuk_pefisika(); ?>,
            <?= $this->fungsi->sum_barang_pefisika(); ?> +
            <?= $this->fungsi->sum_barang_masuk_pefisika(); ?>
        ]
    }, {
        name: 'Prodi Pendidikan Kimia',
        data: [<?= $this->fungsi->sum_barang_pekimia(); ?>,
            <?= $this->fungsi->sum_barang_masuk_pekimia(); ?>,
            <?= $this->fungsi->sum_barang_pekimia(); ?> +
            <?= $this->fungsi->sum_barang_masuk_pekimia(); ?>
        ]
    }, {
        name: 'Prodi Sendratasik (Musik)',
        data: [<?= $this->fungsi->sum_barang_musik(); ?>,
            <?= $this->fungsi->sum_barang_masuk_musik(); ?>,
            <?= $this->fungsi->sum_barang_musik(); ?> +
            <?= $this->fungsi->sum_barang_masuk_musik(); ?>
        ]
    }, {
        name: 'Prodi Pendidikan Matematika',
        data: [<?= $this->fungsi->sum_barang_pematematika(); ?>,
            <?= $this->fungsi->sum_barang_masuk_pematematika(); ?>,
            <?= $this->fungsi->sum_barang_pematematika(); ?> +
            <?= $this->fungsi->sum_barang_masuk_pematematika(); ?>
        ]

    }]
});
</script>

<script>
Highcharts.chart('operatorfakultaskeguruan', {
    chart: {
        type: 'pyramid',
        align: 'center'
    },
    title: {
        text: '<?= ucfirst($this->fungsi->user_login()->nama_lengkap) ?>',
    },
    subtitle: {
        text: 'Fakultas Ilmu Sosial Dan Ilmu Politik',
        align: 'center'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                softConnector: true
            },
            center: ['50%', '50%'],
            width: '70%'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [
            ['Operator Teknik', <?= $this->fungsi->operator_keguruan(); ?>],
            ['Kategori', <?= $this->fungsi->operator_keguruan_kategoti(); ?>],
            ['Barang', <?= $this->fungsi->operator_keguruan_barang(); ?>],
            ['Barang Masuk', <?= $this->fungsi->operator_keguruan_barang_masuk(); ?>],
            ['Ruangan', <?= $this->fungsi->operator_keguruan_ruangan(); ?>],
            ['Barang Rusak', <?= $this->fungsi->operator_keguruan_barang_rusak(); ?>],
            ['Barang Pinjam', <?= $this->fungsi->operator_keguruan_pinjaman(); ?>]
        ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                plotOptions: {
                    series: {
                        dataLabels: {
                            inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                    }
                }
            }
        }]
    }
});
</script>