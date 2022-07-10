<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Pindah Kamar</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="alert alert-success" role="alert">Jika data anda tidak tampil maka harap tunggu pengurus meverifikasi data anda!</div>
                    <?= form_error('id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?= $penghunikamar['id']; ?>">
                                <div class=" form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" style="width: 300px" id="name" name="name" value="<?= $penghunikamar['name']; ?>" readonly>
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" style="width: 300px" id="email" name="email" value="<?= $penghunikamar['email']; ?>" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alasan">Alasan Pindah</label>
                                    <textarea class="form-control" id="alasan" name="alasan" style="width: 300px" rows="3"></textarea>
                                    <?= form_error('alasan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="hidden" name="id_kamar_sekarang" id="id_kamar_sekarang">
                                <label for="kamar_sekarang">Kamar Sekarang</label>
                                <select name="kamar_sekarang" id="kamar_sekarang" class="form-control" style="width: 300px" oninput="autofill4()">
                                    <option value="">Pilih Kamar</option>
                                    <option value="<?= $penghunikamar['no_kamar']; ?>"><?= $penghunikamar['no_kamar']; ?> </option>
                                </select>
                                <?= form_error('kamar_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_kamar" id="id_kamar">
                                <label for="no_kamar">Kamar Tujuan</label>
                                <select name="no_kamar" id="no_kamar" class="form-control" style="width: 300px" oninput="autofill3()">
                                    <option value="">Pilih Kamar</option>
                                    <?php foreach ($kamar as $k) : ?>
                                        <option value="<?= $k['no_kamar']; ?>"><?= $k['no_kamar']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('no_kamar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="kapasitas" name="kapasitas">
                            </div>

                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Proses</button>
                            <a href="<?= base_url('user'); ?>" class="btn btn-primary">Kembali</a>
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