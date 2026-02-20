<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class AuthController extends BaseController
{
    // Session sudah di-inject di BaseController via $this->session

    // ── Tampilkan form login ──────────────────────────────────
    public function index(): string|RedirectResponse
    {
        if ($this->session->get('logged_in')) {
            return $this->redirectByRole();
        }
        return view('login');
    }

    // ── Proses login ─────────────────────────────────────────
    public function login(): RedirectResponse
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[4]',
        ];

        /** @var RedirectResponse $redirector */
        $redirector = redirect();

        if (!$this->validate($rules)) {
            return $redirector->back()
                ->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();
        $user      = $userModel->findByUsername($username);

        if (!$user) {
            return $redirector->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        // 1. Cek password hash (normal)
        if (password_verify($password, $user['password_hash'])) {
            // lanjut login
        }
        // 2. Fallback: kalau password di DB masih plain text
        elseif ($password === $user['password_hash']) {
            // auto hash ulang biar kedepannya aman
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $userModel->update($user['id_user'], [
                'password_hash' => $newHash
            ]);
        }
        // 3. Kalau dua-duanya gagal
        else {
            return $redirector->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        $this->session->set([
            'logged_in' => true,
            'id_user'   => $user['id_user'],
            'nama_user' => $user['nama_user'],
            'username'  => $user['username'],
            'role'      => $user['role'],
            'id_group'  => $user['id_group'],
        ]);

        return $this->redirectByRole();
    }

    // ── Logout ───────────────────────────────────────────────
    public function logout(): RedirectResponse
    {
        $this->session->destroy();
        /** @var RedirectResponse $redirector */
        $redirector = redirect();
        return $redirector->to(base_url('auth'));
    }

    // ── Halaman lupa password (placeholder) ──────────────────
    public function forgot(): string
    {
        return view('auth/forgot');
    }

    // ── Helper redirect berdasarkan role ─────────────────────
    private function redirectByRole(): RedirectResponse
    {
        $role = (string) $this->session->get('role');
        /** @var RedirectResponse $redirector */
        $redirector = redirect();
        if ($role === 'admin') {
            return $redirector->to(base_url('admin/dashboard'));
        }
        return $redirector->to(base_url('user/dashboard'));
    }
}