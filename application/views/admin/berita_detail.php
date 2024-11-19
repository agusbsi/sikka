<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <!-- Judul Berita -->
                <h3 class="mb-3"><?= $berita->judul ?></h3>

                <!-- Kategori -->
                <p><strong>Kategori:</strong> <?= $berita->kategori ?></p>

                <!-- Foto/Video -->
                <div class="mb-3">
                    <?php if ($berita->file && $berita->jenis == 'Foto'): ?>
                        <img src="<?= base_url('assets/img/berita/' . $berita->file) ?>"
                            alt="<?= $berita->judul ?>"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php elseif ($berita->file && $berita->jenis == 'Video'): ?>
                        <video controls style="width:100%; max-height:400px;">
                            <source src="<?= base_url('assets/img/berita/' . $berita->file) ?>" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/800x400?text=No+Image+Available"
                            alt="No Image"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php endif; ?>
                </div>

                <!-- Isi Berita -->
                <div class="mb-3">
                    <p><strong>Isi Berita:</strong></p>
                    <p><?= nl2br($berita->konten) ?></p>
                </div>

                <!-- Pembuat -->
                <p class="text-muted"><small>Dibuat oleh: <?= $berita->pembuat ?></small></p>
            </div>
        </div>
    </div>
</section>