<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pindah Kamar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kamar Sekarang</th>
                                    <th>Kamar Tujuan</th>
                                    <th>Tanggal Pindah</th>
                                    <th>Status</th>
                                    <th width="13%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pindahkamar as $pk) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $pk['name_penghuni']; ?></td>
                                        <td><?= $pk['email_pindah']; ?></td>
                                        <td><?= $pk['no_kamar_sekarang']; ?></td>
                                        <td><?= $pk['no_kamar_baru']; ?></td>
                                        <td><?= date('d F Y', $pk['tgl_pindah']); ?></td>
                                        <td><?php if ($pk['status'] == 0) {
                                                echo '<a href="' . base_url('pindahkamaradmin/verifikasi/') . '' . $pk['id'] . '/' . $pk['penghuni'] . '/' . $pk['kamar_sekarang'] . '/' . $pk['kamar_baru'] . '/' . $pk['no_kamar_baru'] . '" class="badge badge-danger">Menunggu Verifikasi</a>';
                                            } else {
                                                echo '<span class="badge badge-success mb-2">Diverifikasi</span>';
                                            } ?></td>
                                        <td>
                                            <?php if ($pk['status'] == 0) {
                                                echo '<a href="' . base_url('pindahkamaradmin/hapus/') . '' . $pk['id'] . '" class="badge badge-danger tombol-hapus">delete</a>';
                                            } else {
                                                echo '<a href="' . base_url('pindahkamaradmin/hapus/') . '' . $pk['id'] . '" class="badge badge-danger tombol-hapus">delete</a>
                                                <a href="' . base_url('laporan/pindahkamar/') . '' . $pk['id'] . '" class="badge badge-warning" target="_blank">cetak</a>';
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