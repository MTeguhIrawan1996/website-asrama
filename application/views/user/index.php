<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-3 col-lg-10">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img rounded-circle">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <table width="100%" style="font-size:16px">
                        <tr>
                            <td width="120">Nama</td>
                            <td width="10">:</td>
                            <td><?= $user['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $user['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><?php if ($user['tempat_lahir'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data dimenu edit profile</span>';
                                } else {
                                    echo $user['tempat_lahir'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?php if ($user['tgl_lahir'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data dimenu edit profile</span>';
                                } else {
                                    echo date('d F Y', strtotime($user['tgl_lahir']));
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td><?php if ($user['semester'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data dimenu edit profile</span>';
                                } else {
                                    echo $user['semester'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Universitas</td>
                            <td>:</td>
                            <td><?php if ($user['universitas'] == '') {
                                    echo '<span class="badge badge-danger">Lengkapi data dimenu edit profile</span>';
                                } else {
                                    echo $user['universitas'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Kamar</td>
                            <td>:</td>
                            <td><?php if ($penghunikamar['no_kamar'] == '') {
                                    echo '<span class="badge badge-danger">Menunggu Verifikasi</span>';
                                } else {
                                    echo $penghunikamar['no_kamar'];
                                } ?></td>
                        </tr>
                        <tr>
                            <td>Masa Kontrak</td>
                            <td>:</td>
                            <td><?php if ($user['masa_kontrak'] == '') {
                                    echo '<span class="badge badge-danger">Menunggu Verifikasi</span>';
                                } else {
                                    echo date('d F Y', strtotime($user['masa_kontrak']));
                                } ?></td>
                        </tr>
                    </table>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->