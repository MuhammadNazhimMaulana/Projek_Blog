<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_M extends Model
{
    protected $table         = 'tbl_pengguna';
    protected $primaryKey    = 'id_pengguna';
    protected $allowedFields = ['nama','username', 'email', 'password', 'usia', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Pengguna_E';
    protected $useTimestamps = true;
}