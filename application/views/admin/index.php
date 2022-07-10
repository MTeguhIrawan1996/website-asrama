<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <marquee>Selamat datang diwebsite asrama mahasiswa kabupaten Kapuas, Jangan lupa titik koma;</marquee>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kas Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp.' . number_format($jumlah) . ',-'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kas Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp.' . number_format($jumlahk) . ',-'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp.' . number_format($jumlah - $jumlahk) . ',-'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penghuni belum diverifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penghuniv . ' Orang'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Penghuni Kamar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penghunij . ' Orang'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengajuan Pindah Kamar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pindahkamar . ' Orang'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-bell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penghuni yang belum melengkapi data</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penghunid . ' Orang'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->