<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengguna_M;
use App\Entities\Pengguna_E;
use App\Models\Post_M;

class Pengguna_A extends BaseController
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

    public function index()
    {
        $model_post = new Post_M();

        $jumlah_per_post = $model_post->select('COUNT(tbl_post.id_post) AS jumlah, tbl_pengguna.username AS user')
            ->join('tbl_pengguna', 'tbl_post.id_pengguna=tbl_pengguna.id_pengguna')
            ->groupBy('tbl_post.id_pengguna')
            ->get();

        $data = [
            "title" => 'Dashboard',
            "jumlah_per_post" => $jumlah_per_post,
        ];

        return view('Admin_View/Profile_Admin/home_admin', $data);
    }

    public function profile(){
        // Dapatkan Id dari segmen
        $id_pengguna = session()->get('id_pengguna');

        $model = new Pengguna_M();

       $profile = $model->find($id_pengguna);

        // Data yang akan dikirim ke view specific
        $data = [
            "profile" =>$profile,
            "title" => 'Pengguna'
        ];

        return view('Admin_View/Profile_Admin/view_profile', $data);
    }

}
