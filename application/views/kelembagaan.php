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
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 kolom untuk layar besar (laptop) */
            gap: 20px;
            /* Jarak antar card */
            margin: 20px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .city-name {
            font-size: 15px;
            font-weight: bold;
            margin: 0 0 10px 0;
            color: #333;
        }

        .info {
            font-size: 12px;
            color: #666;
            margin: 5px 0;
        }

        .info i {
            width: 20px;
            margin-right: 5px;
        }

        /* Responsif untuk tampilan HP */
        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                /* 2 kolom untuk layar kecil (HP) */
            }
        }
    </style>

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
            <li><a href="#Dinas">Dinas</a></li>
            <li><a href="#Sekretariat">Sekretariat Daerah</a></li>
        </ul>
        <ul class="nav-menu right-menu">
            <li><a href="#Kecamatan">Kecamatan</a></li>
            <li><a href="#Kelurahan">Kelurahan</a></li>
            <li><a href="#Desa">Desa</a></li>
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
        <div class="profile-content">
            <div class="profile-picture">
                <img src="<?= !empty($bupati->foto)
                                ? base_url('assets/img/bupati/') . $bupati->foto . '?timestamp=' . time()
                                : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="<?= !empty($bupati->foto) ? $bupati->foto : 'Default Image' ?>">
            </div>
            <div class="profile-info">
                <h2><?= $bupati->bupati ?></h2>
                <p>( <?= $bupati->jabatan ?> )</p>
            </div>
        </div>
    </div>

    <!-- end hero area -->
    <!-- product section -->
    <div id="Dinas" class="product-section pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Dinas</h3>
                        <p>Semua dinas di kabupaten SIKKA.</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <?php foreach ($dinas as $d): ?>
                    <div class="card">
                        <img src="<?= !empty($d->foto)
                                        ? base_url('assets/img/kelembagaan/') . $d->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="City Image" class="card-image">
                        <div class="card-content">
                            <h2 class="city-name"><?= $d->nama ?></h2>
                            <p class="info"><i>📍</i> <?= $d->alamat ?></p>
                            <p class="info"><i>📞</i> <?= $d->telp ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <!-- end product section -->
    <div id="Sekretariat" class="product-section pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Sekretariat Daerah</h3>
                        <p>Semua Sekretariat Daerah di kabupaten SIKKA.</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <?php foreach ($sekretariat as $d): ?>
                    <div class="card">
                        <img src="<?= !empty($d->foto)
                                        ? base_url('assets/img/kelembagaan/') . $d->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="City Image" class="card-image">
                        <div class="card-content">
                            <h2 class="city-name"><?= $d->nama ?></h2>
                            <p class="info"><i>📍</i> <?= $d->alamat ?></p>
                            <p class="info"><i>📞</i> <?= $d->telp ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <div id="Kecamatan" class="product-section pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Kecamatan</h3>
                        <p>Semua Kecamatan di kabupaten SIKKA.</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <?php foreach ($kecamatan as $d): ?>
                    <div class="card">
                        <img src="<?= !empty($d->foto)
                                        ? base_url('assets/img/kelembagaan/') . $d->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="City Image" class="card-image">
                        <div class="card-content">
                            <h2 class="city-name"><?= $d->nama ?></h2>
                            <p class="info"><i>📍</i> <?= $d->alamat ?></p>
                            <p class="info"><i>📞</i> <?= $d->telp ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <div id="Kelurahan" class="product-section pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Kelurahan</h3>
                        <p>Semua kelurahan di kabupaten SIKKA.</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <?php foreach ($kelurahan as $d): ?>
                    <div class="card">
                        <img src="<?= !empty($d->foto)
                                        ? base_url('assets/img/kelembagaan/') . $d->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="City Image" class="card-image">
                        <div class="card-content">
                            <h2 class="city-name"><?= $d->nama ?></h2>
                            <p class="info"><i>📍</i> <?= $d->alamat ?></p>
                            <p class="info"><i>📞</i> <?= $d->telp ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <div id="Desa" class="product-section pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Desa</h3>
                        <p>Semua desa di kabupaten SIKKA.</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <?php foreach ($desa as $d): ?>
                    <div class="card">
                        <img src="<?= !empty($d->foto)
                                        ? base_url('assets/img/kelembagaan/') . $d->foto . '?timestamp=' . time()
                                        : 'https://via.placeholder.com/200?text=No+Image' ?>" alt="City Image" class="card-image">
                        <div class="card-content">
                            <h2 class="city-name"><?= $d->nama ?></h2>
                            <p class="info"><i>📍</i> <?= $d->alamat ?></p>
                            <p class="info"><i>📞</i> <?= $d->telp ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>

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