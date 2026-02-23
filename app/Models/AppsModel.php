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
}