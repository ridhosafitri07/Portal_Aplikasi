<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil – User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f4fb; }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 240px; min-height: 100vh; background: #1a4fa0;
            position: fixed; top: 0; left: 0; padding: 28px 0 0;
            display: flex; flex-direction: column;
        }
        .sidebar .brand {
            color: #fff; font-size: 1.1rem; font-weight: 700;
            padding: 0 24px 24px; border-bottom: 1px solid rgba(255,255,255,.12);
        }
        .sidebar .brand span { color: #7ec8ff; }
        .sidebar nav { margin-top: 16px; flex: 1; }
        .sidebar nav a {
            display: flex; align-items: center; gap: 12px;
            color: rgba(255,255,255,.72); text-decoration: none;
            padding: 11px 24px; font-size: .9rem;
            transition: background .15s, color .15s;
        }
        .sidebar nav a:hover, .sidebar nav a.active {
            background: rgba(255,255,255,.12); color: #fff;
        }
        .sidebar nav a i { font-size: 1.1rem; }
        .sidebar .logout { padding: 20px 24px; }
        .sidebar .logout a {
            display: flex; align-items: center; gap: 10px;
            color: #ffacac; text-decoration: none; font-size: .88rem;
        }

        /* ── MAIN ── */
        .main { margin-left: 240px; padding: 32px 36px; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 28px;
        }
        .topbar h4 { font-weight: 700; color: #1a2f5a; margin: 0; }
        .topbar .user-info {
            display: flex; align-items: center; gap: 10px;
            font-size: .88rem; color: #555;
        }
        .topbar .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg,#3d8ef0,#5cb8ff);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: .9rem;
        }

        /* ── PAGE HEADER ── */
        .page-title { font-size: 1.75rem; font-weight: 700; color: #1a4fa0; margin-bottom: 4px; }
        .page-sub   { font-size: .85rem; color: #888; margin-bottom: 28px; }

        /* ── CARD ── */
        .settings-card {
            background: #fff; border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
            padding: 32px 36px;
        }

        .section-title {
            font-size: 1rem; font-weight: 700; color: #1a2f5a;
            margin-bottom: 20px;
        }

        .divider { border-top: 1px solid #eef0f5; margin: 28px 0; }

        /* ── FORM ── */
        .form-label {
            font-size: .8rem; font-weight: 600; color: #555;
            margin-bottom: 6px;
        }
        .form-control {
            border: 1.5px solid #e5e8f0; border-radius: 10px;
            font-size: .88rem; padding: 10px 14px;
            background: #f8faff; transition: border-color .2s, box-shadow .2s;
        }
        .form-control:focus {
            border-color: #4a9df8; box-shadow: 0 0 0 3px rgba(74,157,248,.12);
            background: #fff;
        }
        .form-control:readonly {
            background: #f0f1f3; color: #666; cursor: not-allowed;
            border-color: #d5d8de;
        }
        .input-group .form-control { border-right: none; }
        .input-group .btn-toggle {
            border: 1.5px solid #e5e8f0; border-left: none;
            background: #f8faff; border-radius: 0 10px 10px 0;
            color: #aaa; padding: 0 14px; cursor: pointer;
            transition: color .2s;
        }
        .input-group .btn-toggle:hover { color: #4a9df8; }

        .btn-submit {
            background: linear-gradient(90deg,#3d8ef0,#5cb8ff);
            border: none; border-radius: 10px; color: #fff;
            font-weight: 600; font-size: .9rem; padding: 11px 36px;
            transition: opacity .2s, transform .15s;
        }
        .btn-submit:hover { opacity: .9; transform: translateY(-1px); }

        /* ── APPEARANCE ── */
        .appearance-title { font-size: 1rem; font-weight: 700; color: #1a2f5a; margin-bottom: 18px; }

        .theme-option {
            border: 2.5px solid transparent; border-radius: 14px;
            overflow: hidden; cursor: pointer;
            transition: border-color .2s, transform .15s;
            margin-bottom: 12px;
        }
        .theme-option:hover { transform: translateY(-2px); }
        .theme-option.selected { border-color: #4a9df8; }

        .theme-preview {
            width: 100%; aspect-ratio: 16/9;
            display: flex; align-items: center; justify-content: center;
        }
        .theme-preview.light {
            background: linear-gradient(135deg, #f0f4fb, #dde8f5);
        }
        .theme-preview.dark {
            background: linear-gradient(135deg, #1e2430, #2d3748);
        }
        .theme-label {
            text-align: center; font-size: .78rem; color: #666;
            padding: 6px 0 4px; background: #fff;
        }
        .theme-option.selected .theme-label { color: #4a9df8; font-weight: 600; }

        /* alert */
        .alert { border-radius: 10px; font-size: .85rem; }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { margin-left: 0; padding: 20px; }
        }
    </style>
</head>
<body>

<!-- ── SIDEBAR ── -->
<div class="sidebar">
    <div class="brand">App<span>Portal</span></div>
    <nav>
        <a href="<?= base_url('user/dashboard') ?>">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>
        <a href="<?= base_url('user/profile') ?>" class="active">
            <i class="bi bi-person"></i> Profil
        </a>
    </nav>
    <div class="logout">
        <a href="<?= base_url('auth/logout') ?>">
            <i class="bi bi-box-arrow-left"></i> Keluar
        </a>
    </div>
</div>

<!-- ── MAIN ── -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">
        <h4>Profil</h4>
        <div class="user-info">
            <div class="avatar"><?= strtoupper(substr(session('nama_user'), 0, 1)) ?></div>
            <?= esc(session('nama_user')) ?>
        </div>
    </div>

    <!-- Page header -->
    <div class="page-title">Settings</div>
    <div class="page-sub">Manage your account and preferences.</div>

    <!-- Alerts -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="bi bi-exclamation-circle me-1"></i> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="settings-card">
        <div class="row g-4">

            <!-- ── KIRI: Form ── -->
            <div class="col-lg-8">

                <!-- Profile Information -->
                <div class="section-title">Profile Information</div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" readonly
                               value="<?= esc($user['nama_user'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" readonly
                               value="<?= esc($user['username'] ?? '') ?>">
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Change Password -->
                <div class="section-title">Change Password</div>
                <form action="<?= base_url('user/profile/password') ?>" method="POST" id="formPassword">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Old Password</label>
                            <div class="input-group">
                                <input type="password" name="old_password" id="oldPwd"
                                       class="form-control" placeholder="Your Old Password">
                                <button type="button" class="btn-toggle" onclick="togglePwd('oldPwd','iconOld')">
                                    <i class="bi bi-eye-slash" id="iconOld"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password" id="newPwd"
                                       class="form-control" placeholder="Type Your New Password">
                                <button type="button" class="btn-toggle" onclick="togglePwd('newPwd','iconNew')">
                                    <i class="bi bi-eye-slash" id="iconNew"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-6">
                            <label class="form-label">Password Validation</label>
                            <input type="password" name="confirm_password" id="confirmPwd"
                                   class="form-control" placeholder="Validation New Password">
                            <div id="matchMsg" class="mt-1" style="font-size:.78rem"></div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" form="formPassword" class="btn-submit" id="btnSubmitPwd" disabled>
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            <!-- ── KANAN: Appearance ── -->
            <div class="col-lg-4">
                <div class="appearance-title">Appearance</div>

                <div class="theme-option selected" id="themeLight" onclick="selectTheme('light')">
                    <div class="theme-preview light">
                        <i class="bi bi-sun text-primary" style="font-size:1.5rem;opacity:.4"></i>
                    </div>
                    <div class="theme-label">Light Mode</div>
                </div>

                <div class="theme-option" id="themeDark" onclick="selectTheme('dark')">
                    <div class="theme-preview dark">
                        <i class="bi bi-moon-stars text-light" style="font-size:1.5rem;opacity:.4"></i>
                    </div>
                    <div class="theme-label">Dark Mode</div>
                </div>

                <p class="text-muted mt-2" style="font-size:.75rem">
                    Pilihan tema tersimpan di browser dan tidak mempengaruhi akun.
                </p>
            </div>

        </div>
    </div><!-- /settings-card -->
</div><!-- /main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Toggle password visibility ─────────────────────────
function togglePwd(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-slash';
    }
}

// ── Password match validation ──────────────────────────
const newPwd     = document.getElementById('newPwd');
const confirmPwd = document.getElementById('confirmPwd');
const matchMsg   = document.getElementById('matchMsg');
const btnPwd     = document.getElementById('btnSubmitPwd');

function checkMatch() {
    const n = newPwd.value;
    const c = confirmPwd.value;
    if (!c) { matchMsg.textContent = ''; btnPwd.disabled = true; return; }
    if (n === c) {
        matchMsg.textContent = '✓ Password cocok';
        matchMsg.style.color = '#16a34a';
        btnPwd.disabled = false;
    } else {
        matchMsg.textContent = '✗ Password tidak cocok';
        matchMsg.style.color = '#dc2626';
        btnPwd.disabled = true;
    }
}
newPwd.addEventListener('input', checkMatch);
confirmPwd.addEventListener('input', checkMatch);

// ── Theme selector ─────────────────────────────────────
function selectTheme(theme) {
    document.getElementById('themeLight').classList.toggle('selected', theme === 'light');
    document.getElementById('themeDark').classList.toggle('selected',  theme === 'dark');
    localStorage.setItem('portal_theme', theme);
    // Implementasi dark mode bisa ditambahkan di sini
}

// Load saved theme
(function() {
    const saved = localStorage.getItem('portal_theme');
    if (saved) selectTheme(saved);
})();
</script>
</body>
</html>