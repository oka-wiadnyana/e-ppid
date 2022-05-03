<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\UserauthModel;

class Aduauth extends BaseController
{
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->userAuthModel = new UserauthModel();
    }


    public function index()
    {
        if (session()->get('user_pengaduan_login') == true) {
            return redirect()->to(base_url('pengaduan'));
        }
        return view('adu/auth/login');
    }

    public function register()
    {


        return view('adu/auth/register');
    }

    public function attempt_register($admin = null)
    {
        // $nama = $this->request->getVar('nama');
        // dd($nama);

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],

            'email' => [
                'rules' => 'required|is_unique[user_pengaduan.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'nomor_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi'
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
            'ktp' => [
                'rules' => 'uploaded[ktp]|ext_in[ktp,pdf,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'KTP harus diisi',
                    'ext_in' => 'Jenis file ktp salah'
                ]
            ],
        ])) {
            // dd($this->validation->getErrors());

            session()->setFlashdata('fail', $this->validation->getErrors());
            if ($admin != null) {
                return redirect()->to('adminpengaduan/tambah_user');
            } else {
                return redirect()->to('aduauth/register');
            }
        }
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $email = $this->request->getVar('email');
        $nomor_hp = $this->request->getVar('nomor_hp');
        $password = $this->request->getVar('password');
        $ktp = $this->request->getFile('ktp');

        $nama_ktp = 'ktp-' . time() . '.' . $ktp->getClientExtension();
        $ktp->move('ktp', $nama_ktp);

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'nomor_hp' => $nomor_hp,
            'password' => $password_hash,
            'ktp' => $nama_ktp,
        ];

        $db = db_connect();
        if ($db->table('user_pengaduan')->insert($data)) {
            session()->setFlashdata('success', 'Registrasi user berhasil');
            if ($admin != null) {
                return redirect()->to('adminpengaduan/v_user');
            } else {
                return redirect()->to('aduauth');
            }
        } else {

            session()->setFlashdata('fail', ['Registrasi user gagal']);
            if ($admin != null) {
                return redirect()->to('adminpengaduan/tambah_user');
            } else {
                return redirect()->to('aduauth/register');
            }
        }
    }

    public function edit_user()
    {
        $data = $this->request->getVar();
        $ktp = $this->request->getFile('ktp');

        if (!$this->validate([

            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nomor_hp' => [
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
            'ktp' => [
                'rules' => 'ext_in[ktp,pdf,jpg,jpeg,png]',
                'errors' => [
                    'ext_in' => 'Jenis file salah'
                ]
            ]
        ])) {
            // dd($this->validation->getErrors());

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('adminpengaduan/v_user')->withInput();
        }

        if ($ktp->isValid()) {
            $nama_ktp = 'ktp-' . time() . '.' . $ktp->getClientExtension();
            $ktp->move('ktp', $nama_ktp);
        } else {
            $nama_ktp = $this->request->getVar('ktp_lama');
        }

        $data_update = [

            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            // 'email' => $data['email'],
            'nomor_hp' => $data['nomor_hp'],
            'ktp' => $nama_ktp
        ];
        $db = db_connect();

        if ($db->table('user_pengaduan')->where('id', $data['id'])->update($data_update)) {
            session()->setFlashdata('success', 'Edit user berhasil');
            return redirect()->to('adminpengaduan/v_user');
        } else {
            session()->setFlashdata('fail', ['Edit user gagal']);
            return redirect()->to('adminpengaduan/v_user');
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
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('aduauth')->withInput();
        }
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');

        $db = db_connect();

        $find_email = $db->table('user_pengaduan')->where('email', $email)->get()->getResultArray();

        if (count($find_email) === 1) {
            if (password_verify($password, $find_email[0]['password'])) {
                session()->set('user_pengaduan_login', true);
                session()->set('user_pengaduan_email', $email);
                session()->set('nama_pengaduan', $find_email[0]['nama']);
                session()->set('user_id', $find_email[0]['id']);
                return redirect()->to('pengaduan');
            } else {
                session()->setFlashdata('fail', ['Password salah']);
                return redirect()->to('aduauth');
            }
        } else {
            session()->setFlashdata('fail', ['Email tidak ditemukan']);
            return redirect()->to('aduauth');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('pengaduan');
    }
}
