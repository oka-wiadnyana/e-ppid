<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\LinkModel;
use App\Models\VideoModelDt;
use App\Models\UservideoModel;
use App\Models\ProfilPpidModel;
use App\Models\PermohonanModel;
use App\Models\UserauthModel;
use Config\Services;
use CodeIgniter\I18n;
use CodeIgniter\I18n\Time;

class Userpage extends BaseController
{
    // protected $profil;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->email = Services::email();
        $time = new Time();
        $this->time = $time->setTimezone('Asia/Manila');
        $this->userModel = new UserauthModel();
        $this->linkModel = new LinkModel();
        $this->profileModel = new ProfileModel();
        $this->videoModel = new VideoModelDt();
        $this->uservideoModel = new UservideoModel();
        $this->profilPpidModel = new ProfilPpidModel();
        $this->permohonanModel = new PermohonanModel();


        session()->remove(['profil_nama', 'profil_nama_pendek', 'profil_alamat', 'profil_nomor_telepon', 'profil_nomor_fax', 'profil_email', 'profil_link_satker', 'profil_link_youtube', 'profil_link_facebook', 'profil_link_instagram', 'profil_link_twitter', 'profil_link_video_dasboard', 'profil_logo']);

        $this->profil = $this->profileModel->findAll();

        if ($this->profil != null) {

            $alamatBreak = explode(',', $this->profil[0]['alamat']);
            $alamatBreak = implode(',<br>', $alamatBreak);

            $sessionProfil = [
                'profil_nama' => $this->profil[0]['nama'],
                'profil_nama_pendek' => $this->profil[0]['nama_pendek'],
                'profil_alamat' => $this->profil[0]['alamat'],
                'profil_nomor_telepon' => $this->profil[0]['nomor_telepon'],
                'profil_nomor_fax' => $this->profil[0]['nomor_fax'],
                'profil_email' => $this->profil[0]['email'],
                'profil_link_satker' => $this->profil[0]['link_satker'],
                'profil_link_youtube' => $this->profil[0]['link_youtube'],
                'profil_link_facebook' => $this->profil[0]['link_facebook'],
                'profil_link_instagram' => $this->profil[0]['link_instagram'],
                'profil_link_twitter' => $this->profil[0]['link_twitter'],
                'profil_link_video_dashboard' => $this->profil[0]['link_video_dashboard'],
                'profil_logo' => $this->profil[0]['logo'],
                'profil_alamat_break' => $alamatBreak
            ];
        } else {
            $sessionProfil = [
                'profil_nama' => 'Belum diset',
                'profil_nama_pendek' => 'Belum diset',
                'profil_alamat' => 'Belum diset',
                'profil_nomor_telepon' => 'Belum diset',
                'profil_nomor_fax' => 'Belum diset',
                'profil_email' => 'Belum diset',
                'profil_link_satker' => 'Belum diset',
                'profil_link_youtube' => 'Belum diset',
                'profil_link_facebook' => 'Belum diset',
                'profil_link_instagram' => 'Belum diset',
                'profil_link_twitter' => 'Belum diset',
                'profil_link_video_dashboard' => 'Belum diset',
                'profil_logo' => 'Belum diset',
                'profil_alamat_break' => 'Belum diset'
            ];
        }
        session()->set($sessionProfil);
    }

    public function index()
    {
        // $profil = $this->profileModel->findAll();
        // // dd($profil[0]);
        // $data = ['profil' => $profil];
        return view('user/index');
    }

    public function listInformasi($jenis)
    {
        if ($jenis == 'berkala') {
            $id_jenis = 'A';
        } elseif ($jenis == 'serta_merta') {
            $id_jenis = 'B';
        } else {
            $id_jenis = 'C';
        }

        $daftarInformasi = $this->linkModel->where('level1', $id_jenis)->get()->getResultArray();
        $data = [
            'jenis' => $jenis,
            'listLink' => $daftarInformasi
        ];

        return view('user/v_informasi', $data);
    }

    public function videoInformasi()
    {

        $tombolCari = $this->request->getVar('submit-cari');

        if (isset($tombolCari)) {

            $keyword = $this->request->getVar('cari-data');
            session()->set('tombol-cari', true);
            session()->set('keyword', $keyword);
        }
        $noHalaman = $this->request->getVar('page_cust_pagination') ?: 1;

        if (session()->get('tombol-cari') == true) {
            $keyword_cari = session()->get('keyword');
            // $data_perkara = $this->perdataModel->cari_kategori($keyword_cari);

            if ($keyword_cari != "") {

                $data = [
                    'title' => 'Daftar perkara perdata',
                    'listVideo' => $this->uservideoModel->cari_video($keyword_cari)->paginate(9, 'cust_pagination'),
                    'pager' => $this->uservideoModel->cari_video($keyword_cari)->pager,
                    'noHalaman' => $noHalaman,

                ];
            } else {

                $data = [
                    'title' => 'Daftar perkara perdata',
                    'listVideo' => $this->uservideoModel->tampil_video()->paginate(9, 'cust_pagination'),
                    'pager' => $this->uservideoModel->tampil_video()->pager,
                    'noHalaman' => $noHalaman,

                ];
            }
        } else {

            $data = [
                'title' => 'Daftar perkara perdata',
                'listVideo' => $this->uservideoModel->tampil_video()->paginate(9, 'cust_pagination'),
                'pager' => $this->uservideoModel->tampil_video()->pager,
                'noHalaman' => $noHalaman,
            ];
        }

        return view('user/v_video_informasi', $data);

        // $daftarVideoInformasi = $this->uservideoModel->findAll();
        // $data = [
        //     'listVideo' => $daftarVideoInformasi
        // ];

        // return view('user/v_video_informasi', $data);
    }

    public function profil_ppid($jenisProfil)
    {
        $dataProfil = $this->profilPpidModel->first();
        if ($dataProfil != null) {
            $data = [
                'title' => 'Profil PPID',
                'dataProfil' => $dataProfil,
                'jenisProfil' => $jenisProfil
            ];
        } else {
            $data = [
                'title' => 'Profil PPID',
                'dataProfil' => false
            ];
        }

        return view('user/v_profil_ppid', $data);
    }

    public function v_permohonan()
    {
        $data = [
            'title' => 'Daftar Permohonan'
        ];

        return view('user/v_permohonan_informasi', $data);
    }

    public function data_permohonan_datatable()
    {
        $request = Services::request();
        $datamodel = new PermohonanModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nomor_register;
                $row[] = $list->jenis_informasi;
                $row[] = $list->tanggal_permohonan;
                $row[] = $list->isi_permohonan;
                $row[] = "<a href=" . base_url('userpage/download_file_permohonan/' . $list->file_permohonan) . " target= '_blank'>" . $list->file_permohonan . "</a>";
                if ($list->status == "Proses verifikasi") {

                    $row[] = "<span class='badge bg-warning'>$list->status</span>";
                } else if ($list->status == "Sudah ditindaklanjuti") {
                    $row[] = "<span class='badge bg-success'>$list->status</span>";
                }
                $row[] = $list->jawaban;
                $row[] = "<a href='' class='btn btn-warning edit_btn' data-id=" . $list->permohonan_id . " style='border-radius:50%'><i class='bx bx-edit-alt'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " style='border-radius:50%'><i class='bx bx-trash'></i></a>";
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function v_tambah_permohonan()
    {
        $db = db_connect();
        $builder = $db->table('jenis_informasi');
        $data_jenis = $builder->get()->getResultArray();

        $data = [
            'jenis_informasi' => $data_jenis
        ];
        return view('user/form_permohonan', $data);
    }



    public function insert_permohonan()
    {
        $jenis_informasi = $this->request->getVar('jenis_informasi');
        $isi_permohonan = $this->request->getVar('isi_permohonan');
        $file_permohonan = $this->request->getFile('file_permohonan');
        $tanggal_permohonan = $this->time->toDateString();
        $nomor_register = $this->permohonanModel->max_nomor_register($tanggal_permohonan);
        $user_email = $this->request->getVar('user_email');

        // dd($tanggal_permohonan);

        if (!$this->validate([
            'jenis_informasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis permohonan harus diisi'
                ]
            ],
            'isi_permohonan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi permohonan harus diisi'
                ]
            ],
            'file_permohonan' => [
                'rules' => 'ext_in[file_permohonan,pdf]',
                'errors' => [
                    'ext_in' => 'File permohonan salah'
                ]
            ]
        ])) {
            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to(base_url('userpage/v_permohonan'));
        }


        if ($file_permohonan->isValid()) {
            $nama_file = "file-permohonan-" . time();
            $ext = $file_permohonan->getClientExtension();
            $nama_file = $nama_file . '.' . $ext;
            $file_permohonan->move('user_file', $nama_file);

            $data_insert = [
                'id_jenis_informasi' => $jenis_informasi,
                'nomor_register' => $nomor_register,
                'tanggal_permohonan' => $tanggal_permohonan,
                'isi_permohonan' => $isi_permohonan,
                'file_permohonan' => $nama_file,
                'email' => $user_email
            ];
        } else {
            $data_insert = [
                'id_jenis_informasi' => $jenis_informasi,
                'nomor_register' => $nomor_register,
                'tanggal_permohonan' => $tanggal_permohonan,
                'isi_permohonan' => $isi_permohonan,
                'email' => $user_email

            ];
        }

        if ($this->permohonanModel->insert($data_insert)) {
            // $email_user = $this->userModel->where('email', session()->get('user_email'))->first()['email'];
            $email_user = 'okawinza@gmail.com';
            try {
                $this->email->setFrom('app.onsdee86@gmail.com', 'E-PPID');
                $this->email->setTo('onsdee86@gmail.com');
                $this->email->setCC($email_user);
                // $this->email->setBCC('them@their-example.com');

                $this->email->setSubject('Upload permohonan informasi oleh ');
                $this->email->setMessage('Tes EPPID');
                $this->email->send();
                $status_email = 'Email berhasil dikirim';
            } catch (\Exception $e) {
                $status_email = 'Email gagal dikirim';
            }
            session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
            return redirect()->to(base_url('userpage/v_permohonan'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diinput');
        }
    }

    public function download_file_permohonan($file)
    {
        $client = Services::curlrequest();
        $user_file = $client->send('GET', base_url('user_file/' . $file));

        return $user_file;
    }

    public function modal_edit()
    {
        // $data_permohonan = $this->permohonanModel->find_data(4);
        // dd($data_permohonan);
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $builder = $db->table('jenis_informasi');
            $data_jenis = $builder->get()->getResultArray();
            $id = $this->request->getVar('id');
            $data_permohonan = $this->permohonanModel->find_data($id);
            $data = [
                'jenis_informasi' => $data_permohonan['jenis_informasi'],
                'tanggal_permohonan' => $data_permohonan['tanggal_permohonan'],
                'isi_permohonan' => $data_permohonan['isi_permohonan'],
                'file_permohonan' => $data_permohonan['file_permohonan'],
                'id' => $id,
                'list_jenis_informasi' => $data_jenis
            ];

            echo json_encode([view('user/modal/modal_edit', $data)]);
        } else {
            echo 'Forbidden';
        }
    }


    public function edit_permohonan()
    {
        $jenis_informasi = $this->request->getVar('jenis_informasi');
        $isi_permohonan = $this->request->getVar('isi_permohonan');
        $file_permohonan = $this->request->getFile('file_permohonan');
        $file_lama = $this->request->getVar('file_lama');
        $id = $this->request->getVar('id');
        // $user_email = $this->request->getVar('user_email');


        // dd($jenis_permohonan, $isi_permohonan, $lampiran_file);
        if (!$this->validate([
            'jenis_informasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis permohonan harus diisi'
                ]
            ],
            'isi_permohonan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi permohonan harus diisi'
                ]
            ],
            'file_permohonan' => [
                'rules' => 'ext_in[file_permohonan,pdf]',
                'errors' => [
                    'ext_in' => 'File permohonan salah'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('userpage/v_permohonan'));
        }

        if ($file_permohonan->isValid()) {
            $nama_file = "file-permohonan-" . time();
            $ext = $file_permohonan->getClientExtension();
            $nama_file = $nama_file . '.' . $ext;
            $file_permohonan->move('user_file', $nama_file);
            if (!empty($file_lama)) {

                unlink(ROOTPATH . 'public/user_file/' . $file_lama);
            }

            $data_update = [
                'id_jenis_informasi' => $jenis_informasi,
                'tanggal_permohonan' => $this->time->now()->toDateString(),
                'isi_permohonan' => $isi_permohonan,
                'file_permohonan' => $nama_file,
                // 'email' => $user_email
            ];
        } else {
            $data_update = [
                'id_jenis_informasi' => $jenis_informasi,
                'tanggal_permohonan' => $this->time->now()->toDateString(),
                'isi_permohonan' => $isi_permohonan,
                'file_permohonan' => $file_lama,
                // 'email' => $user_email

            ];
        }

        if ($this->permohonanModel->update($id, $data_update)) {
            // $email_user = $this->userModel->where('email', session()->get('user_email'))->first()['email'];
            $email_user = 'okawinza@gmail.com';
            try {
                $this->email->setFrom('app.onsdee86@gmail.com', 'E-PPID');
                $this->email->setTo('onsdee86@gmail.com');
                $this->email->setCC($email_user);
                // $this->email->setBCC('them@their-example.com');

                $this->email->setSubject('Upload permohonan informasi oleh ');
                $this->email->setMessage('Update EPPID');
                $this->email->send();
                $status_email = 'Email berhasil dikirim';
            } catch (\Exception $e) {
                $status_email = 'Email gagal dikirim';
            }
            session()->setFlashdata('success', 'Data berhasil diubah, ' . $status_email);
            return redirect()->to(base_url('userpage/v_permohonan'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diinput');
        }
    }

    public function delete_permohonan()
    {
        $id = $this->request->getVar('id');

        if ($this->permohonanModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
        }
        echo json_encode(['redirect' => true]);
    }
}
