

<?= view('admin/layout/header', ['title' => 'Kelola Group']) ?>
<?= view('admin/layout/sidebar') ?>

<div class="container-fluid">
     <h3><?= $title ?></h3>
    <hr>


    <!-- Form Tambah Group -->
    <div class="card mb-4">
        <div class="card-header">Tambah Group Baru</div>
        <div class="card-body">
            <form action="/admin/groups/store" method="POST">
                <?= csrf_field() ?>  <!-- Keamanan bawaan CI4 -->
                <div class="mb-3">
                    <label>Nama Group</label>
                    <input type="text" name="nama_group" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Tabel Data Group -->
    <div class="card">
        <div class="card-header">Daftar Group</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Group</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($groups)) : ?>
                        <?php foreach ($groups as $i => $group) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($group['nama_group']) ?></td>
                            <td>
                                <!-- Tombol Edit (trigger modal) -->
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="<?= $group['id_group'] ?>"
                                    data-nama="<?= esc($group['nama_group']) ?>">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <a href="/admin/groups/delete/<?= $group['id_group'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus group ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data group</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Group -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <label>Nama Group</label>
                    <input type="text" name="nama_group" id="inputNama" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk isi Modal Edit otomatis -->
<script>
    const modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const button   = event.relatedTarget
        const id       = button.getAttribute('data-id')
        const nama     = button.getAttribute('data-nama')

        // Set action form ke URL update dengan id yang sesuai
        document.getElementById('formEdit').action = '/admin/groups/update/' + id

        // Isi input dengan nama group yang mau diedit
        document.getElementById('inputNama').value = nama
    })
</script>



<?= view('admin/layout/footer') ?>

