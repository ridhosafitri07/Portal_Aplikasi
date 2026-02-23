<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GroupModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $groupModel;

    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->groupModel = new GroupModel();
    }

    // Tampilkan semua data user
    public function index()
    {
        $data = [
            'title'  => 'Kelola User',
            // JOIN ke tabel group untuk ambil nama_group nya
            'users'  => $this->userModel
                            ->select('user.*, g.nama_group')
                            ->join('`group` g', 'g.id_group = user.id_group', 'left')
                            ->findAll(),
            // Untuk dropdown pilih group saat tambah/edit user
            'groups' => $this->groupModel->findAll()
        ];

        return view('admin/users/index', $data);
    }

    // Simpan user baru
    public function store()
    {
        $this->userModel->insert([
            'nama_user'     => $this->request->getPost('nama_user'),
            'username'      => $this->request->getPost('username'),
            // Password di-hash dulu sebelum disimpan, JANGAN simpan password polos!
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'hp_'           => $this->request->getPost('hp_'),
            'id_group'      => $this->request->getPost('id_group'),
            'create_at'     => date('Y-m-d H:i:s'), // waktu sekarang
        ]);

        return redirect()->to('/admin/users');
    }

    // Update user
    public function update($id)
    {
        $dataUpdate = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username'  => $this->request->getPost('username'),
            'hp_'       => $this->request->getPost('hp_'),
            'id_group'  => $this->request->getPost('id_group'),
            'update_at' => date('Y-m-d H:i:s'), // waktu update
        ];

        // Password hanya diupdate kalau diisi, kalau kosong dibiarkan
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $dataUpdate['password_hash'] = password_hash($newPassword, PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $dataUpdate);

        return redirect()->to('/admin/users');
    }

    // Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/admin/users');
    }
}