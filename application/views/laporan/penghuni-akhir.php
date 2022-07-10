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
            <h1>Laporan Data Penghuni Perkuliahan Akhir</h1>
            <div class="kiri" style="text-align:left;">
                <div>Banjarmasin,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Penghuni Perkuliahan Akhir</div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Semester</th>
                        <th>Tanggal Masuk</th>
                        <th>Masa Kontrak</th>
                    </tr>


                    <?php $i = 1; ?>
                    <?php foreach ($penghuni as $p) : ?>
                        <tr>
                            <td align="center"><?= $i; ?></td>
                            <td align="center"><?= $p['name']; ?></td>
                            <td align="center"><?= $p['email']; ?></td>
                            <td align="center"><?= $p['semester']; ?></td>
                            <td align="center"><?= date('d-m-Y', ($p['date_created'])) ?></td>
                            <td align="center"><?= date('d-m-Y', strtotime($p['masa_kontrak'])) ?></td>
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