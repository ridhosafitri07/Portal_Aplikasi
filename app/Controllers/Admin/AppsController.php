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
            // Aturan validasi
            if (!$this->validate([
        'nama' => 'required|min_length[3]|max_length[150]',
        'url_app' => 'required|min_length[2]|max_length[150]'
    ])) {
        
        // Kalau gagal validasi, kembali ke form dengan pesan error
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }



        $this->appsModel->insert([
            'nama' => $this->request->getPost('nama'),
            'url_app' => $this->request->getPost('url_app')
        ]);

        return redirect()->to('/admin/apps')
        ->with('success', 'Aplikasi berhasil ditambahkan!');
    }



    //update data
    public function update($id)
    {
        //aturan validasi
        if (!$this->validate([
        'nama' => 'required|min_length[3]|max_length[150]',
        'url_app' => 'required|min_length[2]|max_length[150]'
    ])) {
        
        // Kalau gagal validasi, kembali ke form dengan pesan error
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }


        $this->appsModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'url_app' => $this->request->getPost('url_app')
        ]);

        return redirect()->to('/admin/apps')
        ->with('success', 'Aplikasi berhasil diupdate!');
    }


    //hapus data
    public function delete($id)
    {
        $this->appsModel->delete($id);

        return redirect()->to('/admin/apps');
    }






}