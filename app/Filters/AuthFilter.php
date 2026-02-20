<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Session\Session;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null): RedirectResponse|null
    {
        /** @var Session $session */
        $session = service('session');

        // Belum login → lempar ke halaman login
        if (!$session->get('logged_in')) {
            /** @var RedirectResponse $redirector */
            $redirector = redirect();
            return $redirector->to(base_url('auth'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek role jika argumen diberikan, mis. filter('auth:admin')
        if (!empty($arguments)) {
            $requiredRole = $arguments[0] ?? null;
            if ($requiredRole && $session->get('role') !== $requiredRole) {
                $role = (string) $session->get('role');
                $url  = $role === 'admin'
                    ? base_url('admin/dashboard')
                    : base_url('user/dashboard');
                /** @var RedirectResponse $redirector */
                $redirector = redirect();
                return $redirector->to($url)
                    ->with('error', 'Akses ditolak.');
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null): void
    {
        // tidak digunakan
    }
}