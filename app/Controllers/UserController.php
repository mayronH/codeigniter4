<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function addUser()
    {
        return view('user/add-user');
    }

    public function saveUser()
    {
        if ($this->request->getMethod() == 'post') {
            $userModel = new UserModel();

            $data = [
                'user_name' => $this->request->getPost('name'),
                'user_email' => $this->request->getPost('email'),
                'user_phone' => $this->request->getPost('phone'),
                'user_password' => $this->request->getPost('password'),
            ];

            $response = [
                'status' => 1,
                'msg' => 'User created'
            ];

            // Using the validation from the model
            if (
                !$this->validate(['confirm-password' => 'matches[password]']) ||
                $userModel->save($data) === false
            ) {
                $response = [
                    'status' => 0,
                    'msg' => 'Validation error'
                ];
                return $this->response->setJSON($response);
            }

            return $this->response->setJSON($response);
        }
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $userModel = new UserModel();

            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];

            $session = session();

            if (!$this->validate($rules)) {
                $session->setFlashdata('error', 'Please inform e-mail and password');
                return redirect()->to(base_url('login'));
            }

            $data = [
                'user_email' => $this->request->getPost('email'),
                'user_password' => $this->request->getPost('password')
            ];

            $user = $userModel->where('user_email', $data['user_email'])->first();

            if ($user && password_verify($data['user_password'], $user['user_password'])) {
                // User information and the property to verify if someone is logged in
                $session->set([
                    'id' => $user['user_id'],
                    'name' => $user['user_name'],
                    'email' => $user['user_email'],
                    'phone' => $user['user_phone'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to(base_url('/'));
            }

            $session->setFlashdata('error', "E-mail/Password doesn't matches");
            return redirect()->to(base_url('login'));
        }

        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
