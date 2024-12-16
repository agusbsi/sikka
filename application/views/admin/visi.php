<section>
    <div class="col-lg-12">
        <form action="<?= base_url('admin/Tentang/visi_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    Visi & Misi
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="pasar">Visi</label>
                        <textarea name="visi" class="form-control form-control-sm" placeholder="isi visi disini..." required><?= $visi->visi ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pasar">Misi</label>
                        <textarea name="misi" class="form-control form-control-sm" placeholder="isi Misi disini..." required><?= $visi->misi ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</section>