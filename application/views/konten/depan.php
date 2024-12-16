<?php if ($splash): ?>
	<div class="splash-screen" id="splash">
		<button class="close-icon" id="close-splash">&times;</button>
		<img src="<?= base_url('assets/img/splash/' . $splash->gambar) . '?timestamp=' . time() ?>" alt="">
	</div>
<?php endif; ?>

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
		<div class="panel">
			<ul>
				<?php foreach ($layanan as $ly): ?>
					<li class="panel-item">
						<a href="https://<?= $ly->link ?>" class="icon">
							<img src="<?= base_url('assets/img/layanan/') . $ly->gambar . '?timestamp=' . time() ?>" alt="">
							<span><?= $ly->layanan ?></span>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>
<!-- end product section -->
<?php if (!empty($bupati_last->nama)) { ?>
	<!-- cart banner section -->
	<section class="cart-banner pb-100">
		<div class="container">
			<div class="row clearfix">
				<!--Image Column-->
				<div class="col-lg-5">
					<div class="judul">Profil Bupati</div>
					<div class="areaPejabat">
						<?php foreach ($bupati as $b): ?>
							<div class="pejabat">
								<div class="bulat" data-image="<?= base_url('assets/img/bupati/') . $b->foto . '?timestamp=' . time() ?>" data-name="<?= $b->nama ?>" data-jabatan="<?= $b->jabatan ?>" data-desc="<?= $b->deskripsi ?>">
									<img src="<?= base_url('assets/img/bupati/') . $b->foto . '?timestamp=' . time() ?>" alt="<?= $b->nama ?>">
								</div>
								<div class="nama"><?= $b->nama ?></div>
								<div class="jabatan"><?= $b->jabatan ?></div>
							</div>
						<?php endforeach ?>
					</div>
				</div>

				<div class="detailPejabat col-lg-4">
					<img src="<?= base_url('assets/img/bupati/') . $bupati_last->foto . '?timestamp=' . time() ?>" alt="<?= $bupati_last->nama ?>" id="gambarPejabat">
					<div class="info">
						<div class="name" id="namaPejabat"><?= $bupati_last->nama ?></div>
						<div class="desc" id="jabatanPejabat"><?= $bupati_last->jabatan ?></div>
					</div>
				</div>
				<div class="col-lg-3">
					<p class="kutipan" id="kutipanPejabat">"<?= $bupati_last->deskripsi ?>”</p>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<section class="pb-100">
	<div class="container">
		<div class="judul">Event</div>
		<div class="event">
			<div class="content" id="content">
				<h2 id="title">Loading...</h2>
				<p id="description">Sedang memuat data...</p>
				<div class="event-info" id="eventInfo">Event 0 dari 0</div>
			</div>
			<div class="navigation">
				<button class="nav-btn" id="prevBtn" title="Previews"><i class="fas fa-chevron-left"></i></button>
				<button class="nav-btn" id="nextBtn" title="Next"><i class="fas fa-chevron-right"></i></button>
			</div>
			<div class="image-event" id="image" style="background-image: url('https://via.placeholder.com/800x400?text=Default+Event+Image');"></div>
		</div>
	</div>
</section>

<section class="cart-banner" style="padding-top: 50px; padding-bottom: 50px;">
	<div class="container">
		<div class="judul">Terbaru</div>
		<div class="terbaru">
			<?php foreach ($berita_terbaru as $bt): ?>
				<a href="<?= base_url('Utama/berita/' . $bt->id) ?>" class="kartu">
					<div class="kartu-image">
						<img src="<?= $bt->jenis == "Foto" && !empty($bt->file)
										? base_url('assets/img/berita/') . $bt->file . '?timestamp=' . time()
										: 'https://via.placeholder.com/200?text=No+Image' ?>"
							alt="<?= $bt->judul ?>">
					</div>
					<div class="kartu-content">
						<div class="category">
							<span><?= $bt->kategori ?></span>
						</div>
						<h2 class="kartu-title">
							<?= strlen($bt->judul) > 50 ? substr($bt->judul, 0, 50) . '...' : $bt->judul ?>
						</h2>
						<p class="kartu-description">
							<?= strlen($bt->konten) > 100 ? substr($bt->konten, 0, 100) . '...' : $bt->konten ?>
						</p>
						<div class="kartu-footer">
							<img src="https://via.placeholder.com/150/0000FF/808080?text=User+Image" alt="<?= $bt->pembuat ?>" class="author-image">
							<div class="author-info">
								<span class="author-name"><?= $bt->pembuat ?></span>
								<span class="post-time"><?= date('d M Y H:i:s', strtotime($bt->dibuat)) ?></span>
							</div>
						</div>
					</div>
				</a>

			<?php endforeach ?>
		</div>
		<div class="logo-carousel-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="logo-carousel-inner">
							<?php foreach ($berita_all as $all): ?>
								<a href="<?= base_url('Utama/berita/' . $bt->id) ?>" class="berita">
									<div class="berita-image">
										<img src="<?= $all->jenis == "Foto" && !empty($all->file)
														? base_url('assets/img/berita/') . $all->file . '?timestamp=' . time()
														: 'https://via.placeholder.com/200?text=No+Image' ?>"
											alt="<?= $all->judul ?>">
									</div>
									<div class="berita-content">
										<h2 class="berita-title">
											<?= strlen($all->judul) > 50 ? substr($all->judul, 0, 50) . '...' : $all->judul ?>
										</h2>
										<div class="berita-footer">
											<span class="author-name"><?= $all->pembuat ?></span>
											<span class="post-time"><?= date('d M Y H:i:s', strtotime($all->dibuat)) ?></span>
										</div>
									</div>
								</a>

							<?php endforeach ?>
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
						<a href="https://www.lapor.go.id/" target="_blank" class="report-button">Lapor</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<!-- latest news -->
<div class="latest-news pb-100">
	<div class="container">
		<?php
		function convertToEmbed($url)
		{
			$parsedUrl = parse_url($url);
			if (strpos($parsedUrl['host'], 'youtube.com') !== false) {
				parse_str($parsedUrl['query'], $queryParams);
				return 'https://www.youtube.com/embed/' . $queryParams['v'];
			}
			return $url;
		}
		?>

		<div class="judul">Objek Wisata</div>
		<div class="gallery">
			<?php foreach ($wisata as $w): ?>
				<div class="gallery-item">
					<?php if ($w->jenis == "Foto") { ?>
						<img src="<?= base_url('assets/img/wisata/') . $w->konten ?>?timestamp=<?= time(); ?>" alt="<?= $w->nama ?>">
					<?php } elseif ($w->jenis == "Video") { ?>
						<video autoplay muted loop>
							<source src="<?= base_url('assets/img/wisata/') . $w->konten ?>?timestamp=<?= time(); ?>" type="video/mp4">
						</video>
					<?php } elseif ($w->jenis == "Link") { ?>
						<iframe
							width="560"
							height="315"
							src="<?= convertToEmbed($w->konten) ?>"
							frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen>
						</iframe>

					<?php } ?>
					<a href="#"><?= $w->nama ?></a>
				</div>
			<?php endforeach ?>
		</div>

	</div>
</div>