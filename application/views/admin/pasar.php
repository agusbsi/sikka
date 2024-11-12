<section>
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header" style="display:flex; justify-content:flex-end">
                <a href="<?= base_url('admin/Pasar/harga_baru') ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-plus me-1"></i> Buat Harga Baru</a>
            </div>
            <div class="card-body">
                <p>Menampilkan semua data harga pasar.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Tanggal Update</th>
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
                                <td><small><?= date('d M Y H:i:s', strtotime($f->tanggal)) ?></small></td>
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
</section>