<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Selamat Datang, <strong><?= session('admin_email') ?></strong></h4>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar-check me-2"></i> Total Kegiatan</h5>
                <p class="display-6"><?= $total_kegiatan ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-lines-fill me-2"></i> Total Penerimaan Jurusan</h5>
                <p class="display-6"><?= $total_penerimaan ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
