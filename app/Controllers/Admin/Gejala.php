<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\BasisModel;

class Gejala extends BaseController
{

    protected $gejalaMod;
    protected $basisMod;

    public function __construct()
    {
        $this->gejalaMod = new GejalaModel();
        $this->basisMod = new BasisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Admin List Gejala',
            'gejala' => $this->gejalaMod->getGejala(),
        ];
        return view('admin/gejala/index', $data);
    }

    public function autodata()
    {
        $data = $_POST['data'];
        $dataG = $this->gejalaMod->getautoG($data);

        echo json_encode($dataG);
    }

    public function autosave()
    {
        $jmldata = count($this->request->getVar('newgejala'));

        for ($i = 0; $i < $jmldata; $i++) {
            // if ($this->request->getVar('bobot')[$i] == 1) {
            $kodeK = $this->gejalaMod->getKodegejala();
            $this->gejalaMod->save([
                'id_gejala' => $kodeK,
                'nama_gejala' => $this->request->getVar('newgejala')[$i],
            ]);
            // }
        }
    }

    public function autoupdate()
    {
        $id = $this->request->getVar('id_gejala');
        $this->gejalaMod->getUpdate([
            'nama_gejala' => $this->request->getVar('nama_gejala')
        ], $id);
    }

    // public function autosave()
    // {
    //     $data = $_POST['data'];
    //     $ex = explode(',', $data);
    //     $jmldata = count($ex);
    //     for ($i = 0; $i < $jmldata; $i++) {
    //         $kodeK = $this->gejalaMod->getKodegejala();
    //         if ($ex[$i] != '') {
    //             $this->gejalaMod->save([
    //                 'kode_gejala' => $kodeK,
    //                 'nama_gejala' => $ex[$i],
    //             ]);
    //         }
    //     }
    // }

    // public function autoupdate()
    // {
    //     $data = $_POST['data'];
    //     $id = explode(".", $data)[0];
    //     $nama_gejala = explode(".", $data)[1];

    //     $this->gejalaMod->save([
    //         'id_gejala' => $id,
    //         'nama_gejala' => $nama_gejala
    //     ]);
    // }

    public function autodelete()
    {
        $data = $_POST['data'];

        $cekbasis = $this->basisMod->cekBasis($data);

        if (count($cekbasis) > 0) {
            echo json_encode(false);
        } else {
            $this->gejalaMod->getDelete($data);
            $dataallG = $this->gejalaMod->getGejala();

            echo json_encode($dataallG);
        }
    }

    public function autoallgejala()
    {
        $dataallG = $this->gejalaMod->getGejala();

        echo json_encode($dataallG);
    }
}
