<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Komentar_M;
use App\Models\Post_M;
use App\Entities\Komentar_E;

class Komentar_A extends BaseController
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
        $model = new Komentar_M();

        $data = [
            "komentar" => $model->join('tbl_post', 'tbl_post.id_post = tbl_komentar.id_post')->paginate(3, 'komentar'),
            "pager" => $model->pager,
        ];

        return view('Admin_View/Komentar_Admin/view_komentar', $data);
    }

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_komentar = $this->request->uri->getSegment(4);

        $model = new Komentar_M();

       $komentar = $model->join('tbl_post', 'tbl_post.id_post = tbl_komentar.id_post')->find($id_komentar);

        // Data yang akan dikirim ke view specific
        $data = [
            "komentar" =>$komentar
        ];

        return view('Admin_View/Komentar_Admin/view_specific_komentar', $data);
    }

    public function create()
    {
        // Dapatkan Semua data
        $model_postingan = new Post_M();
        $post = $model_postingan->findAll();
        $list_post = [];

        // Buat looping
        foreach ($post as $postingan) {
            $list_post[$postingan->id_post] = $postingan->judul_post;
        }

        $data_komentar = [
            'daftar_postingan' => $list_post,
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'komentar');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Komentar_M();

               $komentar = new Komentar_E();

                // Fill untuk assign value data kecuali gambar
               $komentar->fill($data);
               $komentar->created_at = date("Y-m-d H:i:s");

                $model->save($komentar);

                $id_komentar = $model->insertID();

                $segments = ['Admin', 'Komentar_A', 'view', $id_komentar];

                // Akan redirect ke /Admin/Rak_A/view/$id_barang
                return redirect()->to(site_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('Admin_View/Komentar_Admin/create_komentar', $data_komentar);
    }

    public function update()
    {
        $id_komentar = $this->request->uri->getSegment(4);

        $model = new Komentar_M();

       $komentar = $model->join('tbl_post', 'tbl_post.id_post = tbl_komentar.id_post')->find($id_komentar);
        
       // Dapatkan Semua data
        $model_postingan = new Post_M();
        $post = $model_postingan->findAll();
        $list_post = [];

        // Buat looping
        foreach ($post as $postingan) {
            $list_post[$postingan->id_post] = $postingan->judul_post;
        }

        $data = [
            'komentar' =>$komentar,
            'daftar_postingan' => $list_post,
        ];

        if ($this->request->getPost()) {
            $data_komentar = $this->request->getPost();
            $this->validation->run($data_komentar, 'komentar_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
               $komentar = new Komentar_E();
               $komentar->id_komentar = $id_komentar;
               $komentar->fill($data_komentar);

               $komentar->updated_at = date("Y-m-d H:i:s");

                $model->save($komentar);

                $segments = ['Admin', 'Komentar_A', 'view', $id_komentar];

                return redirect()->to(site_url($segments));
            }
        }

        return view('Admin_View/Komentar_Admin/update_komentar', $data);
    }

    public function delete()
    {
        $id_komentar = $this->request->uri->getSegment(4);

        $model = new Komentar_M();

        $delete = $model->delete($id_komentar);

        return redirect()->to(site_url('Admin/Komentar_A/read'));
    }

}
