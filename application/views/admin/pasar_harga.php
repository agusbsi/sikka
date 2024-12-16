<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <a href="<?= base_url('admin/Pasar/download_harga') ?>" style="margin-right: 5px;">Download Template</a>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ExtralargeModal"><i class="bi bi-plus me-1"></i> Import Harga</button>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data harga pasar.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Periode</th>
                            <th>Keterangan</th>
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
                                <td><small><?= date('d M Y', strtotime($f->periode)) ?></small></td>
                                <td><small><?= $f->keterangan ?></small></td>
                                <td><?= $f->pembuat ?></td>
                                <td>
                                    <a href="<?= base_url('admin/Pasar/harga_detail/' . $f->id) ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
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
            <form id="importHargaForm" action="<?= base_url('admin/Pasar/import_harga') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Harga Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Pilih Pasar -->
                        <div class="form-group mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pilih Pasar *</h5>
                                    <ul class="list-group">
                                        <?php foreach ($pasar as $p): ?>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" type="checkbox" name="pasar_ids[]" value="<?= $p->id ?>" aria-label="...">
                                                <?= $p->nama ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <span><small>Anda bisa update harga di banyak pasar sekaligus</small></span>
                                </div>
                            </div>
                        </div>

                        <!-- Input File -->
                        <div class="form-group mb-3">
                            <label for="event">File Harga </label>
                            <input type="file" class="form-control form-control-sm" name="berkas" accept="xls,xlsx,csv" placeholder="......" required>
                            <small>File tipe : xls,xlxs,csv</small>
                        </div>

                        <!-- Input Keterangan -->
                        <div class="form-group mb-3">
                            <label for="event">Keterangan </label>
                            <input type="text" class="form-control form-control-sm" name="keterangan" placeholder="......">
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
                    location.href = "<?= base_url('admin/Pasar/hapus_harga/') ?>" + id;
                }
            })
        });
    });
</script>
<script>
    document.getElementById('importHargaForm').addEventListener('submit', function(e) {
        // Cek apakah ada checkbox yang dicentang
        var checkboxes = document.getElementsByName('pasar_ids[]');
        var isChecked = false;

        // Periksa apakah ada checkbox yang dicentang
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }

        // Jika tidak ada checkbox yang dicentang, tampilkan peringatan dan batalkan submit
        if (!isChecked) {
            e.preventDefault(); // Cegah form untuk disubmit
            alert("Pilih minimal satu pasar untuk mengupdate harga.");
        }
    });
</script>