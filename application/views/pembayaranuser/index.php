<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran Penghuni</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Denda</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pembayaran as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['kode_bayar']; ?></td>
                                        <td>
                                            <?php
                                            if ($p['tgl_jth_tmp'] == null) {
                                                echo '<span class="badge badge-danger mb-2">Menunggu</span>';
                                            } else {
                                                echo date('d F Y', strtotime($p['tgl_jth_tmp']));
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($p['tgl_bayar'] == null) {
                                                echo '';
                                            } else {
                                                echo date('d F Y', strtotime($p['tgl_bayar']));
                                            }  ?>
                                        </td>
                                        <td>
                                            <?= 'Rp.' . number_format($p['denda']) . ',-'; ?>
                                        </td>
                                        <td>
                                            <?= 'Rp.' . number_format($p['total']) . ',-'; ?>
                                        </td>
                                        <td><?php if ($p['status'] == 0) {
                                                echo '<span class="badge badge-danger mb-2">Belum Lunas</span>';
                                            } else {
                                                echo '<span class="badge badge-success mb-2">Lunas</span>';
                                            } ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>

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