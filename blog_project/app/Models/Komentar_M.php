<?php

namespace App\Models;

use CodeIgniter\Model;

class Komentar_M extends Model
{
    protected $table         = 'tbl_komentar';
    protected $primaryKey    = 'id_komentar';
    protected $allowedFields = ['nama_komentator','isi_komentar', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Komentar_E';
    protected $useTimestamps = true;
}