<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Site extends BaseController
{
    public function index()
    {

        // $data = ["name" => "Obi-Wan Kenobi", "email" => "obiwan@gmail.com"];

        $data["name"] = "Luke Skywalker";
        $data["email"] = "luke@gmail.com";

        // $name = "Leia Organa";
        // $email = "leia@gmail.com";
        // return view('site_index', compact($name, $email));

        return view('site_index', $data);
    }
}
