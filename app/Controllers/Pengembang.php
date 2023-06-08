<?php

namespace App\Controllers;


class Pengembang extends BaseController
{


    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Info Pengembang',
        ];
        return view('pengembang/index', $data);
    }
}
