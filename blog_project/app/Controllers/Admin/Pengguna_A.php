<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengguna_M;
use App\Entities\Pengguna_E;

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
        return view('Dashboards/Dashboard_Admin');
    }

    public function profile(){
        // Dapatkan Id dari segmen
        $id_pengguna = session()->get('id_pengguna');

        $model = new Pengguna_M();

       $profile = $model->find($id_pengguna);

        // Data yang akan dikirim ke view specific
        $data = [
            "profile" =>$profile
        ];

        return view('Admin_View/Profile_Admin/view_profile', $data);
    }

}
