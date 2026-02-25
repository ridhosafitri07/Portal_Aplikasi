<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – User</title>
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
            --navbar-bg: #1a2f4a;
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
        
        .main { padding: 40px 36px; transition: background .3s; max-width: 1600px; margin: 0 auto; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 32px;
        }
        .topbar h4 { font-weight: 700; color: var(--text-primary); margin: 0; font-size: 1.5rem; }
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
        
        .greeting-box {
            background: linear-gradient(135deg, #0f396d 0%, #5cb8ff 100%);
            border-radius: 20px; color: #fff; padding: 40px 48px;
            margin-bottom: 36px; position: relative; overflow: hidden;
            transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.25);
        }

        body.dark-mode .greeting-box {
            background: linear-gradient(135deg, #5cb8ffd3 0%, #0f396d 100%);
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.35);
        }

        .greeting-box h5 { font-weight: 600; font-size: 1.5rem; margin-bottom: 12px; letter-spacing: -0.5px; }
        .greeting-box p { opacity: .92; font-size: 1rem; margin: 0; font-weight: 400; }
        .greeting-box .decoration {
            position: absolute; right: -40px; top: -40px;
            width: 200px; height: 200px; border-radius: 50%;
            background: rgba(255,255,255,.1);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .card-app {
            border: none; border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,.07);
            transition: transform .2s, box-shadow .2s, background .3s;
            background: var(--bg-secondary);
            color: var(--text-secondary);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 24px 20px !important;
            min-height: 240px;
            text-align: center;
            height: 100%;
        }

        body.dark-mode .card-app {
            box-shadow: 0 4px 20px rgba(0,0,0,.3);
        }

        .card-app:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 16px 40px rgba(61, 142, 240, 0.15); 
        }

        body.dark-mode .card-app:hover {
            box-shadow: 0 16px 40px rgba(61, 142, 240, 0.25);
        }

        .card-app .icon-wrap {
            width: 80px; height: 80px; border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.2rem; margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        body.dark-mode .card-app .icon-wrap {
            box-shadow: 0 4px 12px rgba(0,0,0,.3);
        }

        .card-app .app-title {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .card-app .btn-open {
            background: linear-gradient(90deg, #3d8ef0, #5cb8ff);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity .2s, transform .15s, box-shadow .2s;
            margin-top: auto;
            width: 100%;
            box-shadow: 0 4px 12px rgba(61, 142, 240, 0.2);
        }

        .card-app .btn-open:hover { 
            opacity: .95; 
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(61, 142, 240, 0.3);
        }
        .card-app .btn-open:active { transform: translateY(0); }

        .search-apps {
            margin-bottom: 32px;
        }

        .search-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
            max-width: 450px;
        }

        .search-apps input {
            width: 100%;
            padding: 14px 18px 14px 48px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: .95rem;
            background: var(--form-bg);
            color: var(--text-primary);
            transition: border-color .2s, box-shadow .2s, background .2s;
            font-weight: 500;
        }

        .search-apps input:focus {
            outline: none;
            border-color: #3d8ef0;
            box-shadow: 0 0 0 4px rgba(61, 142, 240, .12);
            background: var(--bg-secondary);
        }

        .search-apps input::placeholder {
            color: #999;
        }

        body.dark-mode .search-apps input::placeholder {
            color: #6b7280;
        }

        .search-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
            font-size: 1.1rem;
        }

        body.dark-mode .search-wrapper i {
            color: #6b7280;
        }
        
        .bg-blue { background: #dbeafe; color: #2563eb; }
        .bg-green { background: #dcfce7; color: #16a34a; }
        .bg-purple { background: #ede9fe; color: #7c3aed; }
        .bg-orange { background: #ffedd5; color: #ea580c; }

        body.dark-mode .bg-blue { background: rgba(37, 99, 235, 0.15); color: #60a5fa; }
        body.dark-mode .bg-green { background: rgba(22, 163, 74, 0.15); color: #4ade80; }
        body.dark-mode .bg-purple { background: rgba(124, 58, 237, 0.15); color: #d8b4fe; }
        body.dark-mode .bg-orange { background: rgba(234, 88, 12, 0.15); color: #fb923c; }
        
        .form-control::placeholder {
            color: #999;
            opacity: 1;
        }

        body.dark-mode .form-control::placeholder {
            color: #6b7280;
            opacity: 1;
        }
        
        .text-muted { color: var(--text-secondary) !important; }

        body.dark-mode .text-dark {
            color: var(--text-primary) !important;
        }

        .hidden { display: none !important; }
        
        #noResults {
            animation: fadeIn .3s ease-in;
        }
        
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
            .navbar .nav-menu { gap: 12px; margin-left: 0; }
            .navbar .nav-menu a { font-size: .8rem; padding: 6px 10px; }
            .navbar .brand {
                left: 16px;
                font-size: 1.1rem;
                gap: 8px;
            }
            .navbar .brand-logo {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
            .body { padding-top: 72px; }
            .main { padding: 24px 16px; }
            .topbar h4 { font-size: 1.3rem; }
            .greeting-box { padding: 24px 20px; margin-bottom: 24px; }
            .greeting-box h5 { font-size: 1.2rem; }
            .greeting-box p { font-size: .85rem; }
            .search-wrapper { max-width: 100%; }
            .row.g-4 { --bs-gutter-x: 0.75rem; }
        }

        @media (max-width: 576px) {
            .navbar .nav-menu { gap: 8px; }
            .navbar .nav-menu a { font-size: .75rem; padding: 4px 8px; }
            .main { padding: 16px 12px; }
            .topbar h4 { font-size: 1.1rem; }
            .greeting-box { padding: 20px 16px; }
            .greeting-box h5 { font-size: 1.1rem; margin-bottom: 6px; }
            .greeting-box p { font-size: .8rem; }
            .card-app { padding: 16px 12px !important; min-height: 220px; }
            .card-app .icon-wrap { width: 70px; height: 70px; font-size: 1.8rem; }
            .card-app .app-title { font-size: 1rem; }
            .card-app .btn-open { padding: 10px 16px; font-size: .85rem; }
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
        <a href="<?= base_url('user/dashboard') ?>" class="active"><i class="bi bi-grid-1x2"></i> Dashboard</a>
        <a href="<?= base_url('user/profile') ?>"><i class="bi bi-person"></i> Profil</a>
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
    <div class="topbar">
        <h4>Dashboard</h4>
    </div>

    <div class="greeting-box">
        <div class="decoration"></div>
        <h5>Selamat Datang, <?= esc(session('nama_user')) ?>! 👋</h5>
        <p>Pilih aplikasi yang ingin kamu akses hari ini.</p>
    </div>

    <?php if (!empty($apps)): ?>
    <div class="search-apps mb-4">
        <div class="search-wrapper">
            <i class="bi bi-search"></i>
            <input type="text" id="searchApps" placeholder="Cari aplikasi...">
        </div>
    </div>

    <div class="row g-4" id="appsContainer">
        <?php
        $icons = ['bi-window','bi-file-earmark-text','bi-bar-chart','bi-gear'];
        $colors = ['bg-blue','bg-green','bg-purple','bg-orange'];
        foreach ($apps as $idx => $app): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 app-card" data-app-name="<?= strtolower(esc((string)$app['nama'])) ?>">
            <div class="card card-app">
                <div class="icon-wrap <?= $colors[$idx % 4] ?>">
                    <i class="bi <?= $icons[$idx % 4] ?>"></i>
                </div>
                <div class="app-title"><?= esc((string)$app['nama']) ?></div>
                <button class="btn-open" onclick="openApp('<?= base64_encode($app['url_app']) ?>')">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Open App
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center text-muted mt-5">
        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
        Belum ada aplikasi yang dapat kamu akses.
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function() {
    const saved = localStorage.getItem('portal_theme') || 'light';
    if (saved === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
})();

function toggleProfileMenu() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('show');
}

document.addEventListener('click', function(e) {
    const profileMenu = document.querySelector('.profile-menu');
    const dropdown = document.getElementById('profileDropdown');
    if (profileMenu && !profileMenu.contains(e.target)) {
        dropdown.classList.remove('show');
    }
});

function openApp(encodedUrl) {
    try {
        const decodedUrl = atob(encodedUrl);
        window.open(decodedUrl, '_blank');
    } catch (e) {
        console.error('Invalid URL');
    }
}

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

document.getElementById('searchApps').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase().trim();
    const appCards = document.querySelectorAll('.app-card');
    let visibleCount = 0;

    appCards.forEach(card => {
        const appName = card.getAttribute('data-app-name');
        if (appName.includes(searchValue)) {
            card.classList.remove('hidden');
            visibleCount++;
        } else {
            card.classList.add('hidden');
        }
    });

    const container = document.getElementById('appsContainer');
    let emptyMsg = document.getElementById('noResults');
    
    if (visibleCount === 0 && searchValue) {
        if (!emptyMsg) {
            emptyMsg = document.createElement('div');
            emptyMsg.id = 'noResults';
            emptyMsg.className = 'text-center text-muted mt-5';
            emptyMsg.innerHTML = '<i class="bi bi-search fs-1 d-block mb-2"></i><p>Aplikasi tidak ditemukan</p>';
            container.parentElement.insertBefore(emptyMsg, container.nextSibling);
        }
        emptyMsg.style.display = 'block';
    } else if (emptyMsg) {
        emptyMsg.style.display = 'none';
    }
});
</script>
</body>
</html>