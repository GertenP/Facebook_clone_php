<?php

namespace App\Controllers;

use App\Controller;

class DashboardController extends Controller{

    public function index()
    {
        $this->render('index', ['dashboard' => null]);
    }
}