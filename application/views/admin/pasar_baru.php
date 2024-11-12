<section>
    <div class="col-lg-12">
        <form action="<?= base_url('admin/Pasar/harga_simpan') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    <strong>Buat Harga Baru</strong>
                </div>
                <div class="card-body">
                    <p>List Barang :</p>
                    <table class="table" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga terbaru</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($list_b as $f):
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $f->barang ?></td>
                                    <td><?= $f->kategori ?></td>
                                    <td>
                                        <input type="hidden" name="id_barang[]" class="form-contrl form-control-sm" value="<?= $f->id ?>">
                                        <input type="text" name="harga[]" class="form-contrl form-control-sm harga" placeholder="....." autocomplete="off" required>
                                    </td>
                                    <td>
                                        <select name="stok[]" class="form-control form-control-sm" required>
                                            <option value=""> Pilih </option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Terbatas">Terbatas</option>
                                            <option value="Habis">Habis</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" class="form-control form-control-sm"></textarea>
                        <small>Optional.</small>
                    </div>
                </div>
                <div class="card-footer" style="display:flex; justify-content:flex-end; gap:10px;">
                    <a href="<?= base_url('admin/Pasar') ?>" class="btn btn-sm btn-danger "> Close</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.harga').on('keyup', function() {
            var angka = $(this).val().replace(/[Rp.,]/g, '');
            var rupiah = formatRupiah(angka);
            $(this).val(rupiah);
        });

        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ""),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return "Rp " + rupiah;
        }
    });
</script>