<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Penerimaan Siswa Baru</h4>

<!-- Tombol Tambah -->
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-circle me-1"></i> Tambah Informasi
    </button>
</div>


<!-- Flash Message -->
<?php if (session()->getFlashdata('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '<?= session()->getFlashdata('success') ?>',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '<?= session()->getFlashdata('error') ?>',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    });
</script>
<?php endif; ?>


<!-- Tabel -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Jumlah</th>
            <th>Dokumen</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; foreach ($penerimaan as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($p['nama_jurusan']) ?></td>
            <td><?= esc($p['jumlah_diterima']) ?></td>
            <td>
                <?php if ($p['upload_dokumen']): ?>
                    <a href="<?= base_url('uploads/' . $p['upload_dokumen']) ?>" target="_blank">
                        <?= esc($p['upload_dokumen']) ?>
                    </a>
                <?php else: ?>
                    <span class="text-muted">-</span>
                <?php endif; ?>
            </td>
            <td>
                <!-- edit -->
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $p['id_jurusan'] ?>">
                    <i class="bi bi-pencil"></i>
                </button>
                <!-- hapus -->
                <button 
                    class="btn btn-sm btn-outline-danger btn-hapus-penerimaan" 
                    data-href="<?= base_url('/admin/penerimaan/hapus/' . $p['id_jurusan']) ?>">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit<?= $p['id_jurusan'] ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $p['id_jurusan'] ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content bg-white shadow rounded-3">
            <form method="post" action="<?= base_url('/admin/penerimaan/edit/' . $p['id_jurusan']) ?>" enctype="multipart/form-data">
                <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel<?= $p['id_jurusan'] ?>">Edit Informasi Penerimaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                <div class="mb-2">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" value="<?= esc($p['nama_jurusan']) ?>" required>
                </div>
                <div class="mb-2">
                    <label>Jumlah Diterima</label>
                    <input type="number" name="jumlah_diterima" class="form-control" value="<?= esc($p['jumlah_diterima']) ?>" required>
                </div>
                <div class="mb-2">
                    <label>Upload Dokumen Baru (PDF)</label>
                    <input type="file" name="upload_dokumen" class="form-control" accept=".pdf">
                    <?php if ($p['upload_dokumen']): ?>
                    <a href="<?= base_url('uploads/' . $p['upload_dokumen']) ?>" target="_blank" class="d-block mt-2 text-decoration-underline small">
                    </a>
                    <?php endif; ?>
                </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            </form>
            </div>
        </div>
        </div>

    <?php endforeach; ?>

    </tbody>
</table>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-hapus-penerimaan').forEach(function(button) {
        button.addEventListener('click', function () {
            const href = this.getAttribute('data-href');

            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                text: "Informasi jurusan akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
});
</script>


<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('/admin/penerimaan/tambah') ?>" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Informasi Penerimaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Jumlah Diterima</label>
                    <input type="number" name="jumlah_diterima" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Upload Dokumen (PDF)</label>
                    <input type="file" name="upload_dokumen" class="form-control" accept=".pdf">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
