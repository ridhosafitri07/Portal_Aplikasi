<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table      = 'apps_';       // nama tabel di database
    protected $primaryKey = 'id_app';      // primary key nya

    protected $allowedFields = [
        'nama',     // nama aplikasi
        'url_app'   // url aplikasi
    ];

    protected $useTimestamps = false; // tabel apps_ tidak punya created_at/updated_at

    /**
     * Ambil apps yang dapat diakses oleh grup tertentu
     */
    public function getAppsByGroup(int $idGroup): array
    {
        return $this->db->table('apps_ a')
            ->select('a.id_app, a.nama, a.url_app')
            ->join('accss_users au', 'au.id_app = a.id_app', 'inner')
            ->where('au.id_group', $idGroup)
            ->get()
            ->getResultArray();
    }
}