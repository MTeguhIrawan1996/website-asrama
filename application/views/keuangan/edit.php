<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kas Masuk</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" style="width: 300px" id="kode" name="kode" value="<?= $kas['kode']; ?>" readonly>
                                    <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" style="width: 300px" id="keterangan" name="keterangan" value="<?= $kas['keterangan']; ?>">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Masuk</label>
                                <input type="date" class="form-control" style="width: 300px" id="tgl" name="tgl" value="<?= $kas['tgl']; ?>">
                                <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Dana Masuk</label>
                                <input type="number" class="form-control" style="width: 300px" id="jumlah" name="jumlah" value="<?= $kas['jumlah']; ?>">
                                <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="<?= base_url('keuangan'); ?>" class="btn btn-primary">Batal</a>
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