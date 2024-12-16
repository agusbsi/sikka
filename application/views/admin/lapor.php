<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <p>Menampilkan semua data Laporan.</p>
                <table class="table datatable" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>isi Laporan</th>
                            <th>Tanggal</th>
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
                                <td><small><?= $f->nama ?></small></td>
                                <td><small><?= $f->telp ?></small></td>
                                <td>
                                    <small>
                                        <?= strlen($f->laporan) > 50 ? substr($f->laporan, 0, 50) . '...' : $f->laporan ?>
                                    </small>
                                </td>
                                <td><small><?= date('d M Y  H:i:s', strtotime($f->tanggal)) ?></small></td>
                                <td><small><?= ($f->status == 0) ? '<span class="badge bg-danger">Baru</span>' : '<span class="badge bg-primary">Terbaca</span>' ?></small></td>
                                <td>
                                    <a href="<?= base_url('admin/Lapor/baca/' . $f->id) ?>" class="btn btn-sm btn-info" data-id="<?= $f->id; ?>" title="Baca"><i class="bi bi-eye-fill"></i> Baca</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>