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
                    Laporan Uang Kas Masuk Jurusan <?= $this->fungsi->user_login()->nama_jurusan?><br>
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
    <hr width="85%">
    <div class="row">
        <div class="col-lg-12">
            <table style="border: 1px solid black" align="center">
                <thead class="text-center">
                    <tr>
                        <th style="border: 1px solid black;">No</th>
                        <th style="border: 1px solid black;">Nama Operator</th>
                        <th style="border: 1px solid black;">Nama Jurusan</th>
                        <th style="border: 1px solid black;">Jumlah Uang Jurusan</th>
                        <th style="border: 1px solid black;">Tanggal Simpan</th>
                        <th style="border: 1px solid black;">Tanggal Ubah</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no=1;
                    $uang = 0;
                    foreach ($uang_kas_jurusan as $kt) : ?>
                    <tr>
                        <td style="border: 1px solid black;"><?= $no++; ?></td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['nama_lengkap']; ?></td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['nama_jurusan']; ?></td>
                        <td style="border: 1px solid black;" class="text-center">
                            <?= $kt['jumlah_uang_kas_fakultas_jurusan']; ?></td>
                        <td style="border: 1px solid black;" class="text-center">
                            <?= $kt['tanggal_simpan_fakultas_jurusan']; ?></td>
                        <td style="border: 1px solid black;" class="text-center">
                            <?= $kt['tanggal_ubah_fakultas_jurusan']; ?></td>
                    </tr>
                    <?php 
                        $uang +=$kt['jumlah_uang_kas_fakultas_jurusan'];
                    endforeach; ?>
                </tbody>
                <tbody>
                    <tr role="row" class="odd">
                        <td colspan="3" title="Total">
                            <h3><b>Jumlah Uang Kas Jurusan</b></h3>
                        </td>
                        <td title="<?= $uang; ?>" align="center">
                            <h3><b><?= $uang; ?></b></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html