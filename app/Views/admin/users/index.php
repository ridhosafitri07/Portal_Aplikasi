<?= view('admin/layout/header', ['title' => 'Kelola User']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title ?></h1>
            <p class="text-muted small">Manajemen data pengguna sistem dan pengaturan hak akses grup.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
            </ol>
        </nav>
    </div>

    <!-- Statistics Quick View -->
    <div class="row mb-4">
        <div class="col-md-6 border-end-md">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #30318B !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-primary p-3 me-3" style="background-color: rgba(48, 49, 139, 0.1);">
                        <i class="bi bi-people-fill text-primary fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($users) ?></h6>
                        <small class="text-muted">Total Pengguna Aktif</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #5EC08C !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-success p-3 me-3" style="background-color: rgba(94, 192, 140, 0.1);">
                        <i class="bi bi-shield-check text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($groups) ?></h6>
                        <small class="text-muted">Grup Otoritas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div><?= session()->getFlashdata('success') ?></div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>
                    <ul class="mb-0 small ps-3">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <div class="row">
        <!-- Form Tambah User -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-person-plus-fill me-2"></i>Registrasi User Baru
                    </h6>
                </div>
                <div class="card-body bg-light-subtle">
                    <form action="<?= base_url('admin/users/store') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted">Nama Lengkap</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input type="text" name="nama_user" class="form-control border-start-0 ps-0"  value="<?= old('nama_user') ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted">Username</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-at text-muted"></i></span>
                                <input type="text" name="username" class="form-control border-start-0 ps-0"  value="<?= old('username') ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted">Password</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-key text-muted"></i></span>
                                <input type="password" name="password" id="passwordCreate" class="form-control border-start-0 ps-0"  required>
                                <button class="btn btn-white border-start-0 border-end shadow-none toggle-password" type="button" data-target="#passwordCreate">
                                    <i class="bi bi-eye text-muted"></i>
                                </button>
                            </div>
                            <div class="small text-muted mt-1" style="font-size: 0.7rem;">Min. 6 karakter</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted">No. HP </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-whatsapp text-muted"></i></span>
                                <input type="text" name="hp_" class="form-control border-start-0 ps-0" placeholder="0812xxxx" value="<?= old('hp_') ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Group / Role</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                <select name="id_group" class="form-select border-start-0 ps-0" required>
                                    <option value="" selected disabled>Pilih Group...</option>
                                    <?php foreach ($groups as $group) : ?>
                                        <option value="<?= $group['id_group'] ?>" <?= old('id_group') == $group['id_group'] ? 'selected' : '' ?>>
                                            <?= esc($group['nama_group']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary shadow-sm py-2 fw-bold" style="background-color: #30318B; border: none; border-radius: 8px;">
                                <i class="bi bi-save2 me-2"></i>Simpan User Aktif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Data User -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-list-task me-2"></i>Database Pengguna
                    </h6>
                    <div class="input-group input-group-sm w-auto shadow-sm" style="max-width: 300px;">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" id="tableSearch" class="form-control border-start-0 border-end-0" placeholder="Cari nama atau grup...">
                        <button class="btn btn-white border-start-0 bg-white text-muted" type="button" id="clearSearch">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="userTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small text-uppercase fw-bold" style="width: 60px;">#</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Profil User</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Status & Group</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Kontak</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold text-center pe-4" style="width: 140px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $i => $user) : ?>
                                    <tr>
                                        <td class="ps-4 text-muted small"><?= $i + 1 ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; font-size: 0.9rem; font-weight: 600;">
                                                    <?= strtoupper(substr($user['nama_user'], 0, 1)) ?>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark"><?= esc($user['nama_user']) ?></div>
                                                    <div class="small text-muted">@<?= esc($user['username']) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge px-3 py-2 rounded-pill shadow-sm" style="background-color: rgba(48, 49, 139, 0.1); color: #30318B; font-weight: 600; font-size: 0.75rem;">
                                                <i class="bi bi-shield-check me-1"></i> <?= $user['nama_group'] ?? 'No Group' ?>
                                            </span>
                                            <div class="mt-1 small text-muted" style="font-size: 0.65rem;">
                                                Terdaftar: <?= date('d M Y', strtotime($user['create_at'] ?? 'now')) ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($user['hp_']) : ?>
                                                <div class="small fw-semibold text-dark"><i class="bi bi-phone me-1"></i><?= esc($user['hp_']) ?></div>
                                            <?php else : ?>
                                                <span class="text-muted small italic">—</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center pe-4">
                                            <div class="btn-group shadow-sm rounded-pill bg-white px-1">
                                                <button class="btn btn-sm btn-white text-primary border-0"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit"
                                                    data-id="<?= $user['id_user'] ?>"
                                                    data-nama="<?= esc($user['nama_user']) ?>"
                                                    data-username="<?= esc($user['username']) ?>"
                                                    data-hp="<?= esc($user['hp_']) ?>"
                                                    data-group="<?= $user['id_group'] ?>"
                                                    title="Edit User">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <div class="vr my-2" style="width: 1px; background-color: #eee;"></div>
                                                <a href="<?= base_url('admin/users/delete/' . $user['id_user']) ?>"
                                                   class="btn btn-sm btn-white text-danger border-0"
                                                   onclick="return confirm('Yakin ingin menonaktifkan/menghapus user ini?')"
                                                   title="Hapus User">
                                                   <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="py-4">
                                                <i class="bi bi-people fs-1 text-muted opacity-25"></i>
                                                <p class="text-muted mt-3 mb-0">Belum ada user yang terdaftar di database.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3 text-center small text-muted">
                    Menampilkan <span class="fw-bold"><?= count($users) ?></span> entitas pengguna aktif.
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="bi bi-person-gear fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold">Update Profil User</h5>
                        <p class="text-muted small mb-0">Sesuaikan informasi akun pengguna</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body py-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" name="nama_user" id="inputNama" class="form-control border-start-0 ps-0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-at text-muted"></i></span>
                            <input type="text" name="username" id="inputUsername" class="form-control border-start-0 ps-0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Password Baru (Opsional)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-shield-lock text-muted"></i></span>
                            <input type="password" name="password" id="inputPassword" class="form-control border-start-0 ps-0 text-dark" placeholder="Biarkan kosong jika tetap">
                            <button class="btn btn-white border-start-0 border-end shadow-none toggle-password" type="button" data-target="#inputPassword">
                                <i class="bi bi-eye text-muted"></i>
                            </button>
                        </div>
                        <div class="small text-info mt-1" style="font-size: 0.7rem;">
                            <i class="bi bi-info-circle me-1"></i>Isi hanya jika ingin mereset password
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase">No. HP</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-whatsapp text-muted"></i></span>
                                <input type="text" name="hp_" id="inputHp" class="form-control border-start-0 ps-0">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase">Role / Group</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-layers text-muted"></i></span>
                                <select name="id_group" id="inputGroup" class="form-select border-start-0 ps-0">
                                    <option value="">Pilih Group...</option>
                                    <?php foreach ($groups as $group) : ?>
                                        <option value="<?= $group['id_group'] ?>">
                                            <?= esc($group['nama_group']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-light px-4 fw-semibold me-2" data-bs-dismiss="modal" style="border-radius: 10px;">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm" style="background-color: #30318B; border: none; border-radius: 10px;">
                        <i class="bi bi-check2-circle me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Handle Table Searching
    const tableSearch = document.getElementById('tableSearch');
    const clearSearch = document.getElementById('clearSearch');
    const userTable   = document.getElementById('userTable');

    if(tableSearch) {
        tableSearch.addEventListener('keyup', function() {
            filterTable();
        });
    }

    if(clearSearch) {
        clearSearch.addEventListener('click', function() {
            tableSearch.value = '';
            filterTable();
        });
    }

    function filterTable() {
        const query = tableSearch.value.toLowerCase();
        const rows  = userTable.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const rowText = rows[i].textContent.toLowerCase();
            rows[i].style.display = rowText.includes(query) ? '' : 'none';
        }
    }

    // Modal Edit Data Binding
    const modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget

        const id       = button.getAttribute('data-id')
        const nama     = button.getAttribute('data-nama')
        const username = button.getAttribute('data-username')
        const hp       = button.getAttribute('data-hp')
        const group    = button.getAttribute('data-group')

        document.getElementById('formEdit').action = '<?= base_url('admin/users/update') ?>/' + id

        document.getElementById('inputNama').value     = nama
        document.getElementById('inputUsername').value = username
        document.getElementById('inputHp').value       = hp
        document.getElementById('inputGroup').value    = group
        
        // Reset password input
        if(document.getElementById('inputPassword')) {
            document.getElementById('inputPassword').value = '';
        }
    })

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