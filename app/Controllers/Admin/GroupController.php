<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GroupModel;

class GroupController extends BaseController
{
    protected $groupModel;

    // Constructor - dipanggil otomatis saat controller diakses
    public function __construct()
    {
        $this->groupModel = new GroupModel();
    }

    // Fungsi untuk menampilkan semua data group
    public function index()
    {
        $data = [
            'title'  => 'Kelola Group',
            'groups' => $this->groupModel->findAll() // ambil semua data dari tabel group
        ];

        return view('admin/groups/index', $data);
    }

    // Fungsi untuk menyimpan group baru
    public function store()
    {
          // Aturan validasi
    if (!$this->validate([
        'nama_group' => 'required|min_length[3]|max_length[150]',
    ])) {
        
        // Kalau gagal validasi, kembali ke form dengan pesan error
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    
        $this->groupModel->insert([
            'nama_group' => $this->request->getPost('nama_group')
        ]);

         return redirect()->to('/admin/groups')
        ->with('success', 'Group berhasil ditambahkan!');
    }

    // Fungsi untuk update group
    public function update($id)
    {
          if (!$this->validate([
        'nama_group' => 'required|min_length[3]|max_length[150]',
    ])) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }


        $this->groupModel->update($id, [
            'nama_group' => $this->request->getPost('nama_group')
        ]);

        return redirect()->to('/admin/groups')
        ->with('success', 'Group berhasil diupdate!');
    }

    // Fungsi untuk hapus group
    public function delete($id)
    {
        $this->groupModel->delete($id);

        return redirect()->to('/admin/groups');
    }
}