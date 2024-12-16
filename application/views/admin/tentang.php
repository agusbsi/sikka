<section>
    <div class="col-lg-12">
        <form action="<?= base_url('admin/Tentang/tentang_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    Pengaturan Umum
                </div>
                <div class="card-body">
                    <div class="form-group mb-3 mt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <img
                                    src="<?= !empty($tentang->logo)
                                                ? base_url('assets/img/') . $tentang->logo . '?timestamp=' . time()
                                                : 'https://via.placeholder.com/200?text=No+Image' ?>"
                                    alt="<?= !empty($tentang->logo) ? $tentang->logo : 'Default Image' ?>"
                                    class="rounded"
                                    style="width:70px; max-height:70px;">
                            </div>
                            <div class="col-md-9">
                                <label for="">Logo</label>
                                <input type="file" class="form-control form-control-sm" name="logo" placeholder="......" accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Nama Website</label>
                        <input type="text" name="nama" class="form-control form-control-sm" value="<?= $tentang->nama ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-sm" placeholder="isi alamat disini..." required><?= $tentang->alamat ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" value="<?= $tentang->email ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Facebook</label>
                        <input type="text" name="fb" class="form-control form-control-sm" value="<?= $tentang->fb ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Instagram</label>
                        <input type="text" name="ig" class="form-control form-control-sm" value="<?= $tentang->ig ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">X (Twiter)</label>
                        <input type="text" name="x" class="form-control form-control-sm" value="<?= $tentang->x ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Telp</label>
                        <input type="text" name="telp" class="form-control form-control-sm" value="<?= $tentang->telp ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Whatsapp</label>
                        <input type="text" name="wa" class="form-control form-control-sm" value="<?= $tentang->wa ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Bupati saat ini.</label>
                        <select name="bupati" class="form-control form-control-sm">
                            <option value="" <?= ($tentang->bupati_id == 0) ? "selected" : "" ?>> Kosong </option>
                            <?php foreach ($bupati as $b): ?>
                                <option value="<?= $b->id ?>" <?= ($b->id != $tentang->bupati_id) ? "" : "selected" ?>> <?= $b->nama ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Wakil Bupati saat ini.</label>
                        <select name="wakil" class="form-control form-control-sm">
                            <option value="" <?= ($tentang->wakil_id == 0) ? "selected" : "" ?>> Kosong </option>
                            <?php foreach ($wakil as $b): ?>
                                <option value="<?= $b->id ?>" <?= ($b->id != $tentang->wakil_id) ? "" : "selected" ?>> <?= $b->nama ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>