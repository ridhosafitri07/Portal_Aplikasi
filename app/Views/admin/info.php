<?= view('admin/layout/header', ['title' => 'Informasi Sistem']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title ?></h1>
            <p class="text-muted small">Detail pengembangan dan spesifikasi sistem portal aplikasi.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Info Sistem</li>
            </ol>
        </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Development Info -->
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header bg-white border-0 py-3 ps-4 pt-4">
                    <h5 class="fw-bold text-primary mb-0"><i class="bi bi-info-circle-fill me-2"></i>Tentang Aplikasi</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="rounded-circle shadow-sm bg-soft-primary d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px; background-color: rgba(48, 49, 139, 0.1);">
                                <i class="bi bi-code-square text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <div class="mt-3">
                                <span class="badge rounded-pill bg-primary px-3 py-2">Versi 1.0.0</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="fw-bold text-dark mb-3">Portal Aplikasi Terintegrasi</h4>
                            <p class="text-muted">Aplikasi ini dirancang untuk memudahkan manajemen hak akses dan distribusi aplikasi dalam satu pintu secara terpusat dan aman.</p>
                            
                            <div class="row mt-4">
                                <div class="col-6 mb-3">
                                    <label class="small text-uppercase fw-bold text-muted d-block">Dikembangkan Oleh</label>
                                    <span class="text-dark fw-bold">Siswa PKL 2026</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="small text-uppercase fw-bold text-muted d-block">Tahun Produksi</label>
                                    <span class="text-dark fw-bold">2026</span>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="small text-uppercase fw-bold text-muted d-block">Status Project</label>
                                    <span class="badge bg-success"><i class="bi bi-check2-circle me-1"></i> Stable Release</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technology Stack -->
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-header bg-white border-0 py-3 ps-4 pt-4">
                    <h5 class="fw-bold text-dark mb-0"><i class="bi bi-cpu-fill me-2 text-secondary"></i>Spesifikasi Teknologi</h5>
                </div>
                <div class="card-body p-4">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-soft-info p-2 rounded me-3" style="background-color: rgba(13, 202, 240, 0.1);">
                                <i class="bi bi-filetype-php text-info fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">Bahasa Pemrograman</h6>
                                <small class="text-muted">PHP version 8.2+</small>
                            </div>
                            <span class="badge bg-light text-dark border">Main Language</span>
                        </div>
                        
                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-soft-danger p-2 rounded me-3" style="background-color: rgba(220, 53, 69, 0.1);">
                                <i class="bi bi-lightning-fill text-danger fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">Framework Server-side</h6>
                                <small class="text-muted">CodeIgniter 4.4.x (Speed & Security)</small>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-soft-primary p-2 rounded me-3" style="background-color: rgba(48, 49, 139, 0.1);">
                                <i class="bi bi-bootstrap-fill text-primary fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">Frontend Framework</h6>
                                <small class="text-muted">Bootstrap 5.3 (Responsive Design)</small>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 py-3 d-flex align-items-center">
                            <div class="bg-soft-warning p-2 rounded me-3" style="background-color: rgba(255, 193, 7, 0.1);">
                                <i class="bi bi-database-fill text-warning fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">Database Management</h6>
                                <small class="text-muted">MySQL / MariaDB (Relational Database)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 py-3 text-center" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <small class="text-muted fw-bold">
                        <i class="bi bi-code-slash me-1"></i> Craft with <i class="bi bi-heart-fill text-danger mx-1"></i> by Students for Education Purpose
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/layout/footer') ?>