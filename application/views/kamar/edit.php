<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Kamar</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $kamar['id']; ?>">
                        <div class="form-group row">
                            <label for="no_kamar" class="col-md-3 col-form-label">Nomor Kamar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_kamar" id="no_kamar" value="<?= $kamar['no_kamar']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kapasitas" class="col-md-3 col-form-label">Kapasitas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kapasitas" id="kapasitas" value="<?= $kamar['kapasitas']; ?>">
                                <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="<?= base_url('kamar'); ?>" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->