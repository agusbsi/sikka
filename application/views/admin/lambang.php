<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data lambang.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($lambang as $f):
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><small><?= $f->judul ?></small></td>
                                <td><small><?= $f->deskripsi ?></small></td>
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
            <form action="<?= base_url('admin/Tentang/lambang_baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">lambang baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="pasar">Judul</label>
                            <input type="text" class="form-control form-control-sm" name="judul" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pasar">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control form-control-sm" placeholder="isi deskripsilambang disini..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                    location.href = "<?= base_url('admin/Tentang/lambang_hapus/') ?>" + id;
                }
            });
        });
    });
</script>