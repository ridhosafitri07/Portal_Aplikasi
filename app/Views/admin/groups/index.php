<?= view('admin/layout/header', ['title' => 'Kelola Group']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title ?></h1>
            <p class="text-muted small">Manajemen grup otoritas untuk pengelompokan hak akses aplikasi.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin/dashboard" class="text-decoration-none text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelola Group</li>
            </ol>
        </nav>
    </div>

    <!-- Statistics Quick View -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 12px; border-left: 4px solid #30318B !important;">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-soft-primary p-3 me-3" style="background-color: rgba(48, 49, 139, 0.1);">
                        <i class="bi bi-shield-lock-fill text-primary fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark"><?= count($groups) ?></h6>
                        <small class="text-muted">Total Grup Otoritas</small>
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
        <!-- Form Tambah Group -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-shield-plus me-2"></i>Tambah Grup Baru
                    </h6>
                </div>
                <div class="card-body bg-light-subtle">
                    <form action="/admin/groups/store" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Nama Grup / Role</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-bookmark-star text-muted"></i></span>
                                <input type="text" name="nama_group" class="form-control border-start-0 ps-0"  required>
                            </div>
                            <div class="small text-muted mt-1" style="font-size: 0.7rem;">Nama grup akan digunakan sebagai role akses</div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary shadow-sm py-2 fw-bold" style="background-color: #30318B; border: none; border-radius: 8px;">
                                <i class="bi bi-save2 me-2"></i>Simpan Grup Baru
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Data Group -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
                <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-list-stars me-2"></i>Database Grup
                    </h6>
                    <div class="input-group input-group-sm w-auto shadow-sm" style="max-width: 250px;">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" id="groupSearch" class="form-control border-start-0" placeholder="Cari nama grup...">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="groupTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small text-uppercase fw-bold" style="width: 60px;">#</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold">Nama Grup Otoritas</th>
                                    <th class="py-3 text-muted small text-uppercase fw-bold text-center pe-4" style="width: 140px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php if (!empty($groups)) : ?>
                                    <?php foreach ($groups as $i => $group) : ?>
                                    <tr>
                                        <td class="ps-4 text-muted small"><?= $i + 1 ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-weight: bold; font-size: 0.8rem;">
                                                    G
                                                </div>
                                                <div class="fw-bold text-dark"><?= esc($group['nama_group']) ?></div>
                                            </div>
                                        </td>
                                        <td class="text-center pe-4">
                                            <div class="btn-group shadow-sm rounded-pill bg-white px-1">
                                                <button class="btn btn-sm btn-white text-primary border-0"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit"
                                                    data-id="<?= $group['id_group'] ?>"
                                                    data-nama="<?= esc($group['nama_group']) ?>"
                                                    title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <div class="vr my-2" style="width: 1px; background-color: #eee;"></div>
                                                <a href="/admin/groups/delete/<?= $group['id_group'] ?>"
                                                   class="btn btn-sm btn-white text-danger border-0"
                                                   onclick="return confirm('Yakin hapus group ini?')"
                                                   title="Hapus">
                                                   <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <i class="bi bi-shield-slash fs-1 text-muted opacity-25"></i>
                                            <p class="text-muted mt-2 mb-0">Belum ada grup yang terdaftar.</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Group -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h5 class="modal-title fw-bold">Edit Nama Grup</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body py-4">
                    <div class="mb-0">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Grup Otoritas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-bookmark-check text-muted"></i></span>
                            <input type="text" name="nama_group" id="inputNama" class="form-control border-start-0 ps-0" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-light px-4 fw-semibold me-2" data-bs-dismiss="modal" style="border-radius: 10px;">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm" style="background-color: #30318B; border: none; border-radius: 10px;">
                        <i class="bi bi-check2-circle me-2"></i>Update Grup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Search function for Group Table
    const groupSearch = document.getElementById('groupSearch');
    const groupTable = document.getElementById('groupTable');
    if(groupSearch) {
        groupSearch.addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const rows = groupTable.getElementsByTagName('tr');
            for (let i = 1; i < rows.length; i++) {
                const text = rows[i].textContent.toLowerCase();
                rows[i].style.display = text.includes(query) ? '' : 'none';
            }
        });
    }

    const modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const button   = event.relatedTarget
        const id       = button.getAttribute('data-id')
        const nama     = button.getAttribute('data-nama')
        document.getElementById('formEdit').action = '/admin/groups/update/' + id
        document.getElementById('inputNama').value = nama
    })
</script>

<?= view('admin/layout/footer') ?>

