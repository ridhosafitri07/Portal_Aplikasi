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
        $this->groupModel->insert([
            'nama_group' => $this->request->getPost('nama_group')
        ]);

        return redirect()->to('/admin/groups');
    }

    // Fungsi untuk update group
    public function update($id)
    {
        $this->groupModel->update($id, [
            'nama_group' => $this->request->getPost('nama_group')
        ]);

        return redirect()->to('/admin/groups');
    }

    // Fungsi untuk hapus group
    public function delete($id)
    {
        $this->groupModel->delete($id);

        return redirect()->to('/admin/groups');
    }
}