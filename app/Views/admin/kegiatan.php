<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<h4 class="mb-3">Data Kegiatan</h4>

<!-- Tombol Tambah -->
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kegiatan
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

<!-- Tabel Kegiatan -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; foreach ($kegiatan as $k): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($k['nama_kegiatan']) ?></td>
            <td><?= esc($k['deskripsi']) ?></td>
            <td><?= esc($k['tanggal']) ?></td>
            <td>
                <?php if ($k['image']): ?>
                    <img src="<?= base_url('uploads/' . $k['image']) ?>" width="80">
                <?php else: ?>
                    <small class="text-muted">Tidak ada</small>
                <?php endif; ?>
            </td>
            <td>
                <!-- Tombol Edit -->
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $k['id_kegiatan'] ?>">
                    <i class="bi bi-pencil"></i>
                </button>

                <!-- Tombol Hapus -->
                <button 
                    class="btn btn-sm btn-outline-danger btn-hapus" 
                    data-href="<?= base_url('/admin/kegiatan/hapus/' . $k['id_kegiatan']) ?>">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>

        <!-- Modal Edit  -->
        <div class="modal fade" id="modalEdit<?= $k['id_kegiatan'] ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $k['id_kegiatan'] ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content bg-white shadow rounded-3">
            <form method="post" action="<?= base_url('/admin/kegiatan/edit/' . $k['id_kegiatan']) ?>" enctype="multipart/form-data">
                <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel<?= $k['id_kegiatan'] ?>">Edit Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                <div class="mb-2">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" value="<?= esc($k['nama_kegiatan']) ?>" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required><?= esc($k['deskripsi']) ?></textarea>
                </div>
                <div class="mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $k['tanggal'] ?>" required>
                </div>
                <div class="mb-2">
                    <label>Gambar (kosongkan jika tidak diubah)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <?php if ($k['image']): ?>
                    <img src="<?= base_url('uploads/' . $k['image']) ?>" width="100" class="mt-2">
                    <?php endif; ?>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
    document.querySelectorAll('.btn-hapus').forEach(function(button) {
        button.addEventListener('click', function () {
            const href = this.getAttribute('data-href');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
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

<!-- Modal Tambah Kegiatan -->
<div class="modal fade" id="modalTambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('/admin/kegiatan/tambah') ?>" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
