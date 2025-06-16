<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #eef1f5, #dfe4ea);
        }
        .login-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-5">
        <div class="login-card bg-white text-center">
            <!-- Logo -->
            <img src="<?= base_url('assets/image/sekolah.png') ?>" alt="Logo" class="logo">
            <h4 class="mb-3">Login Admin</h4>

            <!-- Alert Error -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <!-- Form -->
            <form method="post" action="<?= base_url('admin/loginProses') ?>" class="text-start">
                <div class="mb-3">
                    <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                    <input type="text" name="email" class="form-control" placeholder="admin@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label"><i class="bi bi-lock"></i> Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="passwordField" class="form-control" placeholder="••••••••" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" tabindex="-1">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right me-1"></i> Masuk</button>
            </form>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('passwordField');
    const toggleIcon = document.getElementById('toggleIcon');

    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    toggleIcon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
}
</script>

</body>
</html>
