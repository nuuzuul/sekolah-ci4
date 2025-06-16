<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 240px;
            background-color: #1e293b;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            font-size: 15px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #334155;
            color: #fff;
        }
        .sidebar .logo {
            width: 60px;
            margin: 0 auto 10px;
            display: block;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-title {
            font-size: 1rem;
            color: #334155;
        }
        .display-6 {
            font-weight: bold;
            color: #1e293b;
        }
        .modal-content {
        background-color: #fff !important;
        backdrop-filter: none !important;
        filter: none !important;
        z-index: 1055;
        }
        .modal-backdrop.show {
        opacity: 0.5;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="text-center mb-3">
        <img src="<?= base_url('assets/image/sekolah.png') ?>" alt="Logo" class="logo">
        <h5 class="mt-2">Admin Panel</h5>
    </div>

    <nav class="nav flex-column">
        <a href="<?= base_url('/admin/dashboard') ?>" class="nav-link">
            <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
        <a href="<?= base_url('/admin/kegiatan') ?>" class="nav-link">
            <i class="bi bi-calendar-event me-2"></i> Kegiatan
        </a>
        <a href="<?= base_url('/admin/penerimaan') ?>" class="nav-link">
            <i class="bi bi-person-vcard me-2"></i> Penerimaan
        </a>
    </nav>
    <hr class="bg-secondary mx-3">
    <a href="<?= base_url('/admin/logout') ?>" class="nav-link text-danger">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
</div>

<!-- Content -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
