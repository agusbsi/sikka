<div class="container pt-100 pb-100">
    <div class="card">
        <div class="card-header">
            <h2>Daftar Pengumuman</h2>
        </div>
        <div class="card-body">
            Semua dokumen pengumuman tersedia disini, silahkan cari sesuai kebutuhan anda.
            <br>
            <table id="dokumenTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Dokumen</th>
                        <th>Kategori</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($pengumuman as $p):
                        $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <small>
                                    <strong><?= $p->judul ?></strong> <br>
                                    <?= strlen($p->konten) > 50 ? substr($p->konten, 0, 50) . '...' : $p->konten ?> <br>
                                    <?= date('d M Y H:i:s', strtotime($p->dibuat)) ?>
                                </small>
                            </td>
                            <td><?= $p->judul ?></td>
                            <td><a href="<?= base_url('Utama/pengumuman_detail/' . $p->id) ?>" class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            * Data bersumber dari kabupapten SIKKA @2024
        </div>
    </div>
</div>