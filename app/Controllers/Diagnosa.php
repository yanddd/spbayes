<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\HasilModel;
use App\Models\PenggunaModel;
use App\Models\PenyakitModel;
use App\Models\BasisModel;

class Diagnosa extends BaseController
{

    protected $gejalaMod;
    protected $penggunaMod;
    protected $ipAddress;
    protected $hasilMod;
    protected $penyakitMod;
    protected $basisMod;

    public function __construct()
    {
        $this->gejalaMod = new GejalaModel();
        $this->penggunaMod = new PenggunaModel();
        $this->ipAddress = service('request')->getIPAddress();
        $this->hasilMod = new HasilModel();
        $this->penyakitMod = new PenyakitModel();
        $this->basisMod = new BasisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Diagnosa',
            'gejala' => $this->basisMod->basisGejala(),
            'validation' => \Config\Services::validation(),
            'user' => $this->penggunaMod->getUser($this->ipAddress),
        ];
        return view('diagnosa/index', $data);
    }

    public function penggunarules()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus di isi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[pengguna.email]',
                'errors' => [
                    'required' => 'Harus di isi',
                    'valid_email' => 'Bukan email',
                    'is_unique' => 'Email sudah terdaftar',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus di isi',
                ]
            ],
            'umur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus di isi',
                ]
            ]
        ];
        return $rules;
    }

    public function save()
    {
        // save pengguna
        $penggunarules = $this->penggunarules();
        if ($this->penggunaMod->getUser($this->ipAddress) == []) {
            if ($this->validate($penggunarules)) {
                $this->penggunaMod->save([
                    'ip' => $this->ipAddress,
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'nama' => $this->request->getVar('nama'),
                    'jk' => $this->request->getVar('jk'),
                    'umur' => $this->request->getVar('umur'),
                ]);
            } else {
                session()->setFlashdata('error', 'Isi biodata dengan lengkap!');
                return redirect()->to('/diagnosa')->withInput();
            }
        }

        $selectGejala = $this->request->getVar('id_gejala');
        if ($selectGejala) {
            $jmldata = count($selectGejala);
        }

        // $idIP = $this->hasilMod->getId($this->ipAddress);
        if (!$selectGejala || $jmldata < 2) {
            session()->setFlashdata('error', 'Gagal proses diagnosa, anda harus memilih minimal 2 gejala!');
            return redirect()->to('/diagnosa')->withInput();
        }

        $dataAllBasis = $this->basisMod->getBasisAll();

        foreach ($selectGejala as $jgl) {
            $diagnosa[] = [
                'id_gejala' => $jgl,
            ];
        }

        foreach ($dataAllBasis as $da) :
            foreach ($diagnosa as $dgt) :
                if ($da['id_gejala'] === $dgt['id_gejala']) {
                    $cekPenyakit[] = [
                        'id_penyakit' => $da['id_penyakit']
                    ];
                }
            endforeach;
        endforeach;

        function groupby($cekPenyakit, $key)
        {
            foreach ($cekPenyakit as $val) {
                $return[$val[$key]][] = $val;
            }
            return $return;
        }

        $hasilcek = groupby($cekPenyakit, 'id_penyakit');
        $pb = count($hasilcek);
        $pn = 1 / 3;
        $allpenyakit = $this->penyakitMod->getAllPenyakit();

        // probabilitas gejala
        foreach ($hasilcek as $hc) :
            if ($hc[0]['id_penyakit']) {
                foreach ($allpenyakit as $alp) :
                    foreach ($diagnosa as $dg) :
                        $same = $this->basisMod->getBasisSame($alp['id_penyakit'], $dg['id_gejala']);
                        if ($same) {
                            $nc = 1;
                            $bobot = $nc / $pb;
                            $probaG[$alp['id_penyakit']][$dg['id_gejala']] = $bobot;
                        } else {
                            $nc = 0;
                            $bobot = $nc / $pb;
                            $probaG[$alp['id_penyakit']][$dg['id_gejala']] = $bobot;
                        }
                    endforeach;
                endforeach;
            }
        endforeach;

        // probabilitas penyakit
        foreach ($probaG as $prg => $idG) :
            foreach ($idG as $cgej => $value) :
                if ($prg === $prg) {
                    $totalpp[] = [
                        'id_penyakit' => $prg,
                        'id_gejala' => $cgej,
                        'nilaiAtas' => $value * $pn,
                    ];
                }
                if ($cgej === $cgej) {
                    $totalgg[] = [
                        'id_penyakit' => $prg,
                        'id_gejala' => $cgej,
                        'nilai' => $value * $pn
                    ];
                }
            endforeach;
        endforeach;

        $totalbawah = array_reduce($totalgg, function ($carry, $item) {
            if (!isset($carry[$item['id_gejala']])) {
                $carry[$item['id_gejala']] = ['id_gejala' => $item['id_gejala'], 'nilai' => $item['nilai']];
            } else {
                $carry[$item['id_gejala']]['nilai'] += $item['nilai'];
            }
            return $carry;
        });

        foreach ($totalpp as $tpp) :
            foreach ($totalbawah as $ttw) :
                if ($tpp['id_gejala'] === $ttw['id_gejala']) {
                    $result[$tpp['id_penyakit']][] = $tpp['nilaiAtas'] / $ttw['nilai'];
                }
            endforeach;
        endforeach;

        // hitung total probabilitas
        foreach ($result as $kodp => $subnilai) :
            $subtotal[] = [
                'id_penyakit' => $kodp,
                'nilai' => array_sum($subnilai)
            ];
            $totalp[] = array_sum($subnilai);
        endforeach;

        $total = array_sum($totalp);

        // hitung persentase penyakit
        foreach ($subtotal as $st) {
            $nilai = ($st['nilai'] / $total) * 100;
            if ($nilai > 0) {
                $arpenyakit[$st['id_penyakit']] = substr($nilai, 0, 5);
            }
        }

        arsort($arpenyakit);
        $inppenyakit = serialize($arpenyakit);


        foreach ($arpenyakit as $key1 => $value1) {
            $idpenyakithasil[] = $key1;
            $nilaihasil[] = $value1;
        }

        foreach ($selectGejala as $jgl) {
            $serGej[] = $jgl;
        }

        $inpGej = serialize($serGej);

        $param = [
            // 'id_hasil' => $idIP,
            'ip' => $this->ipAddress,
            'penyakit' => $inppenyakit,
            'gejala' => $inpGej,
            'id_penyakit' => $idpenyakithasil[0],
            'nilai' => $nilaihasil[0]
        ];

        $this->hasilMod->save($param);

        $id_hasil = $this->hasilMod->getIdfirst($this->ipAddress);

        return redirect()->to('/diagnosa/' . $id_hasil['id_hasil']);
    }

    public function autogejala()
    {
        $dataallG = $this->basisMod->basisGejala();

        echo json_encode($dataallG);
    }

    public function hasil($idip)
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
            'title' => 'SP Bayes | Hasil Diagnosa',
            'hasilD' => $dataGejala,
            'hasilP' => $this->hasilMod->getHasil($idip),
            'pLain' => $dataPenyakit,
            'maxN' => $dataPenyakit[0]['id_penyakit']
        ];
        return view('diagnosa/hasil', $data);
    }
}
