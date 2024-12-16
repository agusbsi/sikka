  <head><!-- Open Graph Meta Tags -->
      <meta property="og:title" content="<?= $berita->judul ?>" />
      <meta property="og:description" content="<?= substr(strip_tags($berita->konten), 0, 150) ?>..." />
      <meta property="og:image" content="<?= base_url('assets/img/berita/' . $berita->file) ?>" />
      <meta property="og:url" content="<?= current_url() ?>" />
      <meta property="og:type" content="article" />

      <!-- Twitter Card Tags -->
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content="<?= $berita->judul ?>" />
      <meta name="twitter:description" content="<?= substr(strip_tags($berita->konten), 0, 150) ?>..." />
      <meta name="twitter:image" content="<?= base_url('assets/img/berita/' . $berita->file) ?>" />
      <meta name="twitter:url" content="<?= current_url() ?>" />

      <style>
          .popular-news {
              background: #fff;
              border-radius: 8px;
              padding: 15px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          }

          .popular-news h5 {
              margin-bottom: 15px;
              color: #333;
          }

          .popular-news .popular-item {
              margin-bottom: 15px;
              display: flex;
              gap: 10px;
          }

          .popular-news .popular-item img {
              width: 80px;
              height: 80px;
              object-fit: cover;
              border-radius: 4px;
          }

          .popular-news .popular-item .details {
              flex-grow: 1;
          }

          .popular-news .popular-item h6 {
              margin: 0 0 5px;
              font-size: 14px;
              color: #333;
          }

          .popular-news .popular-item p {
              margin: 0;
              font-size: 12px;
              color: #666;
          }
      </style>
  </head>
  <div class="mt-150 mb-150">
      <div class="container">
          <div class="row">
              <div class="col-lg-9">
                  <div class="single-article-section">
                      <div class="single-article-text">
                          <?php if ($berita->file && $berita->jenis == 'Foto'): ?>
                              <img src="<?= base_url('assets/img/berita/' . $berita->file) ?>"
                                  alt="<?= $berita->judul ?>"
                                  class="rounded"
                                  style="width:100%; max-height:400px; object-fit:cover;">
                          <?php elseif ($berita->file && $berita->jenis == 'Video'): ?>
                              <video controls style="width:100%; max-height:500px;">
                                  <source src="<?= base_url('assets/img/berita/' . $berita->file) ?>" type="video/mp4">
                                  Browser Anda tidak mendukung tag video.
                              </video>
                          <?php else: ?>
                              <img src="https://via.placeholder.com/800x400?text=No+Image+Available"
                                  alt="No Image"
                                  class="rounded"
                                  style="width:100%; max-height:500px; object-fit:cover;">
                          <?php endif; ?>
                          <p class="blog-meta">
                              <span class="author"><i class="fas fa-user"></i> <?= $berita->pembuat ?></span>
                              <span class="date"><i class="fas fa-calendar"></i> <?= date('d M Y  H:i:s', strtotime($berita->dibuat)) ?></span>
                              <span><i class="fas fa-eye"></i>dibaca : <?= $berita->dibaca ?> x</span>
                          </p>
                          <h2><?= $berita->judul ?></h2>
                          <div>
                              <?= nl2br(htmlspecialchars($berita->konten)) ?>
                          </div>
                      </div>
                      <div class="share-section mt-4 float-right">
                          <div>
                              <span>Share:</span>
                              <!-- Share to Facebook -->
                              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>"
                                  target="_blank" class="btn btn-outline-primary btn-sm">
                                  <i class="fab fa-facebook"></i>
                              </a>

                              <!-- Share to Instagram (Copy Link) -->
                              <button onclick="copyToClipboard('<?= current_url() ?>')" class="btn btn-outline-warning btn-sm">
                                  <i class="fab fa-instagram"></i>
                              </button>

                              <!-- Share to Twitter/X -->
                              <a href="https://x.com/intent/tweet?url=<?= current_url() ?>&text=<?= urlencode($berita->judul) ?>"
                                  target="_blank" class="btn btn-outline-info btn-sm">
                                  <i class="fab fa-twitter"></i>
                              </a>

                              <!-- Share to WhatsApp -->
                              <a href="https://wa.me/?text=<?= urlencode($berita->judul . ' ' . current_url()) ?>"
                                  target="_blank" class="btn btn-outline-success btn-sm">
                                  <i class="fab fa-whatsapp"></i>
                              </a>
                          </div>

                      </div>

                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="popular-news">
                      <h5>Popular News</h5>
                      <?php foreach ($populer as $p): ?>
                          <div class="popular-item">
                              <a href="<?= base_url('Utama/berita/' . $p->id) ?>">
                                  <img src="<?= ($p->jenis == "Foto") ? base_url('assets/img/berita/' . $p->file) : 'https://via.placeholder.com/80' ?>" alt="popular" />
                                  <div class="details">
                                      <h6><?= $p->judul ?></h6>
                                      <p><?= date('d M Y', strtotime($p->dibuat)) ?></p>
                                  </div>
                              </a>
                          </div>
                      <?php endforeach ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- end single article section -->

  <div class="logo-carousel-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="logo-carousel-inner">
                      <?php foreach ($berita_all as $all): ?>
                          <a href="<?= base_url('Utama/berita/' . $all->id) ?>" class="berita">
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