<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Pengguna_M;
use App\Entities\Pengguna_E;

class Authorisasi extends BaseController
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

    public function register()
    {
        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');

            $errors = $this->validation->getErrors();

            //Jika tidak ada error
            if (!$errors) {

                $model = new Pengguna_M();
                $pengguna = new Pengguna_E();

                // Dapatkan data yang telah di input
                $pengguna->fill($data);
                $pengguna->created_at = date("Y-m-d H:i:s");
                $pengguna->password = $this->request->getPost('password');

                $model->save($pengguna);
                return view('Admin_View/Auth_Admin/Login_admin_view');
            }

            $this->session->setFlashdata('errors', $errors);
        }

        return view('Admin_View/Auth_Admin/Register_admin_view');
    }

    public function login()
    {

        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');

            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('login');
            }

            $model = new Pengguna_M();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

            if ($user->password !== md5($password)) {

                $this->session->setFlashdata('errors', ['Password Salah']);
            } else {
                $session_data = [
                    'username' => $user->username,
                    'id_pengguna' => $user->id_pengguna,
                    'email' => $user->email,
                    'isLoggedIn' => TRUE
                ];

                $this->session->set($session_data);

                return redirect()->to(site_url('Admin/Pengguna_A'));
            }
        }
        return view('Admin_View/Auth_Admin/Login_admin_view');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('Auth/Authorisasi/login'));
    }
}
