<?php

namespace App\Controllers;

use App\Models\HasilModel;
use App\Models\PenyakitModel;
use App\Models\PenggunaModel;

class Home extends BaseController
{
    protected $hasilMod;
    protected $penyMod;
    protected $pengMod;

    public function __construct()
    {
        $this->hasilMod = new HasilModel();
        $this->penyMod = new PenyakitModel();
        $this->pengMod = new PenggunaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Home',
            'diag' => $this->hasilMod->getJumDiag(),
            'stres' => $this->hasilMod->getJumPeny('P01'),
            'cemas' => $this->hasilMod->getJumPeny('P03'),
            'depresi' => $this->hasilMod->getJumPeny('P02'),
            'namstres' => $this->penyMod->getPenyakit('P01'),
            'namcemas' => $this->penyMod->getPenyakit('P03'),
            'namdepresi' => $this->penyMod->getPenyakit('P02'),
            'pengguna' => $this->pengMod->getPengguna(),
        ];
        return view('index', $data);
    }
}
