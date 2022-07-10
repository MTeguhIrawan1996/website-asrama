<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Data Penghuni Bayar</button>
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
                                    <th>Nama Penghuni</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th width="16%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pembayaran as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['kode_bayar']; ?></td>
                                        <td><?= $p['name_penghuni']; ?></td>


                                        <td><?= date('d F Y', $p['tgl_masuk']); ?></td>
                                        <td><?php
                                            if ($p['tgl_jth_tmp'] == null) {
                                                echo '<a href="#tgljthtmp" class="badge badge-danger" data-toggle="modal" data-target="#formModaltgljthtmp' . $p['kode_bayar'] . '" data-id="">NonVerifikasi</a>';
                                            } else {
                                                echo date('d F Y', strtotime($p['tgl_jth_tmp']));
                                            } ?></td>
                                        <td><?php if ($p['status'] == 0) {
                                                echo '<span class="badge badge-danger mb-2">Belum Lunas</span>';
                                            } else {
                                                echo '<span class="badge badge-success mb-2">Lunas</span>';
                                            } ?></td>
                                        <td>
                                            <?php if ($p['status'] == 0) : ?>
                                                <a href="" class=" badge badge-info" data-toggle="modal" data-target="#formModalDetail<?= $p['kode_bayar']; ?>" data-id="">Read</a>
                                                <?php if ($p['tgl_jth_tmp'] == null) : ?>

                                                <?php else : ?>
                                                    <a href="<?= base_url('pembayaran/detailbayar'); ?>?kode_bayar=<?= $p['kode_bayar']; ?>&tgl_jth_tmp=<?= $p['tgl_jth_tmp']; ?>" class="badge badge-success">Bayar</a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('pembayaran/hapuspembayaran'); ?>?kode_bayar=<?= $p['kode_bayar']; ?>" class="badge badge-danger tombol-hapus">delete</a>
                                            <?php elseif ($p['status'] == 1) : ?>
                                                <a href="" class=" badge badge-info" data-toggle="modal" data-target="#formModalDetail<?= $p['kode_bayar']; ?>" data-id="">Read</a>
                                                <a href="<?= base_url('laporan/cetakpembayaran'); ?>?kode_bayar=<?= $p['kode_bayar']; ?>" target="_blank" class="badge badge-warning">Cetak</a>
                                                <a href="<?= base_url('pembayaran/hapuspembayaran'); ?>?kode_bayar=<?= $p['kode_bayar']; ?>" class="badge badge-danger tombol-hapus">delete</a>
                                            <?php endif; ?>
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

<!-- Modal Tambah Kamar -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKamar">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pembayaran') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_bayar">Kode Pembayaran</label>
                        <input type="text" class="form-control" id="kode_bayar" name="kode_bayar" value="<?= $kode_bayar; ?>" readonly>
                    </div>
                    <input type="hidden" name="penghuni_kamar" id="penghuni_kamar">
                    <div class="form-group">
                        <select name="email" id="email" class="form-control" oninput="tes()">
                            <option value="">Pilih Email Penghuni</option>
                            <?php foreach ($penghunik as $pk) : ?>
                                <option value="<?= $pk['email']; ?>"><?= $pk['email']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap..." readonly>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" placeholder="No Kamar..." readonly>
                        <?= form_error('no_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="date_created" name="date_created" placeholder="Tanggal Masuk..." readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="tobolTambahDataKamar" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($pembayaran as $p) : ?>
    <!-- Modal detail pembayaran -->
    <div class="modal fade" id="formModalDetail<?= $p['kode_bayar']; ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabelKamar">Detail Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table width="100%" style="font-size:16px">
                        <tr>
                            <td width="160">Kode Bayar</td>
                            <td width="10">:</td>
                            <td><?= $p['kode_bayar']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $p['name_penghuni']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $p['email_penghuni_kamar']; ?></td>
                        <tr>
                        <tr>
                            <td>Kamar</td>
                            <td>:</td>
                            <td><?= $p['no_kamar_penghuni']; ?></td>
                        <tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= date('d F Y', $p['tgl_masuk']); ?></td>
                        <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>:</td>
                            <td><?php
                                if ($p['tgl_jth_tmp'] == null) {
                                    echo '<span class="badge badge-danger">Belum diverifikasi</span>';
                                } else {
                                    echo date('d F Y', strtotime($p['tgl_jth_tmp']));
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Bayar</td>
                            <td>:</td>
                            <td><?php
                                if ($p['tgl_bayar'] == null) {
                                    echo '';
                                } else {
                                    echo date('d F Y', strtotime($p['tgl_bayar']));
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td>:</td>
                            <td><?= 'Rp.' . number_format($p['denda']) . ',-'; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td><?= 'Rp.' . number_format($p['total']) . ',-'; ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td><?= $p['ket']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php if ($p['status'] == 0) {
                                    echo '<span class="badge badge-danger mb-2">Belum Lunas</span>';
                                } else {
                                    echo '<span class="badge badge-success mb-2">Lunas</span>';
                                } ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Verifi tgl jth tmp -->
    <div class="modal fade" id="formModaltgljthtmp<?= $p['kode_bayar']; ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabelKamar">Tentukan batas tempo bayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pembayaran/addtgljthtmp/') ?>" method="post">
                        <input type="hidden" name="kode_bayar" id="kode_bayar" value="<?= $p['kode_bayar']; ?>">
                        <div class="form-group">
                            <label for="tgljthtmp">Tanggal Jatuh Tempo</label>
                            <input type="date" class="form-control" id="tgljthtmp" name="tgljthtmp" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="tobolTambahDataKamar" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>