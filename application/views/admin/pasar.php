<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data Lokasi pasar.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama Pasar</th>
                            <th>Alamat</th>
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
                                <td><small><?= $f->nama ?></small></td>
                                <td><small><?= $f->alamat ?></small></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>"
                                        data-nama="<?= $f->nama; ?>"
                                        data-alamat="<?= $f->alamat; ?>"
                                        title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
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
            <form action="<?= base_url('admin/Pasar/pasar_baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pasar Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="pasar">Nama Pasar *</label>
                            <input type="text" class="form-control form-control-sm" name="nama" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pasar">Alamat </label>
                            <input type="text" class="form-control form-control-sm" name="alamat" placeholder="......">
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
            <form action="<?= base_url('admin/Pasar/pasar_edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="pasar">Nama pasar *</label>
                            <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                            <input type="text" class="form-control form-control-sm" id="pasarEdit" name="pasar" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pasar">Alamat</label>
                            <input type="text" class="form-control form-control-sm" id="alamatEdit" name="alamat" placeholder="......">
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
        $('.btn-edit').click(function(e) {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            const alamat = this.getAttribute('data-alamat');
            document.getElementById('idEdit').value = id;
            document.getElementById('pasarEdit').value = nama;
            document.getElementById('alamatEdit').value = alamat;
        });
        $('.btn-hapus').click(function(e) {
            const id = this.getAttribute('data-id');
            e.prpasarDefault();
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
                    location.href = "<?= base_url('admin/Pasar/hapus_pasar/') ?>" + id;
                }
            })
        });
    });
</script>