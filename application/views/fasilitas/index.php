<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors" data-validationerrors="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Fasilitas Baru</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Fasilitas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Kode Fasilitas</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Lokasi</th>
                                    <th>Penyedia</th>
                                    <th>Kondisi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($fasilitas as $f) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $f['kode_fasilitas']; ?></td>
                                        <td><?= $f['nama']; ?></td>
                                        <td><?= $f['lokasi']; ?></td>
                                        <td><?= $f['penyedia']; ?></td>
                                        <td><?= $f['kondisi']; ?></td>
                                        <td><?= date('d F Y', strtotime($f['tgl_masuk'])); ?></td>

                                        <td>
                                            <a href="<?= base_url('fasilitas/edit?'); ?>kode_fasilitas=<?= $f['kode_fasilitas']; ?>" class="badge badge-success">Update</a>
                                            <a href="<?= base_url('fasilitas/hapus?'); ?>kode_fasilitas=<?= $f['kode_fasilitas']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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

<!-- Modal Tambah Fasilitas -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKamar">Tambah Fasilitas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('fasilitas') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kode_fasilitas">Kode Fasilitas</label>
                        <input type="text" class="form-control" id="kode_fasilitas" name="kode_fasilitas" value="<?= set_value('kode_fasilitas'); ?>">
                        <?= form_error('kode_fasilitas', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= set_value('lokasi'); ?>">
                        <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="penyedia">Penyedia</label>
                        <input type="text" class="form-control" id="penyedia" name="penyedia" value="<?= set_value('penyedia'); ?>">
                        <?= form_error('penyedia', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" name="kondisi" id="kondisi">
                            <option value="">-Pilih Kondisi-</option>
                            <option value="LP">Layak Pakai</option>
                            <option value="TLP">Tidak Layak Pakai</option>
                        </select>
                        <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= set_value('tgl_masuk'); ?>">
                        <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>