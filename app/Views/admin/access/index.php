<?= view('admin/layout/header', ['title' => 'Kelola Akses']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title ?></h1>
            <p class="text-muted small">Kelola hak akses aplikasi untuk setiap grup pengguna secara efisien.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelola Akses</li>
            </ol>
        </nav>
    </div>

    <!-- Statistics Quick View -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #30318B !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-primary p-3 me-3" style="background-color: rgba(48, 49, 139, 0.1);">
                        <i class="bi bi-people-fill text-primary fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($groups) ?></h6>
                        <small class="text-muted">Grup Terdaftar</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #5EC08C !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-success p-3 me-3" style="background-color: rgba(94, 192, 140, 0.1);">
                        <i class="bi bi-window-stack text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($apps) ?></h6>
                        <small class="text-muted">Aplikasi Aktif</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #4244a0 !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-info p-3 me-3" style="background-color: rgba(66, 68, 160, 0.1);">
                        <i class="bi bi-shield-check text-info fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($accesses) ?></h6>
                        <small class="text-muted">Kombinasi Akses</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notifikasi -->
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
            const duration = 5000;
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

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div id="errorToast" class="toast show border-0 shadow-lg" style="min-width: 300px; border-radius: 12px; overflow: hidden;">
                <div class="toast-body d-flex align-items-center text-white fw-semibold" style="background-color: #dc3545; padding: 14px 16px;">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <span class="flex-grow-1"><?= session()->getFlashdata('error') ?></span>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast"></button>
                </div>
                <div style="height: 4px; background-color: rgba(255,255,255,0.2);">
                    <div id="errorToastProgress" style="height: 100%; width: 100%; background-color: #fff;"></div>
                </div>
            </div>
        </div>
            
        <script>
            const errDuration = 5000;
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
        <!-- Form Tambah Akses -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle-dotted me-2"></i>Tambah Akses
                    </h6>
                </div>
                <div class="card-body bg-light-subtle">
                    <form action="<?= base_url('admin/access/store') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted">Grup Pengguna</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-people text-primary"></i></span>
                                <select name="id_group" class="form-select border-start-0 ps-0" required>
                                    <option value="" selected disabled>Pilih Grup...</option>
                                    <?php foreach ($groups as $group) : ?>
                                        <option value="<?= $group['id_group'] ?>">
                                            <?= esc($group['nama_group']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Aplikasi (Bisa pilih banyak)</label>
                            <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                <span class="input-group-text bg-white border-end-0 align-items-start pt-3"><i class="bi bi-grid-1x2 text-primary"></i></span>
                                <select name="id_apps[]" class="form-select border-start-0 ps-2 py-2" style="height: 160px; border-radius: 0 8px 8px 0;" required multiple>
                                    <?php foreach ($apps as $app) : ?>
                                        <option value="<?= $app['id_app'] ?>" class="py-2 px-3 border-bottom border-light">
                                            <?= esc($app['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mt-2 d-flex align-items-center text-muted" style="font-size: 0.75rem;">
                                <i class="bi bi-info-circle-fill me-2 text-primary"></i>
                                <span>Tahan <b>Ctrl</b> untuk memilih lebih dari satu aplikasi.</span>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary shadow-sm py-2 fw-bold" style="background-color: #30318B; border: none; border-radius: 8px;">
                                <i class="bi bi-shield-lock me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        <!-- Tabel Data Akses -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-table me-2"></i>Daftar Matriks Akses
                    </h6>
                    <div class="input-group input-group-sm w-auto shadow-sm" style="max-width: 300px;">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" id="tableSearch" class="form-control border-start-0 border-end-0" placeholder="Cari data...">
                        <button class="btn btn-white border-start-0 bg-white text-muted" type="button" id="clearSearch">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="accessTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small text-uppercase fw-bold" style="width: 60px;">#</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Grup Pengguna</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Modul Aplikasi</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold text-center pe-4" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php if (!empty($accesses)) : ?>
                                    <?php 
                                    $lastGroup = ''; 
                                    foreach ($accesses as $i => $access) : 
                                        $isNewGroup = ($access['nama_group'] !== $lastGroup);
                                        $lastGroup = $access['nama_group'];
                                    ?>
                                    <tr class="<?= $isNewGroup ? 'border-top' : '' ?>">
                                        <td class="ps-4">
                                            <span class="text-muted small"><?= $i + 1 ?></span>
                                        </td>
                                        <td>
                                            <?php if ($isNewGroup) : ?>
                                                <div class="fw-bold text-primary"><?= esc($access['nama_group']) ?></div>
                                                <div class="small text-muted" style="font-size: 0.7rem;">Grup Utama</div>
                                            <?php else : ?>
                                                <div class="text-muted opacity-50 small ps-2" style="font-size: 0.75rem;">— sama —</div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-light rounded-3 p-2 me-3 text-primary d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                                    <i class="bi bi-cpu"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-dark"><?= esc($access['nama']) ?></div>
                                                    <div class="small text-muted" style="font-size: 0.75rem;">Izin Akses Terbuka</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-4">
                                            <div class="btn-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                                <a href="<?= base_url('admin/access/delete/' . $access['id_access']) ?>"
                                                   class="btn btn-sm btn-white text-danger border-0"
                                                   title="Hapus Akses"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus hak akses ini?')">
                                                   <i class="bi bi-trash3"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
<?php else : ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="py-4">
                                                <i class="bi bi-folder-x fs-1 text-muted opacity-25"></i>
                                                <p class="text-muted mt-3 mb-0">Tidak ada data akses yang ditemukan</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3 text-center small text-muted">
                    Total: <span class="fw-bold"><?= count($accesses) ?></span> kombinasi akses terdaftar.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Live Search Logic
    const searchInput = document.getElementById('tableSearch');
    const clearBtn = document.getElementById('clearSearch');
    const rows = document.querySelectorAll('#accessTable tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        rows.forEach(row => {
            if (row.innerText.toLowerCase().includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('keyup', filterTable);

    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        filterTable();
        searchInput.focus();
    });
</script>

<?= view('admin/layout/footer') ?>