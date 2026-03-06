<?= view('admin/layout/header', ['title' => 'Dashboard Admin']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px; background: linear-gradient(135deg, #2c3e50 100%);">
                <div class="card-body p-4 p-md-5 position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-12 position-relative" style="z-index: 2;">
                            <h1 class="display-5 fw-bold text-white mb-2">Selamat Datang, <?= session()->get('nama_user') ?>!</h1>
                            <p class="text-white opacity-75 fs-5 mb-0">Kelola seluruh ekosistem aplikasi dan hak akses pengguna dalam satu dashboard terpadu.</p>
                            <div class="mt-4">
                                <span class="badge rounded-pill bg-soft-light text-white px-3 py-2 fw-semibold" style="background: rgba(255,255,255,0.15);">
                                    <i class="bi bi-shield-check me-2"></i>Administrator Mode
                                </span>
                                <span class="badge rounded-pill bg-soft-light text-white px-3 py-2 fw-semibold ms-2" style="background: rgba(255,255,255,0.15);">
                                    <i class="bi bi-cpu me-2"></i>System Online
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row g-4 mb-4">
        <!-- Total User -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-3 p-3 me-3" style="background-color: rgba(48, 49, 139, 0.1); color: #30318B;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold text-dark mb-0"><?= $total_user ?></h3>
                            <p class="text-muted small mb-0">Total Pengguna</p>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <a href="<?= base_url('admin/users') ?>" class="btn btn-light btn-sm rounded-pill fw-semibold text-primary py-2">
                            Kelola User <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Aplikasi -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-3 p-3 me-3" style="background-color: rgba(92, 146, 205, 0.1); color: #5C92CD;">
                            <i class="bi bi-grid-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold text-dark mb-0"><?= $total_apps ?></h3>
                            <p class="text-muted small mb-0">Aplikasi Aktif</p>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <a href="<?= base_url('admin/apps') ?>" class="btn btn-light btn-sm rounded-pill fw-semibold text-info py-2">
                            Cek Aplikasi <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Group -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-3 p-3 me-3" style="background-color: rgba(94, 192, 140, 0.1); color: #5EC08C;">
                            <i class="bi bi-diagram-3-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold text-dark mb-0"><?= $total_group ?></h3>
                            <p class="text-muted small mb-0">Grup Otoritas</p>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <a href="<?= base_url('admin/groups') ?>" class="btn btn-light btn-sm rounded-pill fw-semibold text-success py-2">
                            Lihat Grup <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Akses -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-3 p-3 me-3" style="background-color: rgba(228, 32, 43, 0.1); color: #E4202B;">
                            <i class="bi bi-shield-lock-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold text-dark mb-0"><?= $total_access ?></h3>
                            <p class="text-muted small mb-0">Pemetaan Akses</p>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <a href="<?= base_url('admin/access') ?>" class="btn btn-light btn-sm rounded-pill fw-semibold text-danger py-2">
                            Atur Akses <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access & System Overview -->
    <div class="row align-items-stretch">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 py-4 ps-4">
                    <h5 class="fw-bold text-dark mb-0">Akses Utama Sistem</h5>
                </div>
                <div class="card-body px-4 pb-4 pt-0">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/users') ?>" class="text-decoration-none action-card">
                                <div class="p-3 border rounded-3 d-flex align-items-center background-hover transition-all h-100 bg-white shadow-sm">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                                        <i class="bi bi-person-gear text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Manajemen Pengguna</h6>
                                        <p class="text-muted small mb-0">Kelola data user sistem.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/apps') ?>" class="text-decoration-none action-card">
                                <div class="p-3 border rounded-3 d-flex align-items-center background-hover transition-all h-100 bg-white shadow-sm">
                                    <div class="bg-info bg-opacity-10 p-3 rounded-3 me-3">
                                        <i class="bi bi-window-stack text-info fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Daftar Aplikasi</h6>
                                        <p class="text-muted small mb-0">Atur integrasi portal apps.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/access') ?>" class="text-decoration-none action-card">
                                <div class="p-3 border rounded-3 d-flex align-items-center background-hover transition-all h-100 bg-white shadow-sm">
                                    <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
                                        <i class="bi bi-key-fill text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Konfigurasi Akses</h6>
                                        <p class="text-muted small mb-0">Petakan hak akses grup.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/groups') ?>" class="text-decoration-none action-card">
                                <div class="p-3 border rounded-3 d-flex align-items-center background-hover transition-all h-100 bg-white shadow-sm">
                                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                                        <i class="bi bi-layers-half text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Grup Otoritas</h6>
                                        <p class="text-muted small mb-0">Kelola level dan peran.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; background: linear-gradient(135deg, #161d22 0%, #4A4CB5 100%);">
                <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center text-white text-center">
                    <div class="mb-2 opacity-75 small fw-bold text-uppercase tracking-wider">Waktu Sistem</div>
                    <div class="display-4 fw-bold mb-1" id="digital-clock">00:00:00</div>
                    <div class="fs-5 opacity-75"><?= date('l, d F Y') ?></div>
                    
                    <div class="mt-4 p-3 rounded-4 w-100" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                        <div class="row g-0">
                            <div class="col-6 border-end border-white border-opacity-25">
                                <div class="small opacity-75">Zona Waktu</div>
                                <div class="fw-bold">Jakarta (WIB)</div>
                            </div>
                            <div class="col-6">
                                <div class="small opacity-75">Status</div>
                                <div class="fw-bold text-white">
                                    <span class="d-inline-block rounded-circle bg-success me-1" style="width: 10px; height: 10px; border: 2px solid rgba(255,255,255,0.5);"></span>
                                    ONLINE
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const clockElement = document.getElementById('digital-clock');
        if (clockElement) {
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
    }
    
    setInterval(updateClock, 1000);
    updateClock(); // Initial call
</script>
    </div>
</div>

<style>
    .transition-all { transition: all 0.3s ease; }
    .background-hover:hover { 
        background-color: #f8f9fa !important;
        border-color: #30318B !important;
        transform: translateX(5px);
    }
    .action-card:hover .bg-opacity-10 {
        background-opacity: 0.2 !important;
    }
    .bg-soft-light { background: rgba(255,255,255,0.1); }
</style>

<?= view('admin/layout/footer') ?>