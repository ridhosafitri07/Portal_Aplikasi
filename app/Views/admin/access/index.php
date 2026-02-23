<?= view('admin/layout/header', ['title' => 'Kelola Akses']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid">
    <h3><?= $title ?></h3>
    <hr>

    <!-- Notifikasi sukses/error -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Form Tambah Akses -->
    <div class="card mb-4">
        <div class="card-header">Tambah Akses Baru</div>
        <div class="card-body">
            <form action="/admin/access/store" method="POST">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-5">
                        <label>Group</label>
                        <select name="id_group" class="form-select" required>
                            <option value="">-- Pilih Group --</option>
                            <?php foreach ($groups as $group) : ?>
                                <option value="<?= $group['id_group'] ?>">
                                    <?= esc($group['nama_group']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label>Aplikasi</label>
                        <select name="id_apps" class="form-select" required>
                            <option value="">-- Pilih Aplikasi --</option>
                            <?php foreach ($apps as $app) : ?>
                                <option value="<?= $app['id_app'] ?>">
                                    <?= esc($app['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data Akses -->
    <div class="card">
        <div class="card-header">Daftar Akses</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Group</th>
                        <th>Aplikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($accesses)) : ?>
                        <?php foreach ($accesses as $i => $access) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($access['nama_group']) ?></td>
                            <td><?= esc($access['nama']) ?></td>
                            <td>
                                <a href="/admin/access/delete/<?= $access['id_access'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus akses ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data akses</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('admin/layout/footer') ?>