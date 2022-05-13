<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        helper(["url"]);
    }

    public function addUser()
    {
        return view('add-user');
    }

    public function saveUser()
    {
        if ($this->request->getMethod() == "post") {
            $rules = [
                "name" => "required",
                "email" => "valid_email|required",
                "phone" => "required"
            ];

            if (!$this->validate($rules)) {
                $response = [
                    "status" => 0,
                    "msg" => "Validation error"
                ];
                return $this->response->setJSON($response);
            }

            $userModel = new UserModel();

            $data = [
                "name" => $this->request->getVar("name"),
                "email" => $this->request->getVar("email"),
                "phone" => $this->request->getVar("phone")
            ];

            $response = [
                "status" => 1,
                "msg" => "User created"
            ];

            if ($userModel->insert($data)) {
                $response = [
                    "status" => 0,
                    "msg" => "Fail to create user"
                ];
                return $this->response->setJSON($response);
            }

            return $this->response->setJSON($response);
        }
    }
}
