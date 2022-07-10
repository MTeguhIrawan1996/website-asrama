<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3 tobolTambahDataMasuk" data-toggle="modal" data-target="#formModal">Tambah Kas Masuk</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kas Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jumlah</th>
                                    <th width="14%">Action</th>
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

                                        <td>
                                            <a href="<?= base_url('keuangan/editkasmasuk/'); ?><?= $k['kode']; ?>" class="badge badge-success">Update</a>
                                            <a href="<?= base_url('keuangan/hapuskasmasuk/'); ?><?= $k['kode']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tr>
                                <th colspan="4" style="text-align:center;    font-size:20px">Total Kas Masuk</th>
                                <th style="text-align:right; font-size:17px"><?= 'Rp.' . number_format($jumlah) . ',-'; ?></th>
                                <td></td>
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

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKamar">Tambah Kas Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('keuangan') ?>" method="post">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" value="">
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" value="">
                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="">
                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
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