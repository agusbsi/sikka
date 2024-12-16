<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data layanan.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>layanan</th>
                            <th>Link</th>
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
                                                src="<?= !empty($f->gambar)
                                                            ? base_url('assets/img/layanan/') . $f->gambar . '?timestamp=' . time()
                                                            : 'https://via.placeholder.com/200?text=No+Image' ?>"
                                                alt="<?= !empty($f->gambar) ? $f->gambar : 'Default Image' ?>"
                                                class="rounded"
                                                style="width:70px; max-height:70px;">
                                        </div>
                                        <div class="col-md-9">
                                            <p class="mb-0" style="font-size: 14px; font-weight: bold;"><?= $f->layanan ?></p>
                                        </div>
                                    </div>

                                </td>
                                <td><small><?= $f->link ?></small></td>
                                <td><small><?= $f->pembuat ?></small></td>
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
            <form action="<?= base_url('admin/Layanan/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">layanan baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="layanan">Nama layanan *</label>
                            <input type="text" class="form-control form-control-sm" name="layanan" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="layanan">Icon / Gambar *</label>
                            <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="layanan">Link</label>
                            <input type="link" class="form-control form-control-sm" name="link" placeholder="......">
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
                    location.href = "<?= base_url('admin/Layanan/hapus/') ?>" + id;
                }
            });
        });
    });
</script>