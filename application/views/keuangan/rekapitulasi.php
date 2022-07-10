<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Rekapitulasi Kas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kas as $k) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $k['kode']; ?></td>
                                        <td><?= $k['keterangan']; ?></td>
                                        <td><?= date('d F Y', strtotime($k['tgl'])); ?></td>
                                        <td align="right"><?= number_format($k['jumlah']) . ',-'; ?></td>
                                        <td align="right"><?= number_format($k['keluar']) . ',-'; ?></td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tr>
                                <th colspan="4" style="text-align:center;    font-size:20px">Total Kas Masuk</th>
                                <th colspan="2" style="text-align:center; font-size:17px"><?= 'Rp.' . number_format($jumlah) . ',-'; ?></th>

                            </tr>
                            <tr>
                                <th colspan="4" style="text-align:center;    font-size:20px">Total Kas Keluar</th>

                                <th colspan="2" style="text-align:center; font-size:17px"><?= 'Rp.' . number_format($jumlahk) . ',-'; ?></th>
                            </tr>
                            <tr>
                                <th colspan="4" style="text-align:center;    font-size:20px">Total Kas</th>
                                <th colspan="2" style="text-align:center; font-size:17px"><?= 'Rp.' . number_format($jumlah - $jumlahk) . ',-'; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->