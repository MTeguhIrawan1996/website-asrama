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
            <h1>Laporan Kamar Tersedia</h1>
            <div class="kiri" style="text-align:left;">
                <div>Banjarmasin,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Kamar Tersedia</div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Status</th>
                        <th>Sisa Kapasitas/Orang</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($kamar as $k) : ?>
                        <tr>
                            <td align="center"><?= $i; ?></td>
                            <td align="center"><?= $k['no_kamar']; ?></td>
                            <td align="center">
                                <?php if ($k['kapasitas'] == 0) {
                                    echo 'Penuh';
                                } else {
                                    echo 'Tersedia';
                                } ?>
                            </td>
                            <td align="center"><?= $k['kapasitas']; ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
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