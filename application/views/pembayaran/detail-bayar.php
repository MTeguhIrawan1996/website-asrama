<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('pembayaran/lunas'); ?>
            <input type="hidden" class="form-control" name="kode_bayar" id="kode_bayar" value="<?= $detailbiaya['kode_bayar']; ?>">
            <input type="hidden" class="form-control" name="kode_masuk" id="kode_masuk" value="<?= $kode ?>">
            <input type="hidden" class="form-control" name="ket" id="ket" value="<?= $detailbiaya['ket']; ?>">
            <input type="hidden" class="form-control" name="ket" id="ket" value="<?= $detailbiaya['ket']; ?>">
            <input type="hidden" class="form-control" name="jmlh" id="jmlh" value="<?= $total; ?>">
            <table cellspacing="0" width="70%">
                <tr>
                    <td width="25%">
                        <h5><b> Kode Pembayaran</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?= $detailbiaya['kode_bayar']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Nama Penghuni</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?= $detailbiaya['name_penghuni']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b>Email Penghuni</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?= $detailbiaya['email_penghuni_kamar']; ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <h5><b> Tanggal Jatuh Tempo</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?= date('d F Y', strtotime($detailbiaya['tgl_jth_tmp'])); ?>
                            </b>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <h5><b> Tanggal Bayar</b> </h5>
                    </td>
                    <td>
                        <h5><b>:</b></h5>
                    </td>
                    <td>
                        <h5>
                            <b>
                                <?= date('d F Y', strtotime($detailbiaya['tgl_bayar'])); ?>
                            </b>
                        </h5>
                    </td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Denda</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $detailbiaya['kode_bayar']; ?></td>
                            <td><?= $detailbiaya['ket']; ?></td>
                            <td><?= 'Rp.' . number_format($detailbiaya['denda']) . ',-'; ?></td>
                            <td><?= 'Rp.' . number_format($total) . ',-'; ?></td>
                        </tr>
                        <?php $i++; ?>
                    </tbody>
                </table>

                <div class="col-sm-0">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                    <a href="<?= base_url('pembayaran'); ?>" class="btn btn-primary">Batal</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->