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
        // Cek dulu apakah kombinasi group+app sudah ada
        $exists = $this->accessModel
                    ->where('id_group', $this->request->getPost('id_group'))
                    ->where('id_apps', $this->request->getPost('id_apps'))
                    ->first();

        if ($exists) {
            // Kalau sudah ada, jangan simpan dobel
            return redirect()->to('/admin/access')->with('error', 'Akses ini sudah ada!');
        }

        $this->accessModel->insert([
            'id_group' => $this->request->getPost('id_group'),
            'id_apps'  => $this->request->getPost('id_apps')
        ]);

        return redirect()->to('/admin/access')->with('success', 'Akses berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $this->accessModel->delete($id);
        return redirect()->to('/admin/access');
    }
}