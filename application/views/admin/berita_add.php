<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <form action="<?= base_url('admin/Berita/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <p>Membuat berita baru.</p>
                    <div class="form-group mb-3">
                        <label for="judul">Judul Berita *</label>
                        <input type="text" class="form-control form-control-sm" name="judul" placeholder="......" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kategori">Kategori *</label>
                        <select name="kategori" class="form-control form-control-sm" required>
                            <option value=""> Pilih </option>
                            <option value="Olahraga"> Olahraga</option>
                            <option value="Politik"> Politik</option>
                            <option value="Finance"> Finance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto">Foto / Video</label>
                        <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg, video/mp4">
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi">Isi Berita *</label>
                        <textarea class="form-control form-control-sm" name="isi" rows="5" placeholder="Tulis isi berita..." required></textarea>
                    </div>
                </div>
                <div class="card-footer" style="display:flex; justify-content:flex-end">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>