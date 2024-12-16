<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data splash.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama splash</th>
                            <th>Gambar</th>
                            <th>Status</th>
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
                                <td><?= $f->nama ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/splash/') . $f->gambar ?>?timestamp=<?= time(); ?>" alt="<?= $f->nama ?>" class="rounded" style="width:260px;">
                                </td>
                                <td><small><?= $f->status == 1 ? "Aktif" : "Non Aktif" ?></small></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>" data-nama="<?= $f->nama; ?>" data-status="<?= $f->status; ?>"
                                        title="Edit"><i class="bi bi-pencil-square"></i></button>
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
            <form action="<?= base_url('admin/splash/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">splash baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="splash">Nama splash *</label>
                            <input type="text" class="form-control form-control-sm" name="nama" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="splash">Foto *</label>
                            <input type="file" class="form-control form-control-sm" name="gambar" placeholder="......" accept="image/png, image/jpeg, image/jpg" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="splash">Status</label>
                            <select name="status" class="form-control form-control-sm" required>
                                <option value="">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
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
            <form action="<?= base_url('admin/splash/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="splash">Nama splash *</label>
                            <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                            <input type="text" class="form-control form-control-sm" id="namaEdit" name="splash" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="splash">Foto</label>
                            <input type="file" class="form-control form-control-sm" name="gambar" placeholder="......" accept="image/png, image/jpeg, image/jpg">
                            <small>( Kosongkan jika tidak ingin ganti foto )</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="splash">Status</label>
                            <select name="status" id="statusEdit" class="form-control form-control-sm" required>
                                <option value="">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
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
            const status = this.getAttribute('data-status');
            document.getElementById('idEdit').value = id;
            document.getElementById('namaEdit').value = nama;
            document.getElementById('statusEdit').value = status;
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
                    location.href = "<?= base_url('admin/splash/hapus/') ?>" + id;
                }
            })
        });
    });
</script>
<script>
    document.addsplashListener("DOMContentLoaded", function() {
        const playButtons = document.querySelectorAll('.play-button');

        playButtons.forEach(button => {
            button.addsplashListener('click', function() {
                const video = this.previousElementSibling;

                if (video.paused) {
                    video.play();
                    this.style.display = 'none'; // Sembunyikan tombol saat video mulai diputar
                }
            });
        });
    });
</script>