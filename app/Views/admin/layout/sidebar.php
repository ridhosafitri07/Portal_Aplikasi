<!-- Sidebar -->
<div id="sidebar">

    <!-- Judul Portal -->
    <div class="sidebar-brand">
        <i class="bi bi-grid-3x3-gap-fill me-2"></i> Portal Aplikasi
    </div>

    <!-- Info user yang login -->
    <div class="user-info-section">
        <div class="d-flex align-items-center">
            <div class="user-avatar">
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="user-details ms-3 overflow-hidden">
                <div class="user-name text-truncate"><?= session()->get('nama_user') ?></div>
                <span class="role-badge"><?= session()->get('role') ?></span>
            </div>
        </div>
    </div>

    <!-- Menu Utama -->
    <div class="flex-grow-1 overflow-y-auto">
        <div class="menu-label">Menu Utama</div>

        <a href="/admin/dashboard" class="<?= (url_is('admin/dashboard*')) ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="/admin/groups" class="<?= (url_is('admin/groups*')) ? 'active' : '' ?>">
            <i class="bi bi-people-fill"></i> Kelola Group
        </a>

        <a href="/admin/apps" class="<?= (url_is('admin/apps*')) ? 'active' : '' ?>">
            <i class="bi bi-grid-fill"></i> Kelola Aplikasi
        </a>

        <a href="/admin/users" class="<?= (url_is('admin/users*')) ? 'active' : '' ?>">
            <i class="bi bi-person-fill"></i> Kelola User
        </a>

        <a href="/admin/access" class="<?= (url_is('admin/access*')) ? 'active' : '' ?>">
            <i class="bi bi-shield-lock-fill"></i> Kelola Akses
        </a>
    </div>

    <!-- Bagian Bawah (Account) -->
    <div class="account-section mt-auto">
        <div class="menu-label">Pengaturan Akun</div>
        <a href="/admin/profile" class="<?= (url_is('admin/profile*')) ? 'active' : '' ?>">
            <i class="bi bi-person-bounding-box"></i> Profile Saya
        </a>
        <a href="/auth/logout" class="logout-link" style="color: #e74c3c;">
            <i class="bi bi-box-arrow-left"></i> Keluar
        </a>
    </div>

</div>

<!-- Konten dimulai setelah sidebar -->
<div id="content">
