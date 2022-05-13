<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CalendarController extends BaseController
{
    public function __construct()
    {
        helper(["url"]);
    }

    public function index()
    {
        return view("calendar");
    }

    public function loadData()
    {
    }

    public function addEvent()
    {
    }
}
