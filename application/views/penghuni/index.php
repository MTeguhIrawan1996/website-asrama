<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <a href="<?= base_url('penghuni/aturulang/'); ?>" class="btn btn-primary mb-3 tombol-hapus">Atur Ulang Semester</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pnghuni</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Batas Masa Kontrak</th>
                                    <th>Status Akun</th>
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
                                        <td><?= date('d F Y', ($p['date_created'])); ?></td>
                                        <td><?php
                                            $tgl = $p['masa_kontrak'];
                                            $int_tgl = strtotime($tgl);
                                            $time = time();
                                            if ($p['masa_kontrak'] == '') {
                                                echo '<a href="#kontrak" class="badge badge-danger" data-toggle="modal" data-target="#formModalKontrak' . $p['id'] . '" data-id="">NonVerifikasi</a>';
                                            } else {
                                                if ($time > $int_tgl) {
                                                    echo '<font color="red">' . date('d F Y', strtotime($p['masa_kontrak'])) . '</font>';
                                                } else {
                                                    echo date('d F Y', strtotime($p['masa_kontrak']));
                                                }
                                            } ?></td>
                                        <td><?php if ($p['is_active'] == 0) {
                                                echo '<a href="' . base_url('penghuni/active/') . '' . $p['id'] . '" class="badge badge-danger">Non Active</a>';
                                            } else {
                                                echo '<a href="' . base_url('penghuni/nonactive/') . '' . $p['id'] . '" class="badge badge-success">Active</a>';
                                            } ?></td>
                                        <td>
                                            <a href="" class="badge badge-info" data-toggle="modal" data-target="#formModalDetail<?= $p['id']; ?>" data-id="">Read</a>
                                            <a href="<?= base_url('penghuni/editpenghuni/'); ?><?= $p['id']; ?>" class="badge badge-success">Update</a>
                                            <a href="<?= base_url('penghuni/hapuspenghuni/'); ?><?= $p['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                            <!-- <?php
                                                    if ($p['masa_kontrak'] == '') { } else {
                                                        echo '
                                                <a href="' . base_url('penghuni/hapuskontrak/') . '' . $p['id'] . '" class="badge badge-warning tombol-hapus">Hapus Kontrak</a>';
                                                    } ?> -->
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

<?php foreach ($penghuni as $p) : ?>
    <!-- Modal detail penghuni -->
    <div class="modal fade" id="formModalDetail<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabelKamar">Detail Penghuni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_edit" value="<?= $p['id']; ?>">
                    <table width="100%" style="font-size:16px">
                        <tr>
                            <td width="150">Nama</td>
                            <td width="10">:</td>
                            <td><?= $p['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $p['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat lahir</td>
                            <td>:</td>
                            <td><?php if ($p['tempat_lahir'] == '') {
                                    echo '<span class="badge badge-danger">Data belum dilengkapi</span>';
                                } else {
                                    echo $p['tempat_lahir'];
                                } ?></td>
                        <tr>
                        <tr>
                            <td>Tanggal lahir</td>
                            <td>:</td>
                            <td><?php if ($p['tgl_lahir'] == '') {
                                    echo '<span class="badge badge-danger">Data belum dilengkapi</span>';
                                } else {
                                    echo date('d F Y', strtotime($p['tgl_lahir']));
                                } ?></td>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td><?php if ($p['semester'] == '') {
                                    echo '<span class="badge badge-danger">Data belum dilengkami</span>';
                                } else {
                                    echo $p['semester'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Universitas</td>
                            <td>:</td>
                            <td><?php if ($p['universitas'] == '') {
                                    echo '<span class="badge badge-danger">Data belum dilengkapi</span>';
                                } else {
                                    echo $p['universitas'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= date('d F Y', ($p['date_created'])); ?></td>
                        </tr>
                        <tr>
                            <td>Batas Masa Kontrak</td>
                            <td>:</td>
                            <td><?php if ($p['masa_kontrak'] == '') {
                                    echo '<span class="badge badge-danger">Non Verifikasi</span>';
                                } else {
                                    echo date('d F Y', strtotime($p['masa_kontrak']));
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Status Akun</td>
                            <td>:</td>
                            <td><?php if ($p['is_active'] == 0) {
                                    echo '<span class="badge badge-danger">Non Active</span>';
                                } else {
                                    echo '<span class="badge badge-success">Active</span>';
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

    <!-- Verifi Kontrak -->
    <div class="modal fade" id="formModalKontrak<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabelKamar">Tentukan batas masa kontrak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('penghuni/addkontrak/') ?>" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                        <div class="form-group">
                            <label for="kontrak">Batas Masa Kontrak</label>
                            <input type="date" class="form-control" id="kontrak" name="kontrak" required>
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