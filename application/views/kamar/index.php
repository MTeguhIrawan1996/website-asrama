<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Kamar Baru</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Nomor Kamar</th>
                                    <th>Status Kamar</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kamar as $km) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $km['no_kamar']; ?></td>
                                        <td><?php if ($km['kapasitas'] == 0) {
                                                echo 'Penuh';
                                            } else {
                                                echo 'Tersedia';
                                            } ?></td>

                                        <td>
                                            <a href="" class="badge badge-info" data-toggle="modal" data-target="#formModalDetail<?= $km['id']; ?>" data-id="">Read</a>
                                            <a href="<?= base_url('kamar/editkamar/'); ?><?= $km['id']; ?>" class="badge badge-success">Update</a>
                                            <a href="<?= base_url('kamar/hapuskamar/'); ?><?= $km['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
                <h5 class="modal-title" id="formModalLabelKamar">Tambah Kamar Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kamar') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="no_kamar">No Kamar</label>
                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="<?= set_value('no_kamar'); ?>">
                        <?= form_error('no_kamar', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?= set_value('kapasitas'); ?>">
                        <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
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

<!-- Modal detail Kamar -->
<?php foreach ($kamar as $km) : ?>
    <div class="modal fade" id="formModalDetail<?= $km['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabelKamar">Detail Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_edit" value="<?= $km['id']; ?>">
                    <table width="100%" style="font-size:16px">
                        <tr>
                            <td width="190">Nomor Kamar</td>
                            <td width="10">:</td>
                            <td><?= $km['no_kamar']; ?></td>
                        </tr>
                        <tr>
                            <td>Sisa Kapasitas/Orang</td>
                            <td>:</td>
                            <td><?= $km['kapasitas']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Kamar</td>
                            <td>:</td>
                            <td><?php if ($km['kapasitas'] == 0) {
                                    echo 'Penuh';
                                } else {
                                    echo 'Tersedia';
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
<?php endforeach; ?>