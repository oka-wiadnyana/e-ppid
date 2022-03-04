<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\UserauthModel;

class Userauth extends BaseController
{
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->userAuthModel = new UserauthModel();
    }


    public function index()
    {
        return view('user/auth/login');
    }

    public function register()
    {


        return view('user/auth/register');
    }

    public function attempt_register($admin = null)
    {
        $data = $this->request->getVar();

        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user_profil.email]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi password tidak sama'
                ]
            ],
        ])) {
            // dd($this->validation->getErrors());

            if ($admin == 'admin') {
                session()->setFlashdata('fail', $this->validation->getErrors());
                return redirect()->to('admineppid/tambah_user')->withInput();
            } else {
                session()->setFlashdata('validasi', $this->validation->getErrors());
                return redirect()->to('userauth/register')->withInput();
            }
        }

        $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password']);
        unset($data['password2']);
        $data_insert = array_merge($data, ['password' => $password_hash]);

        if ($this->userAuthModel->insert($data_insert)) {
            if ($admin == 'admin') {
                session()->setFlashdata('success', 'Registrasi user berhasil');
                return redirect()->to('admineppid/v_user');
            } else {
                session()->setFlashdata('success', 'Registrasi user berhasil');
                return redirect()->to('userauth');
            }
        } else {
            if ($admin == 'admin') {
                session()->setFlashdata('fail', ['Registrasi user gagal']);
                return redirect()->to('admineppid/tambah_user');
            } else {
                session()->setFlashdata('gagal', 'Registrasi user gagal');
                return redirect()->to('userauth/register');
            }
        }
    }

    public function edit_user()
    {
        $data = $this->request->getVar();

        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan harus diisi'
                ]
            ]
        ])) {
            // dd($this->validation->getErrors());

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/v_user')->withInput();
        }


        if ($this->userAuthModel->update($data['id'], $data)) {
            session()->setFlashdata('success', 'Edit user berhasil');
            return redirect()->to('admineppid/v_user');
        } else {
            session()->setFlashdata('fail', ['Edit user gagal']);
            return redirect()->to('admineppid/v_user');
        }
    }

    public function delete_user()
    {
        $id = $this->request->getVar('id');

        $this->userAuthModel->delete($id);
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function attempt_login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]

            ]
        ])) {
            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to('userauth')->withInput();
        }
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');


        $find_email = $this->userAuthModel->where('email', $email)->find();

        if (count($find_email) === 1) {
            if (password_verify($password, $find_email[0]['password'])) {
                session()->set('user_login', true);
                session()->set('user_email', $email);
                return redirect()->to('userpage/v_permohonan');
            } else {
                session()->setFlashdata('gagal', 'Password salah');
                return redirect()->to('userauth');
            }
        } else {
            session()->setFlashdata('gagal', 'Email tidak ditemukan');
            return redirect()->to('userauth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('userpage');
    }
}
