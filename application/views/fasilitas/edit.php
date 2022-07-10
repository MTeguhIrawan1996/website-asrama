<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Fasilitas</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="kode_fasilitas">Kode Fasilitas</label>
                                    <input type="text" class="form-control" name="kode_fasilitas" id="kode_fasilitas" style="width: 300px" value="<?= $fasilitas['kode_fasilitas']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Fasilitas</label>
                                    <input type="text" class="form-control" style="width: 300px" name="nama" id="nama" value="<?= $fasilitas['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control" style="width: 300px" name="lokasi" id="lokasi" value="<?= $fasilitas['lokasi']; ?>">
                                </div>

                        </div>
                        <div>
                            <div class="form-group">
                                <label for="penyedia">Penyedia</label>
                                <input type="text" class="form-control" style="width: 300px" id="penyedia" name="penyedia" value="<?= $fasilitas['penyedia']; ?>">
                                <?= form_error('penyedia', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control" name="kondisi" id="kondisi">
                                    <?php if ($fasilitas['kondisi'] == ('TLP')) : ?>
                                        <option value="TLP">
                                            Tidak Layak Pakai
                                        </option>
                                        <option value="LP">
                                            Layak Pakai
                                        </option>
                                    <?php elseif ($fasilitas['kondisi'] == ('LP')) : ?>
                                        <option value="LP">
                                            Layak Pakai
                                        </option>
                                        <option value="TLP">
                                            Tidak Layak Pakai
                                        </option>
                                    <?php endif; ?>
                                </select>
                                <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control" style="width: 300px" id="tgl_masuk" name="tgl_masuk" value="<?= $fasilitas['tgl_masuk']; ?>">
                                <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="<?= base_url('fasilitas'); ?>" class="btn btn-primary">Batal</a>
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