<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HasilModel;
use App\Models\PenyakitModel;

class Dashboard extends BaseController
{
    protected $hasilMod;
    protected $penyMod;

    public function __construct()
    {
        $this->hasilMod = new HasilModel();
        $this->penyMod = new PenyakitModel();
    }
    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Admin Dashbord',
            'diag' => $this->hasilMod->getJumDiag(),
            'stres' => $this->hasilMod->getJumPeny('P01'),
            'cemas' => $this->hasilMod->getJumPeny('P03'),
            'depresi' => $this->hasilMod->getJumPeny('P02'),
            'namstres' => $this->penyMod->getPenyakit('P01'),
            'namcemas' => $this->penyMod->getPenyakit('P03'),
            'namdepresi' => $this->penyMod->getPenyakit('P02'),
        ];
        return view('admin/index', $data);
    }
}
