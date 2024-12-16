<div class="container pt-100 pb-100">
    <div class="card">
        <div class="card-header">
            <h2>Daftar Pengumuman</h2>
        </div>
        <div class="card-body">
            <div class="pdf-container" id="pdfViewer"></div>
            <br>
            <hr>
            <h4>Detail Pengumuman</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Tanggal Publish</th>
                        <td> <?= date('d M Y H:i:s', strtotime($pengumuman->dibuat)) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Dokumen</th>
                        <td><?= $pengumuman->judul ?></td>
                    </tr>
                    <tr>
                        <th>Kategori Dokumen</th>
                        <td><?= $pengumuman->kategori ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Dokumen</th>
                        <td>.pdf</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= $pengumuman->pembuat ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('assets/pdf/' . $pengumuman->file) ?>" class="btn btn-primary" download>Unduh Dokumen</a>
        </div>
        <div class="card-footer">
            * Data bersumber dari kabupapten SIKKA @2024
        </div>
    </div>
</div>