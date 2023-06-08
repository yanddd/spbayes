<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Pengguna extends BaseController
{

    protected $pengMod;

    public function __construct()
    {
        $this->pengMod = new PenggunaModel();
    }

    public function index()
    {

        $data = [
            'title' => 'SP Bayes | Admin List User',
            'pengguna' => $this->pengMod->getPengguna(),
        ];
        return view('admin/pengguna/index', $data);
    }
}
