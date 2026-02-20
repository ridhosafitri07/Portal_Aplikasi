<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table      = 'apps_';
    protected $primaryKey = 'id_app';
    protected $returnType = 'array';

    protected $allowedFields = ['nama', 'url_app'];

    /**
     * Ambil aplikasi yang bisa diakses oleh group tertentu.
     */
    public function getAppsByGroup(int $idGroup): array
    {
        return $this->db->table('apps_ a')
            ->select('a.*')
            ->join('accss_users au', 'au.id_app = a.id_app')
            ->where('au.id_group', $idGroup)
            ->get()
            ->getResultArray();
    }

    /**
     * Total semua aplikasi (untuk stat card admin).
     */
    public function countAll(): int
    {
        return $this->countAllResults();
    }
}