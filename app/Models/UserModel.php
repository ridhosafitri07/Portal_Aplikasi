<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nama_user',
        'username',
        'password_hash',
        'role',
        'hp_',
        'otp',
        'create_at',
        'update_at',
        'id_group',
    ];

    protected $useTimestamps = false; // sudah ada create_at & update_at manual

    // ── Query helpers ──────────────────────────────────────────

    /**
     * Cari user berdasarkan username, return satu row.
     */
    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Ambil semua user beserta nama group (JOIN).
     */
    public function getAllWithGroup(): array
    {
        return $this->db->table('user u')
            ->select('u.*, g.nama_group')
            ->join('group g', 'g.id_group = u.id_group', 'left')
            ->orderBy('u.id_user', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * User terbaru (limit).
     */
    public function getRecent(int $limit = 10): array
    {
        return $this->db->table('user u')
            ->select('u.id_user, u.nama_user, u.username, u.role, g.nama_group')
            ->join('group g', 'g.id_group = u.id_group', 'left')
            ->orderBy('u.create_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}