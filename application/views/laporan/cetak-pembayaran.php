<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>table.css" media="all" />
</head>

<body>
    <header>
        <div style="text-align: center; font-weight: bold;">
            <img src="<?= base_url('assets/img/slider/kabupaten.png') ?>" style="height: 110px" ; width="auto">
        </div>
        <br>
        <div style="text-align:center;">
            <div>ASRAMA MAHASISWA</div>
            <div>PEMERINTAH KABUPATEN KAPUAS</div>
            <div>KALIMANTAN TENGAH</div>
            <div style="font-size: 10px;">Jalan S.Parman Gg Kalimantan II Banjarmasin Email:asramakapuas14@gmail.com</div>
        </div>
        <header class="clearfix">
            <h1>Lembar Bukti Pembayaran Asrama</h1>
        </header>
        <main>
            <div class="table3">
                <table style="width: 623px;">
                    <tbody>
                        <tr style="height: 25px;">
                            <td style="width: 171px; height: 25px;">Kode Pembayarn</td>
                            <td style="width: 17px; height: 25px;">:</td>
                            <td style="width: 434px; height: 25px;">&nbsp;<?= $pembayaran['kode_bayar']; ?></td>
                            <td style="width: 277px; height: 25px; text-align: right;">Banjarmasin,<?= date('d-m-Y'); ?> </td>
                        </tr>
                        <tr style="height: 25px;">
                            <td style="width: 171px; height: 25px;">Nama Penghuni</td>
                            <td style="width: 17px; height: 25px;">:</td>
                            <td style="width: 434px; height: 25px;">&nbsp;<?= $pembayaran['name_penghuni']; ?></td>
                            <td style="width: 277px; height: 25px;">&nbsp;</td>
                        </tr>
                        <tr style="height: 25px;">
                            <td style="width: 171px; height: 25px;">Email Penghuni</td>
                            <td style="width: 17px; height: 25px;">:</td>
                            <td style="width: 434px; height: 25px;">&nbsp;<?= $pembayaran['email_penghuni_kamar']; ?></td>
                            <td style="width: 277px; height: 25px;">&nbsp;</td>
                        </tr>
                        <tr style="height: 25px;">
                            <td style="width: 171px; height: 25px;">Tanggal Jatuh Tempo</td>
                            <td style="width: 17px; height: 25px;">:</td>
                            <td style="width: 434px; height: 25px;">&nbsp;<?= date('d-m-Y', strtotime($pembayaran['tgl_jth_tmp'])); ?></td>
                            <td style="width: 277px; height: 25px;">&nbsp;</td>
                        </tr>
                        <tr style="height: 25px;">
                            <td style="width: 171px; height: 25px;">Tanggal Bayar</td>
                            <td style="width: 17px; height: 25px;">:</td>
                            <td style="width: 434px; height: 25px;">&nbsp;<?= date('d-m-Y', strtotime($pembayaran['tgl_bayar'])); ?></td>
                            <td style="width: 277px; height: 25px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="table1">
                <table>
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>Denda</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?= $pembayaran['ket']; ?></td>
                            <td><?= 'Rp.' . number_format($pembayaran['denda']) . ',-'; ?></td>
                            <td><?= 'Rp.' . number_format($pembayaran['total']) . ',-'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <div style="text-align:Right; font-weight: bold;">
                <div>Mengetahui</div>
                <br>
                <br>
                <br>
                <br>
                <div><?= $user['name']; ?></div>
            </div>
</body>

</html>