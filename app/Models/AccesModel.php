<?php

namespace App\Models;

use CodeIgniter\Model;

class AccesModel extends Model
{
    protected $table            = 'accss_users';
    protected $primaryKey       = 'id_access';
    protected $allowedFields    = ['id_group', 'id_apps'];

    protected $useTimestamps = false;
}