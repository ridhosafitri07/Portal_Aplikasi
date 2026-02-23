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
}