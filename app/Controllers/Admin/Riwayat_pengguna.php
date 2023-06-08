<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HasilModel;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;

class Riwayat_pengguna extends BaseController
{
    protected $penyMod;
    protected $riwMod;
    protected $gejMod;

    public function __construct()
    {
        $this->riwMod = new HasilModel();
        $this->gejMod = new GejalaModel();
        $this->penyMod = new PenyakitModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Admin Riwayat User',
            'riwayat' => $this->riwMod->getRiwayat(),
            'allG' => $this->gejMod->getGejala(),
            'allP' =>  $this->penyMod->getAllPenyakit(),
        ];
        return view('admin/riwayat_pengguna/index', $data);
    }
}
