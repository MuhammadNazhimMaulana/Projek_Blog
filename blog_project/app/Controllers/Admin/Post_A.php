<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post_M;
use App\Models\Kategory_M;
use App\Models\Pengguna_M;
use App\Entities\Post_E;

class Post_A extends BaseController
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

        $keyword = '';

        if($this->request->getPost())
        {
            $keyword = $this->request->getPost('keyword');
        }

        $data = [
            "post" => $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->like('tbl_post.judul_post', $keyword)->paginate(3, 'post'),
            "pager" => $model->pager,
            'title' => 'Post',
            "keyword" => $keyword
        ];

        return view('Admin_View/Post_Admin/view_post', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_post = $this->request->uri->getSegment(4);

        $model = new Post_M();

        $post = $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->where('tbl_post.id_post', $id_post)->first();

        $data = [
            'post' => $post,
            'title' => 'Post'
        ];

        return view('Admin_View/Post_Admin/view_specific_post', $data);
    }

    public function create()
    {
        // Dapatkan Semua data
        $model_kategory = new Kategory_M();
        $kategory = $model_kategory->findAll();
        $list_kategory = [];

        // Buat looping
        foreach ($kategory as $category) {
            $list_kategory[$category->id_kategory] = $category->nama_kategori;
        }

        // Dapatkan Semua data
        $model_pengguna = new Pengguna_M();
        $pengguna = $model_pengguna->findAll();
        $list_pengguna = [];

        // Buat looping
        foreach ($pengguna as $user) {
            $list_pengguna[$user->id_pengguna] = $user->nama;
        }

        $data = [
            'daftar_kategory' => $list_kategory,
            'daftar_pengguna' => $list_pengguna,
            'title' => 'Post'
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_post = $this->request->getPost();
            $this->validation->run($data_post, 'post');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Post_M();

                $post = new Post_E();

                // Fill untuk assign value data
                $post->fill($data_post);
                $post->foto_blog = $this->request->getFile('foto_blog');
                $post->created_at = date("Y-m-d H:i:s");

                $model->save($post);

                $id_post = $model->insertID();

                $segments = ['Admin', 'Post_A', 'view', $id_post];

                // Akan redirect ke /Admin/post_A/view/$id_post
                return redirect()->to(base_url($segments));
            }
            $this->session->setFlashdata('errors', $errors);
        }
        return view('Admin_View/Post_Admin/create_post', $data);
    }

    public function update()
    {
        $id_post = $this->request->uri->getSegment(4);

        $model = new Post_M();

        $post = $model->join('tbl_pengguna', 'tbl_pengguna.id_pengguna = tbl_post.id_pengguna')->join('tbl_kategory', 'tbl_kategory.id_kategory = tbl_post.id_kategory')->where('tbl_post.id_post', $id_post)->first();

        // Dapatkan Semua data
        $model_kategory = new Kategory_M();
        $kategory = $model_kategory->findAll();
        $list_kategory = [];

        // Buat looping
        foreach ($kategory as $category) {
            $list_kategory[$category->id_kategory] = $category->nama_kategori;
        }

        // Dapatkan Semua data
        $model_pengguna = new Pengguna_M();
        $pengguna = $model_pengguna->findAll();
        $list_pengguna = [];

        // Buat looping
        foreach ($pengguna as $user) {
            $list_pengguna[$user->id_pengguna] = $user->nama;
        }

        $data_post = [
            'post' => $post,
            'daftar_kategory' => $list_kategory,
            'daftar_pengguna' => $list_pengguna,
            'title' => 'Post'
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'post_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $post = new Post_E();
                $post->id_post = $id_post;
                $post->fill($data);

                if ($this->request->getFile('foto_blog')->isValid()) {
                    $post->foto_blog = $this->request->getFile('foto_blog');
                }

                $post->updated_at = date("Y-m-d H:i:s");

                $model->save($post);

                $segments = ['Admin', 'Post_A', 'view', $id_post];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Admin_View/Post_Admin/update_post', $data_post);
    }

    public function delete()
    {
        $id_post = $this->request->uri->getSegment(4);

        $model = new Post_M();

        $delete = $model->delete($id_post);

        return redirect()->to(site_url('Admin/Post_A/read'));
    }
}
