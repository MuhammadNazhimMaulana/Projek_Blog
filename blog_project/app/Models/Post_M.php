<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_M extends Model
{
    protected $table         = 'tbl_post';
    protected $primaryKey    = 'id_post';
    protected $allowedFields = ['id_kategory','id_pengguna', 'id_komentar', 'judul_post', 'slug', 'summary', 'body', 'foto_blog', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Post_E';
    protected $useTimestamps = true;
}