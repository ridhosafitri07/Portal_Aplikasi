<?= view('admin/layout/header', ['title' => 'Profile Admin']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid">
    <h3><?= $title ?></h3>
    <hr>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">

        <!-- Form Edit Profile -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-person-fill"></i> Edit Profile
                </div>
                <div class="card-body">
                    <form action="/admin/profile/update" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_user" 
                                   value="<?= esc($user['nama_user']) ?>"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username"
                                   value="<?= esc($user['username']) ?>"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>No. HP</label>
                            <input type="text" name="hp_"
                                   value="<?= esc($user['hp_']) ?>"
                                   class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Ganti Password -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lock-fill"></i> Ganti Password
                </div>
                <div class="card-body">
                    <form action="/admin/profile/password" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label>Password Lama</label>
                            <input type="password" name="old_password" 
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password Baru</label>
                            <input type="password" name="new_password" 
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" 
                                   class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-key-fill"></i> Ganti Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('admin/layout/footer') ?>
