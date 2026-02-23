<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AppsModel;
use App\Models\GroupModel;
use App\Models\AccessModel;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel   = new UserModel();
        $appsModel   = new AppsModel();
        $groupModel  = new GroupModel();
        $accessModel = new AccessModel();

        $data = [
            'title'        => 'Dashboard Admin',
            'total_user'   => $userModel->countAll(),
            'total_apps'   => $appsModel->countAll(),
            'total_group'  => $groupModel->countAll(),
            'total_access' => $accessModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }



    // Tampilkan halaman profile
public function profile()
{
    $userModel = new UserModel();
    $data = [
        'title' => 'Profile Admin',
        'user'  => $userModel->find((int) session()->get('id_user'))
    ];

    return view('admin/profile', $data);
}

// Update profile (nama & username)
public function updateProfile()
{
    $id = (int) session()->get('id_user');

    if (!$this->validate([
        'nama_user' => 'required|min_length[3]|max_length[150]',
        'username'  => "required|min_length[3]|is_unique[user.username,id_user,{$id}]",
    ])) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $userModel = new UserModel();
    $userModel->update($id, [
        'nama_user' => $this->request->getPost('nama_user'),
        'username'  => $this->request->getPost('username'),
        'hp_'       => $this->request->getPost('hp_'),
        'update_at' => date('Y-m-d H:i:s'),
    ]);

    // Update session biar langsung berubah di sidebar
    session()->set('nama_user', $this->request->getPost('nama_user'));
    session()->set('username', $this->request->getPost('username'));

    return redirect()->to('/admin/profile')
        ->with('success', 'Profile berhasil diupdate!');
}

// Ganti password
public function updatePassword()
{
    if (!$this->validate([
        'old_password'     => 'required',
        'new_password'     => 'required|min_length[6]',
        'confirm_password' => 'required|matches[new_password]',
    ])) {
        return redirect()->back()
            ->with('errors', $this->validator->getErrors());
    }

    $id        = (int) session()->get('id_user');
    $userModel = new UserModel();
    $user      = $userModel->find($id);

    // Cek password lama
    if (!password_verify($this->request->getPost('old_password'), $user['password_hash'])) {
        return redirect()->back()
            ->with('errors', ['old_password' => 'Password lama tidak sesuai!']);
    }

    $userModel->update($id, [
        'password_hash' => password_hash($this->request->getPost('new_password'), PASSWORD_BCRYPT),
        'update_at'     => date('Y-m-d H:i:s'),
    ]);

    return redirect()->to('/admin/profile')
        ->with('success', 'Password berhasil diubah!');
}


}