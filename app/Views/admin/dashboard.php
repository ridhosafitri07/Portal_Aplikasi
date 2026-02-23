<?= view('admin/layout/header', ['title' => 'Dashboard Admin']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid">
    <h3><?= $title ?></h3>
    <hr>

    <!-- Kartu Statistik -->
    <div class="row g-4">

        <!-- Total User -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total User</h6>
                        <h2><?= $total_user ?></h2>
                    </div>
                    <i class="bi bi-people-fill" style="font-size: 3rem; opacity: 0.5"></i>
                </div>
                <div class="card-footer">
                    <a href="/admin/users" class="text-white">Lihat Detail →</a>
                </div>
            </div>
        </div>

        <!-- Total Aplikasi -->
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Aplikasi</h6>
                        <h2><?= $total_apps ?></h2>
                    </div>
                    <i class="bi bi-grid-fill" style="font-size: 3rem; opacity: 0.5"></i>
                </div>
                <div class="card-footer">
                    <a href="/admin/apps" class="text-white">Lihat Detail →</a>
                </div>
            </div>
        </div>

        <!-- Total Group -->
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Group</h6>
                        <h2><?= $total_group ?></h2>
                    </div>
                    <i class="bi bi-diagram-3-fill" style="font-size: 3rem; opacity: 0.5"></i>
                </div>
                <div class="card-footer">
                    <a href="/admin/groups" class="text-white">Lihat Detail →</a>
                </div>
            </div>
        </div>

        <!-- Total Akses -->
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Akses</h6>
                        <h2><?= $total_access ?></h2>
                    </div>
                    <i class="bi bi-shield-lock-fill" style="font-size: 3rem; opacity: 0.5"></i>
                </div>
                <div class="card-footer">
                    <a href="/admin/access" class="text-white">Lihat Detail →</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('admin/layout/footer') ?>