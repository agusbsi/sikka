<div class="container pt-100 pb-100">
    <div class="card">
        <div class="card-header">
            <h2>Daftar Dokumen Publik</h2>
        </div>
        <div class="card-body">
            <div class="pdf-container" id="pdfViewer"></div>
            <br>
            <hr>
            <h4>Detail Dokumen</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <th>Tanggal Publish</th>
                        <td> <?= date('d M Y H:i:s', strtotime($dokumen->dibuat)) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Dokumen</th>
                        <td><?= $dokumen->judul ?></td>
                    </tr>
                    <tr>
                        <th>Kategori Dokumen</th>
                        <td><?= $dokumen->kategori ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Dokumen</th>
                        <td>.pdf</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= $dokumen->pembuat ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('assets/img/dokumen/' . $dokumen->file) ?>" class="btn btn-primary" download>Unduh Dokumen</a>
        </div>
        <div class="card-footer">
            * Data bersumber dari kabupapten SIKKA @2024
        </div>
    </div>
</div>