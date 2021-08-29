<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategory_M extends Model
{
    protected $table         = 'tbl_kategory';
    protected $primaryKey    = 'id_kategory';
    protected $allowedFields = ['nama_kategori','slug_kategori', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Kategory_E';
    protected $useTimestamps = true;
}