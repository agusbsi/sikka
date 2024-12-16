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
	<style>
		.splash-screen {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: rgba(0, 0, 0, 0.7);
			z-index: 1000;
		}

		.splash-screen img {
			width: 90%;
			max-width: 550px;
			height: auto;
			border-radius: 10px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
		}

		.close-icon {
			position: absolute;
			top: 16%;
			right: 27%;
			transform: translate(50%, -50%);
			background: #fff;
			color: #000;
			border: none;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
			cursor: pointer;
			z-index: 1001;
		}

		.hidden {
			display: none;
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
	<!-- header -->
	<div class="menu-atas">
		<div class="site-logo">
			<a href="<?= base_url('') ?>">
				<img src="<?= base_url('assets/img/') . $setting->logo . '?timestamp=' . time() ?>" alt="sikka 2024">
				<h3><?= $setting->nama ?></h3>
			</a>
		</div>
		<nav class="main-pilihan">
			<ul>
				<li><a href="<?= base_url('') ?>" class="menu-item">Beranda</a></li>
				<li><a class="menu-item">Tentang SIKKA <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="<?= base_url('Utama/tentang') ?>">Profil Pimpinan</a></li>
						<li><a href="<?= base_url('Utama/tentang#Kontribusi') ?>">Kontribusi SIKKA</a></li>
						<li><a href="<?= base_url('Utama/tentang#Visi') ?>">Visi Misi</a></li>
						<li><a href="<?= base_url('Utama/tentang#Sejarah') ?>">Sejarah SIKKA</a></li>
						<li><a href="<?= base_url('Utama/tentang#Lambang') ?>">Lambang Daerah</a></li>
					</ul>
				</li>
				<li><a class="menu-item">Kelembagaan <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="<?= base_url('Utama/kelembagaan#Dinas') ?>">Dinas</a></li>
						<li><a href="<?= base_url('Utama/kelembagaan#Sekretariat') ?>">Sekretariat Daerah</a></li>
						<li><a href="<?= base_url('Utama/kelembagaan#Kecamatan') ?>">Kecamatan</a></li>
						<li><a href="<?= base_url('Utama/kelembagaan#Kelurahan') ?>">Kelurahan</a></li>
						<li><a href="<?= base_url('Utama/kelembagaan#Desa') ?>">Desa</a></li>
					</ul>
				</li>
				<li><a href="#" class="menu-item">Publikasi <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<li><a href="<?= base_url('Utama/harga_pasar') ?>">Harga Pasar</a></li>
						<li><a href="<?= base_url('Utama/berita_all') ?>">Berita</a></li>
						<li><a href="<?= base_url('Utama/pengumuman') ?>">Pengumuman</a></li>
						<li><a href="<?= base_url('Utama/dokumen') ?>">Dokumen Publik</a></li>
					</ul>
				</li>
				<li><a href="#" class="menu-item">Layanan <i class="fas fa-chevron-down"></i></a>
					<ul class="sub-pilihan">
						<?php foreach ($layanan as $lmenu): ?>
							<li><a href="https://<?= $lmenu->link ?>"><?= $lmenu->layanan ?></a></li>
						<?php endforeach ?>
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

	<?= $contents ?>

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6">
					<div class="footer-box about-widget">
						<img src="<?= base_url('assets/img/') . $setting->logo . '?timestamp=' . time() ?>" alt="" style="width: 100px; height: auto; margin-bottom: 20px;">
						<p>Alamat Kantor : <br><?= $setting->alamat ?></p>
						<p>Telp: <br><?= $setting->telp ?></p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Menu</h2>
						<ul>
							<li><a href="<?= base_url('') ?>">Beranda</a></li>
							<li><a href="<?= base_url('Utama/tentang#pimpinan') ?>">Profil SIKKA</a></li>
							<li><a href="<?= base_url('Utama/kelembagaan#Dinas') ?>">Kelembagaan</a></li>
							<li><a href="<?= base_url('Utama/lapor') ?>">Lapor</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pengunjung">
						<div class="pengunjung-header">
							<i class="fas fa-users"></i> Data Pengunjung
						</div>
						<div id="histats_counter"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
					<p>Copyrights &copy; 2024 - SIKKA, All Rights Reserved.</p>
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
		let currentIndex = 0; // Pindahkan ini ke atas
		let data = [];

		// Fetch data from the server
		async function fetchEvents() {
			try {
				const response = await fetch('<?= base_url('Utama/getEvents') ?>');
				data = await response.json();
				if (data.length > 0) {
					updateContent(currentIndex);
				}
			} catch (error) {
				console.error('Error fetching events:', error);
			}
		}

		function updateContent(index) {
			const titleElement = document.getElementById('title');
			const descriptionElement = document.getElementById('description');
			const imageElement = document.getElementById('image');
			const eventInfoElement = document.getElementById('eventInfo');

			if (data[index]) {
				titleElement.textContent = data[index].nama;
				descriptionElement.textContent = data[index].konten;
				imageElement.style.backgroundImage = `url(${data[index].foto ? '<?= base_url("assets/img/event/") ?>' + data[index].foto : 'https://via.placeholder.com/800x400?text=Default+Event+Image'})`;
				eventInfoElement.textContent = `Event ${index + 1} dari ${data.length}`;
			}
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
		fetchEvents();

		document.querySelectorAll('.bulat').forEach(item => {
			item.addEventListener('click', function() {
				// Hapus class 'aktif' dari semua elemen '.bulat'
				document.querySelectorAll('.bulat').forEach(el => el.classList.remove('aktif'));

				// Tambahkan class 'aktif' pada elemen yang diklik
				this.classList.add('aktif');

				// Ambil data dari atribut
				const image = this.getAttribute('data-image');
				const name = this.getAttribute('data-name');
				const jabatan = this.getAttribute('data-jabatan');
				const desc = this.getAttribute('data-desc');

				// Tampilkan data di elemen dengan class info
				document.getElementById('gambarPejabat').src = image || 'https://via.placeholder.com/150?text=Default+Image';
				document.getElementById('namaPejabat').textContent = name || '';
				document.getElementById('jabatanPejabat').textContent = jabatan || '';
				document.getElementById('kutipanPejabat').textContent = desc || '';
			});
		});

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
	<script>
		window.addEventListener('load', function() {
			const splash = document.getElementById('splash');
			const mainContent = document.getElementById('main-content');
			const closeSplash = document.getElementById('close-splash');

			closeSplash.addEventListener('click', () => {
				splash.style.display = 'none';
				mainContent.classList.remove('hidden');
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
	<!-- Include JS Bootstrap 5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Include JS DataTables -->
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<!-- DataTables Bootstrap Integration -->
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			// Inisialisasi DataTable
			$('#dokumenTable').DataTable({
				"language": {
					"search": "Cari:",
					"lengthMenu": "Tampilkan _MENU_ entri",
					"info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
					"paginate": {
						"previous": "Sebelumnya",
						"next": "Berikutnya"
					}
				}
			});
		});
	</script>
	<!-- splash screen -->

	<!-- Histats.com  START  (aync)-->
	<script type="text/javascript">
		var _Hasync = _Hasync || [];
		_Hasync.push(['Histats.start', '1,4914614,4,432,112,75,00011111']);
		_Hasync.push(['Histats.fasi', '1']);
		_Hasync.push(['Histats.track_hits', '']);
		(function() {
			var hs = document.createElement('script');
			hs.type = 'text/javascript';
			hs.async = true;
			hs.src = ('//s10.histats.com/js15_as.js');
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
		})();
	</script>
	<noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4914614&101" alt="" border="0"></a></noscript>
	<!-- Histats.com  END  -->
</body>

</html>