<!DOCTYPE html>
<html>

<head>
    <title>Inventory Kampus</title>
    <style type="text/css">
    table {
        border-style: double;
        border-width: 3px;
        border-color: white;
    }

    table tr .text2 {
        text-align: right;
        /* text-align: left; */
        font-size: 13px;
    }

    table thead tr td.nato {
        /* text-align: right; */
        /* text-align: left; */
        font-size: 13px;
        /* display: right; */
        text-align: center;
    }

    table tr .text {
        text-align: center;
        font-size: 13px;
    }

    table tr td {
        font-size: 13px;
    }
    </style>
</head>

</head>

<body>
    <table width="100%">
        <thead>
            <tr>
                <th align="center">
                    <img src="assets/images/logo2.png" class="rounded-circle" width="90px">
                </th>
                <th data-priority="1">
                    <div align="center">
                        <font size="3" style="font-family:Wide Latin">
                            <b>Website Inventory UNWIRA</b><br>
                            <span style="font-family:Times New Roman">L.Jend. Ahmad Yani 50-52
                                Kupang - 85225, NTT - Indonesia<br>
                                Telp.(0380)833395- 831194</span>
                        </font><br>
                        Web:<span style="font-family:Times New Roman; color:#3366cc">
                            http//www.unwira.ac.id</span>
                        Email:<span style="font-family:Times New Roman; color:#3366cc">
                            riung.info@unwira.ac.id</span>
                    </div>
                    <hr class="line-title">
                </th>
                <th align="center">
                    <img src="assets/images/logo2.png" class="rounded-circle" width="90px">
                </th>
                <h4 align="center">
                    Laporan Inventory Kampus UNWIRA<br>
                </h4>
            </tr>
        </thead>
    </table>
    <table width="950">
        <thead>
            <tr style="font-family:Wide Latin; border: 1px solid black;">
                <td colspan="3" class="nato">
                    <?= $this->fungsi->user_login()->nama_lengkap?></td>
            </tr>
        </thead>
    </table>
    <hr width="100%">
    <div class="row">
        <div class="col-lg-12">
            <table style="border: 1px solid black" align="center">
                <thead class="text-center">
                    <tr>
                        <th style="border: 1px solid black;">No</th>
                        <th style="border: 1px solid black;">Kode Barang</th>
                        <th style="border: 1px solid black;">Nama Barang</th>
                        <th style="border: 1px solid black;">Ruangan</th>
                        <th style="border: 1px solid black;">Stock Barang</th>
                        <th style="border: 1px solid black;">Total Barang</th>
                        <th style="border: 1px solid black;">Jumlah Harga</th>
                        <th style="border: 1px solid black;">Nama Lengkap</th>
                        <th style="border: 1px solid black;">Operator</th>
                        <th style="border: 1px solid black;">Tanggal</th>
                        <th style="border: 1px solid black;">Gambar</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no=1;
                    $stock = 0;
                    $total = 0;
                    foreach ($masuk as $br) : ?>
                    <tr role="row" class="odd">
                        <td style="border: 1px solid black;"><?= $no++; ?></td>
                        <td style="border: 1px solid black;"><?= $br['kode_barang']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_barang']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_ruangan']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['stock_barang_masuk']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['total_barang_masuk']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['total_barang'] * $br['harga_barang']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_lengkap']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_jurusan']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['tanggal_barang_masuk']; ?></td>
                        <td style="border: 1px solid black;"><img src="assets/images/barang/<?= $br['gambar']; ?>"
                                style="width:80px ;" class="img-thumbnail rounded-circle"></td>

                    </tr>
                    <?php 
                        $stock +=$br['stock_barang_masuk'];
                        $total +=$br['total_barang_masuk'];
                    endforeach; ?>
                </tbody>
                <tbody>
                    <tr role="row" class="odd">
                        <td colspan="4" title="Total">
                            <h3><b>Jumlah Barang Masuk</b></h3>
                        </td>
                        <td title="<?= $stock; ?>" align="center">
                            <h3><b><?= $stock; ?></b></h3>
                        </td>
                        <td title="<?= $total; ?>" align="center">
                            <h3><b><?= $total; ?></b></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html