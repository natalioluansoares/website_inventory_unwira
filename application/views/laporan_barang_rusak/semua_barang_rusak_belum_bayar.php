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
                    Laporan Inventory Barang Rusak <?= $this->fungsi->user_login()->nama_jurusan?><br>

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
                        <th style="border: 1px solid black;">Nama Barang</th>
                        <th style="border: 1px solid black;">Status Pembayaran</th>
                        <th style="border: 1px solid black;">Pembayaran</th>
                        <th style="border: 1px solid black;">Harga Perbaiki</th>
                        <th style="border: 1px solid black;">Jumlah Harga</th>
                        <th style="border: 1px solid black;">Jumlah Rusak</th>
                        <th style="border: 1px solid black;">Sisa Uang</th>
                        <th style="border: 1px solid black;">Jumlah Temporari</th>
                        <th style="border: 1px solid black;">Nama Perbaiki</th>
                        <th style="border: 1px solid black;">Tanggal Rusak</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no=1;
                    $pembayaran = 0;
                    $harga = 0;
                    $total = 0;
                    $sisa = 0;
                    $perbaiki = 0;
                    foreach ($barang_rusak as $br) : ?>
                    <tr>
                        <td style="border: 1px solid black;"><?= $no++; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_barang']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['status_pembayaran']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['pembayaran_barang_rusak']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['harga_perbaiki']; ?></td>
                        <td style="border: 1px solid black;"><?= ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']) ?>
                        </td>
                        <td style="border: 1px solid black;"><?= $br['jumlah_barang_rusak']; ?></td>
                        <td style="border: 1px solid black;">
                            <?= $br['pembayaran_barang_rusak'] - ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']); ?>
                        </td>
                        <td style="border: 1px solid black;"><?= $br['barang_rusak_temporari']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['nama_perbaiki']; ?></td>
                        <td style="border: 1px solid black;"><?= $br['created_tanggal']; ?></td>
                    </tr>
                    <?php 
                        $pembayaran +=$br['pembayaran_barang_rusak'];
                        $harga +=$br['harga_perbaiki'] *  $br['jumlah_barang_rusak'];
                        $perbaiki +=$br['harga_perbaiki'];
                        $total +=$br['jumlah_barang_rusak'];
                        $sisa +=$br['pembayaran_barang_rusak'] - ($br['harga_perbaiki'] * $br['jumlah_barang_rusak']);;
                    endforeach; ?>
                </tbody>
                <tbody>
                    <tr role="row" class="odd">
                        <td colspan="3" title="Total">
                            <h3><b>Jumlah Barang Rusak</b></h3>
                        </td>
                        <td title="<?= $pembayaran; ?>" align="center">
                            <h3><b><?= $pembayaran; ?></b></h3>
                        </td>
                        <td title="<?= $perbaiki; ?>" align="center">
                            <h3><b><?= $perbaiki; ?></b></h3>
                        </td>
                        <td title="<?= $harga; ?>" align="center">
                            <h3><b><?= $harga; ?></b></h3>
                        </td>
                        <td title="<?= $total; ?>" align="center">
                            <h3><b><?= $total; ?></b></h3>
                        </td>
                        <td title="<?= $sisa; ?>" align="center">
                            <h3><b><?= $sisa; ?></b></h3>
                        </td>
                        <td style="border: 1px solid black;" title="<?= $sisa+$pembayaran+$perbaiki+$harga+$total; ?>"
                            align="center">
                            <h2><b><?= $sisa+$pembayaran+$perbaiki+$harga;  ?></b></h2>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html