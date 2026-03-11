<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppPortal - Informasi Aplikasi</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy: #0a1628;
            --blue-900: #0d2247;
            --blue-800: #1a3a6e;
            --blue-700: #1e4db7;
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --blue-400: #60a5fa;
            --blue-300: #93c5fd;
            --blue-200: #bfdbfe;
            --blue-100: #dbeafe;
            --blue-50:  #eff6ff;

            --bg-body:   #f0f6ff;
            --bg-card:   #ffffff;
            --bg-navbar: rgba(255,255,255,0.82);

            --text-primary:   #0d2247;
            --text-secondary: #64748b;
            --text-muted:     #94a3b8;

            --border-color: rgba(37,99,235,0.1);
            --border-card:  rgba(37,99,235,0.08);

            --shadow-card:   0 4px 24px rgba(37,99,235,0.06);
            --shadow-navbar: 0 1px 32px rgba(37,99,235,0.08);
            --shadow-brand:  0 4px 14px rgba(37,99,235,0.4);

            --navbar-height: 68px;
            --bottom-nav-height: 64px;
        }

        body.dark-mode {
            --navy: #e0eeff;
            --blue-900: #cbd9f9;
            --blue-800: #a8c4f8;
            --blue-700: #7eaaff;
            --blue-600: #5b9cf9;
            --blue-500: #60a5fa;
            --blue-400: #93c5fd;
            --blue-300: #bfdbfe;
            --blue-200: #2a4c8a;
            --blue-100: #1a3261;
            --blue-50:  #11204a;

            --bg-body:   #080e1f;
            --bg-card:   #111827;
            --bg-navbar: rgba(10,16,35,0.92);

            --text-primary:   #e2eaff;
            --text-secondary: #8fa3c8;
            --text-muted:     #5a6e8f;

            --border-color: rgba(59,130,246,0.15);
            --border-card:  rgba(59,130,246,0.12);

            --shadow-card:   0 4px 24px rgba(0,0,0,0.35);
            --shadow-navbar: 0 1px 32px rgba(0,0,0,0.4);
            --shadow-brand:  0 4px 14px rgba(37,99,235,0.5);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-body);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .35s, color .35s;
        }

        body::before {
            content: '';
            position: fixed; inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 10% -10%, rgba(37,99,235,0.12) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(96,165,250,0.08) 0%, transparent 55%),
                var(--bg-body);
            z-index: -2;
            transition: background .35s;
        }

        body.dark-mode::before {
            background:
                radial-gradient(ellipse 80% 60% at 10% -10%, rgba(37,99,235,0.08) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(96,165,250,0.05) 0%, transparent 55%),
                var(--bg-body);
        }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--navbar-height);
            background: var(--bg-navbar);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--border-color);
            display: flex; align-items: center;
            padding: 0 36px;
            z-index: 1000;
            box-shadow: var(--shadow-navbar);
            transition: background .3s, box-shadow .3s;
        }

        .nav-brand {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
            position: absolute; left: 36px;
        }

        .nav-brand-logo {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--blue-600), var(--blue-400));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Sora', sans-serif;
            font-weight: 700; font-size: .95rem; color: white;
            box-shadow: var(--shadow-brand);
            flex-shrink: 0;
        }

        .nav-brand-name {
            font-family: 'Sora', sans-serif;
            font-weight: 700; font-size: 1.15rem;
            color: var(--blue-800);
            letter-spacing: -0.3px;
            transition: color .3s;
        }

        .nav-brand-name span { color: var(--blue-500); }

        .nav-links {
            display: flex; align-items: center; gap: 4px;
            margin: 0 auto;
        }

        .nav-links a {
            text-decoration: none; color: var(--text-secondary);
            font-size: .9rem; font-weight: 500;
            padding: 8px 16px; border-radius: 8px;
            display: flex; align-items: center; gap: 7px;
            transition: all .2s;
        }

        .nav-links a:hover { color: var(--blue-600); background: var(--blue-50); }

        .nav-links a.active {
            color: var(--blue-700);
            background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
            font-weight: 600;
        }

        body.dark-mode .nav-links a.active {
            color: var(--blue-400);
            background: rgba(59,130,246,0.15);
        }

        /* BOTTOM NAV */
        .bottom-nav {
            display: none;
            position: fixed; bottom: 0; left: 0; right: 0;
            height: var(--bottom-nav-height);
            background: var(--bg-navbar);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-top: 1px solid var(--border-color);
            z-index: 1000;
            box-shadow: 0 -4px 20px rgba(37,99,235,0.08);
        }

        .bottom-nav-inner {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: space-around;
        }

        .bottom-nav-item {
            display: flex; flex-direction: column;
            align-items: center; gap: 3px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: .68rem; font-weight: 600;
            padding: 6px 16px; border-radius: 12px;
            transition: all .2s;
            min-width: 64px;
        }

        .bottom-nav-item i { font-size: 1.25rem; }

        .bottom-nav-item.active {
            color: var(--blue-600);
            background: linear-gradient(135deg, var(--blue-100), var(--blue-50));
        }

        body.dark-mode .bottom-nav-item.active {
            color: var(--blue-400);
            background: rgba(59,130,246,0.15);
        }

        /* MAIN */
        .main {
            padding-top: calc(var(--navbar-height) + 32px);
            padding-bottom: 60px;
            max-width: 860px;
            margin: 0 auto;
            padding-left: 36px;
            padding-right: 36px;
        }

        /* HERO */
        .info-hero {
            background: linear-gradient(135deg, var(--navy) 0%, #1a3a6e 50%, #1e4db7 100%);
            border-radius: 28px;
            padding: 48px;
            margin-bottom: 36px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(13,34,71,0.28), 0 4px 20px rgba(37,99,235,0.2);
            text-align: center;
        }

        body.dark-mode .info-hero {
            background: linear-gradient(135deg, #050c1c 0%, #0d1e40 50%, #142565 100%);
        }

        .info-hero::after {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            pointer-events: none;
        }

        .info-hero-orb {
            position: absolute; border-radius: 50%;
            filter: blur(80px); pointer-events: none;
        }

        .info-hero-orb-1 {
            width: 350px; height: 350px;
            background: rgba(59,130,246,0.3);
            top: -120px; right: -60px;
        }

        .info-hero-orb-2 {
            width: 250px; height: 250px;
            background: rgba(96,165,250,0.2);
            bottom: -100px; left: 60px;
        }

        .info-hero-inner { position: relative; z-index: 2; }

        .info-logo-wrap {
            width: 80px; height: 80px;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.25);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            backdrop-filter: blur(10px);
            font-family: 'Sora', sans-serif;
            font-weight: 800; font-size: 1.6rem;
            color: white;
        }

        .info-hero h1 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem; font-weight: 700;
            color: white; margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .info-hero h1 span { color: #93c5fd; }

        .info-hero-sub {
            font-size: .95rem; color: rgba(255,255,255,0.65);
            max-width: 440px; margin: 0 auto 24px;
            line-height: 1.65;
        }

        .info-version-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            color: #bfdbfe;
            font-size: .8rem; font-weight: 600;
            padding: 6px 16px; border-radius: 100px;
            backdrop-filter: blur(8px);
        }

        .version-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: #4ade80;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .4; transform: scale(0.8); }
        }

        /* INFO GRID */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }

        .info-card {
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: 20px;
            padding: 28px;
            box-shadow: var(--shadow-card);
            transition: background .3s, border-color .3s, transform .2s;
        }

        .info-card:hover { transform: translateY(-2px); }

        .info-card.full { grid-column: 1 / -1; }

        .info-card-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .icon-blue   { background: linear-gradient(135deg, #dbeafe, #bfdbfe); color: #1d4ed8; }
        .icon-indigo { background: linear-gradient(135deg, #e0e7ff, #c7d2fe); color: #4338ca; }
        .icon-sky    { background: linear-gradient(135deg, #e0f2fe, #bae6fd); color: #0284c7; }
        .icon-green  { background: linear-gradient(135deg, #dcfce7, #bbf7d0); color: #15803d; }
        .icon-violet { background: linear-gradient(135deg, #ede9fe, #ddd6fe); color: #7c3aed; }
        .icon-amber  { background: linear-gradient(135deg, #fef3c7, #fde68a); color: #b45309; }

        body.dark-mode .icon-blue   { background: rgba(29,78,216,0.25);  color: #60a5fa; }
        body.dark-mode .icon-indigo { background: rgba(67,56,202,0.25);  color: #a5b4fc; }
        body.dark-mode .icon-sky    { background: rgba(2,132,199,0.25);  color: #7dd3fc; }
        body.dark-mode .icon-green  { background: rgba(21,128,61,0.25);  color: #4ade80; }
        body.dark-mode .icon-violet { background: rgba(124,58,237,0.25); color: #c4b5fd; }
        body.dark-mode .icon-amber  { background: rgba(180,83,9,0.25);   color: #fcd34d; }

        .info-card-label {
            font-size: .72rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 1px; color: var(--text-muted);
            margin-bottom: 6px;
        }

        .info-card-value {
            font-family: 'Sora', sans-serif;
            font-size: 1.05rem; font-weight: 700;
            color: var(--text-primary);
            line-height: 1.4;
            transition: color .3s;
        }

        .info-card-sub {
            font-size: .85rem; color: var(--text-secondary);
            margin-top: 4px; line-height: 1.55;
            transition: color .3s;
        }

        .tech-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }

        .tech-tag {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--blue-50);
            color: var(--blue-700);
            border: 1px solid var(--blue-200);
            border-radius: 8px;
            font-size: .8rem; font-weight: 600;
            padding: 5px 12px;
            transition: background .3s, color .3s, border-color .3s;
        }

        body.dark-mode .tech-tag {
            background: rgba(29,78,216,0.18);
            color: #93c5fd;
            border-color: rgba(59,130,246,0.25);
        }

        .timeline { list-style: none; margin-top: 14px; }

        .timeline li {
            display: flex; gap: 14px; align-items: flex-start;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-card);
        }

        .timeline li:last-child { border-bottom: none; }

        .timeline-dot {
            width: 10px; height: 10px; border-radius: 50%;
            background: var(--blue-500);
            margin-top: 5px; flex-shrink: 0;
        }

        .timeline-text { font-size: .88rem; color: var(--text-secondary); line-height: 1.5; }
        .timeline-text strong { color: var(--text-primary); font-weight: 600; }

        .copyright-block {
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: 20px;
            padding: 28px 32px;
            box-shadow: var(--shadow-card);
            text-align: center;
            transition: background .3s;
        }

        .copyright-block p {
            font-size: .88rem; color: var(--text-secondary);
            line-height: 1.7;
        }

        .copyright-block strong { color: var(--text-primary); font-weight: 600; }

        .copyright-year {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: 'Sora', sans-serif;
            font-size: .78rem; font-weight: 700;
            color: var(--blue-500);
            margin-top: 10px;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--blue-300); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--blue-400); }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .main { padding-left: 24px; padding-right: 24px; }
            .navbar { padding: 0 24px; }
            .nav-brand { left: 24px; }
        }

        @media (max-width: 768px) {
            :root { --navbar-height: 60px; }

            .nav-links { display: none; }

            .navbar { padding: 0 16px; }
            .nav-brand { left: 16px; }

            .bottom-nav { display: block; }

            .main {
                padding-top: calc(var(--navbar-height) + 20px);
                padding-bottom: calc(var(--bottom-nav-height) + 20px);
                padding-left: 16px;
                padding-right: 16px;
            }

            .info-hero {
                padding: 32px 20px;
                border-radius: 20px;
                margin-bottom: 20px;
            }

            .info-logo-wrap { width: 64px; height: 64px; font-size: 1.3rem; border-radius: 18px; margin-bottom: 16px; }

            .info-hero h1 { font-size: 1.6rem; }
            .info-hero-sub { font-size: .88rem; margin-bottom: 18px; }

            .info-grid { grid-template-columns: 1fr; gap: 14px; margin-bottom: 16px; }
            .info-card.full { grid-column: 1; }

            .info-card { padding: 22px 18px; border-radius: 16px; }

            .info-card-value { font-size: .98rem; }
            .info-card-sub   { font-size: .82rem; }

            .tech-tags { gap: 6px; }
            .tech-tag  { font-size: .75rem; padding: 4px 10px; }

            .copyright-block { padding: 22px 18px; border-radius: 16px; }
            .copyright-block p { font-size: .83rem; }

            .info-card:hover { transform: none; }
        }

        @media (max-width: 480px) {
            .info-hero { padding: 24px 16px; border-radius: 16px; }
            .info-hero h1 { font-size: 1.4rem; }
            .info-hero-sub { font-size: .83rem; }
            .info-version-badge { font-size: .75rem; padding: 5px 12px; }
            .info-card-icon { width: 38px; height: 38px; font-size: 1rem; border-radius: 10px; margin-bottom: 12px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="mainNavbar">
    <a href="<?= base_url('user/dashboard') ?>" class="nav-brand">
        <div class="nav-brand-logo">AP</div>
        <span class="nav-brand-name"><span>App</span>Portal</span>
    </a>

    <div class="nav-links">
        <a href="<?= base_url('user/dashboard') ?>">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= base_url('user/profile') ?>">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
        <a href="<?= base_url('user/info') ?>" class="active">
            <i class="bi bi-info-circle-fill"></i>
            <span>Info</span>
        </a>
    </div>
</nav>

<!-- BOTTOM NAV -->
<nav class="bottom-nav">
    <div class="bottom-nav-inner">
        <a href="<?= base_url('user/dashboard') ?>" class="bottom-nav-item">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
        <a href="<?= base_url('user/profile') ?>" class="bottom-nav-item">
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
        <a href="<?= base_url('user/info') ?>" class="bottom-nav-item active">
            <i class="bi bi-info-circle-fill"></i>
            <span>Info</span>
        </a>
    </div>
</nav>

<div class="main">

    <!-- HERO -->
    <div class="info-hero">
        <div class="info-hero-orb info-hero-orb-1"></div>
        <div class="info-hero-orb info-hero-orb-2"></div>
        <div class="info-hero-inner">
            <div class="info-logo-wrap">AP</div>
            <h1><span>App</span>Portal</h1>
            <p class="info-hero-sub">
                Platform terpusat untuk mengakses seluruh aplikasi internal secara mudah,
                cepat, dan terorganisir dalam satu portal.
            </p>
            <div class="info-version-badge">
                <div class="version-dot"></div>
                Versi 1.0.0 &nbsp;·&nbsp; Aktif & Berjalan
            </div>
        </div>
    </div>

    <!-- GRID INFO -->
    <div class="info-grid">

        <div class="info-card">
            <div class="info-card-icon icon-blue"><i class="bi bi-app-indicator"></i></div>
            <div class="info-card-label">Nama Aplikasi</div>
            <div class="info-card-value">AppPortal</div>
            <div class="info-card-sub">Portal Manajemen Akses Aplikasi Internal</div>
        </div>

        <div class="info-card">
            <div class="info-card-icon icon-indigo"><i class="bi bi-building"></i></div>
            <div class="info-card-label">Dibuat Untuk</div>
            <div class="info-card-value"><?= esc($organization ?? 'Nama Organisasi / Instansi') ?></div>
            <div class="info-card-sub">Pengelolaan hak akses aplikasi karyawan</div>
        </div>

        <div class="info-card">
            <div class="info-card-icon icon-sky"><i class="bi bi-person-badge-fill"></i></div>
            <div class="info-card-label">Dikembangkan Oleh</div>
            <div class="info-card-value"><?= esc($developer ?? 'Tim Pengembang') ?></div>
            <div class="info-card-sub">Siswa PKL SMKN 1 Bantul – Jurusan RPL</div>
        </div>

        <div class="info-card">
            <div class="info-card-icon icon-green"><i class="bi bi-calendar3"></i></div>
            <div class="info-card-label">Tahun Rilis</div>
            <div class="info-card-value"><?= esc($year ?? date('Y')) ?></div>
            <div class="info-card-sub">Versi pertama dirilis & aktif digunakan</div>
        </div>

        <div class="info-card full">
            <div class="info-card-icon icon-violet"><i class="bi bi-bullseye"></i></div>
            <div class="info-card-label">Tujuan Aplikasi</div>
            <div class="info-card-value" style="margin-bottom: 10px;">Mengapa AppPortal Dibuat?</div>
            <div class="info-card-sub">
                AppPortal hadir sebagai solusi terpusat untuk mengelola dan mengakses berbagai aplikasi
                internal secara efisien. Dengan sistem autentikasi tunggal dan manajemen hak akses
                berbasis grup, karyawan cukup login sekali untuk mengakses semua tools yang mereka butuhkan
                tanpa perlu mengingat banyak URL atau kredensial berbeda.
            </div>
        </div>

        <div class="info-card full">
            <div class="info-card-icon icon-sky"><i class="bi bi-stack"></i></div>
            <div class="info-card-label">Teknologi yang Digunakan</div>
            <div class="info-card-value" style="margin-bottom: 4px;">Tech Stack</div>
            <div class="tech-tags">
                <span class="tech-tag"><i class="bi bi-filetype-php"></i> PHP 8</span>
                <span class="tech-tag"><i class="bi bi-fire"></i> CodeIgniter 4</span>
                <span class="tech-tag"><i class="bi bi-database-fill"></i> MySQL</span>
                <span class="tech-tag"><i class="bi bi-filetype-css"></i> CSS3</span>
                <span class="tech-tag"><i class="bi bi-filetype-js"></i> JavaScript</span>
                <span class="tech-tag"><i class="bi bi-bootstrap-fill"></i> Bootstrap Icons</span>
            </div>
        </div>

        <div class="info-card full">
            <div class="info-card-icon icon-amber"><i class="bi bi-clock-history"></i></div>
            <div class="info-card-label">Riwayat Versi</div>
            <div class="info-card-value" style="margin-bottom: 4px;">Changelog</div>
            <ul class="timeline">
                <li>
                    <div class="timeline-dot"></div>
                    <div class="timeline-text">
                        <strong>v1.0.0 — <?= esc($year ?? date('Y')) ?></strong><br>
                        Rilis awal: autentikasi pengguna, manajemen grup & akses, portal aplikasi
                        dengan tampilan grid/list, dark mode, dan pencarian real-time.
                    </div>
                </li>
            </ul>
        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="copyright-block">
        <p>
            &copy; <?= esc($year ?? date('Y')) ?> <strong><?= esc($organization ?? 'Nama Organisasi / Instansi') ?></strong>. Seluruh hak cipta dilindungi.<br>
            Dikembangkan oleh <strong><?= esc($developer ?? 'Tim Pengembang') ?></strong> — Siswa PKL SMKN 1 Bantul
        </p>
        <p style="margin-top: 8px;">
            Aplikasi ini bersifat <strong>internal</strong> dan hanya diperuntukkan bagi
            pengguna yang telah mendapatkan hak akses resmi.
            Penyalahgunaan sistem dapat dikenai sanksi sesuai kebijakan yang berlaku.
        </p>
        <div class="copyright-year">
            <i class="bi bi-shield-check-fill"></i>
            AppPortal &nbsp;·&nbsp; Internal Use Only &nbsp;·&nbsp; <?= esc($year ?? date('Y')) ?>
        </div>
    </div>

</div>

<script>
(function () {
    const saved = localStorage.getItem('portal_theme');
    if (saved === 'dark') document.body.classList.add('dark-mode');
})();

window.addEventListener('scroll', () => {
    const nav = document.getElementById('mainNavbar');
    if (!nav) return;
    nav.style.boxShadow = window.scrollY > 10
        ? '0 1px 40px rgba(37,99,235,0.14)'
        : '0 1px 32px rgba(37,99,235,0.08)';
});
</script>
</body>
</html>