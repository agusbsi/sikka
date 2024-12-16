<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data dinas.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama Dinas</th>
                            <th>Alamat Kantor</th>
                            <th>Telp</th>
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
                                                src="<?= !empty($f->foto)
                                                            ? base_url('assets/img/kelembagaan/') . $f->foto . '?timestamp=' . time()
                                                            : 'https://via.placeholder.com/200?text=No+Image' ?>"
                                                alt="<?= !empty($f->foto) ? $f->foto : 'Default Image' ?>"
                                                class="rounded"
                                                style="width:70px; max-height:70px;">
                                        </div>
                                        <div class="col-md-9">
                                            <p class="mb-0" style="font-size: 14px; font-weight: bold;"><?= $f->nama ?></p>
                                        </div>
                                    </div>

                                </td>
                                <td><small><?= $f->alamat ?></small></td>
                                <td><small><?= $f->telp ?></small></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $f->id; ?>" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="<?= base_url('admin/Kelembagaan/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">dinas baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="dinas">Nama dinas *</label>
                            <input type="text" class="form-control form-control-sm" name="nama" placeholder="......" required>
                            <input type="hidden" class="form-control form-control-sm" name="kategori" value="dinas" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dinas">Gambar</label>
                            <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dinas">Alamat</label>
                            <textarea name="alamat" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dinas">Telp</label>
                            <input type="text" class="form-control form-control-sm" name="telp" placeholder="......">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Konfirmasi hapus
        $('.btn-hapus').click(function(e) {
            const id = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan lagi.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "<?= base_url('admin/Kelembagaan/hapus/') ?>" + id;
                }
            });
        });
    });
</script>