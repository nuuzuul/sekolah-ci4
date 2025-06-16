<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Informasi Sekolah' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
        height: 100%;
        }
        body {
        display: flex;
        flex-direction: column;
        }
        main {
        flex: 1;
        }
        .nav-link.position-relative::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0d6efd;
            transition: width 0.3s ease-in-out;
        }
        .nav-link.position-relative:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- 🔷 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/image/sekolah.png') ?>" alt="Logo" width="30" class="d-inline-block align-text-top">
            SekolahKu
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold text-dark position-relative" href="<?= base_url('/') ?>#beranda">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold text-dark position-relative" href="<?= base_url('/') ?>#kegiatan">
                        Kegiatan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold text-dark position-relative" href="<?= base_url('/penerimaan') ?>">
                        Penerimaan Siswa Baru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold text-dark position-relative" href="<?= base_url('/') ?>#kontak">
                        Hubungi Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary px-4 fw-semibold shadow-sm" href="<?= base_url('/admin/login') ?>">
                        <i class="bi bi-person-circle me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- 🔽 MAIN CONTENT -->
<div class="container my-4">
    <?= $this->renderSection('content') ?>
</div>

<!-- 🔚 FOOTER -->
<?= $this->include('layout/footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
