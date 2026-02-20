<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f4fb; }
        .sidebar {
            width: 240px; min-height: 100vh; background: #0f2440;
            position: fixed; top: 0; left: 0; padding: 28px 0 0;
            display: flex; flex-direction: column;
        }
        .sidebar .brand {
            color: #fff; font-size: 1.1rem; font-weight: 700;
            padding: 0 24px 24px; border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .sidebar .brand span { color: #f59e0b; }
        .sidebar nav { margin-top: 16px; flex: 1; }
        .sidebar nav a {
            display: flex; align-items: center; gap: 12px;
            color: rgba(255,255,255,.65); text-decoration: none;
            padding: 11px 24px; font-size: .88rem;
            transition: background .15s, color .15s;
        }
        .sidebar nav a:hover, .sidebar nav a.active {
            background: rgba(255,255,255,.1); color: #fff;
        }
        .sidebar nav a i { font-size: 1rem; }
        .sidebar .badge-admin {
            margin: 0 24px 8px;
            background: #f59e0b22; color: #f59e0b;
            border-radius: 6px; padding: 4px 10px;
            font-size: .72rem; font-weight: 600; letter-spacing: .5px;
            display: inline-block;
        }
        .sidebar .logout { padding: 20px 24px; }
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
            background: linear-gradient(135deg,#f59e0b,#fbbf24);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: .9rem;
        }
        .stat-card {
            border: none; border-radius: 16px; padding: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,.07);
        }
        .stat-card .num { font-size: 2rem; font-weight: 700; }
        .stat-card .lbl { font-size: .82rem; color: #777; }
        .stat-card .ic {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">App<span>Portal</span></div>
    <div style="margin-top:16px">
        <span class="badge-admin">ADMIN PANEL</span>
    </div>
    <nav>
        <a href="<?= base_url('admin/dashboard') ?>" class="active">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="#"><i class="bi bi-people"></i> Manajemen User</a>
        <a href="#"><i class="bi bi-collection"></i> Manajemen Aplikasi</a>
        <a href="#"><i class="bi bi-shield-check"></i> Hak Akses</a>
        <a href="#"><i class="bi bi-gear"></i> Pengaturan</a>
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
        <h4>Admin Dashboard</h4>
        <div class="user-info">
            <div class="avatar"><?= strtoupper(substr(session('nama_user'), 0, 1)) ?></div>
            <?= esc(session('nama_user')) ?>
            <span class="badge bg-warning text-dark ms-1" style="font-size:.7rem">Admin</span>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card bg-white d-flex justify-content-between align-items-center">
                <div>
                    <div class="num text-primary"><?= $total_users ?? 0 ?></div>
                    <div class="lbl">Total User</div>
                </div>
                <div class="ic" style="background:#dbeafe;color:#2563eb"><i class="bi bi-people-fill"></i></div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card bg-white d-flex justify-content-between align-items-center">
                <div>
                    <div class="num text-success"><?= $total_apps ?? 0 ?></div>
                    <div class="lbl">Total Aplikasi</div>
                </div>
                <div class="ic" style="background:#dcfce7;color:#16a34a"><i class="bi bi-window-stack"></i></div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card bg-white d-flex justify-content-between align-items-center">
                <div>
                    <div class="num text-warning"><?= $total_groups ?? 0 ?></div>
                    <div class="lbl">Total Group</div>
                </div>
                <div class="ic" style="background:#fef9c3;color:#ca8a04"><i class="bi bi-diagram-3-fill"></i></div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card bg-white d-flex justify-content-between align-items-center">
                <div>
                    <div class="num text-danger"><?= $total_access ?? 0 ?></div>
                    <div class="lbl">Hak Akses</div>
                </div>
                <div class="ic" style="background:#fee2e2;color:#dc2626"><i class="bi bi-shield-lock-fill"></i></div>
            </div>
        </div>
    </div>

    <!-- Placeholder table users terbaru -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h6 class="fw-700 mb-3" style="font-weight:700">User Terbaru</h6>
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Group</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($recent_users)): ?>
                    <?php foreach ($recent_users as $i => $u): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($u['nama_user']) ?></td>
                        <td><?= esc($u['username']) ?></td>
                        <td>
                            <span class="badge <?= $u['role'] === 'admin' ? 'bg-warning text-dark' : 'bg-primary' ?>">
                                <?= esc($u['role']) ?>
                            </span>
                        </td>
                        <td><?= esc($u['nama_group'] ?? '-') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted py-3">Belum ada data.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>