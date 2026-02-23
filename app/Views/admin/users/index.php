<?= view('admin/layout/header', ['title' => 'Kelola Aplikasi']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid">
    <h3><?= $title ?></h3>
    <hr>


            <!-- Notifikasi sukses -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Notifikasi error validasi -->
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


    <!-- Form Tambah User -->
    <div class="card mb-4">
        <div class="card-header">Tambah User Baru</div>
        <div class="card-body">
            <form action="/admin/users/store" method="POST">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_user" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No. HP</label>
                    <input type="text" name="hp_" class="form-control">
                </div>

                <!-- Dropdown Group -->
                <div class="mb-3">
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

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Tabel Data User -->
    <div class="card">
        <div class="card-header">Daftar User</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. HP</th>
                        <th>Group</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)) : ?>
                        <?php foreach ($users as $i => $user) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($user['nama_user']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['hp_']) ?></td>
                            <td>
                                <!-- Tampilkan nama group, kalau null tampilkan strip -->
                                <?= $user['nama_group'] ?? '-' ?>
                            </td>
                            <td><?= $user['create_at'] ?? '-' ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="<?= $user['id_user'] ?>"
                                    data-nama="<?= esc($user['nama_user']) ?>"
                                    data-username="<?= esc($user['username']) ?>"
                                    data-hp="<?= esc($user['hp_']) ?>"
                                    data-group="<?= $user['id_group'] ?>">
                                    Edit
                                </button>

                                <a href="/admin/users/delete/<?= $user['id_user'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus user ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data user</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_user" id="inputNama" 
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" id="inputUsername" 
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password Baru</label>
                        <input type="password" name="password" id="inputPassword" 
                               class="form-control" placeholder="Kosongkan jika tidak ingin ganti">
                    </div>

                    <div class="mb-3">
                        <label>No. HP</label>
                        <input type="text" name="hp_" id="inputHp" 
                               class="form-control">
                    </div>

                    <!-- Dropdown Group di Modal -->
                    <div class="mb-3">
                        <label>Group</label>
                        <select name="id_group" id="inputGroup" class="form-select">
                            <option value="">-- Pilih Group --</option>
                            <?php foreach ($groups as $group) : ?>
                                <option value="<?= $group['id_group'] ?>">
                                    <?= esc($group['nama_group']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" 
                            data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    const modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget

        // Ambil semua data dari tombol edit
        const id       = button.getAttribute('data-id')
        const nama     = button.getAttribute('data-nama')
        const username = button.getAttribute('data-username')
        const hp       = button.getAttribute('data-hp')
        const group    = button.getAttribute('data-group')

        // Set action form
        document.getElementById('formEdit').action = '/admin/users/update/' + id

        // Isi semua input
        document.getElementById('inputNama').value     = nama
        document.getElementById('inputUsername').value = username
        document.getElementById('inputHp').value       = hp

        // Untuk dropdown, kita set value yang sesuai
        document.getElementById('inputGroup').value = group
    })
</script>

<?= view('admin/layout/footer') ?>