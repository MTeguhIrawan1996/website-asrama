<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Penghuni</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $penghuni['id']; ?>">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" style="width: 300px" id="name" name="name" value="<?= $penghuni['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" style="width: 300px" id="email" name="email" value="<?= $penghuni['email']; ?>" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" style="width: 300px" id="tempat_lahir" name="tempat_lahir" value="<?= $penghuni['tempat_lahir']; ?>">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" style="width: 300px" id="tgl_lahir" name="tgl_lahir" value="<?= $penghuni['tgl_lahir']; ?>">
                                </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="kontrak">Masa Berlaku Kontrak</label>
                                <a href="<?= base_url('penghuni/hapuskontrak/'); ?><?= $penghuni['id']; ?>" class="badge badge-danger tombol-hapus">delete</a>
                                <input type="date" class="form-control" style="width: 300px" id="kontrak" name="kontrak" value="<?= $penghuni['masa_kontrak']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" class="form-control" style="width: 300px" id="semester" name="semester" value="<?= $penghuni['semester']; ?>">
                                <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="universitas">Universitas</label>
                                <input type="text" class="form-control" style="width: 300px" id="universitas" name="universitas" value="<?= $penghuni['universitas']; ?>">
                                <?= form_error('universitas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="<?= base_url('penghuni'); ?>" class="btn btn-primary">Kembali</a>
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