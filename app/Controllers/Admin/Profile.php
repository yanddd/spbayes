<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Password;

class Profile extends BaseController
{

    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'SP Bayes | Admin Profile',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/profile/index', $data);
    }

    public function updaterules()
    {
        if (user()->username == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }
        if (user()->email == $this->request->getVar('email')) {

            $rule_email = 'required';
        } else {

            $rule_email = 'required|is_unique[users.email]';
        }

        $rules = [
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username harus di isi',
                    'is_unique' => 'Username telah digunakan'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email harus di isi',
                    'is_unique' => 'Email telah terdaftar'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama depan harus di isi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ];

        return $rules;
    }

    public function update()
    {
        $user = user();
        $rules = $this->updaterules();
        if ($this->validate($rules)) {
            $fileFoto = $this->request->getFile('foto');

            if ($fileFoto->getError() == 4) {
                $namaFoto = $this->request->getPost('fotoLama');
            } else {
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('assets/img', $namaFoto);
                if ($this->request->getPost('fotoLama') != 'defaultUser.jpg') {
                    unlink('assets/img/' . $this->request->getPost('fotoLama'));
                }
            }

            $params = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'fullname' => $this->request->getPost('fullname'),
                'foto' => $namaFoto
            ];

            $same = $this->request->getPost('username') !== user()->username;
            $same1 = $this->request->getPost('email') !== user()->email;
            $same2 = $this->request->getPost('fullname') !== user()->fullname;
            $same3 = $namaFoto !== user()->foto;

            $user->fill($params);

            if ($same) {
                session()->setFlashdata('success', 'Data profile berhasil diubah!');
                $this->akunModel->save($user);
                return redirect()->to('/admin/profile');
            } elseif ($same1) {
                session()->setFlashdata('success', 'Data profile berhasil diubah!');
                $this->akunModel->save($user);
                return redirect()->to('/admin/profile');
            } elseif ($same2) {
                session()->setFlashdata('success', 'Data profile berhasil diubah!');
                $this->akunModel->save($user);
                return redirect()->to('/admin/profile');
            } elseif ($same3) {
                session()->setFlashdata('success', 'Data profile berhasil diubah!');
                $this->akunModel->save($user);
                return redirect()->to('/admin/profile');
            } else {
                session()->setFlashdata('empty', 'Tidak ada data yang diubah!');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Data profile gagal diubah!');
            return redirect()->to('/admin/profile')->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    private function getChangePasswordRules()
    {
        $rules = [
            'current_pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password sekarang harus di isi',
                ]
            ],
            'new_pass' => [
                'rules' => 'required|strong_password',
                'errors' => [
                    'required' => 'Password baru harus di isi',
                    'strong_password' => 'Password terlalu lemah',
                ]
            ],
            'repeat_pass' => [
                'rules'  => 'required|matches[new_pass]',
                'errors' => [
                    'required' => 'Repeat Password baru harus di isi',
                    'matches'  => 'Repeat Password tidak sama!'
                ]
            ],

        ];

        return $rules;
    }

    public function changePassword()
    {
        $user = user();

        $currentPass = $this->request->getPost('current_pass');
        $newPass = $this->request->getPost('new_pass');

        $rules = $this->getChangePasswordRules();

        if ($this->validate($rules)) {

            if (Password::verify($currentPass, $user->password_hash)) {
                $user->password = $newPass;
                $this->akunModel->save($user);
                session()->setFlashdata('success', 'Password profile berhasil diubah!');
                return redirect()->to('/admin/profile');
            } else {
                session()->setFlashdata('isChangePw', true);
                session()->setFlashdata('error', 'Password profile gagal diubah!');
                $this->validator->setError('verify', 'salah!');
            }
        }
        session()->setFlashdata('isChangePw', true);
        session()->setFlashdata('error', 'Password profile gagal diubah!');
        return redirect()->to('/admin/profile')->withInput()->with('errors', $this->validator->getErrors());
    }
}
