<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data bupati.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama Bupati</th>
                            <th>Jabatan</th>
                            <th>Deskripsi</th>
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
                                        <img src="<?= base_url('') ?>assets/img/bupati/<?= $f->foto ?>?timestamp=<?= time(); ?>" alt="<?= $f->nama ?>" class="rounded-circle" style="width:60px;">
                                        <?= $f->nama ?>
                                    </div>
                                </td>
                                <td><?= $f->jabatan ?></td>
                                <td>
                                    <small>
                                        <?= $f->deskripsi ?>
                                    </small>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>" data-nama="<?= $f->nama; ?>"
                                        data-jabatan="<?= $f->jabatan; ?>" data-deskripsi="<?= $f->deskripsi; ?>" title="Edit"><i class="bi bi-pencil-square"></i></button>
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
        <div class="modal-dialog modal-xl">
            <form action="<?= base_url('admin/Bupati/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bupati baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bupati">Nama Bupati *</label>
                                    <input type="text" class="form-control form-control-sm" name="bupati" placeholder="......" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bupati">Jabatan *</label>
                                    <input type="text" class="form-control form-control-sm" name="jabatan" placeholder="......" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bupati">Foto *</label>
                                    <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bupati">Deskripsi</label>
                                    <textarea class="form-control form-control-sm" name="deskripsi" placeholder="......"></textarea>
                                </div>
                            </div>
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
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <form action="<?= base_url('admin/Bupati/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bupati">Nama Bupati *</label>
                                    <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                                    <input type="text" class="form-control form-control-sm" id="namaEdit" name="bupati" placeholder="......" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bupati">Jabatan *</label>
                                    <input type="text" class="form-control form-control-sm" id="jabatanEdit" name="jabatan" placeholder="......" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bupati">Foto</label>
                                    <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg">
                                    <small>( Kosongkan jika tidak ingin ganti foto )</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="bupati">Deskripsi</label>
                                    <textarea class="form-control form-control-sm" id="deskripsiEdit" name="deskripsi" placeholder="......"></textarea>
                                </div>
                            </div>
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
        $('.btn-edit').on('click', function() {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            const jabatan = this.getAttribute('data-jabatan');
            const deskripsi = this.getAttribute('data-deskripsi');
            document.getElementById('idEdit').value = id;
            document.getElementById('namaEdit').value = nama;
            document.getElementById('jabatanEdit').value = jabatan;
            document.getElementById('deskripsiEdit').value = deskripsi;
        });
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
                    location.href = "<?= base_url('admin/Bupati/hapus/') ?>" + id;
                }
            })
        });
    });
</script>