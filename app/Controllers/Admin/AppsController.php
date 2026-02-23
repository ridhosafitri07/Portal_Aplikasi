<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class AppsController extends BaseController
{
       protected $appsModel;

    
    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }


    //tampilkan semua data 
    public function index ()
    {
        $data = [
            'title' => 'Kelola Apps',
            'apps' => $this->appsModel->findAll()
        ];

        return view('admin/apps/index', $data);
    }



    //menyimpan data baru
    public function store()
    {
        $this->appsModel->insert([
            'nama' => $this->request->getPost('nama'),
            'url_app' => $this->request->getPost('url_app')
        ]);

        return redirect()->to('/admin/apps');
    }



    //update data
    public function update($id)
    {
        $this->appsModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'url_app' => $this->request->getPost('url_app')
        ]);

        return redirect()->to('/admin/apps');
    }


    //hapus data
    public function delete($id)
    {
        $this->appsModel->delete($id);

        return redirect()->to('/admin/apps');
    }






}