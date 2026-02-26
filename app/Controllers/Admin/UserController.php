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
         // Aturan validasi
    if (!$this->validate([
        'nama_user' => [
            'rules' => 'required|min_length[3]|max_length[150]',
            'errors' => [
                'required' => 'Nama user wajib diisi!',
                'min_length' => 'Nama minimal 3 karakter!'
            ]
        ],
        'username'  => [
            'rules' => 'required|min_length[3]|max_length[100]|is_unique[user.username]',
            'errors' => [
                'required' => 'Username wajib diisi!',
                'is_unique' => 'Username ini sudah terdaftar!'
            ]
        ],
        'password'  => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Password wajib diisi!',
                'min_length' => 'Password minimal 6 karakter!'
            ]
        ],
        'id_group'  => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Grup wajib dipilih!'
            ]
        ],
    ])) {
        // Kalau gagal validasi, kembali ke form dengan pesan error
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }


        $this->userModel->insert([
            'nama_user'     => $this->request->getPost('nama_user'),
            'username'      => $this->request->getPost('username'),
            // Password di-hash dulu sebelum disimpan, JANGAN simpan password polos!
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'hp_'           => $this->request->getPost('hp_'),
            'id_group'      => $this->request->getPost('id_group'),
            'create_at'     => date('Y-m-d H:i:s'), // waktu sekarang
            'role'          => 'user'
        ]);

         return redirect()->to('/admin/users')
        ->with('success', 'User berhasil ditambahkan!');    
    }

    // Update user
    public function update($id)
    {
         if (!$this->validate([
        'nama_user' => 'required|min_length[3]|max_length[150]',
        'username'  => "required|min_length[3]|is_unique[user.username,id_user,{$id}]",
    ])) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }


        $dataUpdate = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username'  => $this->request->getPost('username'),
            'hp_'       => $this->request->getPost('hp_'),
            'id_group'  => $this->request->getPost('id_group'),
            'update_at' => date('Y-m-d H:i:s'), // waktu update
        ];


            $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            if (strlen($newPassword) < 6) {
                return redirect()->back()
                    ->with('errors', ['password' => 'Password minimal 6 karakter!']);
            }
            $dataUpdate['password_hash'] = password_hash($newPassword, PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $dataUpdate);


            return redirect()->to('/admin/users')
                ->with('success', 'User berhasil diupdate!');
    }

    // Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/admin/users');
    }
}