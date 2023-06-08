<?php

namespace App\Controllers;


class Bantuan extends BaseController
{


    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Bantuan',
        ];
        return view('bantuan/index', $data);
    }
}
