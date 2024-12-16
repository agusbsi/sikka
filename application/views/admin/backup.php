<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-database-fill-down text-primary" style="font-size: 20px;"></i> Backup Database
            </div>
            <div class="card-body text-center">
                <i class="bi bi-database-fill-down text-primary" style="font-size: 65px;"></i>
            </div>
            <div class="card-footer">
                <div class="d-grid gap-2 mt-3 text-center">
                    <?php echo form_open('admin/Backup/backup'); ?>
                    <button class="btn btn-sm btn-outline-primary" type="submit">Download</button>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</section>