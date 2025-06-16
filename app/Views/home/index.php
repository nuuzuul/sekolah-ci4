<?= $this->extend('layout/user_template') ?>
<?= $this->section('content') ?>

<h2>Selamat Datang di SekolahKu</h2>
<p>Informasi terbaru mengenai kegiatan sekolah, dan pendaftaran siswa baru dapat Anda dapatkan di sini.</p>

<!--  SLIDER GAMBAR -->
<div id="carouselBeranda" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner rounded shadow">
    <div class="carousel-item active">
      <img src="<?= base_url('assets/slider/smk.jpg') ?>" class="d-block w-100" style="max-height: 340px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/slider/smk2.webp') ?>" class="d-block w-100" style="max-height: 340px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/slider/sma.jpg') ?>" class="d-block w-100" style="max-height: 340px; object-fit: cover;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselBeranda" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselBeranda" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!--  3 PROGRAM UNGGULAN SEKOLAH -->
<h3 id="beranda" class="text-center mb-5 fw-bold">Program Unggulan Sekolah</h3>

<div class="row text-center">
  <div class="col-md-4 mb-4">
    <div class="card h-100 border-0 shadow-lg hover-shadow transition">
      <div class="card-body">
        <div class="mb-3">
          <i class="bi bi-cpu fs-1 text-primary"></i>
        </div>
        <h5 class="card-title fw-semibold">Kelas Riset & Teknologi</h5>
        <p class="card-text small text-muted">
          Kelas yang mengembangkan kemampuan berpikir ilmiah, literasi teknologi, dan kreativitas siswa melalui metode pembelajaran berbasis proyek dan riset.
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card h-100 border-0 shadow-lg hover-shadow transition">
      <div class="card-body">
        <div class="mb-3">
          <i class="bi bi-journal-bookmark-fill fs-1 text-success"></i>
        </div>
        <h5 class="card-title fw-semibold">Program Tahfidz & Karakter</h5>
        <p class="card-text small text-muted">
          Integrasi antara hafalan Al-Qur’an dan pendidikan akhlak untuk membentuk siswa yang beriman, berakhlak mulia, dan memiliki kedewasaan emosional.
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card h-100 border-0 shadow-lg hover-shadow transition">
      <div class="card-body">
        <div class="mb-3">
          <i class="bi bi-lightbulb-fill fs-1 text-warning"></i>
        </div>
        <h5 class="card-title fw-semibold">Program Startup Siswa</h5>
        <p class="card-text small text-muted">
          Mendorong semangat entrepreneurship melalui proyek startup kreatif berbasis teknologi, kolaborasi, dan pemecahan masalah sosial nyata.
        </p>
      </div>
    </div>
  </div>
</div>

<hr class="my-5">
<h3 id="kegiatan" class="text-center mb-4 fw-bold" >Kegiatan Terbaru</h3>
<div class="row">
  <?php foreach ($kegiatan as $k): ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="<?= base_url('uploads/' . $k['image']) ?>" class="card-img-top" style="max-height: 200px; object-fit: cover;" alt="<?= esc($k['nama_kegiatan']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= esc($k['nama_kegiatan']) ?></h5>
          <p class="card-text small text-muted"><?= date('d M Y', strtotime($k['tanggal'])) ?></p>
          <p class="card-text"><?= esc(substr(strip_tags($k['deskripsi']), 0, 255)) ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
