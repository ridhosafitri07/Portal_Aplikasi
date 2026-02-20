<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'group';    //nama tabel di database
    protected $primaryKey = 'id_group';  //nama primary key
    protected $allowedFields = ['nama_group']; //field yang boleh diisi
    protected $useTimestamps = false; //otomatis mengisi field created_at dan updated_at

}
