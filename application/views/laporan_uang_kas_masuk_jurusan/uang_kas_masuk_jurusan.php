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
                    Laporan Uang Kas Jurusan <?= $this->fungsi->user_login()->nama_jurusan?><br>
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
                <thead class="table-primary">
                    <tr>
                        <th style="border: 1px solid black;">No</th>
                        <th style="border: 1px solid black;">Nama Donator</th>
                        <th style="border: 1px solid black;">Status Uang Masuk</th>
                        <th style="border: 1px solid black;">Total Uang Jurusan</th>
                        <th style="border: 1px solid black;">Jumlah Uang Masuk</th>
                        <th style="border: 1px solid black;">Nama Operator</th>
                        <th style="border: 1px solid black;">Nama Jurusan</th>
                        <th style="border: 1px solid black;">Tanggal Simpan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        $uang = 0;
                        $uang1 = 0;
                        foreach ($uang_kas_masuk as $kt) : ?>
                    <tr>
                        <td style="border: 1px solid black;"><?= $no++; ?></td>
                        <td style="border: 1px solid black;"><?= $kt['nama_donator']; ?><sup
                                class="text-danger">(<?= $kt['gelar_donator']; ?>)</sup>
                        </td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['status_uang_keluar_masuk']; ?>
                        </td>
                        <td style="border: 1px solid black;" class="text-center">
                            <?= $kt['jumlah_uang_kas_fakultas_jurusan']; ?></td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['uang_kas_masuk_keluar']; ?>
                        </td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['nama_lengkap']; ?></td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['nama_jurusan']; ?></td>
                        <td style="border: 1px solid black;" class="text-center"><?= $kt['tanggaL_simpan_uang_kas']; ?>
                        </td>
                    </tr>
                    <?php 
                        $uang +=$kt['jumlah_uang_kas_fakultas_jurusan'];
                        $uang1 +=$kt['uang_kas_masuk_keluar'];
                        endforeach; ?>
                </tbody>
                <tbody>
                    <tr role="row" class="odd" style="border: 1px solid black;">
                        <td colspan="3" title="Total">
                            <h3><b>Jumlah Uang Kas Masuk Jurusan</b></h3>
                        </td>
                        <td title="<?= $uang; ?>" style="border: 1px solid black;">
                            <h3><b><?= $uang; ?></b></h3>
                        </td>
                        <td title="<?= $uang1; ?>" style="border: 1px solid black;">
                            <h3><b><?= $uang1; ?></b></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html