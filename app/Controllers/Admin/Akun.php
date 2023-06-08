<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\User2Model;

class Akun extends BaseController
{

    protected $akunModel;
    protected $delMod;

    public function __construct()
    {
        $this->akunModel = new UserModel();
        $this->delMod = new User2Model();
    }

    public function index()
    {
        $data = [
            'title' => 'SP Bayes | Admin List Akun',
            'users' => $this->akunModel->getUser(),
        ];
        return view('admin/akun/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'SP Bayes | Admin Tambah Akun',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/akun/create', $data);
    }

    public function delete($id)
    {
        $users = $this->delMod->find($id);

        // cek jika file gambarnya default
        if ($users['foto'] != 'defaultUser.jpg') {
            // hapus gambar
            unlink('assets/img/' . $users['foto']);
        }

        $this->delMod->delete($id);
        session()->setFlashdata('success', 'Akun berhasil dihapus!');

        return redirect()->to('/admin/akun');
    }

    public function changeActive($id)
    {
        $this->akunModel->save([
            'id' => $id,
            'active' => $this->request->getVar('active'),
        ]);

        if ($this->request->getVar('active') == 1) {
            session()->setFlashdata('success', 'Berhasil aktifkan akun!');
        } else {
            session()->setFlashdata('success', 'Berhasil nonaktifkan akun!');
        }

        return redirect()->to('/admin/akun');
    }
}
