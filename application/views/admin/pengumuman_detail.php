<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <!-- Judul pengumuman -->
                <h3 class="mb-3"><?= $pengumuman->judul ?></h3>

                <!-- Kategori -->
                <p><strong>Kategori:</strong> <?= $pengumuman->kategori ?></p>

                <!-- Foto/Video -->
                <div class="mb-3">
                    <?php if ($pengumuman->file && $pengumuman->jenis == 'Foto'): ?>
                        <img src="<?= base_url('assets/img/pengumuman/' . $pengumuman->file) ?>"
                            alt="<?= $pengumuman->judul ?>"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php elseif ($pengumuman->file && $pengumuman->jenis == 'Video'): ?>
                        <video controls style="width:100%; max-height:400px;">
                            <source src="<?= base_url('assets/img/pengumuman/' . $pengumuman->file) ?>" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/800x400?text=No+Image+Available"
                            alt="No Image"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php endif; ?>
                </div>

                <!-- Isi pengumuman -->
                <div class="mb-3">
                    <p><strong>Isi pengumuman:</strong></p>
                    <p><?= nl2br($pengumuman->konten) ?></p>
                </div>

                <!-- Pembuat -->
                <p class="text-muted"><small>Dibuat oleh: <?= $pengumuman->pembuat ?></small></p>
            </div>
        </div>
    </div>
</section>