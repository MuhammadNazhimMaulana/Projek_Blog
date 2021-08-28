<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Post_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoBlog($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Blog';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_blog'] = $fileName;
        return $this;
    }
}