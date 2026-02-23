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

    <!-- Form Tambah Apps -->
    <div class="card mb-4">
        <div class="card-header">Tambah Aplikasi Baru</div>
        <div class="card-body">
            <form action="/admin/apps/store" method="POST">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label>Nama Aplikasi</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>URL Aplikasi</label>
                    <input type="text" name="url_app" class="form-control" 
                           placeholder="https://..." required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Tabel Data Apps -->
    <div class="card">
        <div class="card-header">Daftar Aplikasi</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Aplikasi</th>
                        <th>URL</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($apps)) : ?>
                        <?php foreach ($apps as $i => $app) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($app['nama']) ?></td>
                            <td>
                                <!-- URL bisa diklik langsung -->
                                <a href="<?= esc($app['url_app']) ?>" target="_blank">
                                    <?= esc($app['url_app']) ?>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="<?= $app['id_app'] ?>"
                                    data-nama="<?= esc($app['nama']) ?>"
                                    data-url="<?= esc($app['url_app']) ?>">
                                    Edit
                                </button>

                                <a href="/admin/apps/delete/<?= $app['id_app'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus aplikasi ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data aplikasi</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Aplikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Aplikasi</label>
                        <input type="text" name="nama" id="inputNama" 
                               class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>URL Aplikasi</label>
                        <input type="text" name="url_app" id="inputUrl" 
                               class="form-control" required>
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

        // Ambil data dari tombol edit yang diklik
        const id   = button.getAttribute('data-id')
        const nama = button.getAttribute('data-nama')
        const url  = button.getAttribute('data-url')

        // Set action form & isi input
        document.getElementById('formEdit').action = '/admin/apps/update/' + id
        document.getElementById('inputNama').value = nama
        document.getElementById('inputUrl').value  = url
    })
</script>

<?= view('admin/layout/footer') ?>