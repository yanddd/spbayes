<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\BasisModel;

class Penyakit extends BaseController
{

    protected $penyakitMod;
    protected $basisMod;

    public function __construct()
    {
        $this->penyakitMod = new PenyakitModel();
        $this->basisMod = new BasisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Info Penyakit',
            'penyakit' => $this->penyakitMod->getAllPenyakit(),
        ];
        return view('penyakit/index', $data);
    }

    public function detailpenyakit($id)
    {
        $penyakit = $this->penyakitMod->getPenyakit($id);
        $data = [
            'title' => 'SP Bayes | Info Penyakit ' . $penyakit['nama_penyakit'],
            'penyakit' => $penyakit,
            'gejala' => $this->basisMod->getBasisG($id),
        ];
        return view('penyakit/detail', $data);
    }
}
