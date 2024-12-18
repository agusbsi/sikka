<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <a href="<?= base_url('admin/dokumen/tambah_baru') ?>" class="btn btn-success btn-sm"><i class="bi bi-plus me-1"></i> Baru</a>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data dokumen.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>dokumen</th>
                            <th>Tanggal</th>
                            <th>Pembuat</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($list as $f):
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img
                                                src="<?= $f->jenis == "Foto" && !empty($f->file)
                                                            ? base_url('assets/img/dokumen/') . $f->file . '?timestamp=' . time()
                                                            : 'https://via.placeholder.com/200?text=No+Image' ?>"
                                                alt="<?= !empty($f->file) ? $f->file : 'Default Image' ?>"
                                                class="rounded"
                                                style="width:70px; max-height:70px;">
                                        </div>
                                        <div class="col-md-9">
                                            <p class="mb-0" style="font-size: 14px; font-weight: bold;"><?= $f->judul ?></p>
                                            <small><?= $f->kategori ?></small>
                                        </div>
                                    </div>

                                </td>
                                <td><small><?= date('d M Y  H:i:s', strtotime($f->dibuat)) ?></small></td>
                                <td><small><?= $f->pembuat ?></small></td>
                                <td>
                                    <a href="<?= base_url('admin/dokumen/detail/' . $f->id) ?>" class="btn btn-sm btn-primary" title="detail"><i class="bi bi-eye-fill"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $f->id; ?>" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-hapus').click(function(e) {
            const id = this.getAttribute('data-id');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: " Data yang dihapus tidak bisa di kembalikan lagi.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "<?= base_url('admin/Dokumen/hapus/') ?>" + id;
                }
            })
        });
    });
</script>