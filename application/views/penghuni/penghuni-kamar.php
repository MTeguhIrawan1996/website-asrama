<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="validation-errors-pk" data-validationerrorspk="<?= validation_errors(); ?>"></div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3 tombolTambahDataPenghuniKamar" data-toggle="modal" data-target="#formModal">Tambah Penghuni Kamar</button>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pnghuni Kamar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Masuk</th>
                                    <th>No Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($penghuni as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['name']; ?></td>
                                        <td><?= $p['email']; ?></td>
                                        <td><?= date('d F Y', $p['tgl_masuk']); ?></td>
                                        <td><?= $p['no_kamar']; ?></td>
                                        <td>
                                            <a href="<?= base_url('penghuni/hapuspenghunikamar/'); ?><?= $p['id']; ?>/<?= $p['kamar']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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

<!-- Modal Tambah Penghuni Kamar -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKamar">Tambah Penghuni Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penghuni/penghunikamar/') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <select name="email" id="email" class="form-control" oninput="autofill()">
                            <option value="">Pilih Email Penghuni</option>
                            <?php foreach ($users as $u) : ?>
                                <option value="<?= $u['email']; ?>"><?= $u['email']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap..." readonly>
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester..." readonly>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Universitas..." readonly>
                        <?= form_error('universitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="date_created" name="date_created" placeholder="Tanggal Masuk..." readonly>
                    </div>
                    <input type="hidden" name="id_kamar" id="id_kamar">
                    <select name="no_kamar" id="no_kamar" class="form-control" oninput="autofill1()">
                        <option value="">Pilih Kamar</option>
                        <?php foreach ($kamar as $k) : ?>
                            <option value="<?= $k['no_kamar']; ?>"><?= $k['no_kamar']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('no_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="tobolTambahDataPenghuniKamar" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>