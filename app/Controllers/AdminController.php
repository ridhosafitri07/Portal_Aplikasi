<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AppsModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userModel = new UserModel();
        $appsModel = new AppsModel();

        $data = [
            'total_users'  => $userModel->countAllResults(),
            'total_apps'   => $appsModel->countAll(),
            'total_groups' => $this->db()->table('group')->countAllResults(),
            'total_access' => $this->db()->table('accss_users')->countAllResults(),
            'recent_users' => $userModel->getRecent(10),
        ];

        return view('admin/dashboard', $data);
    }

    // ── helper ───────────────────────────────────────────────
    private function db()
    {
        return \Config\Database::connect();
    }
}