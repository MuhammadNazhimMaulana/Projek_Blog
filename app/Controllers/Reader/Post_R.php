<?php

namespace App\Controllers\Reader;

use App\Controllers\BaseController;
use App\Models\Post_M;
use App\Models\Kategory_M;
use App\Models\Pengguna_M;
use App\Models\Komentar_M;
use App\Entities\Post_E;

class Post_R extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }

    public function read()
    {
        $model = new Post_M();

        $model_kategory = new Kategory_M();

        $keyword = '';

        if($this->request->getPost())
        {
            $keyword = $this->request->getPost('keyword');
        }

        $data = [
            "post" => $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->like('tbl_post.judul_post', $keyword)->paginate(3, 'post'),
            "pager" => $model->pager,
            'kategory' => $model_kategory->paginate(3, 'kategory'),
            'title' => 'Post',
            "keyword" => $keyword
        ];

        return view('Reader_View/Post_Reader/view_post_reader', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_post = $this->request->uri->getSegment(4);

        $model = new Post_M();

        // Model Untuk Kategori
        $model_kategory = new Kategory_M();

        // Model Untuk Kategori
        $model_komentar = new Komentar_M();

        $post = $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->where('tbl_post.id_post', $id_post)->first();

        $data = [
            'post' => $post,
            'postingan' => $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->paginate(3, 'post'),
            'pager' => $model->pager,
            'kategory' => $model_kategory->paginate(3, 'kategory'),
            'komentar' => $model_komentar->paginate(3, 'komentar'),
            'title' => 'Post'
        ];

        return view('Reader_View/Post_Reader/view_specific_post_reader', $data);
    }


}
