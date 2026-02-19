<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'nama_user',
        'username',
        'password_hash',
        'hp_',
        'otp',
        'create_at',
        'update_at',
        'id_group'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}