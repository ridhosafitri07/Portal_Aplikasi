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
        body { font-family: 'Poppins', sans-serif; background: #f0f4fb; }
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
        .sidebar .logout {
            padding: 20px 24px;
        }
        .sidebar .logout a {
            display: flex; align-items: center; gap: 10px;
            color: #ffacac; text-decoration: none; font-size: .88rem;
        }
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
        .card-app {
            border: none; border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,.07);
            transition: transform .2s, box-shadow .2s;
            cursor: pointer;
        }
        .card-app:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,.13); }
        .card-app .icon-wrap {
            width: 54px; height: 54px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; margin-bottom: 14px;
        }
        .bg-blue { background: #dbeafe; color: #2563eb; }
        .bg-green { background: #dcfce7; color: #16a34a; }
        .bg-purple { background: #ede9fe; color: #7c3aed; }
        .bg-orange { background: #ffedd5; color: #ea580c; }
        .greeting-box {
            background: linear-gradient(120deg,#1a4fa0,#3d8ef0);
            border-radius: 16px; color: #fff; padding: 28px 32px;
            margin-bottom: 28px; position: relative; overflow: hidden;
        }
        .greeting-box h5 { font-weight: 700; font-size: 1.25rem; margin-bottom: 6px; }
        .greeting-box p { opacity: .82; font-size: .88rem; margin: 0; }
        .greeting-box .decoration {
            position: absolute; right: -20px; top: -20px;
            width: 160px; height: 160px; border-radius: 50%;
            background: rgba(255,255,255,.08);
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">App<span>Portal</span></div>
    <nav>
        <a href="<?= base_url('user/dashboard') ?>" class="active">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>
        <a href="<?= base_url('user/profile') ?>"><i class="bi bi-person"></i> Profil</a>
    </nav>
    <div class="logout">
        <a href="<?= base_url('auth/logout') ?>">
            <i class="bi bi-box-arrow-left"></i> Keluar
        </a>
    </div>
</div>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <h4>Dashboard</h4>
        <div class="user-info">
            <div class="avatar"><?= strtoupper(substr(session('nama_user'), 0, 1)) ?></div>
            <?= esc(session('nama_user')) ?>
        </div>
    </div>

    <div class="greeting-box">
        <div class="decoration"></div>
        <h5>Selamat Datang, <?= esc(session('nama_user')) ?>! 👋</h5>
        <p>Pilih aplikasi yang ingin kamu akses hari ini.</p>
    </div>

    <?php if (!empty($apps)): ?>
    <div class="row g-4">
        <?php
        $icons = ['bi-window','bi-file-earmark-text','bi-bar-chart','bi-gear'];
        $colors = ['bg-blue','bg-green','bg-purple','bg-orange'];
        foreach ($apps as $idx => $app): ?>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-app p-4" onclick="window.open('<?= esc($app['url_app']) ?>','_blank')">
                <div class="icon-wrap <?= $colors[$idx % 4] ?>">
                    <i class="bi <?= $icons[$idx % 4] ?>"></i>
                </div>
                <div class="fw-600 text-dark mb-1" style="font-weight:600"><?= esc($app['nama']) ?></div>
                <small class="text-muted"><?= esc($app['url_app']) ?></small>
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

</body>
</html>