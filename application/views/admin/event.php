<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data event.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama event</th>
                            <th>Konten</th>
                            <th>Gambar</th>
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
                                    <small>
                                        <strong><?= $f->nama ?></strong> <br>
                                        <?= $f->jenis ?>
                                    </small>
                                </td>
                                <td><small><?= $f->konten ?></small></td>
                                <td>
                                    <div class="row position-relative">
                                        <?php if ($f->jenis == "Foto") { ?>
                                            <img src="<?= base_url('assets/img/event/') . $f->foto ?>?timestamp=<?= time(); ?>" alt="<?= $f->nama ?>" class="rounded" style="max-width:150px;">
                                        <?php } elseif ($f->jenis == "Video") { ?>
                                            <div class="video-container" style="position: relative; max-width: 150px; max-height: 150px;">
                                                <video class="video-element" style="width: 100%; max-height: 150px;" muted>
                                                    <source src="<?= base_url('assets/img/event/') . $f->foto ?>?timestamp=<?= time(); ?>" type="video/mp4">
                                                </video>
                                                <button class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.5); color: #fff; border: none; padding: 10px 20px; cursor: pointer;">
                                                    Play
                                                </button>
                                            </div>
                                        <?php } elseif ($f->jenis == "Link") {
                                            parse_str(parse_url($f->foto, PHP_URL_QUERY), $urlParams);
                                            $youtubeId = $urlParams['v'] ?? '';
                                        ?>
                                            <div class="youtube-container" style="position: relative; max-width: 150px; max-height: 150px;">
                                                <?php if (!empty($youtubeId)) { ?>
                                                    <iframe src="https://www.youtube.com/embed/<?= $youtubeId ?>" frameborder="0" allowfullscreen style="width: 100%; height: 100%;"></iframe>
                                                <?php } else { ?>
                                                    <p>Invalid YouTube URL</p>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>"
                                        data-nama="<?= $f->nama; ?>"
                                        data-jenis="<?= $f->jenis; ?>"
                                        data-konten="<?= $f->konten; ?>"
                                        data-foto="<?= $f->foto; ?>"
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
            <form action="<?= base_url('admin/event/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">event baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="event">Nama event *</label>
                            <input type="text" class="form-control form-control-sm" name="event" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="event">Deskripsi *</label>
                            <input type="text" class="form-control form-control-sm" name="deskripsi" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="event">Tipe *</label>
                            <select id="tipe" name="jenis" class="form-control form-control-sm" onchange="toggleInput()">
                                <option selected="">pilih</option>
                                <option value="Link">Link Youtube</option>
                                <option value="media">Media Foto / Video</option>
                            </select>
                        </div>

                        <div id="link-input" class="form-group mb-3" style="display: none;">
                            <label for="event">Link *</label>
                            <input type="text" class="form-control form-control-sm" name="link" placeholder="......">
                        </div>

                        <div id="media-input" class="form-group mb-3" style="display: none;">
                            <label for="event">Foto / Video *</label>
                            <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg, video/mp4">
                        </div>

                        <script>
                            function toggleInput() {
                                const tipe = document.getElementById("tipe").value;
                                const linkInput = document.getElementById("link-input");
                                const mediaInput = document.getElementById("media-input");

                                // Sembunyikan semua input terlebih dahulu
                                linkInput.style.display = "none";
                                mediaInput.style.display = "none";

                                // Tampilkan input sesuai pilihan
                                if (tipe === "Link") {
                                    linkInput.style.display = "block";
                                } else if (tipe === "media") {
                                    mediaInput.style.display = "block";
                                }
                            }
                        </script>

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
            <form action="<?= base_url('admin/event/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="event">Nama event *</label>
                            <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                            <input type="text" class="form-control form-control-sm" id="eventEdit" name="event" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="event">Deskripsi *</label>
                            <input type="text" class="form-control form-control-sm" id="deskripsiEdit" name="deskripsi" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis">Jenis Konten *</label>
                            <select class="form-select form-control-sm" id="jenisEdit" name="jenis" required>
                                <option value="Foto">Foto</option>
                                <option value="Video">Video</option>
                                <option value="Link">Link</option>
                            </select>
                        </div>
                        <div id="inputLink" class="form-group mb-3 d-none">
                            <label for="kontenLink">Link *</label>
                            <input type="text" class="form-control form-control-sm" id="linkEdit" name="link" placeholder="Masukkan URL YouTube">
                        </div>
                        <div id="inputFile" class="form-group mb-3 d-none">
                            <label for="file">Upload File *</label>
                            <input type="file" class="form-control form-control-sm" id="fotoEdit" name="foto" accept="image/png, image/jpeg, image/jpg, video/mp4">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
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
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const jenis = this.getAttribute('data-jenis');
                const konten = this.getAttribute('data-konten');
                const foto = this.getAttribute('data-foto');

                document.getElementById('idEdit').value = id;
                document.getElementById('eventEdit').value = nama;
                document.getElementById('deskripsiEdit').value = konten;
                document.getElementById('jenisEdit').value = jenis;

                const inputLink = document.getElementById('inputLink');
                const inputFile = document.getElementById('inputFile');
                const kontenLink = document.getElementById('linkEdit');
                const fileEdit = document.getElementById('fotoEdit');

                // Reset visibility and required attributes
                inputLink.classList.add('d-none');
                inputFile.classList.add('d-none');
                kontenLink.removeAttribute('required');
                fileEdit.removeAttribute('required');

                if (jenis === 'Link') {
                    inputLink.classList.remove('d-none');
                    kontenLink.setAttribute('required', 'required');
                    kontenLink.value = foto;
                } else {
                    inputFile.classList.remove('d-none');
                    fileEdit.setAttribute('required', 'required');
                }
            });
        });

        document.getElementById('jenisEdit').addEventListener('change', function() {
            const jenis = this.value;

            const inputLink = document.getElementById('inputLink');
            const inputFile = document.getElementById('inputFile');
            const kontenLink = document.getElementById('linkEdit');
            const fileEdit = document.getElementById('fotoEdit');

            // Reset visibility and required attributes
            inputLink.classList.add('d-none');
            inputFile.classList.add('d-none');
            kontenLink.removeAttribute('required');
            fileEdit.removeAttribute('required');

            if (jenis === 'Link') {
                inputLink.classList.remove('d-none');
                kontenLink.setAttribute('required', 'required');
            } else {
                inputFile.classList.remove('d-none');
                fileEdit.setAttribute('required', 'required');
            }
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
                    location.href = "<?= base_url('admin/event/hapus/') ?>" + id;
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