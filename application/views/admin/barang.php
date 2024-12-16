<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Baru</button>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-import"><i class="bi bi-plus me-1"></i> Import</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data barang.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Barang</th>
                            <th>Kategori</th>
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
                                <td><small><?= $f->barang ?></small></td>
                                <td><small><?= $f->kategori ?></small></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="<?= $f->id; ?>"
                                        data-barang="<?= $f->barang; ?>"
                                        data-kategori="<?= $f->kategori; ?>"
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
            <form action="<?= base_url('admin/Pasar/barang_baru') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Barang baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="pasar">Nama Barang *</label>
                            <input type="text" class="form-control form-control-sm" name="barang" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pasar">Kategori *</label>
                            <select name="kategori" class="form-control form-control-sm" required>
                                <option value=""> Pilih </option>
                                <option value="Bahan Pokok">Bahan Pokok</option>
                                <option value="Sayuran">Sayuran</option>
                                <option value="Buah-Buahan">Buah-Buahan</option>
                                <option value="Daging & Ikan">Daging & Ikan</option>
                                <option value="Bumbu Dapur">Bumbu Dapur</option>
                                <option value="lainnya">lainnya</option>
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
    <div class="modal fade" id="modal-import" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/Pasar/import_barang'); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">File Upload</label>
                            <input type="file" name="file" class="form-control" id="exampleInputFile" accept=".xlsx,.xls" required>
                        </div>
                        <hr>
                        <a href="<?= base_url('admin/Pasar/download_barang') ?>">Download Template</a>
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
            <form action="<?= base_url('admin/Pasar/barang_edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="pasar">Nama Barang *</label>
                            <input type="hidden" class="form-control form-control-sm" id="idEdit" name="id" required>
                            <input type="text" class="form-control form-control-sm" id="barangEdit" name="barang" placeholder="......" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pasar">Kategori</label>
                            <input type="text" class="form-control form-control-sm" id="kategoriEdit" name="kategori" placeholder="......">
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
            const barang = this.getAttribute('data-barang');
            const kategori = this.getAttribute('data-kategori');
            document.getElementById('idEdit').value = id;
            document.getElementById('barangEdit').value = barang;
            document.getElementById('kategoriEdit').value = kategori;
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
                    location.href = "<?= base_url('admin/Pasar/hapus_barang/') ?>" + id;
                }
            })
        });
    });
</script>