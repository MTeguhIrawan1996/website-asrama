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
            <h1>Laporan Fasilitas Rusak</h1>
            <div class="kiri" style="text-align:left;">
                <div>Banjarmasin,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Fasilitas Rusak</div>
            </div>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Fasilitas</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Penyedia</th>

                        <th>Kondisi</th>
                        <th>Tanggal Masuk</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($fasilitas as $f) : ?>
                        <tr>
                            <td align="center"><?= $i; ?></td>
                            <td align="center"><?= $f['kode_fasilitas']; ?></td>
                            <td align="center"><?= $f['nama']; ?></td>
                            <td align="center"><?= $f['lokasi']; ?></td>
                            <td align="center"><?= $f['penyedia']; ?></td>
                            <td align="center"><?= $f['kondisi']; ?></td>
                            <td align="center"><?= date('d-m-Y', strtotime($f['tgl_masuk'])) ?></td>
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