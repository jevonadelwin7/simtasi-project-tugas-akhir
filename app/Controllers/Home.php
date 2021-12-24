<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Home',
            'judul' => 'Dashboard',

        ];
        echo view('home', $data);
    }
}
