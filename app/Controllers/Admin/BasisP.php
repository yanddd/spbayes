<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\BasisModel;

class BasisP extends BaseController
{
    protected $gejalaMod;
    protected $penyakitMod;
    protected $basisMod;

    public function __construct()
    {
        $this->gejalaMod = new GejalaModel();
        $this->penyakitMod = new PenyakitModel();
        $this->basisMod = new BasisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Admin Basis Pengetahuan',
            'gejala' => $this->gejalaMod->getGejala(),
            'bStres' => $this->basisMod->getBasisG('P01'),
            'bCemas' => $this->basisMod->getBasisG('P03'),
            'bDepresi' => $this->basisMod->getBasisG('P02'),
            'nStres' => $this->gejalaMod->gejalanot('P01'),
            'nCemas' => $this->gejalaMod->gejalanot('P03'),
            'nDepresi' => $this->gejalaMod->gejalanot('P02'),
            'stres' => $this->penyakitMod->getPenyakit('P01'),
            'cemas' => $this->penyakitMod->getPenyakit('P03'),
            'depresi' => $this->penyakitMod->getPenyakit('P02'),
        ];
        return view('admin/basis/index', $data);
    }

    public function basisbaru()
    {
        $data = $_POST['data'];
        $penyakit = explode(".", $data)[0];
        $exgejala = explode(".", $data)[1];
        $gejala = explode(",", $exgejala);

        $jmldata = count($gejala);
        for ($i = 0; $i < $jmldata; $i++) {
            if ($gejala[$i] != '') {
                $this->basisMod->save([
                    'id_penyakit' => $penyakit,
                    'id_gejala' => $gejala[$i],
                ]);
            }
        }

        return json_encode($this->basisMod->getBasisG($penyakit));
    }

    public function reloadg()
    {
        $data = $_POST['data'];
        return json_encode($this->gejalaMod->gejalanot($data));
    }

    public function autodelete()
    {
        $data = $_POST['data'];
        $id = explode(".", $data)[0];
        $idpenyakit = explode(".", $data)[1];

        $this->basisMod->delete($id);

        return json_encode($this->basisMod->getBasisG($idpenyakit));
    }
}
