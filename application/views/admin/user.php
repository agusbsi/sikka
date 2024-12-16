<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data User.</p>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($list as $f):
                            $no++;
                            $foto = !empty($f->foto) ? base_url('assets/img/user/' . $f->foto) : 'https://via.placeholder.com/60'; // Foto default jika tidak ada
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <img src="<?= $foto ?>?timestamp=<?= time(); ?>" alt="<?= $f->nama ?>" class="rounded-circle" style="width:60px; height:60px; object-fit:cover;">
                                </td>
                                <td><?= $f->nama ?></td>
                                <td><?= $f->telp ?></td>
                                <td><?= $f->username ?></td>
                                <td>
                                    <span class="badge bg-<?= $f->status === '1' ? 'success' : 'secondary'; ?>">
                                        <?= $f->status === '1' ? 'Aktif' : 'Non Aktif'; ?>
                                    </span>
                                </td>
                                <td>
                                    <?= $f->role === '1' ? 'Admin Utama' : 'User Publikasi'; ?>
                                </td>
                                <td>
                                    <?php if ($this->session->userdata('id') == 1) { ?>
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            data-id="<?= $f->id; ?>" data-nama="<?= $f->nama; ?>" data-telp="<?= $f->telp; ?>"
                                            data-username="<?= $f->username; ?>" data-status="<?= $f->status; ?>"
                                            data-role="<?= $f->role; ?>" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <!-- Tombol Hapus -->

                                        <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $f->id; ?>" title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    <?php } ?>
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
            <form action="<?= base_url('admin/user/baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nama -->
                                <div class="form-group mb-3">
                                    <label for="nama">Nama *</label>
                                    <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama user" required>
                                </div>
                                <!-- Foto -->
                                <div class="form-group mb-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control form-control-sm" name="foto" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <!-- Telepon -->
                                <div class="form-group mb-3">
                                    <label for="telp">No. Telepon *</label>
                                    <input type="text" class="form-control form-control-sm" name="telp" placeholder="Nomor telepon" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Username -->
                                <div class="form-group mb-3">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control form-control-sm" name="username" placeholder="Username" required>
                                </div>
                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" required>
                                </div>
                                <!-- Role -->
                                <div class="form-group mb-3">
                                    <label for="role">Role *</label>
                                    <select name="role" class="form-control form-control-sm" required>
                                        <option value="1">Admin Utama</option>
                                        <option value="2">User Publikasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <form action="<?= base_url('admin/user/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="namaEdit">Nama *</label>
                                    <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                                    <input type="text" class="form-control form-control-sm" id="namaEdit" name="nama" placeholder="Nama lengkap..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telpEdit">Telepon *</label>
                                    <input type="text" class="form-control form-control-sm" id="telpEdit" name="telp" placeholder="Nomor telepon..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="usernameEdit">Username *</label>
                                    <input type="text" class="form-control form-control-sm" id="usernameEdit" name="username" placeholder="Username..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="statusEdit">Status *</label>
                                    <select class="form-control form-control-sm" id="statusEdit" name="status" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="roleEdit">Role *</label>
                                    <select class="form-control form-control-sm" id="roleEdit" name="role" required>
                                        <option value="1">Admin Utama</option>
                                        <option value="2">User Publikasi</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control form-control-sm" name="foto" placeholder="......" accept="image/png, image/jpeg, image/jpg">
                                    <small>( Kosongkan jika tidak ingin mengganti foto )</small>
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
        // Mengisi data ke modal edit
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const telp = $(this).data('telp');
            const username = $(this).data('username');
            const status = $(this).data('status');
            const role = $(this).data('role');

            $('#idEdit').val(id);
            $('#namaEdit').val(nama);
            $('#telpEdit').val(telp);
            $('#usernameEdit').val(username);
            $('#statusEdit').val(status);
            $('#roleEdit').val(role);
        });

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
                    location.href = "<?= base_url('admin/user/hapus/') ?>" + id;
                }
            });
        });
    });
</script>