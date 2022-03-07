<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\AdminauthModel;

class Adminauth extends BaseController
{
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->adminauthModel = new AdminauthModel();
    }


    public function index()
    {
        return view('admin/auth/login');
    }

    public function register()
    {
        return view('user/auth/register');
    }

    public function attempt_register()
    {
        $data = $this->request->getVar();
        $foto_profil = $this->request->getFile('foto_profil');


        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP harus diisi'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi',

                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[admin_auth.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah ada'
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

            'foto_profil' => [
                'rules' => 'ext_in[foto_profil,png,jpg,jpeg]',
                'errors' => [
                    'ext_in' => 'Jenis file salah',
                ]
            ],
        ])) {
            // dd($this->validation->getErrors());
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/tambah_admin')->withInput();
        }

        $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password']);
        unset($data['password2']);

        if (!$foto_profil->getError() == 4) {
            $nama_foto_profil = "Admin-" . time() . "." . $foto_profil->getClientExtension();
            $foto_profil->move('admin/img_profile', $nama_foto_profil);
            $data_insert = array_merge($data, ['password' => $password_hash, 'foto_profil' => $nama_foto_profil]);
        } else {
            $data_insert = array_merge($data, ['password' => $password_hash]);
        }

        if ($this->adminauthModel->insert($data_insert)) {
            session()->setFlashdata('success', 'Registrasi admin berhasil');
            return redirect()->to('admineppid/v_admin');
        } else {
            session()->setFlashdata('fail', ['Registrasi user gagal']);
            return redirect()->to('admineppid/v_admin');
        }
    }

    public function edit_admin()
    {
        $data = $this->request->getVar();
        $foto_profil = $this->request->getFile('foto_profil');


        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP harus diisi'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi',

                ]
            ],

            'foto_profil' => [
                'rules' => 'ext_in[foto_profil,png,jpg,jpeg]',
                'errors' => [
                    'ext_in' => 'Jenis file salah',
                ]
            ],
        ])) {
            // dd($this->validation->getErrors());
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/v_admin')->withInput();
        }


        $nama_foto_profil = "";
        if (!$foto_profil->getError() == 4) {
            unlink(ROOTPATH . 'public/admin/img_profile/' . $data['foto_lama']);
            $nama_foto_profil = "Admin-" . time() . "." . $foto_profil->getClientExtension();
            $foto_profil->move(ROOTPATH . 'public/admin/img_profile', $nama_foto_profil);
        } else {
            $nama_foto_profil = $data['foto_lama'];
        }

        $data_insert = array_merge($data, ['foto_profil' => $nama_foto_profil]);

        if ($this->adminauthModel->update($data['id'], $data_insert)) {
            session()->setFlashdata('success', 'Edit admin berhasil');
            return redirect()->to('admineppid/v_admin');
        } else {
            session()->setFlashdata('fail', ['Edit user gagal']);
            return redirect()->to('admineppid/v_admin');
        }
    }

    public function delete_admin()
    {
        $id = $this->request->getVar('id');
        $foto = $this->request->getVar('foto');
        if ($foto != 'no-profil.jpg') {
            unlink(ROOTPATH . 'public/admin/img_profile/' . $foto);
        }
        if ($this->adminauthModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJson(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['Data berhasil dihapus']);
            return $this->response->setJson(['msg' => 'fail']);
        }
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
            return redirect()->to('adminauth');
        }
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');

        $db = db_connect();

        $find_email = $db->table('admin_auth')->where('email', $email)->get()->getResultArray();

        if (count($find_email) === 1) {
            if (password_verify($password, $find_email[0]['password'])) {
                session()->set('admin_login', true);
                session()->set('admin_nama', $find_email[0]['nama']);
                session()->set('admin_jabatan', $find_email[0]['jabatan']);
                session()->set('admin_foto', $find_email[0]['foto_profil']);
                return redirect()->to('admineppid');
            } else {
                session()->setFlashdata('gagal', 'Password salah');
                return redirect()->to('adminauth');
            }
        } else {
            session()->setFlashdata('gagal', 'Email tidak ditemukan');
            return redirect()->to('adminauth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('adminauth');
    }
}
