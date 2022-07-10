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
            <h1>Laporan Pembayaran</h1>
            <div class="kiri" style="text-align:left;">
                <div>Banjarmasin,<?= date('d-m-Y'); ?> </div>
            </div>
            <div class="kanan" style="text-align:right;">
                <div>Data Pembayaran</div>
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
                        <th>Kode Pembayaran</th>
                        <th>Nama Penghuni</th>
                        <th>Tanggal Bayar</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Denda</th>
                        <th>Total</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($pembayaran as $p) : ?>
                        <tr>
                            <td align="center"><?= $i; ?></td>
                            <td align="center"><?= $p['kode_bayar']; ?></td>
                            <td align="center"><?= $p['name_penghuni']; ?></td>
                            <td align="center"><?= date('d-m-Y', strtotime($p['tgl_bayar'])) ?></td>
                            <td align="center"><?= $p['ket']; ?></td>
                            <td><?php if ($p['status'] == 0) {
                                    echo 'Belum Lunas';
                                } else {
                                    echo 'Lunas';
                                } ?></td>
                            <td align="center"><?= 'Rp.' . number_format($p['denda']) . ',-'; ?></td>
                            <td align="center"><?= 'Rp.' . number_format($p['total']) . ',-'; ?></td>
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