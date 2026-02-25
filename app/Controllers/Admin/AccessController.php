<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccessModel;
use App\Models\GroupModel;
use App\Models\AppsModel;

class AccessController extends BaseController
{
    protected $accessModel;
    protected $groupModel;
    protected $appsModel;

    public function __construct()
    {
        $this->accessModel = new AccessModel();
        $this->groupModel  = new GroupModel();
        $this->appsModel   = new AppsModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Kelola Akses',
            // Ambil semua akses + nama group + nama apps sekaligus
            'accesses' => $this->accessModel
                            ->select('accss_users.id_access, g.nama_group, apps_.nama')
                            ->join('`group` g', 'g.id_group = accss_users.id_group', 'left')
                            ->join('apps_', 'apps_.id_app = accss_users.id_apps', 'left')
                            ->findAll(),
            'groups'  => $this->groupModel->findAll(),
            'apps'    => $this->appsModel->findAll()
        ];

        return view('admin/access/index', $data);
    }

    public function store()
    {
        $id_group = $this->request->getPost('id_group');
        $id_apps  = $this->request->getPost('id_apps'); // Ini bakal jadi array

        if (!$id_group || empty($id_apps)) {
            return redirect()->to('/admin/access')->with('error', 'Grup atau Aplikasi belum dipilih!');
        }

        $countAdded = 0;
        foreach ($id_apps as $id_app) {
            // Cek dulu apakah kombinasi group+app sudah ada
            $exists = $this->accessModel
                        ->where('id_group', $id_group)
                        ->where('id_apps', $id_app)
                        ->first();

            if (!$exists) {
                $this->accessModel->insert([
                    'id_group' => $id_group,
                    'id_apps'  => $id_app
                ]);
                $countAdded++;
            }
        }

        if ($countAdded > 0) {
            return redirect()->to('/admin/access')->with('success', "$countAdded akses baru berhasil ditambahkan!");
        } else {
            return redirect()->to('/admin/access')->with('error', 'Semua aplikasi yang dipilih sudah memiliki akses untuk grup ini.');
        }
    }

    public function delete($id)
    {
        $this->accessModel->delete($id);
        return redirect()->to('/admin/access');
    }
}