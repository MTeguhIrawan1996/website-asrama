<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/'); ?>css/materialize.min.css" media="screen,projection" />
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/mycss.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website AMK</title>
</head>

<body id="home" class="scrollspy">

    <!-- Nav Bar -->
    <div class="navbar-fixed">
        <nav class="blue darken-2">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#home" class="brand-logo">AMK</a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#clients">Clients</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="<?= base_url('auth'); ?>">Login/Registrasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- side nav -->
    <ul class="sidenav" id="mobile-nav">
        <li><a href="#about">About Us</a></li>
        <li><a href="#clients">Clients</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="<?= base_url('auth'); ?>">Login/Registrasi</a></li>
    </ul>

    <!-- slider -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="<?= base_url('assets/img/slider/asrama.a.jpg'); ?>"> <!-- random image -->
                <div class="caption left-align">
                    <h3>Welcome to Website</h3>
                    <h5 class="light grey-text text-lighten-3">Jangan lupa titik koma.</h5>
                </div>
            </li>
            <li>
                <img src="<?= base_url('assets/img/slider/asrama.b.jpg'); ?>"> <!-- random image -->
                <div class="caption right-align">
                    <h3>Welcome to Website</h3>
                    <h5 class="light grey-text text-lighten-3">Jangan lupa titik koma.</h5>
                </div>
            </li>
            <li>
                <img src="<?= base_url('assets/img/slider/asrama.c.jpg'); ?>"> <!-- random image -->
                <div class="caption center-align">
                    <h3>Welcome to Website</h3>
                    <h5 class="light grey-text text-lighten-3">Jangan lupa titik koma.</h5>
                </div>
            </li>
        </ul>
    </div>

    <!-- About Us -->
    <section id="about" class="about scrollspy">
        <div class="container">
            <h3 class="light center grey-text text-darken-3">About Us</h3>
            <div class="col light">
                <table style="width: 100%;">
                    <tbody>
                        <tr style="height: 21px;">
                            <td style="width: 50%; height: 21px;" colspan="2">
                                <h5 class="center">Persyaratan Calon Penghuni<h5>
                            </td>
                            <td style="width: 50%; height: 21px;" colspan="2">
                                <h5 class="center">Tata Cara Pendaftaran<h5>
                            </td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">1.</td>
                            <td style="width: 388px; height: 21px;">Mahasiswa yang Masih Aktif.</td>
                            <td style="width: 16px; height: 21px;">1.</td>
                            <td style="width: 388px; height: 21px;">Melenegkapi Persyaratan.</td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">2.</td>
                            <td style="width: 388px; height: 21px;">Melengkapi Berkas Dianatarnya KTP, KTM, KK, dan Bukti Pembayaran Terakhir</td>
                            <td style="width: 16px; height: 21px;">2.</td>
                            <td style="width: 388px; height: 21px;">Menyerahkan Semua Berkas Kepengurus Asrama.</td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">3.</td>
                            <td style="width: 388px; height: 21px;">Belum Menikah atau Masih Lajang.</td>
                            <td style="width: 16px; height: 21px;">3.</td>
                            <td style="width: 388px; height: 21px;">Mendaftar akun di Website Resmi Asrama Mahasiswa Pemkab Kapuas.</td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">&nbsp;</td>
                            <td style="width: 388px; height: 21px;">&nbsp;</td>
                            <td style="width: 16px; height: 21px;">4.</td>
                            <td style="width: 388px; height: 21px;">Membayar Biaya Pendaftaran dan Biaya Bulanan/Retribusi.</td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">&nbsp;</td>
                            <td style="width: 388px; height: 21px;">&nbsp;</td>
                            <td style="width: 16px; height: 21px;">5.</td>
                            <td style="width: 388px; height: 21px;">Melengkapi Data Penghuni diakun masing-masing .</td>
                        </tr>
                        <tr style="height: 21px;">
                            <td style="width: 16px; height: 21px;">&nbsp;</td>
                            <td style="width: 388px; height: 21px;">&nbsp;</td>
                            <td style="width: 16px; height: 21px;">6.</td>
                            <td style="width: 388px; height: 21px;">Menunggu Verifikasi Dari Pengurus Asrama.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col m6 light">
                <h5 class="center">Asrama Mahasiswa Kapuas</h5>
                <p class="center">Asrama mahasiswa Pemerintah Kabupaten Kapuas yang terletak di Banjarmasin adalah hunian yang diperuntukkan bagi mahasiswa. Asrama ini merupakan bangunan atau aset yang dimilik Pemerintah kabupaten Kapuas yang bertugas memberikan layanan hunian bagi mahasiswa yang berasal dari Kabupatan Kapuas dan melanjutkan perguruan tinggi diluar daerah, Asrama Pemerintah Kabupaten Kapuas ini juga memiliki dua unit Asrama yang terletak diBanjarmasin dan Palangkaraya.</p>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <div id="clients" class="parallax-container scrollspy">
        <div class="parallax"><img src="<?= base_url('assets/img/slider/paralax.png'); ?>"></div>
        <div class="container clients ">
            <h3 class="center light white-text">Our Clients</h3>
            <div class="row">
                <div class="col m4 s12 center">
                    <img src="<?= base_url('assets/img/slider/kabupaten.png'); ?>">
                </div>
                <div class="col m4 s12 center">
                    <img src="<?= base_url('assets/img/slider/kabupaten.png'); ?>">
                </div>
                <div class="col m4 s12 center">
                    <img src="<?= base_url('assets/img/slider/kabupaten.png'); ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio -->
    <section id="portfolio" class="portfolio scrollspy">
        <div class="container">
            <h3 class="light center grey-text text-darken-3">Portfolio</h3>
            <div class="row">
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.f.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.c.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.h.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <!-- <div class="col m3 s12">
                    <img src="<?= base_url('assets/img/portfolio/5.jpg'); ?>" class="responsive-img materialboxed">
                </div> -->
            </div>
            <div class="row">
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.d.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.g.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <div class="col m4 s12">
                    <img src="<?= base_url('assets/img/portfolio/asrama.e.jpg'); ?>" class="responsive-img materialboxed">
                </div>
                <!-- <div class="col m3 s12">
                    <img src="<?= base_url('assets/img/portfolio/5.jpg'); ?>" class="responsive-img materialboxed">
                </div> -->
            </div>
        </div>
    </section>

    <!-- Contact us -->
    <section id="contact" class="contact grey lighten-3 scrollspy">
        <div class="container">
            <h3 class="light center grey-text text-darken-3">Contact Us</h3>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel blue darken-2 center white-text">
                        <i class="material-icons">email</i>
                        <h5>Contact</h5>
                        <p>asramakapuas14@gmail.com</p>
                    </div>
                    <ul class="collection with-header">
                        <li class="collection-header center">
                            <h4>Informasi</h4>
                        </li>
                        <li class="collection-item center">Asrama Mahasiswa Kapuas</li>
                        <li class="collection-item center">Jl.S.Parman Gg.Kalimantan II, Banjarmasin</li>
                        <li class="collection-item center">Kalimantan Selatan, Indonesia</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="blue darken-2 white-text center">
        <p>Copyright &copy; Asrama Mahasiswa Kapuas <?= date('Y'); ?></p>
    </footer>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/materialize.min.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);

        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            height: 500,
            transition: 600,
            interval: 3000
        });

        const parallax = document.querySelectorAll('.parallax');
        M.Parallax.init(parallax);

        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
            scrollOffset: 50
        });
    </script>
</body>

</html>