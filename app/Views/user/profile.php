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
        :root {
            --bg-primary: #f0f4fb;
            --bg-secondary: #fff;
            --text-primary: #1a2f5a;
            --text-secondary: #555;
            --border-color: #e5e8f0;
            --navbar-bg: linear-gradient(135deg, #c0dbf0 0%, #c0dbf0 100%);
            --navbar-text: #1a5fb4;
            --navbar-text-secondary: #35699e;
            --form-bg: #f8faff;
            --accent-blue: #3d8ef0;
            --accent-blue-light: #5cb8ff;
        }

        body.dark-mode {
            --bg-primary: #0f1419;
            --bg-secondary: #1a1f2e;
            --text-primary: #e0e6f2;
            --text-secondary: #b0b8c8;
            --border-color: #2a3147;
            --navbar-bg: linear-gradient(135deg, #1a2f4a 0%, #2d5a8a 100%);
            --navbar-text: #a3c8ff;
            --navbar-text-secondary: #7ba8d8;
            --form-bg: #252a3a;
        }

        body { font-family: 'Poppins', sans-serif; background: var(--bg-primary); color: var(--text-secondary); transition: background .3s, color .3s; padding-top: 76px; }
        
        .navbar {
            width: 100%; height: 76px; background: var(--navbar-bg);
            position: fixed; top: 0; left: 0; right: 0; padding: 0 36px;
            display: flex; align-items: center; justify-content: center;
            transition: all .3s;
            box-shadow: 0 2px 12px rgba(26, 95, 180, 0.5);
            z-index: 1030;
        }
        
        body.dark-mode .navbar {
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.5);
        }
        
        .navbar .brand {
            color: var(--navbar-text); font-size: 1.25rem; font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.5px;
            transition: all .3s;
            position: absolute; left: 36px;
            display: flex; align-items: center; gap: 12px;
        }

        .navbar .brand-logo {
            width: 40px; height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-blue-light));
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 1.1rem;
            box-shadow: 0 3px 12px rgba(61, 142, 240, 0.3);
        }
        
        .navbar .brand-text {
            display: flex; gap: 2px;
        }
        
        .navbar .brand span { color: var(--accent-blue-light); }
        .navbar .brand:hover {
            opacity: .8;
        }
        
        .navbar .nav-menu {
            display: flex; align-items: center; gap: 28px;
        }
        
        .navbar .nav-menu a {
            color: var(--navbar-text-secondary); text-decoration: none;
            font-size: .95rem; font-weight: 500;
            padding: 8px 16px; border-radius: 8px;
            transition: all .25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex; align-items: center; gap: 8px;
        }
        
        .navbar .nav-menu a:hover,
        .navbar .nav-menu a.active {
            color: var(--navbar-text);
            background: rgba(26, 95, 180, .12);
        }
        
        body.dark-mode .navbar .nav-menu a {
            color: #7ba8d8;
        }
        
        body.dark-mode .navbar .nav-menu a:hover,
        body.dark-mode .navbar .nav-menu a.active {
            color: var(--accent-blue-light);
            background: rgba(163, 200, 255, .12);
        }
        
        .navbar .nav-right {
            display: flex; align-items: center; gap: 20px; position: absolute; right: 36px;
        }
        
        .navbar .logout-btn {
            color: #d97e6a; text-decoration: none; font-size: 1.1rem;
            padding: 8px 12px; border-radius: 8px;
            transition: all .25s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            cursor: pointer;
            background: #ffffffcb;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .navbar .logout-btn:hover {
            background: #f5f5f5;
            color: #e8967f;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        body.dark-mode .navbar .logout-btn {
            background: #2d3245;
            color: #d97e6a;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        body.dark-mode .navbar .logout-btn:hover {
            background: #3a4057;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .main { padding: 36px 36px; transition: background .3s; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 28px;
        }
        .topbar h4 { font-weight: 700; color: var(--text-primary); margin: 0; }
        .topbar .user-info {
            display: flex; align-items: center; gap: 10px;
            font-size: .88rem; color: var(--text-secondary);
        }
        .topbar .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg,#3d8ef0,#5cb8ff);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: .9rem;
        }

        .page-title { font-size: 1.75rem; font-weight: 700; color: var(--text-primary); margin-bottom: 4px; }
        .page-sub   { font-size: .85rem; color: var(--text-secondary); margin-bottom: 28px; }

        .settings-card {
            background: var(--bg-secondary); border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
            padding: 32px 36px; transition: background .3s;
        }

        body.dark-mode .settings-card {
            box-shadow: 0 4px 24px rgba(0,0,0,.4);
        }

        .section-title {
            font-size: 1rem; font-weight: 700; color: var(--text-primary);
            margin-bottom: 20px;
        }

        .divider { border-top: 1px solid var(--border-color); margin: 28px 0; transition: border-color .3s; }

        .form-label {
            font-size: .8rem; font-weight: 600; color: var(--text-secondary);
            margin-bottom: 6px;
        }
        .form-control {
            border: 1.5px solid var(--border-color); border-radius: 10px;
            font-size: .88rem; padding: 10px 14px;
            background: var(--form-bg); color: var(--text-secondary);
            transition: border-color .2s, box-shadow .2s, background .3s;
        }
        .form-control:focus {
            border-color: #4a9df8; box-shadow: 0 0 0 3px rgba(74,157,248,.12);
            background: #fff;
        }

        body.dark-mode .form-control:focus {
            background: #2d3245;
            color: var(--text-secondary);
        }

        .form-control:readonly {
            background: #f0f1f3; color: #666; cursor: not-allowed;
            border-color: #d5d8de;
        }

        body.dark-mode .form-control:readonly {
            background: #1a1f2e; color: #888;
            border-color: #3a4057;
        }

        .form-control::placeholder {
            color: #999;
            opacity: 1;
        }

        body.dark-mode .form-control::placeholder {
            color: #6b7280;
            opacity: 1;
        }

        .input-group .form-control { border-right: none; }
        .input-group .btn-toggle {
            border: 1.5px solid var(--border-color); border-left: none;
            background: var(--form-bg); border-radius: 0 10px 10px 0;
            color: #aaa; padding: 0 14px; cursor: pointer;
            transition: color .2s, background .3s, border-color .3s;
        }
        .input-group .btn-toggle:hover { color: #4a9df8; }

        .btn-submit {
            background: linear-gradient(90deg,#3d8ef0,#5cb8ff);
            border: none; border-radius: 10px; color: #fff;
            font-weight: 600; font-size: .9rem; padding: 11px 36px;
            transition: opacity .2s, transform .15s;
        }
        .btn-submit:hover { opacity: .9; transform: translateY(-1px); }

        .appearance-title { font-size: 1rem; font-weight: 700; color: var(--text-primary); margin-bottom: 18px; }

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
            text-align: center; font-size: .78rem; color: var(--text-secondary);
            padding: 6px 0 4px; background: var(--bg-secondary);
            transition: background .3s, color .3s;
        }
        .theme-option.selected .theme-label { color: #4a9df8; font-weight: 600; }

        .alert { border-radius: 10px; font-size: .85rem; }
        
        .logout-modal {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            animation: fadeIn .3s;
        }
        
        .logout-modal.show {
            display: flex;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .logout-modal-content {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 32px;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp .3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .logout-modal-icon {
            width: 60px; height: 60px;
            border-radius: 50%;
            background: rgba(217, 126, 106, 0.12);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            color: #d97e6a;
        }
        
        .logout-modal-title {
            font-size: 1.2rem; font-weight: 700; color: var(--text-primary);
            text-align: center; margin-bottom: 10px;
        }
        
        .logout-modal-text {
            font-size: .9rem; color: var(--text-secondary);
            text-align: center; margin-bottom: 28px;
        }
        
        .logout-modal-buttons {
            display: flex; gap: 12px;
        }
        
        .logout-modal-buttons button {
            flex: 1; padding: 12px 16px;
            border: none; border-radius: 10px;
            font-weight: 600; font-size: .9rem;
            cursor: pointer; transition: all .25s;
        }
        
        .logout-modal-btn-no {
            background: #f0f1f3; color: var(--text-secondary);
        }
        
        .logout-modal-btn-no:hover {
            background: #e5e6eb;
        }
        
        body.dark-mode .logout-modal-btn-no {
            background: #2d3245; color: var(--text-secondary);
        }
        
        body.dark-mode .logout-modal-btn-no:hover {
            background: #3a4057;
        }
        
        .logout-modal-btn-yes {
            background: #d97e6a; color: #fff;
        }
        
        .logout-modal-btn-yes:hover {
            background: #e8967f;
            box-shadow: 0 4px 12px rgba(217, 126, 106, 0.3);
        }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .navbar .nav-menu { gap: 16px; margin-left: 24px; }
            .navbar .nav-menu a { font-size: .85rem; padding: 6px 12px; }
            body { padding-top: 72px; }
            .main { padding: 20px 16px; }
        }
    </style>
</head>
<body>
<nav class="navbar">
    <a href="<?= base_url('user/dashboard') ?>" class="brand">
        <div class="brand-logo">AP</div>
        <div class="brand-text"><span>App</span>Portal</div>
    </a>
    <div class="nav-menu">
        <a href="<?= base_url('user/dashboard') ?>"><i class="bi bi-grid-1x2"></i> Dashboard</a>
        <a href="<?= base_url('user/profile') ?>" class="active"><i class="bi bi-person"></i> Profil</a>
    </div>
    <div class="nav-right">
        <button class="logout-btn" onclick="showLogoutModal()">
            <i class="bi bi-box-arrow-left"></i>
        </button>
    </div>
</nav> 

<div class="logout-modal" id="logoutModal">
    <div class="logout-modal-content">
        <div class="logout-modal-icon">
            <i class="bi bi-question-circle"></i>
        </div>
        <div class="logout-modal-title">Yakin mau keluar?</div>
        <div class="logout-modal-text">Anda akan di-logout dari akun ini.</div>
        <div class="logout-modal-buttons">
            <button class="logout-modal-btn-no" onclick="closeLogoutModal()">Tidak</button>
            <button class="logout-modal-btn-yes" onclick="confirmLogout()">Ya, Keluar</button>
        </div>
    </div>
</div>

<div class="main">

    <div class="page-title">Settings</div>
    <div class="page-sub">Manage your account and preferences.</div>

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

            <div class="col-lg-8">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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

function selectTheme(theme) {
    document.getElementById('themeLight').classList.toggle('selected', theme === 'light');
    document.getElementById('themeDark').classList.toggle('selected',  theme === 'dark');
    
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    
    localStorage.setItem('portal_theme', theme);
}

(function() {
    const saved = localStorage.getItem('portal_theme') || 'light';
    selectTheme(saved);
})();

function showLogoutModal() {
    document.getElementById('logoutModal').classList.add('show');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.remove('show');
}

function confirmLogout() {
    window.location.href = '<?= base_url('auth/logout') ?>';
}

document.getElementById('logoutModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLogoutModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLogoutModal();
    }
});
</script>
</body>
</html> 