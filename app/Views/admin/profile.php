<?= view('admin/layout/header', ['title' => 'Profil Keamanan']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title ?></h1>
            <p class="text-muted small">Kelola informasi pribadi dan keamanan akun administrator Anda.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
            </ol>
        </nav>
    </div>

    <!-- Toast Notifikasi (Success) -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div id="liveToast" class="toast show border-0 shadow-lg" style="min-width: 300px; border-radius: 12px; overflow: hidden;">
                <div class="toast-body d-flex align-items-center text-white fw-semibold" style="background-color: #1e7e34; padding: 14px 16px;">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <span class="flex-grow-1"><?= session()->getFlashdata('success') ?></span>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"></button>
                </div>
                <div style="height: 4px; background-color: rgba(255,255,255,0.2);">
                    <div id="toastProgress" style="height: 100%; width: 100%; background-color: #fff;"></div>
                </div>
            </div>
        </div>
            
        <script>
            const duration = 4000;
            const progressBar = document.getElementById('toastProgress');
            const toastEl = document.getElementById('liveToast');

            setTimeout(() => {
                progressBar.style.transition = `width ${duration}ms linear`;
                progressBar.style.width = '0%';
            }, 50);

            setTimeout(() => {
                toastEl.style.transition = 'opacity 0.4s ease';
                toastEl.style.opacity = '0';
                setTimeout(() => toastEl.style.display = 'none', 400);
            }, duration);
        </script>
    <?php endif; ?>

    <!-- Toast Notifikasi (Errors) -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div id="errorToast" class="toast show border-0 shadow-lg" style="min-width: 320px; border-radius: 12px; overflow: hidden;">
                <div class="toast-body d-flex align-items-center text-white fw-semibold" style="background-color: #dc3545; padding: 14px 16px;">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <div class="flex-grow-1">
                        <ul class="mb-0 small ps-3">
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"></button>
                </div>
                <div style="height: 4px; background-color: rgba(255,255,255,0.2);">
                    <div id="errorToastProgress" style="height: 100%; width: 100%; background-color: #fff;"></div>
                </div>
            </div>
        </div>
            
        <script>
            const errDuration = 6000;
            const errProgressBar = document.getElementById('errorToastProgress');
            const errToastEl = document.getElementById('errorToast');

            setTimeout(() => {
                errProgressBar.style.transition = `width ${errDuration}ms linear`;
                errProgressBar.style.width = '0%';
            }, 50);

            setTimeout(() => {
                errToastEl.style.transition = 'opacity 0.4s ease';
                errToastEl.style.opacity = '0';
                setTimeout(() => errToastEl.style.display = 'none', 400);
            }, errDuration);
        </script>
    <?php endif; ?>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                <div class="card-body p-0">
                    <div style="height: 120px; background: linear-gradient(135deg, #161d22 0%, #6465b4 100%);"></div>
                    <div class="text-center position-relative" style="margin-top: -60px;">
                        <div class="d-inline-block position-relative">
                            <div class="rounded-circle border border-4 border-white shadow-sm bg-primary text-white d-flex align-items-center justify-content-center mx-auto" style="width: 120px; height: 120px; font-size: 3rem; font-weight: bold;">
                                <?= strtoupper(substr($user['nama_user'], 0, 1)) ?>
                            </div>
                            <span class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle p-2 shadow-sm" title="Online"></span>
                        </div>
                        <div class="mt-3 px-4 pb-4">
                            <h4 class="fw-bold text-dark mb-1"><?= esc($user['nama_user']) ?></h4>
                            <p class="text-muted small mb-3">@<?= esc($user['username']) ?></p>
                            <span class="badge rounded-pill bg-soft-primary px-3 py-2 text-primary fw-bold" style="background-color: rgba(48, 49, 139, 0.1);">
                                <i class="bi bi-shield-lock me-1"></i> Administrator System
                            </span>
                            <hr class="my-4">
                            <div class="text-start">
                                <div class="mb-3 d-flex align-items-center text-muted">
                                    <i class="bi bi-envelope me-3 fs-5"></i>
                                    <span class="small"><?= esc($user['username']) ?>@internal.system</span>
                                </div>
                                <div class="mb-3 d-flex align-items-center text-muted">
                                    <i class="bi bi-phone me-3 fs-5"></i>
                                    <span class="small"><?= esc($user['hp_']) ?: 'Belum diatur' ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forms Section -->
        <div class="col-lg-8">
            <!-- Edit Profile -->
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                <div class="card-header bg-white border-0 py-3 ps-4 pt-4">
                    <h5 class="fw-bold text-primary mb-0"><i class="bi bi-person-gear me-2"></i>Informasi Personal</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/profile/update') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-muted"></i></span>
                                    <input type="text" name="nama_user" value="<?= esc($user['nama_user']) ?>" class="form-control border-start-0 ps-0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-at text-muted"></i></span>
                                    <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control border-start-0 ps-0" required>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label class="form-label small fw-bold text-muted text-uppercase">No. Handphone</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-whatsapp text-muted"></i></span>
                                    <input type="text" name="hp_" value="<?= esc($user['hp_']) ?>" class="form-control border-start-0 ps-0">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" style="background-color: #30318B; border: none; border-radius: 10px;">
                                <i class="bi bi-save me-2"></i>Update Biodata
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password -->
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-header bg-white border-0 py-3 ps-4 pt-4">
                    <h5 class="fw-bold text-danger mb-0"><i class="bi bi-shield-lock me-2"></i>Keamanan Akun</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/profile/password') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted text-uppercase">Password Lama</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-key text-muted"></i></span>
                                <input type="password" name="old_password" id="old_password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                                <button class="btn btn-white border-start-0 border-end shadow-none toggle-password" type="button" data-target="#old_password">
                                    <i class="bi bi-eye text-muted"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock-fill text-muted"></i></span>
                                    <input type="password" name="new_password" id="new_password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                                    <button class="btn btn-white border-start-0 border-end shadow-none toggle-password" type="button" data-target="#new_password">
                                        <i class="bi bi-eye text-muted"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Konfirmasi Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-shield-check text-muted"></i></span>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                                    <button class="btn btn-white border-start-0 border-end shadow-none toggle-password" type="button" data-target="#confirm_password">
                                        <i class="bi bi-eye text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-danger px-4 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-shield-exclamation me-2"></i>Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle Password Visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetQuery = this.getAttribute('data-target');
            const targetInput = document.querySelector(targetQuery);
            const icon = this.querySelector('i');

            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                targetInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
</script>

<?= view('admin/layout/footer') ?>
