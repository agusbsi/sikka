<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template.">
	<title>SIKKA - Portal Resmi Kabupaten SIKKA</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>utama/assets/img/favicon.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('') ?>utama/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="<?= base_url('') ?>utama/assets/css/main.css">
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

	<!-- header -->
	<div class="menu-atas">
		<div class="site-logo">
			<a href="#">
				<img src="<?= base_url('') ?>utama/assets/img/logo_sikka.png?timestamp=<?php echo time(); ?>" alt="sikka 2024">
				<h3>SIKKA</h3>
			</a>
		</div>
		<nav class="main-pilihan">
			<ul>
				<li><a href="#" class="menu-item">Beranda</a></li>
				<li><a href="./profil.html" class="menu-item">Tentang SIKKA <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="#">Sejarah SIKKA</a></li>
						<li><a href="#">Lambang Daerah</a></li>
						<li><a href="#">Visi Misi</a></li>
						<li><a href="#">Profil Pimpinan</a></li>
						<li><a href="#">Geografis</a></li>
					</ul>
				</li>
				<li><a href="./profil.html" class="menu-item">Kelembagaan <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="#">Dinas</a></li>
						<li><a href="#">Sekretariat Daerah</a></li>
						<li><a href="#">Kecamatan</a></li>
						<li><a href="#">Kelurahan</a></li>
						<li><a href="#">Desa</a></li>
					</ul>
				</li>
				<li><a href="#" class="menu-item">Publikasi <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="pasar.html">Harga Pasar</a></li>
						<li><a href="#">Berita</a></li>
						<li><a href="#">Agenda</a></li>
						<li><a href="#">Pengumuman</a></li>
						<li><a href="#">Dokumen Public</a></li>
					</ul>
				</li>
				<li><a href="#" class="menu-item">Layanan <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="#">Pendidikan</a></li>
						<li><a href="#">Kesehatan</a></li>
						<li><a href="#">Kependudukan</a></li>
						<li><a href="#">Perizinan</a></li>
						<li><a href="#">Pariwisata</a></li>
						<li><a href="#">Laporan Keuangan</a></li>
						<li><a href="#">PPID</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<div class="search-container">
			<input type="search" class="pencarian" placeholder="Cari...">
			<i class="fas fa-search search-icon"></i>
		</div>

		<div class="hamburger-menu">
			<a href="#" class="hamburger"><i class="fas fa-bars"></i></a>
		</div>
	</div>
	<!-- end header -->

	<!-- hero area -->
	<div class="hero-bg">
		<video autoplay muted loop id="hero-video">
			<source src="<?= base_url('') ?>utama/assets/img/sikka_2024.mp4" type="video/mp4">
		</video>
	</div>
	<!-- end hero area -->
	<!-- product section -->
	<div class="product-section mt-80 mb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Layanan</h3>
						<p>Pemerintahan kabupaten sikka, melayani sepenuh hati.</p>
					</div>
				</div>
			</div>
			<!-- <div class="areaMenu">
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/kependudukan.png" alt="">
					<strong> Kependudukan </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/kesehatan.png" alt="">
					<strong> Kesehatan </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/pendidikan.png" alt="">
					<strong> Pendidikan </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/perizinan.png" alt="">
					<strong> Perizinan </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/pengaduan.png" alt="">
					<strong> Pengaduan Masyarakat </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/ppid.png" alt="">
					<strong> PPID </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/jdihn.png" alt="">
					<strong> Informasi Hukum </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/apbd.png" alt="">
					<strong> Informasi APBD </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/pembangunan.png" alt="">
					<strong> Monitoring Pembangunan </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/pertanian.png" alt="">
					<strong> Pertanian </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/kominfo.png" alt="">
					<strong> Komunikasi dan Informatika </strong>
				</a>
				<a href="#" class="cardMenu">
					<img src="<?= base_url('') ?>utama/assets/img/custom/perhubungan.png" alt="">
					<strong> Perhubungan</strong>
				</a>
			</div> -->
			<div class="panel">
				<ul>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/kependudukan.png" alt="">
							<span>Kependudukan</span>
						</a>

					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/kesehatan.png" alt="">
							<span>Kesehatan</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/pendidikan.png" alt="">
							<span>Pendidikan</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/perizinan.png" alt="">
							<span>Perizinan</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/kependudukan.png" alt="">
							<span>Layanan</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/pengaduan.png" alt="">
							<span>Lapor</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/ppid.png" alt="">
							<span>PPID</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/jdihn.png" alt="">
							<span>Informasi hukum</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/apbd.png" alt="">
							<span>Informasi APBD</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/pembangunan.png" alt="">
							<span>Monitoring Pembangunan</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/pertanian.png" alt="">
							<span>Pertanian</span>
						</a>
					</li>
					<li class="panel-item">
						<a href="#" class="icon">
							<img src="<?= base_url('') ?>utama/assets/img/custom/perhubungan.png" alt="">
							<span>Perhubungan</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pb-100">
		<div class="container">
			<div class="row clearfix">
				<!--Image Column-->
				<div class="col-lg-5">
					<div class="judul">Profil Bupati</div>
					<div class="areaPejabat">
						<div class="pejabat">
							<div class="bulat aktif" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat.png" data-name="Adrianus F. Parera" data-desc="Penjabat Bupati Sikka yang sering disapa Alvin Parera ini adalah Sekda Sikka yang ditunjuk Presiden RI menjadi Penjabat Bupati.">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat.png" alt="bulat">
							</div>
							<div class="nama">Adrianus F. Parera</div>
							<div class="jabatan">Pj. Bupati Sikka</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/Fransiskus_Roberto_Diogo.jpg" data-name="F. Roberto Diogo" data-desc=" Deskripsi Bupati ke-11 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/Fransiskus_Roberto_Diogo.jpg" alt="bulat">
							</div>
							<div class="nama">F. Roberto Diogo</div>
							<div class="jabatan">Bupati Ke-11</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Y. Ansar Rera" data-desc="Bupati Ke-10 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Y. Ansar Rera</div>
							<div class="jabatan">Bupati Ke-10</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/sosimus.jpg" data-name="Sosimus Mitang" data-desc="Bupati Ke-9 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/sosimus.jpg" alt="bulat">
							</div>
							<div class="nama">Sosimus Mitang</div>
							<div class="jabatan">Bupati Ke-9</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/Alexander_Longginus_Bupati_Sikka.png" data-name="Alexander Longginus" data-desc="Bupati Ke-8 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/Alexander_Longginus_Bupati_Sikka.png" alt="bulat">
							</div>
							<div class="nama">Alexander Longginus</div>
							<div class="jabatan">Bupati Ke-8</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/Paulus Moa.jpg" data-name="Paulus Moa" data-desc="Bupati Ke-7 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/Paulus Moa.JPG" alt="bulat">
							</div>
							<div class="nama">Paulus Moa</div>
							<div class="jabatan">Bupati Ke-7</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Alexander Idong" data-desc="Bupati Ke-6 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Alexander Idong</div>
							<div class="jabatan">Bupati Ke-6</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Avelinus Maschur" data-desc="Bupati Ke-5 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Avelinus Maschur</div>
							<div class="jabatan">Bupati Ke-5</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/DanielWoda.jpg" data-name="Daniel Woda" data-desc="Bupati Ke-4 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/DanielWoda.jpg" alt="bulat">
							</div>
							<div class="nama">Daniel Woda</div>
							<div class="jabatan">Bupati Ke-4</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Laurentius Say" data-desc="Bupati Ke-3 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Laurentius Say</div>
							<div class="jabatan">Bupati Ke-3</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Paulus Samador" data-desc="Bupati Ke-2 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Paulus Samador</div>
							<div class="jabatan">Bupati Ke-2</div>
						</div>
						<div class="pejabat">
							<div class="bulat" data-image="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" data-name="Don Paulus" data-desc="Bupati Ke-1 Kabupaten SIKKA">
								<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat_kosong.png" alt="bulat">
							</div>
							<div class="nama">Don Paulus</div>
							<div class="jabatan">Bupati Ke-1</div>
						</div>
					</div>
				</div>
				<div class="detailPejabat col-lg-4">
					<img src="<?= base_url('') ?>utama/assets/img/custom/pejabat.png" alt="Gambar Pejabat" id="gambarPejabat">
					<div class="info">
						<div class="name" id="namaPejabat">Adrianus F. Parera</div>
						<div class="desc" id="descPejabat">PJ. Bupati Kabupaten SIKKA</div>
					</div>
				</div>
				<div class="col-lg-3">
					<p class="kutipan">"Mengembangkan Kabupaten tidak
						hanya membangun fisiknya, tapi
						terutama adalah bagaimana kerekatan
						sosialnya, interaksi antar warganya,
						bagaimana Kabupaten tersebut menjadi
						tempat yang layak huni, humanis, dan
						liveable. Kami memohon dukungan dari
						semua lapisan masyarakat sehingga
						Kabupaten Sikka menjadi Kabupaten
						yang inklusif, hijau, dan berkelanjutan,
						dikembangkan untuk semua kalangan,
						a regency for all.”</p>
				</div>
			</div>
		</div>
	</section>
	<section class="pb-100">
		<div class="container">
			<div class="judul">Event</div>
			<div class="event">
				<div class="content" id="content">
					<h2 id="title">Festival Bale Nagi 2024</h2>
					<p id="description">
						Festival Bale Nagi 2024 berlangsung pada 2 sampai 6 April 2024 dengan mengangkat tema
						“Mari Torang Sesama Bua Bae Nagi Tana” yang berarti “Mari bersama membangun kampung halaman kita”.
					</p>
					<a href="#" class="btn">Selengkapnya <i class="fas fa-arrow-right"></i></a>
					<div class="event-info" id="eventInfo">Event 1 dari 3</div>
				</div>
				<div class="navigation">
					<button class="nav-btn" id="prevBtn" title="Previews"><i class="fas fa-chevron-left"></i></button>
					<button class="nav-btn" id="nextBtn" title="Next"><i class="fas fa-chevron-right"></i></button>
				</div>
				<div class="image-event" id="image" style="background-image: url('<?= base_url('') ?>utama/assets/img/custom/event4.webp');"></div>

			</div>
		</div>
	</section>
	<section class="cart-banner" style="padding-top: 50px; padding-bottom: 50px;">
		<div class="container">
			<div class="judul">Terbaru</div>
			<div class="terbaru">
				<a href="#" class="kartu">
					<div class="kartu-image">
						<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
					</div>
					<div class="kartu-content">
						<div class="category">
							<span>Pengumuman</span>
						</div>
						<h2 class="kartu-title">What's New In 2022 Tech</h2>
						<p class="kartu-description">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!
						</p>
						<div class="kartu-footer">
							<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Jane Doe" class="author-image">
							<div class="author-info">
								<span class="author-name">Jane Doe</span>
								<span class="post-time">2h ago</span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="kartu">
					<div class="kartu-image">
						<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
					</div>
					<div class="kartu-content">
						<div class="category">
							<span>Pengumuman</span>
						</div>
						<h2 class="kartu-title">What's New In 2022 Tech</h2>
						<p class="kartu-description">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!
						</p>
						<div class="kartu-footer">
							<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Jane Doe" class="author-image">
							<div class="author-info">
								<span class="author-name">Jane Doe</span>
								<span class="post-time">2h ago</span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="kartu">
					<div class="kartu-image">
						<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
					</div>
					<div class="kartu-content">
						<div class="category">
							<span>Pengumuman</span>
						</div>
						<h2 class="kartu-title">What's New In 2022 Tech</h2>
						<p class="kartu-description">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!
						</p>
						<div class="kartu-footer">
							<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Jane Doe" class="author-image">
							<div class="author-info">
								<span class="author-name">Jane Doe</span>
								<span class="post-time">2h ago</span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="kartu">
					<div class="kartu-image">
						<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
					</div>
					<div class="kartu-content">
						<div class="category">
							<span>Pengumuman</span>
						</div>
						<h2 class="kartu-title">What's New In 2022 Tech</h2>
						<p class="kartu-description">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!
						</p>
						<div class="kartu-footer">
							<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Jane Doe" class="author-image">
							<div class="author-info">
								<span class="author-name">Jane Doe</span>
								<span class="post-time">2h ago</span>
							</div>
						</div>
					</div>
				</a>

			</div>
			<div class="logo-carousel-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="logo-carousel-inner">
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/galeri3.jpg" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/galeri2.jpg" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/galeri5.webp" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/event1.png" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
								<a href="#" class="berita">
									<div class="berita-image">
										<img src="<?= base_url('') ?>utama/assets/img/custom/galeri3.jpg" alt="Person working on laptop">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">What's New In 2022 Tech</h2>
										<div class="berita-footer">
											<span class="author-name">Jane Doe</span>
											<span class="post-time">2h ago</span>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<section>
				<div class="container">
					<div class="report-container">
						<div class="box">
							<div class="report-text">
								Laporkan temuan Anda apabila terdapat indikasi pelanggaran dalam Pemerintahan Kabupaten Sikka
							</div>
							<button class="report-button">Lapor</button>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
	<!-- latest news -->
	<div class="latest-news pb-100">
		<div class="container">
			<div class="judul">Objek Wisata</div>
			<div class="gallery">
				<div class="gallery-item">
					<video autoplay muted loop>
						<source src="<?= base_url('') ?>utama/assets/img/sikka_2024.mp4" type="video/mp4">
					</video>
					<a href="#">Profil</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri2.jpg" alt="Image 2">
					<a href="#">Pantai</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri3.jpg" alt="Image 3">
					<a href="#">Pelantikan</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri4.jpg" alt="Image 4">
					<a href="#">Paskibra</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri5.webp" alt="Image 5">
					<a href="#">Pantai</a>
				</div>
				<div class="gallery-item">
					<video autoplay muted loop>
						<source src="<?= base_url('') ?>utama/assets/img/sikka_2024.mp4" type="video/mp4">
					</video>
					<a href="#">Video wisata</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri7.jpg" alt="Image 7">
					<a href="#">Rumah Adat</a>
				</div>
				<div class="gallery-item">
					<video autoplay muted loop>
						<source src="<?= base_url('') ?>utama/assets/img/wisata_sikka.mp4" type="video/mp4">
					</video>
					<a href="#">Wisata 2</a>
				</div>
				<div class="gallery-item">
					<img src="<?= base_url('') ?>utama/assets/img/custom/galeri6.webp" alt="Image 9">
					<a href="#">Batik</a>
				</div> <!-- Pindahkan elemen keempat dari baris keempat ke sini -->
			</div>
		</div>
	</div>

	<!-- end latest news -->
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6">
					<div class="footer-box about-widget">
						<img src="<?= base_url('') ?>utama/assets/img/sikka_putih.png" alt="" style="width: 200px; height: auto; margin-bottom: 20px;">
						<p>Jl. El Tari - Maumere
							Kode Pos : 86112
							Phone : (0382) 2400890
							Email : humaspemkabsikka@gmail.com</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Menu</h2>
						<ul>
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Profil SIKKA</a></li>
							<li><a href="#">Satu Data</a></li>
							<li><a href="#">Kontak</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pengunjung">
						<div class="pengunjung-header">
							<i class="fas fa-users"></i> Data Pengunjung
						</div>
						<div class="pengunjung-content">
							<div class="data-item">
								<p>Hari ini</p>
								<p class="value" id="hari"></p>
							</div>
							<div class="data-item">
								<p>Bulan ini</p>
								<p class="value" id="bulan"></p>
							</div>
							<div class="data-item">
								<p>Tahun ini</p>
								<p class="value" id="tahun"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	<div class="whatsapp-float">
		<span class="whatsapp-text">Butuh bantuan?</span>
		<a href="https://wa.me/6283892010575" target="_blank">
			<i class="fab fa-whatsapp"></i>
		</a>
	</div>

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 - SIKKA, All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
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
	<script>
		document.querySelectorAll('.bulat').forEach(item => {
			item.addEventListener('click', function() {
				// Hapus class 'aktif' dari semua elemen '.bulat'
				document.querySelectorAll('.bulat').forEach(el => el.classList.remove('aktif'));

				// Tambahkan class 'aktif' pada elemen yang diklik
				this.classList.add('aktif');

				// Ambil data dari atribut
				const image = this.getAttribute('data-image');
				const name = this.getAttribute('data-name');
				const desc = this.getAttribute('data-desc');

				// Tampilkan data di elemen dengan class info
				document.getElementById('gambarPejabat').src = image || '<?= base_url('') ?>utama/assets/img/custom/pejabat.png';
				document.getElementById('namaPejabat').textContent = name || '';
				document.getElementById('descPejabat').textContent = desc || '';
			});
		});


		const data = [{
				title: "Festival Bale Nagi 2024",
				description: "Festival Bale Nagi 2024 berlangsung pada 2 sampai 6 April 2024 dengan mengangkat tema “Mari Torang Sesama Bua Bae Nagi Tana” yang berarti “Mari bersama membangun kampung halaman kita”.",
				image: "<?= base_url('') ?>utama/assets/img/custom/event4.webp"
			},
			{
				title: "Event Kedua",
				description: "Deskripsi event kedua di sini. Acara ini berlangsung pada 10 Mei 2024 dengan tema yang berbeda.",
				image: "<?= base_url('') ?>utama/assets/img/custom/event_2021.jpg"
			},
			{
				title: "Event Ketiga",
				description: "Deskripsi event ketiga di sini. Acara ini berlangsung pada 20 Juni 2024 dengan tema yang berbeda.",
				image: "<?= base_url('') ?>utama/assets/img/custom/event_2022.jpg"
			},
			{
				title: "Event Keempat",
				description: "Deskripsi event ketiga di sini. Acara ini berlangsung pada 20 Juni 2024 dengan tema yang berbeda.",
				image: "<?= base_url('') ?>utama/assets/img/custom/event_2023.jpg"
			}
		];


		let currentIndex = 0;

		function updateContent(index) {
			const contentElement = document.getElementById('content');
			const imageElement = document.getElementById('image');
			const eventInfoElement = document.getElementById('eventInfo');
			document.getElementById('title').textContent = data[index].title;
			document.getElementById('description').textContent = data[index].description;
			imageElement.style.backgroundImage = `url(${data[index].image})`;
			eventInfoElement.textContent = `Event ${index + 1} dari ${data.length}`;
		}

		document.getElementById('prevBtn').addEventListener('click', function() {
			currentIndex = (currentIndex > 0) ? currentIndex - 1 : data.length - 1;
			updateContent(currentIndex);
		});

		document.getElementById('nextBtn').addEventListener('click', function() {
			currentIndex = (currentIndex < data.length - 1) ? currentIndex + 1 : 0;
			updateContent(currentIndex);
		});

		// Inisialisasi tampilan pertama
		updateContent(currentIndex);
		document.querySelectorAll('nav.main-menu li').forEach(function(item) {
			item.addEventListener('mouseenter', function() {
				item.classList.add('hover');
				item.classList.remove('leave');
			});

			item.addEventListener('mouseleave', function() {
				item.classList.remove('hover');
				item.classList.add('leave');
			});
		});
	</script>


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
		$(document).ready(function() {
			// Memuat data pengunjung saat halaman dimuat
			$.ajax({
				url: 'https://spl.digitalbwi.io/Login/get_pengunjung', // Pastikan URL sesuai dengan controller Anda
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					// Menampilkan data pengunjung ke elemen HTML
					$('#hari').text(response.hari);
					$('#bulan').text(response.bulan);
					$('#tahun').text(response.tahun);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("Error mengambil data pengunjung: ", textStatus, errorThrown);
				}
			});

			// Mendapatkan IP pengunjung dari eksternal API
			$.getJSON('https://api.ipify.org?format=json', function(data) {
				let ip = data.ip; // Mendapatkan IP pengunjung

				// Mengirim data pengunjung baru dengan IP saat halaman dimuat
				$.ajax({
					url: 'https://spl.digitalbwi.io/Login/save_pengunjung',
					type: 'POST',
					data: {
						ip_address: ip
					}, // Kirim data IP ke server
					success: function(response) {},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log("Error menyimpan data pengunjung: ", textStatus, errorThrown);
					}
				});
			});
		});
	</script>
</body>

</html>