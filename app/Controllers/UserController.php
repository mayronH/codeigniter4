<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function addUser()
    {
        return view('add-user');
    }

    public function saveUser()
    {
        if ($this->request->getMethod() == 'post') {
            $userModel = new UserModel();

            $data = [
                'user_name' => $this->request->getPost('name'),
                'user_email' => $this->request->getPost('email'),
                'user_phone' => $this->request->getPost('phone')
            ];

            $response = [
                'status' => 1,
                'msg' => 'User created'
            ];

            // Using the validation from the model
            if ($userModel->save($data) === false) {
                $response = [
                    'status' => 0,
                    'msg' => 'Validation error'
                ];
                return $this->response->setJSON($response);
            }

            return $this->response->setJSON($response);
        }
    }
}
