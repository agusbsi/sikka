<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data wisata.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama wisata</th>
                            <th>Gambar / Video</th>
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
                                    <div class="row position-relative">
                                        <?php if ($f->jenis == "Foto") { ?>
                                            <img src="<?= base_url('assets/img/wisata/') . $f->konten ?>?timestamp=<?= time(); ?>" alt="<?= $f->nama ?>" class="rounded" style="width:260px;">
                                        <?php } else { ?>
                                            <div class="video-container" style="position: relative; width: 260px; max-height: 200px;">
                                                <video class="video-element" style="width: 100%; max-height: 200px;" muted>
                                                    <source src="<?= base_url('assets/img/wisata/') . $f->konten ?>?timestamp=<?= time(); ?>" type="video/mp4">
                                                </video>
                                                <button class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.5); color: #fff; border: none; padding: 10px 20px; cursor: pointer;">
                                                    Play
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>" data-nama="<?= $f->nama; ?>"
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
            <form action="<?= base_url('admin/Wisata/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">wisata baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="wisata">Nama wisata *</label>
                            <input type="text" class="form-control form-control-sm" name="wisata" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="wisata">Foto / Video *</label>
                            <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg, video/mp4" required>
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
            <form action="<?= base_url('admin/wisata/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="wisata">Nama wisata *</label>
                            <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                            <input type="text" class="form-control form-control-sm" id="namaEdit" name="wisata" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="wisata">Foto</label>
                            <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg, video/mp4">
                            <small>( Kosongkan jika tidak ingin ganti foto )</small>
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
            document.getElementById('idEdit').value = id;
            document.getElementById('namaEdit').value = nama;
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
                    location.href = "<?= base_url('admin/wisata/hapus/') ?>" + id;
                }
            })
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playButtons = document.querySelectorAll('.play-button');

        playButtons.forEach(button => {
            button.addEventListener('click', function() {
                const video = this.previousElementSibling;

                if (video.paused) {
                    video.play();
                    this.style.display = 'none'; // Sembunyikan tombol saat video mulai diputar
                }
            });
        });
    });
</script>