<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Data Biaya & Denda</button> -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Biaya & Denda</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Denda</th>
                                    <th>Biaya Bulanan</th>
                                    <th width="17%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($biayadenda as $bd) : ?>
                                    <tr>
                                        <td><?= 'Rp.' . number_format($bd['denda']) . ',-'; ?></td>
                                        <td><?= 'Rp.' . number_format($bd['_biaya']) . ',-'; ?></td>

                                        <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#formModal">Update</a>
                                            <a href="<?= base_url('biayadandenda/hapus/'); ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                        </td>
                                    </tr>

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

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKamar">Biaya & Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('biayadandenda') ?>" method="post">
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="number" class="form-control" id="denda" name="denda" value="<?= set_value('denda'); ?>">
                        <?= form_error('denda', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="_biaya">Biaya Bulanan</label>
                        <input type="number" class="form-control" id="_biaya" name="_biaya" value="<?= set_value('_biaya'); ?>">
                        <?= form_error('_biaya', '<small class="text-danger pl-3">', '</small>'); ?>
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