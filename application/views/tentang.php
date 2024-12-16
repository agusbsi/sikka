<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template.">
    <title>SIKKA - Portal Resmi Kabupaten SIKKA</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>utama/assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/timeline/css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/bootstrap/css/bootstrap.min.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/main.css">
    <!-- <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/custom.css"> -->
    <!-- responsive -->
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/owl.carousel.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <nav class="nav-container">
        <div class="nav-logo">
            <img src="<?= base_url('') ?>utama/assets/img/logo_sikka.png" alt="Sikka Logo">
        </div>
        <ul class="nav-menu left-menu">
            <li><a href="<?= base_url('') ?>">Beranda</a></li>
            <li><a href="#pimpinan">Pimpinan</a></li>
            <li><a href="#Kontribusi">Kontribusi Sikka</a></li>
        </ul>
        <ul class="nav-menu right-menu">
            <li><a href="#Visi">Visi & Misi</a></li>
            <li><a href="#Sejarah">Sejarah</a></li>
            <li><a href="#Lambang">Lambang Daerah</a></li>
        </ul>
        <div class="burger-menu">
            <div class="burger-bar"></div>
            <div class="burger-bar"></div>
            <div class="burger-bar"></div>
        </div>
    </nav>

    <!-- hero area -->
    <div class="profile-card">
        <div class="background">
            <img src="<?= base_url('') ?>utama/assets/img/head_profile.jpg" alt="Background Image">
        </div>
        <div class="list-profil">
            <div class="profile-content">
                <div class="profile-picture">
                    <img src="<?= !empty($bupati->foto)
                                    ? base_url('assets/img/bupati/') . $bupati->foto . '?timestamp=' . time()
                                    : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="<?= !empty($bupati->foto) ? $bupati->foto : 'Default Image' ?>">
                </div>
                <div class="profile-info">
                    <h2><?= empty($bupati->bupati) ? "...." : $bupati->bupati ?></h2>
                    <p>( <?= empty($bupati->jabatan) ? "...." : $bupati->jabatan ?> )</p>
                </div>
            </div>
            <?php if ($wakil->wakil) { ?>
                <div class="profile-content">
                    <div class="profile-picture">
                        <img src="<?= !empty($wakil->foto)
                                        ? base_url('assets/img/bupati/') . $wakil->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="<?= !empty($wakil->foto) ? $wakil->foto : 'Default Image' ?>">
                    </div>
                    <div class="profile-info">
                        <h2><?= empty($wakil->wakil) ? "...." : $wakil->wakil ?></h2>
                        <p>( <?= empty($wakil->jabatan) ? "...." : $wakil->jabatan ?> )</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- end hero area -->
    <!-- product section -->
    <section id="pimpinan" class="pt-80 pb-100">
        <div class="product-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3>Pimpinan</h3>
                            <p>Para pejabat di kabupaten SIKKA.</p>
                        </div>
                    </div>
                </div>
                <div class="leaders-grid">
                    <?php foreach ($bupati_all as $bp): ?>
                        <div class="leader-card">
                            <img src="<?= !empty($bp->foto)
                                            ? base_url('assets/img/bupati/') . $bp->foto . '?timestamp=' . time()
                                            : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="<?= $bp->nama ?>" class="leader-image">
                            <div class="leader-name"><?= $bp->nama ?></div>
                            <div class="leader-position"><?= $bp->jabatan ?> </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end product section -->
    <div class="product-section pt-80 pb-100" id="Kontribusi">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Kontribusi Skka.</h3>
                        <p>Kabupaten SIKKA memiliki kontribusi besar untuk negara indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="kontribusi-grid">
                <?php foreach ($berita_all as $ba) : ?>
                    <div class="kontribusi-item">
                        <img src="<?= $ba->jenis == "Foto" && !empty($ba->file)
                                        ? base_url('assets/img/berita/') . $ba->file . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="<?= $ba->judul ?>">
                        <div class="kontribusi-content">
                            <h3><?= $ba->judul ?></h3>
                            <p><?= strlen($ba->konten) > 100 ? substr($ba->konten, 0, 100) . '...' : $ba->konten ?></p>
                            <a href="#" class="btn-lihat">Lihat</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- cart banner section -->
    <section class="cart-banner pt-80 pb-100" id="Visi">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>VISI & MISI</h3>
                    </div>
                </div>
            </div>
            <div class="visiMisi">
                <section class="cardVisi">
                    <h2>Visi</h2>
                    <div class="cardVisi-content">
                        <p><?= $visi->visi ?></p>
                    </div>
                </section>

                <section class="cardVisi">
                    <h2>Misi</h2>
                    <div class="cardVisi-content">
                        <p><?= $visi->misi ?></p>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="cd-h-timeline js-cd-h-timeline margin-bottom-md pt-80 pb-100" id="Sejarah">
        <div class="row mt-80">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Sejarah</h3>
                    <p>Dahulu kabupaten sikka merupakan Onder Afdeling yang kemudian menjelma menjadi "swapraja sikka" ( provinsi sunda kecil). Swapraja Sikka diperintah oleh seorang raja yang memerintah secara turun temurun.</p>
                </div>
            </div>
        </div>
        <div class="cd-h-timeline__container container">
            <div class="cd-h-timeline__dates">
                <div class="cd-h-timeline__line">
                    <ol>
                        <?php foreach ($sejarah as $key => $item): ?>
                            <li>
                                <a href="#event-<?= $key ?>"
                                    data-date="<?= date('d/m/Y', strtotime($item->dibuat)) ?>"
                                    class="cd-h-timeline__date <?= $key === 0 ? 'cd-h-timeline__date--selected' : '' ?>">
                                    (<?= $item->periode ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <span class="cd-h-timeline__filling-line" aria-hidden="true"></span>
                </div>
            </div>

            <ul>
                <li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev cd-h-timeline__navigation--inactive">Prev</a></li>
                <li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next">Next</a></li>
            </ul>
        </div>

        <div class="cd-h-timeline__events">
            <ol>
                <?php foreach ($sejarah as $key => $item): ?>
                    <li id="event-<?= $key ?>"
                        class="cd-h-timeline__event <?= $key === 0 ? 'cd-h-timeline__event--selected' : '' ?> text-component">
                        <div class="cd-h-timeline__event-content container">
                            <h2 class="cd-h-timeline__event-title"><?= htmlspecialchars($item->judul) ?></h2>
                            <em class="cd-h-timeline__event-date"><?= date('F jS, Y', strtotime($item->dibuat)) ?></em>
                            <p class="cd-h-timeline__event-description color-contrast-medium">
                                <?= htmlspecialchars($item->konten) ?>
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>

    </section>
    <section class="cart-banner pt-80 pb-100" id="Lambang">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Lambang Daerah</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="background">
                        <img src="<?= base_url('') ?>utama/assets/img/logo_sikka.png" alt="Background Image">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php foreach ($lambang as $l): ?>
                            <div class="col-md-6">
                                <div class="card-lambang">
                                    <h6><?= $l->judul ?></h6>
                                    <p><?= $l->deskripsi ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end footer -->
    <div class="whatsapp-float">
        <?php
        $phone = $setting->wa;
        $hp = substr($phone, 0, 1);
        if ($hp == 0) {
            $phone = "62" . substr($phone, 1);
        }
        ?>
        <span class="whatsapp-text">Butuh bantuan?</span>
        <a href="https://wa.me/<?= $phone ?>" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; <?= date('Y') ?> - SIKKA, All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/<?= $setting->fb ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.x.com/<?= $setting->x ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/<?= $setting->ig ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.menu-atas');
            if (window.scrollY > 50) { // Jika scroll lebih dari 50px
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        // Toggle the hamburger menu and icon
        document.querySelector('.hamburger').addEventListener('click', function() {
            // Toggle the active class on the hamburger menu
            this.classList.toggle('active');

            // Toggle the show class on the main menu to display it
            document.querySelector('.main-pilihan').classList.toggle('show');

            // Find the icon element inside the hamburger button
            const icon = this.querySelector('i');

            // Toggle the icon class between bars and times
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>

    <script src="<?= base_url('') ?>utama/assets/timeline/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="<?= base_url('') ?>utama/assets/timeline/js/swipe-content.js"></script> <!-- A Vanilla JavaScript plugin to detect touch interactions -->
    <script src="<?= base_url('') ?>utama/assets/timeline/js/main.js"></script>
    <!-- jquery -->
    <script src="<?= base_url('') ?>utama/assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="<?= base_url('') ?>utama/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="<?= base_url('') ?>utama/assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="<?= base_url('') ?>utama/assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="<?= base_url('') ?>utama/assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="<?= base_url('') ?>utama/assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="<?= base_url('') ?>utama/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="<?= base_url('') ?>utama/assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="<?= base_url('') ?>utama/assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="<?= base_url('') ?>utama/assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const burgerMenu = document.querySelector('.burger-menu');
            const navMenus = document.querySelectorAll('.nav-menu');
            const navContainer = document.querySelector('.nav-container');

            burgerMenu.addEventListener('click', function() {
                navMenus.forEach(menu => menu.classList.toggle('active'));
            });

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navContainer.classList.add('scrolledProfile');
                } else {
                    navContainer.classList.remove('scrolledProfile');
                }
            });
        });
    </script>
</body>

</html>