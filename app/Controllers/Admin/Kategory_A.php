<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategory_M;
use App\Entities\Kategory_E;

class Kategory_A extends BaseController
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
        $model = new Kategory_M();

        $keyword = '';

        if($this->request->getPost())
        {
            $keyword = $this->request->getPost('keyword');
        }

        $data = [
            "kategory" => $model->like('tbl_kategory.nama_kategori', $keyword)->paginate(3, 'kategory'),
            "pager" => $model->pager,
            "title" => 'Kategory',
            "keyword" => $keyword
        ];

        return view('Admin_View/Kategory_Admin/view_kategory', $data);
    }

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_kategory = $this->request->uri->getSegment(4);

        $model = new Kategory_M();

       $kategory = $model->find($id_kategory);

        // Data yang akan dikirim ke view specific
        $data = [
            "kategory" =>$kategory,
            "title" => 'Kategory'
        ];

        return view('Admin_View/Kategory_Admin/view_specific_kategory', $data);
    }

    public function create()
    {
        $data_kategory = [
            "title" => 'Kategory'
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'kategory');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Kategory_M();

               $kategory = new Kategory_E();

                // Fill untuk assign value data kecuali gambar
               $kategory->fill($data);
               $kategory->created_at = date("Y-m-d H:i:s");

                $model->save($kategory);

                $id_kategory = $model->insertID();

                $segments = ['Admin', 'Kategory_A', 'view', $id_kategory];

                // Akan redirect ke /Admin/Rak_A/view/$id_barang
                return redirect()->to(site_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('Admin_View/Kategory_Admin/create_kategory', $data_kategory);
    }

    public function update()
    {
        $id_kategory = $this->request->uri->getSegment(4);

        $model = new Kategory_M();

       $kategory = $model->find($id_kategory);

        $data = [
            'kategory' =>$kategory,
            "title" => 'Kategory'
        ];

        if ($this->request->getPost()) {
            $data_kategory = $this->request->getPost();
            $this->validation->run($data_kategory, 'kategory_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
               $kategory = new Kategory_E();
               $kategory->id_kategory = $id_kategory;
               $kategory->fill($data_kategory);

               $kategory->updated_at = date("Y-m-d H:i:s");

                $model->save($kategory);

                $segments = ['Admin', 'Kategory_A', 'view', $id_kategory];

                return redirect()->to(site_url($segments));
            }
        }

        return view('Admin_View/Kategory_Admin/update_kategory', $data);
    }

    public function delete()
    {
        $id_kategory = $this->request->uri->getSegment(4);

        $model = new Kategory_M();

        $delete = $model->delete($id_kategory);

        return redirect()->to(site_url('Admin/Kategory_A/read'));
    }

}
