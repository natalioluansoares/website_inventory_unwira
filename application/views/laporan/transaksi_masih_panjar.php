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
        text-align: left;
        font-size: 13px;
    }

    table thead tr td.nato {
        text-align: right;
        text-align: left;
        font-size: 13px;
        display: right;
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
                    Laporan Inventory Kampus UNWIRA Masih Panjar<br>
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
                        <th style="border: 1px solid black;">Barang</th>
                        <th style="border: 1px solid black;">Durasi</th>
                        <th style="border: 1px solid black;">Total</th>
                        <th style="border: 1px solid black;">Uang</th>
                        <th style="border: 1px solid black;">Bayar</th>
                        <th style="border: 1px solid black;">Sisa</th>
                        <th style="border: 1px solid black;">Status</th>
                        <th style="border: 1px solid black;">Ruangan</th>
                        <th style="border: 1px solid black;">Peminjam</th>
                        <th style="border: 1px solid black;">Operator</th>
                        <th style="border: 1px solid black;">Nama Operator</th>
                        <th style="border: 1px solid black;">Tanggal</th>
                        <!-- <th style="border: 1px solid black;">Gambar</th> -->
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no=1;
                    $jumlah = 0;
                    $total = 0;
                    $bayar = 0;
                    $sisa = 0;
                    foreach ($pinjaman as $br) : ?>
                    <tr role="row" class="odd">
                        <td style="border: 1px solid black;"><?= $no++; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_barang']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['durasi_pinjaman']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['total_barang_pinjaman']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['jumlah_harga_pinjam']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['bayar']; ?></td>
                        <td style="border: 1px solid black;"><?=$br['bayar'] - $br['jumlah_harga_pinjam']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['status']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_ruangan']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_pinjaman']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_jurusan']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_lengkap']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['tanggal_pinjaman']; ?></td>
                        <!-- <td style="border: 1px solid black;"><img src="assets/images/barang/<?= $br['gambar']; ?>"
                                style="width:30px ;" class="img-thumbnail rounded-circle"></td> -->

                    </tr>
                    <?php 
                        $jumlah +=$br['total_barang_pinjaman'];
                        $bayar +=$br['bayar'];
                        $total +=$br['jumlah_harga_pinjam'];
                        $sisa +=$br['bayar'] - $br['jumlah_harga_pinjam'];
                    endforeach; ?>
                </tbody>
                <tbody>
                    <tr role="row" class="odd">
                        <td colspan="3" title="Total">
                            <h3><b>Jumlah Uang</b></h3>
                        </td>
                        <td title="<?= $jumlah; ?>" align="center">
                            <h3><b><?= $jumlah; ?></b></h3>
                        </td>
                        <td title="<?= $total; ?>" align="center">
                            <h3><b><?= $total; ?></b></h3>
                        </td>
                        <td title="<?= $bayar; ?>" align="center">
                            <h3><b><?= $bayar; ?></b></h3>
                        </td>
                        <td title="<?= $sisa; ?>" align="center">
                            <h3><b><?= $sisa; ?></b></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html