<?= $this->extend('layout/user_template') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">📝 Informasi Penerimaan Siswa Baru</h4>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Jumlah Diterima</th>
            <th>Dokumen Persyaratan</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($penerimaan as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($p['nama_jurusan']) ?></td>
            <td><?= esc($p['jumlah_diterima']) ?></td>
            <td>
                <?php if ($p['upload_dokumen']): ?>
                    <a href="<?= base_url('uploads/' . $p['upload_dokumen']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-download me-1"></i> Download
                    </a>


                <?php else: ?>
                    <span class="text-muted">-</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
