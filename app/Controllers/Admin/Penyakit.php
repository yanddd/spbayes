<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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
            'title' => 'SP Bayes | Admin List Penyakit',
            'stres' => $this->penyakitMod->getPenyakit('P01'),
            'depresi' => $this->penyakitMod->getPenyakit('P02'),
            'cemas' => $this->penyakitMod->getPenyakit('P03'),
        ];
        return view('admin/penyakit/index', $data);
    }

    public function edit($id)
    {
        $penyakit = $this->penyakitMod->getPenyakit($id);
        $data = [
            'title' => 'SP Bayes | Admin Edit ' . $penyakit['nama_penyakit'],
            'datapenyakit' => $penyakit,
            'validation' => \Config\Services::validation(),
            // 'to_url' => route_to("acara.update"),
        ];
        return view('admin/penyakit/edit', $data);
    }

    public function autodata()
    {
        $data = $_POST['data'];
        $dataP = $this->penyakitMod->getPenyakit($data);

        echo json_encode($dataP);
    }

    public function allgejala()
    {
        $data = $_POST['data'];
        return json_encode($this->basisMod->getBasisG($data));
    }

    public function rules()
    {
        $rules = [
            'nama_penyakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus di isi',
                ]
            ],
            'desk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus di isi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,5000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ];
        return $rules;
    }

    public function update($id)
    {
        $rules = $this->rules();
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah!');
            return redirect()->to('/admin/penyakit/' . $id)->withInput();
        } else {
            $fileFoto = $this->request->getFile('foto');

            if ($fileFoto->getError() == 4) {
                $namaFoto = $this->request->getVar('fotoLama');
            } else {
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('assets/img', $namaFoto);
                if ($this->request->getVar('fotoLama') != 'default1.png') {
                    unlink('assets/img/' . $this->request->getVar('fotoLama'));
                }
            }

            $params = [
                'id_penyakit' => $id,
                'nama_penyakit' => $this->request->getVar('nama_penyakit'),
                'desk' => $this->request->getVar('desk'),
                'saran' => $this->request->getVar('saran'),
                'foto' => $namaFoto,
            ];

            $penyakit = $this->penyakitMod->find($id);

            if ($this->request->getVar('nama_penyakit') !== $penyakit['nama_penyakit']) {
                $this->penyakitMod->save($params);
                session()->setFlashdata('success', 'Data berhasil diubah!');
                return redirect()->to('/admin/penyakit');
            } elseif ($this->request->getVar('desk') !== $penyakit['desk']) {
                $this->penyakitMod->save($params);
                session()->setFlashdata('success', 'Data berhasil diubah!');
                return redirect()->to('/admin/penyakit');
            } elseif ($this->request->getVar('saran') !== $penyakit['saran']) {
                $this->penyakitMod->save($params);
                session()->setFlashdata('success', 'Data berhasil diubah!');
                return redirect()->to('/admin/penyakit');
            } elseif ($namaFoto !== $penyakit['foto']) {
                $this->penyakitMod->save($params);
                session()->setFlashdata('success', 'Data berhasil diubah!');
                return redirect()->to('/admin/penyakit');
            } else {
                session()->setFlashdata('empty', 'Tidak ada data yang diubah!');
                return redirect()->to('/admin/penyakit');
            }
        }
    }
}
