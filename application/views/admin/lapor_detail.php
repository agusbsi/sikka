<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/Lapor') ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <h3 class="mb-3">Detail Laporan</h3>
                <div class="form-group mb-2">
                    <label for="">Nama</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $lapor->nama ?>" readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="">Telp</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $lapor->telp ?>" readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="">Isi Laporan</label>
                    <textarea class="form-control form-control-sm" rows="10" readonly><?= $lapor->laporan ?></textarea>
                </div>
                <?php
                // Decode data JSON dari database
                $berkas = json_decode($lapor->berkas, true);
                ?>

                <div class="form-group mb-2">
                    <label for="">Berkas</label>
                    <div class="d-flex flex-wrap gap-2">
                        <?php if (!empty($berkas)): ?>
                            <?php foreach ($berkas as $file): ?>
                                <?php
                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                $baseUrl = base_url('assets/laporan/');
                                ?>
                                <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                    <a href="<?= $baseUrl . $file ?>" target="_blank">
                                        <img src="<?= $baseUrl . $file ?>" alt="Thumbnail" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                    </a>
                                <?php elseif (in_array(strtolower($ext), ['mp4', 'webm', 'ogg'])): ?>
                                    <!-- Thumbnail untuk video -->
                                    <a href="<?= $baseUrl . $file ?>" target="_blank">
                                        <video class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;" muted>
                                            <source src="<?= $baseUrl . $file ?>" type="video/<?= $ext ?>">
                                        </video>
                                    </a>
                                <?php else: ?>
                                    <!-- Link untuk file lain -->
                                    <a href="<?= $baseUrl . $file ?>" target="_blank" class="btn btn-link">
                                        <?= $file ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada berkas tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>