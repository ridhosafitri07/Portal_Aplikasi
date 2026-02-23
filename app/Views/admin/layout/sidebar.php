    <!-- Sidebar -->
<div id="sidebar">

    <!-- Judul Portal -->
    <div class="sidebar-brand">
        <i class="bi bi-grid-3x3-gap-fill"></i> Portal Aplikasi
    </div>


      <!-- Info user yang login -->
    <div style="padding: 10px 20px; color: #bdc3c7; font-size: 13px; border-bottom: 1px solid #3d5166;">
        <i class="bi bi-person-circle"></i> 
        <?= session()->get('nama_user') ?>
        <span class="badge bg-success ms-1"><?= session()->get('role') ?></span>
    </div>


    <!-- Menu -->
    <div class="menu-label">Master Data</div>

    <a href="/admin/groups" 
       class="<?= (url_is('admin/groups*')) ? 'active' : '' ?>">
        <i class="bi bi-people-fill"></i> Kelola Group
    </a>

    <a href="/admin/apps" 
       class="<?= (url_is('admin/apps*')) ? 'active' : '' ?>">
        <i class="bi bi-grid-fill"></i> Kelola Aplikasi
    </a>

    <a href="/admin/users" 
       class="<?= (url_is('admin/users*')) ? 'active' : '' ?>">
        <i class="bi bi-person-fill"></i> Kelola User
    </a>

    <a href="/admin/access" 
       class="<?= (url_is('admin/access*')) ? 'active' : '' ?>">
        <i class="bi bi-shield-lock-fill"></i> Kelola Akses
    </a>


     <!-- Tombol Keluar di paling bawah -->
    <div style="position: absolute; bottom: 0; width: 100%; border-top: 1px solid #3d5166;">
        <a href="/auth/logout" style="color: #e74c3c;">
            <i class="bi bi-box-arrow-left"></i> Keluar
        </a>
    </div>

</div>

</div>

<!-- Konten dimulai setelah sidebar -->
<div id="content">
