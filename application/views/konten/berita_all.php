<style>
    .news-item {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        margin-bottom: 20px;
        height: 320px;
        /* Tinggi tetap untuk semua news-item */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .news-item img {
        width: 100%;
        height: 180px;
        /* Tinggi tetap untuk gambar */
        object-fit: cover;
        /* Menyesuaikan gambar dalam dimensi */
    }

    .news-item .content {
        padding: 15px;
        flex-grow: 1;
        /* Memastikan konten memenuhi ruang yang tersedia */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .news-item h5 {
        font-size: 16px;
        margin: 0 0 10px;
        color: #333;
        text-align: left;
    }

    .news-item p {
        font-size: 14px;
        color: #666;
        margin: 0;
        text-align: left;
        flex-grow: 1;
        /* Membuat teks deskripsi menyesuaikan ruang */
        overflow: hidden;
        /* Memotong teks berlebih */
        text-overflow: ellipsis;
        /* Tambahkan ellipsis untuk teks panjang */
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Batasi maksimal 3 baris */
        -webkit-box-orient: vertical;
    }

    .news-item .meta {
        font-size: 12px;
        color: #999;
        margin-top: 10px;
        text-align: left;
    }


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

    .pagination {
        justify-content: center;
    }
</style>
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php foreach ($berita as $b): ?>
                        <div class="col-md-4">
                            <a href="<?= base_url('Utama/berita/' . $b->id) ?>">
                                <div class="news-item shadow-sm">
                                    <img src="<?= $b->jenis == "Foto" && !empty($b->file)
                                                    ? base_url('assets/img/berita/') . $b->file . '?timestamp=' . time()
                                                    : 'https://via.placeholder.com/400x180' ?>"
                                        alt="<?= $b->judul ?>" />
                                    <div class="content">
                                        <h5><?= $b->judul ?></h5>
                                        <p><?= strlen($b->konten) > 100 ? substr($b->konten, 0, 100) . '...' : $b->konten ?></p>
                                        <div class="meta">
                                            <span><i class="fas fa-calendar"></i> <?= date('d M Y', strtotime($b->dibuat)) ?></span> |
                                            <span><i class="fas fa-user"></i> <?= $b->pembuat ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Tampilkan pagination -->
                <?= $pagination ?>

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