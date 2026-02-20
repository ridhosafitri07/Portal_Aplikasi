<?php

namespace App\Controllers;

use App\Models\AppsModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class UserController extends Controller
{
    public function dashboard()
    {
        $appsModel = new AppsModel();
        $idGroup   = session()->get('id_group');

        $apps = $idGroup
            ? $appsModel->getAppsByGroup((int) $idGroup)
            : [];

        return view('user/dashboard', ['apps' => $apps]);
    }

     // ── Tampilkan halaman profil ──────────────────────────────
    public function profile(): string
    {
        $userModel = new UserModel();
        $user      = $userModel->find((int) session()->get('id_user'));

        return view('user/profile', ['user' => $user]);
    }

    // ── Update profile info (nama & username) ─────────────────
    public function updateProfile(): RedirectResponse
    {
        $rules = [
            'nama_user' => 'required|min_length[2]|max_length[150]',
            'username'  => 'required|min_length[3]|max_length[100]',
        ];

        /** @var RedirectResponse $redirector */
        $redirector = redirect();

        if (!$this->validate($rules)) {
            return $redirector->to(base_url('user/profile'))
                ->with('error', implode(' ', array_column($this->validator->getErrors(), null)));
        }

        $idUser   = (int) session()->get('id_user');
        $namaUser = (string) $this->request->getPost('nama_user');
        $username = (string) $this->request->getPost('username');

        $userModel = new UserModel();

        // Cek username unik (selain user ini sendiri)
        $existing = $userModel->where('username', $username)
                              ->where('id_user !=', $idUser)
                              ->first();

        if ($existing) {
            return $redirector->to(base_url('user/profile'))
                ->with('error', 'Username sudah digunakan oleh user lain.');
        }

        $userModel->update($idUser, [
            'nama_user' => $namaUser,
            'username'  => $username,
            'update_at' => date('Y-m-d H:i:s'),
        ]);

        // Update session agar topbar langsung berubah
        session()->set('nama_user', $namaUser);
        session()->set('username', $username);

        return $redirector->to(base_url('user/profile'))
            ->with('success', 'Profil berhasil diperbarui.');
    }

    // ── Update password ───────────────────────────────────────
    public function updatePassword(): RedirectResponse
    {
        $rules = [
            'old_password'     => 'required',
            'new_password'     => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        /** @var RedirectResponse $redirector */
        $redirector = redirect();

        if (!$this->validate($rules)) {
            return $redirector->to(base_url('user/profile'))
                ->with('error', implode(' ', array_column($this->validator->getErrors(), null)));
        }

        $idUser      = (int) session()->get('id_user');
        $oldPassword = (string) $this->request->getPost('old_password');
        $newPassword = (string) $this->request->getPost('new_password');

        $userModel = new UserModel();
        $user      = $userModel->find($idUser);

        if (!$user || !password_verify($oldPassword, $user['password_hash'])) {
            return $redirector->to(base_url('user/profile'))
                ->with('error', 'Password lama tidak sesuai.');
        }

        $userModel->update($idUser, [
            'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
            'update_at'     => date('Y-m-d H:i:s'),
        ]);

        return $redirector->to(base_url('user/profile'))
            ->with('success', 'Password berhasil diperbarui.');
    }
}
