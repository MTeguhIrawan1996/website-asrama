<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <a href="<?= base_url('pindahkamar'); ?>" class="btn btn-primary mb-3">Form Pindah Kamar</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pindah Kamar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (!$pindahkamar['email_pindah']) : ?>
                            <div>
                                Satatus:
                            </div>
                        <?php elseif ($pindahkamar['status'] == 0) : ?>
                            <div>
                                Satatus:
                                <span class="badge badge-danger mb-2">Menunggu Verifikasi</span>
                            </div>
                        <?php elseif ($pindahkamar['status'] == 1) : ?>
                            <div>
                                Satatus:
                                <span class="badge badge-success mb-2">Disetujui</span>
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width: 150px>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Kamar Sekarang</th>
                                    <th>Kamar Tujuan</th>
                                    <th>Tanggal Pindah</th>
                                    <?php if ($pindahkamar['status'] == 0) : ?>
                                        <th width="15%">Action</th>
                                    <?php elseif ($pindahkamar['status'] == 1) : ?>

                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $pindahkamar['name_penghuni']; ?></td>
                                    <td><?= $pindahkamar['email_pindah']; ?></td>
                                    <td><?= $pindahkamar['no_kamar_sekarang']; ?></td>
                                    <td><?= $pindahkamar['no_kamar_baru']; ?></td>
                                    <td>
                                        <?php if (!$pindahkamar['tgl_pindah']) {
                                            echo '';
                                        } else {
                                            echo date('d F Y', $pindahkamar['tgl_pindah']);
                                        } ?>
                                    </td>
                                    <?php if ($pindahkamar['status'] == 0) : ?>
                                        <!-- tamppilkan tombol batal -->
                                        <td>
                                            <?php if (!$pindahkamar['email_pindah']) : ?>
                                                <!-- Jika tidak ada pindah hilangkan tombol batal  -->
                                            <?php elseif ($pindahkamar['status'] == 0) : ?>
                                                <a href="<?= base_url('pindahkamar/batalpindahkamar/'); ?><?= $pindahkamar['id']; ?>" class="badge badge-danger tombol-hapus">Batal</a>
                                            <?php endif; ?>
                                        </td>
                                    <?php elseif ($pindahkamar['status'] == 1) : ?>

                                    <?php endif; ?>
                                </tr>

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