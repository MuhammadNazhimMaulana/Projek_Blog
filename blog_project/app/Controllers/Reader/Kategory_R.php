<?php

namespace App\Controllers\Reader;

use App\Controllers\BaseController;
use App\Models\Kategory_M;
use App\Models\Post_M;
use App\Models\Pengguna_M;
use App\Entities\Kategory_E;

class Kategory_R extends BaseController
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

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_kategory = $this->request->uri->getSegment(4);

        $model = new Kategory_M();

        $model_post = new Post_M();

       $kategory = $model->find($id_kategory);

        // Data yang akan dikirim ke view specific
        $data = [
            'posting' => $model_post->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->like('tbl_post.id_kategory', $id_kategory)->paginate(3, 'post'),
            'kategory' =>$kategory,
            'kategory_more' => $model->paginate(3, 'kategory'),
            'title' => 'Kategory'
        ];

        return view('Reader_View/Kategory_Reader/view_specific_kategory_reader', $data);
    }

}
