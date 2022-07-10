<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Asrama Kapuas<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $role_id = $this->session->userdata('role_id');
    // admin
    if ($role_id == 1) : ?>

        <?php if ($title == ('Home')) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
            </li>

            <?php if ($title == ('Profile')) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Profile</span>
                </a>
                <?php if ($title == ('Profile')) : ?>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php else : ?>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <?php endif; ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('user/changepassword'); ?>">Change Password</a>
                        </div>
                        </div>
                </li>

                <?php if ($title == ('Manajemen Kamar')) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link pb-0" href="<?= base_url('kamar'); ?>">
                        <i class="fas fa-fw fa-hotel"></i>
                        <span>Manajemen Kamar</span></a>
                    </li>

                    <?php if ($title == ('Manajemen Penghuni')) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-fw fa-user-friends"></i>
                            <span>Manajemen Penghuni</span>
                        </a>
                        <?php if ($title == ('Manajemen Penghuni')) : ?>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                            <?php else : ?>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                <?php endif; ?>
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="<?= base_url('penghuni'); ?>">Data Penghuni</a>
                                    <a class="collapse-item" href="<?= base_url('penghuni/penghunikamar'); ?>">Kelola Penghuni Kamar</a>
                                    <a class="collapse-item" href="<?= base_url('pindahkamaradmin'); ?>">Pengajuan Pindah Kamar</a>
                                </div>
                                </div>
                        </li>

                        <?php if ($title == ('Manajemen Keuangan')) : ?>
                            <li class="nav-item active">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                <i class="fas fa-fw fa-file-invoice-dollar"></i>
                                <span>Manajemen Keuangan</span>
                            </a>
                            <?php if ($title == ('Manajemen Keuangan')) : ?>
                                <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordionSidebar">
                                <?php else : ?>
                                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
                                    <?php endif; ?>
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item" href="<?= base_url('keuangan'); ?>">Kas Masuk</a>
                                        <a class="collapse-item" href="<?= base_url('keuangan/kaskeluar'); ?>">Kas Keluar</a>
                                        <a class="collapse-item" href="<?= base_url('keuangan/rekapitulasi'); ?>">Rekapitulasi Kas</a>
                                    </div>
                                    </div>
                            </li>

                            <?php if ($title == ('Pembayaran Asrama')) : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                    <i class="fas fa-fw fa-wallet"></i>
                                    <span>Pembayaran Asrama</span>
                                </a>
                                <?php if ($title == ('Pembayaran Asrama')) : ?>
                                    <div id="collapse5" class="collapse show" aria-labelledby="heading5" data-parent="#accordionSidebar">
                                    <?php else : ?>
                                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
                                        <?php endif; ?>
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <a class="collapse-item" href="<?= base_url('pembayaran'); ?>">Bayar Retribusi</a>
                                            <a class="collapse-item" href="<?= base_url('biayadandenda'); ?>">Biaya & Denda</a>
                                        </div>
                                        </div>
                                </li>

                                <?php if ($title == ('Manajemen Fasilitas')) : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link pb-0" href="<?= base_url('fasilitas'); ?>">
                                        <i class="fas fa-fw fa-couch"></i>
                                        <span>Manajemen Fasilitas</span></a>
                                    </li>

                                    <?php if ($title == ('Laporan')) : ?>
                                        <li class="nav-item active">
                                        <?php else : ?>
                                        <li class="nav-item">
                                        <?php endif; ?>
                                        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                            <i class="fas fa-fw fa-print"></i>
                                            <span>Laporan</span>
                                        </a>
                                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/penghunibaru'); ?>">Penghuni perkuliahan baru</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/penghuniakhir'); ?>">Penghuni perkuliahan akhir</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/kamartersedia'); ?>">Kamar Tersedia</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/kamarpenuh'); ?>">Kamar penuh</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/danamasuk'); ?>">Kas masuk</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/danakeluar'); ?>">Kas keluar</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/rekapdana'); ?>">Rekapitulasi kas</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/fasilitasrusak'); ?>">Fasilitas rusak</a>
                                                <a class="collapse-item" target="_blank" href="<?= base_url('laporan/pembayaran'); ?>">Pembayaran</a>
                                            </div>
                                        </div>
                                        </li>

                                        <!-- penghuni -->
                                    <?php elseif ($role_id == 2) : ?>

                                        <?php if ($title == ('Profile')) : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item">
                                            <?php endif; ?>
                                            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                <i class="fas fa-fw fa-id-card-alt"></i>
                                                <span>Profile</span>
                                            </a>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                <div class="bg-white py-2 collapse-inner rounded">
                                                    <a class="collapse-item" href="<?= base_url('user'); ?>">My Profile</a>
                                                    <a class="collapse-item" href="<?= base_url('user/edit'); ?>">Edit Profile</a>
                                                    <a class="collapse-item" href="<?= base_url('user/changepassword'); ?>">Change Password</a>
                                                </div>
                                            </div>
                                            </li>

                                            <?php if ($title == ('Pindah Kamar')) : ?>
                                                <li class="nav-item active">
                                                <?php else : ?>
                                                <li class="nav-item">
                                                <?php endif; ?>
                                                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fas fa-fw fa-exchange-alt"></i>
                                                    <span>Pindah Kamar</span>
                                                </a>
                                                <?php if ($title == ('Pindah Kamar')) : ?>
                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                                    <?php else : ?>
                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                                        <?php endif; ?>
                                                        <div class="bg-white py-2 collapse-inner rounded">
                                                            <a class="collapse-item" href="<?= base_url('pindahkamar'); ?>">Pengajuan Pindah Kamar</a>
                                                            <a class="collapse-item" href="<?= base_url('pindahkamar/datapengajuanpindahkamar'); ?>">Data Pindah Kamar</a>
                                                        </div>
                                                        </div>
                                                </li>
                                                <?php if ($title == ('Riwayat Pembayaran')) : ?>
                                                    <li class="nav-item active">
                                                    <?php else : ?>
                                                    <li class="nav-item">
                                                    <?php endif; ?>
                                                    <a class="nav-link pb-0" href="<?= base_url('pembayaranuser'); ?>">
                                                        <i class="fas fa-fw fa-book"></i>
                                                        <span>Riwayat Pembayaran</span></a>
                                                    </li>

                                                <?php else : ?>
                                                    <!-- kabag -->
                                                    <?php if ($title == ('Home')) : ?>
                                                        <li class="nav-item active">
                                                        <?php else : ?>
                                                        <li class="nav-item">
                                                        <?php endif; ?>
                                                        <a class="nav-link pb-0" href="<?= base_url('kabag'); ?>">
                                                            <i class="fas fa-fw fa-tachometer-alt"></i>
                                                            <span>Home</span></a>
                                                        </li>

                                                        <?php if ($title == ('Profile')) : ?>
                                                            <li class="nav-item active">
                                                            <?php else : ?>
                                                            <li class="nav-item">
                                                            <?php endif; ?>
                                                            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                <i class="fas fa-fw fa-id-card-alt"></i>
                                                                <span>Profile</span>
                                                            </a>
                                                            <?php if ($title == ('Profile')) : ?>
                                                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                                <?php else : ?>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                                    <?php endif; ?>
                                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                                        <a class="collapse-item" href="<?= base_url('user/changepassword'); ?>">Change Password</a>
                                                                    </div>
                                                                    </div>
                                                            </li>


                                                            <?php if ($title == ('Laporan')) : ?>
                                                                <li class="nav-item active">
                                                                <?php else : ?>
                                                                <li class="nav-item">
                                                                <?php endif; ?>
                                                                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                                                    <i class="fas fa-fw fa-print"></i>
                                                                    <span>Laporan</span>
                                                                </a>
                                                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
                                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/penghunibaru'); ?>">Penghuni perkuliahan baru</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/penghuniakhir'); ?>">Penghuni perkuliahan akhir</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/kamartersedia'); ?>">Kamar Tersedia</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/kamarpenuh'); ?>">Kamar penuh</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/danamasuk'); ?>">Kas masuk</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/danakeluar'); ?>">Kas keluar</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/rekapdana'); ?>">Rekapitulasi kas</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/fasilitasrusak'); ?>">Fasilitas rusak</a>
                                                                        <a class="collapse-item" target="_blank" href="<?= base_url('laporan/pembayaran'); ?>">Pembayaran</a>
                                                                    </div>
                                                                </div>
                                                                </li>

                                                            <?php endif; ?>



                                                            <li class="nav-item">
                                                                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                                                                    <i class="fas fa-fw fa-sign-out-alt"></i>
                                                                    <span>Logout</span></a>
                                                            </li>

                                                            <!-- Divider -->
                                                            <hr class="sidebar-divider">

                                                            <!-- Sidebar Toggler (Sidebar) -->
                                                            <div class="text-center d-none d-md-inline">
                                                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                                            </div>

</ul>
<!-- End of Sidebar -->