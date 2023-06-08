<?php

namespace App\Controllers;

use App\Models\HasilModel;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;

class Riwayat extends BaseController
{

    protected $hasilMod;
    protected $diagMod;
    protected $penyakitMod;
    protected $gejalaMod;

    public function __construct()
    {
        $this->hasilMod = new HasilModel();
        $this->penyakitMod = new PenyakitModel();
        $this->gejalaMod = new GejalaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Riwayat Diagnosa',
            'riwayat' => $this->hasilMod->getByUser()
        ];
        return view('riwayat/index', $data);
    }
    public function detail($idip)
    {
        $serip = $this->hasilMod->seripenyakit($idip);
        $allG = $this->gejalaMod->getGejala();
        $gejala = unserialize($serip['gejala']);
        $allP =  $this->penyakitMod->getAllPenyakit();
        $arpenyakit = unserialize($serip['penyakit']);

        foreach ($allG as $ag) {
            $namaG[$ag['id_gejala']] = $ag['nama_gejala'];
        }

        foreach ($gejala as $key) {
            $dataGejala[] = [
                'id_gejala' => $key,
                'nama_gejala' => $namaG[$key],
            ];
        }

        foreach ($allP as $ap) {
            $arpkt[$ap['id_penyakit']] = $ap['nama_penyakit'];
        }

        foreach ($arpenyakit as $key => $value) {
            $dataPenyakit[] = [
                'id_penyakit' => $key,
                'nama_penyakit' => $arpkt[$key],
                'nilai' => $value
            ];
        }

        $data = [
            'title' => 'SP Bayes | Detail Riwayat',
            'hasilD' => $dataGejala,
            'hasilP' => $this->hasilMod->getHasil($idip),
            'pLain' => $dataPenyakit,
            'maxN' => $dataPenyakit[0]['id_penyakit']
        ];
        return view('riwayat/detail', $data);
    }
}
