<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/dokumen') ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <!-- Judul dokumen -->
                <h3 class="mb-3"><?= $dokumen->judul ?></h3>

                <!-- Kategori -->
                <p><strong>Kategori:</strong> <?= $dokumen->kategori ?></p>

                <!-- Foto/Video -->
                <div class="mb-3">
                    <?php if ($dokumen->file && $dokumen->jenis == 'Foto'): ?>
                        <img src="<?= base_url('assets/img/dokumen/' . $dokumen->file) ?>"
                            alt="<?= $dokumen->judul ?>"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php elseif ($dokumen->file && $dokumen->jenis == 'Video'): ?>
                        <video controls style="width:100%; max-height:400px;">
                            <source src="<?= base_url('assets/img/dokumen/' . $dokumen->file) ?>" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/800x400?text=No+Image+Available"
                            alt="No Image"
                            class="rounded"
                            style="width:100%; max-height:400px; object-fit:cover;">
                    <?php endif; ?>
                </div>

                <!-- Isi dokumen -->
                <div class="mb-3">
                    <p><strong>Isi dokumen:</strong></p>
                    <p><?= nl2br($dokumen->konten) ?></p>
                </div>

                <!-- Pembuat -->
                <p class="text-muted"><small>Dibuat oleh: <?= $dokumen->pembuat ?></small></p>
            </div>
        </div>
    </div>
</section>