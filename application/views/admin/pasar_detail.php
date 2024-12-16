<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Detail Harga Barang [ <?= date('d M Y H:i:s', strtotime($harga->periode)) ?>]</strong>
            </div>
            <div class="card-body">
                <p>List Harga Barang :</p>
                <?php
                $pasar_sebelumnya = '';
                $no = 0;
                foreach ($list_b as $f):
                    if ($pasar_sebelumnya != $f->pasar_nama):
                        if ($pasar_sebelumnya != '') {
                            echo '</tbody></table>';
                        }
                        echo "<h5>Pasar: {$f->pasar_nama}</h5>";
                        echo '<table class="table" style="font-size: 12px;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Terbaru</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>';
                    endif;
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $f->barang ?></td>
                        <td><?= $f->kategori ?></td>
                        <td>Rp. <?= number_format($f->harga) ?></td>
                        <td><?= $f->stok ?></td>
                    </tr>
                <?php
                    $pasar_sebelumnya = $f->pasar_nama;
                endforeach;
                ?>
                </tbody>
                </table>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control form-control-sm" readonly><?= $harga->keterangan ?></textarea>
                </div>
            </div>

            <div class="card-footer" style="display:flex; justify-content:flex-end; gap:10px;">
                <a href="<?= base_url('admin/Pasar/harga') ?>" class="btn btn-sm btn-danger "> Close</a>
            </div>
        </div>
    </div>
</section>