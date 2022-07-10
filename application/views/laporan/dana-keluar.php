<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div style="text-align: center; font-weight: bold;">
            <img src="<?= base_url('assets/img/slider/kabupaten.png') ?>" style="height: 110px" ; width="auto">
        </div>
        <br>
        <div id="kop" class="clearfix">
            <div>ASRAMA MAHASISWA</div>
            <div>PEMERINTAH KABUPATEN KAPUAS</div>
            <div>KALIMANTAN TENGAH</div>
            <div style="font-size: 10px;">Jalan S.Parman Gg Kalimantan II Banjarmasin Email:asramakapuas14@gmail.com</div>
        </div>
        <header class="clearfix">
            <h1>Laporan Kas Keluar</h1>
            <div class="kiri" style="text-align:left;">
                <div>Banjarmasin,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Kas Keluar</div>
                <div>Periode
                    <?= date('d-m-Y', strtotime($tglawal)) ?> Sd <?= date('d-m-Y', strtotime($tglakhir)) ?>
                </div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Keterangan</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($dKeluar as $dk) : ?>
                        <tr>
                            <td align="center"><?= $i; ?></td>
                            <td align="center"><?= $dk['kode']; ?></td>
                            <td align="center"><?= $dk['keterangan']; ?></td>
                            <td align="center"><?= date('d-m-Y', strtotime($dk['tgl'])) ?></td>
                            <td align="center"><?= 'Rp.' . number_format($dk['keluar']) . ',-'; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="4" style="text-align:center;    font-size:20px">Total Kas Keluar</th>
                        <th style="text-align:right; font-size:17px"><?= 'Rp.' . number_format($total) . ',-'; ?></th>

                    </tr>
            </table>
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