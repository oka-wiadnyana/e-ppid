<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\LinkModel;
use App\Models\VideoModelDt;
use App\Models\UservideoModel;
use App\Models\ProfilPpidModel;
use App\Models\PermohonanModel;
use App\Models\KeberatanModel;
use App\Models\StatistikModel;
use App\Models\LaporanModel;
use App\Models\PrasyaratModel;
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
        $this->keberatanModel = new KeberatanModel();
        $this->statistikModel = new StatistikModel();
        $this->laporanModel = new LaporanModel();
        $this->prasyaratModel = new PrasyaratModel();



        session()->remove(['profil_nama', 'profil_nama_pendek', 'profil_alamat', 'profil_nomor_telepon', 'profil_nomor_whatsapp', 'profil_telegram', 'profil_nomor_fax', 'profil_email', 'profil_link_satker', 'profil_link_youtube', 'profil_link_facebook', 'profil_link_instagram', 'profil_link_twitter', 'profil_link_video_dasboard', 'profil_logo', 'link_terkait', 'layanan_elektronik']);

        $this->profil = $this->profileModel->findAll();

        if ($this->profil != null) {

            $alamatBreak = explode(',', $this->profil[0]['alamat']);
            $alamatBreak = implode(',<br>', $alamatBreak);
            $db = db_connect();
            $link_terkait = $db->table('link_terkait')->get()->getResultArray();
            $layanan_elektronik = $db->table('layanan_elektronik')->get()->getResultArray();

            $sessionProfil = [
                'profil_nama' => $this->profil[0]['nama'],
                'profil_nama_pendek' => $this->profil[0]['nama_pendek'],
                'profil_alamat' => $this->profil[0]['alamat'],
                'profil_nomor_telepon' => $this->profil[0]['nomor_telepon'],
                'profil_nomor_whatsapp' => $this->profil[0]['nomor_whatsapp'],
                'profil_telegram' => $this->profil[0]['telegram'],
                'profil_nomor_fax' => $this->profil[0]['nomor_fax'],
                'profil_email' => $this->profil[0]['email'],
                'profil_link_satker' => $this->profil[0]['link_satker'],
                'profil_link_youtube' => $this->profil[0]['link_youtube'],
                'profil_link_facebook' => $this->profil[0]['link_facebook'],
                'profil_link_instagram' => $this->profil[0]['link_instagram'],
                'profil_link_twitter' => $this->profil[0]['link_twitter'],
                'profil_link_video_dashboard' => $this->profil[0]['link_video_dashboard'],
                'profil_logo' => $this->profil[0]['logo'],
                'profil_alamat_break' => $alamatBreak,
                'link_terkait' => $link_terkait,
                'layanan_elektronik' => $layanan_elektronik
            ];
        } else {
            $sessionProfil = [
                'profil_nama' => 'Belum diset',
                'profil_nama_pendek' => 'Belum diset',
                'profil_alamat' => 'Belum diset',
                'profil_nomor_telepon' => 'Belum diset',
                'profil_nomor_whatsapp' => 'Belum diset',
                'profil_telegram' => 'Belum diset',
                'profil_nomor_fax' => 'Belum diset',
                'profil_email' => 'Belum diset',
                'profil_link_satker' => 'Belum diset',
                'profil_link_youtube' => 'Belum diset',
                'profil_link_facebook' => 'Belum diset',
                'profil_link_instagram' => 'Belum diset',
                'profil_link_twitter' => 'Belum diset',
                'profil_link_video_dashboard' => 'Belum diset',
                'profil_logo' => 'Belum diset',
                'profil_alamat_break' => 'Belum diset',
                'layanan_elektronik' => [[
                    'link' => 'Belum diset',
                    'alias' => 'Belum diset'
                ]],
                'link_terkait' => [[
                    'link' => 'Belum diset',
                    'alias' => 'Belum diset'
                ]]
            ];
        }
        session()->set($sessionProfil);

        helper('mailer_helper');
    }

    public function index()
    {

        // $profil = $this->profileModel->findAll();
        // // dd($profil[0]);
        $db = db_connect();
        $total_permohonan = $db->table('permohonan')->countAll();
        $diterima = $db->table('proses_permohonan')->where('proses', 'Y')->countAllResults();
        $ditolak = $db->table('proses_permohonan')->where('proses', 'T')->countAllResults();
        $link_terkait = $db->table('link_terkait')->get()->getResultArray();
        $layanan_elektronik = $db->table('layanan_elektronik')->get()->getResultArray();


        $data = [
            'title' => 'Beranda',
            'total' => $total_permohonan,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'link_terkait' => $link_terkait,
            'layanan_elektronik' => $layanan_elektronik
        ];
        return view('user/index', $data);
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
            'title' => 'Informasi Publik',
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
                    'title' => 'informasi_publik',
                    'listVideo' => $this->uservideoModel->cari_video($keyword_cari)->paginate(9, 'cust_pagination'),
                    'pager' => $this->uservideoModel->cari_video($keyword_cari)->pager,
                    'noHalaman' => $noHalaman,

                ];
            } else {

                $data = [
                    'title' => 'informasi_publik',
                    'listVideo' => $this->uservideoModel->tampil_video()->paginate(9, 'cust_pagination'),
                    'pager' => $this->uservideoModel->tampil_video()->pager,
                    'noHalaman' => $noHalaman,

                ];
            }
        } else {

            $data = [
                'title' => 'informasi_publik',
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
                $past = $this->time->createFromFormat('Y-m-d', $list->tanggal_permohonan, 'Asia/Manila');
                $now = $this->time->parse('-6 days', 'Asia/Manila');

                if ($list->jawaban != null || $now >= $past) {

                    $disabled = 'disabled';
                    $display = '';
                } else {
                    $disabled = '';
                    $display = 'none';
                };

                if ($list->isi_keberatan != null) {
                    $disabled_keberatan = 'disabled';
                } else {
                    $disabled_keberatan = '';
                }

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
                } else if ($list->status == "Pengajuan keberatan") {
                    $row[] = "<span class='badge bg-danger'>$list->status</span>";
                } else if ($list->status == "Permohonan ditolak") {
                    $row[] = "<span class='badge bg-secondary'>$list->status</span>";
                }
                $row[] = $list->jawaban;
                $row[] = "<a href='' class='btn btn-warning edit_btn " . $disabled . "' data-id=" . $list->permohonan_id . " style='border-radius:50%' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Edit'><i class='bx bx-edit-alt'></i></a><a href='' class='btn btn-danger delete_btn  " . $disabled . "' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " style='border-radius:50%' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Hapus'><i class='bx bx-trash'></i></a><a href='' class='btn btn-success keberatan_btn " . $disabled_keberatan . "' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " style='border-radius:50%;display:" . $display . "' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Keberatan'><i class='bx bxs-eject'></i></i></a>";
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
            'title' => 'Daftar Permohonan',
            'jenis_informasi' => $data_jenis
        ];
        return view('user/form_permohonan', $data);
    }



    public function insert_permohonan()
    {

        $jenis_informasi = $this->request->getVar('jenis_informasi');
        $isi_permohonan = $this->request->getVar('isi_permohonan');
        $file_permohonan = $this->request->getFile('file_permohonan');
        $tanggal_permohonan = $this->time->parse('now', 'Asia/Manila')->toDateString();
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
                'rules' => 'ext_in[file_permohonan,pdf,jpg,jpeg,png]',
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
            $data_user = $this->userModel->where('email', session()->get('user_email'))->first();
            $db = db_connect();

            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Upload permohonan informasi oleh {$data_user['nama']}";
            $msg = "{$data_user['nama']} telah mengirimkan permohonan informasi pada tanggal {$tanggal_permohonan} dengan isi permohonan : {$isi_permohonan}";
            $to = $data_user['email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            // $status_email  = lets_mail($subject, $msg, $recipients);


            // session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
            session()->setFlashdata('success', 'Data berhasil diinput, ');
            return redirect()->to(base_url('userpage/v_permohonan'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diinput');
        }
    }

    public function download_file_permohonan($file)
    {
          $client = Services::curlrequest();
        $response = $client->request('GET', base_url('user_file/' . $file));

        return $this->response
            ->setHeader('Content-Type', $response->getHeaderLine('Content-Type'))
            ->setHeader('Content-Disposition', 'attachment; filename="' . $file . '"')
            ->setBody($response->getBody());
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
                'rules' => 'ext_in[file_permohonan,jpeg,jpg,png,pdf]',
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
            $data_user = $this->userModel->where('email', session()->get('user_email'))->first();
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();


            $builder = $db->table('permohonan');
            $data_permohonan = $builder->where('permohonan.id', $id)
                ->get()->getRowArray();

            $subject = "Update permohonan informasi No. Reg {$data_permohonan['nomor_register']}";
            $msg = "{$data_user['nama']} telah mengupdate permohonan informasi pada tanggal {$data_permohonan['tanggal_permohonan']} dengan isi permohonan : {$isi_permohonan}";
            $to = $data_user['email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            // $status_email  = lets_mail($subject, $msg, $recipients);

            // $email_user = 'okawinza@gmail.com';

            // session()->setFlashdata('success', 'Data berhasil diubah, ' . $status_email);
            session()->setFlashdata('success', 'Data berhasil diubah, ');
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


    public function modal_keberatan()
    {
        // $jenis_keberatan = $this->keberatanModel->jenis_keberatan();
        // $data_permohonan = $this->permohonanModel->find_data(4);
        // dd($jenis_keberatan);
        if ($this->request->isAJAX()) {
            $jenis_keberatan = $this->keberatanModel->jenis_keberatan();
            $id = $this->request->getVar('id');
            $data_permohonan = $this->permohonanModel->find_data($id);
            $data = [
                'nomor_register' => $data_permohonan['nomor_register'],
                'jenis_keberatan' => $jenis_keberatan,
                'id' => $id
            ];

            return $this->response->setJSON([view('user/modal/modal_keberatan', $data)]);
        } else {
            echo 'Forbidden';
        }
    }

    public function insert_keberatan()
    {
        $jenis_keberatan = $this->request->getVar('jenis_keberatan');
        $isi_keberatan = $this->request->getVar('isi_keberatan');
        $permohonan_id = $this->request->getVar('id');
        $tanggal_keberatan = $this->time->parse('now', 'Asia/Manila')->toDateString();
        $user_email = session()->get('user_email');

        if (!$this->validate([
            'jenis_keberatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis keberatan harus diisi'
                ]
            ],
            'isi_keberatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi keberatan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('userpage/v_permohonan'));
        }

        $data_insert = [
            'jenis_keberatan_id' => $jenis_keberatan,
            'isi_keberatan' => $isi_keberatan,
            'permohonan_id' => $permohonan_id,
            'tanggal_keberatan' => $tanggal_keberatan,
            'email' => $user_email
        ];

        $data_keberatan = $this->keberatanModel->find_keberatan($permohonan_id);
        if ($data_keberatan) {

            if ($this->keberatanModel->where('permohonan_id', $permohonan_id)->set($data_insert)->update()) {
                $data_user = $this->userModel->where('email', session()->get('user_email'))->first();
                $db = db_connect();
                $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
                $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

                $builder = $db->table('permohonan');
                $data_permohonan = $builder->where('id', $permohonan_id)->get()->getRowArray();

                $subject = "Pengajuan keberatan atas permohonan informasi No. Reg {$data_permohonan['nomor_register']}";
                $msg = "{$data_user['nama']} telah mengajukan keberatan permohonan informasi pada tanggal {$tanggal_keberatan} dengan isi keberatan : {$isi_keberatan}";
                $to = $data_user['email'];
                $cc = $email_kpt['email'];
                $bcc = $email_admin['email'];
                $recipients = [$to, $cc, $bcc];
                // $status_email  = lets_mail($subject, $msg, $recipients);
                // $email_user = 'okawinza@gmail.com';

                // session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
                session()->setFlashdata('success', 'Data berhasil diinput, ');
                return redirect()->to(base_url('userpage/v_keberatan'));
            } else {
                session()->setFlashdata('fail', 'Data gagal diinput');
                return redirect()->to(base_url('userpage/v_permohonan'));
            }
        } else {

            if ($this->keberatanModel->insert($data_insert)) {
                $this->permohonanModel->update($permohonan_id, ['status' => 'Pengajuan keberatan']);

                $data_user = $this->userModel->where('email', session()->get('user_email'))->first();
                $db = db_connect();
                $db = db_connect();
                $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
                $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

                $builder = $db->table('permohonan');
                $data_permohonan = $builder->where('id', $permohonan_id)->get()->getRowArray();

                $subject = "Pengajuan keberatan atas permohonan informasi No. Reg {$data_permohonan['nomor_register']}";
                $msg = "{$data_user['nama']} telah mengajukan keberatan permohonan informasi pada tanggal {$tanggal_keberatan} dengan isi keberatan : {$isi_keberatan}";
                $to = $data_user['email'];
                $cc = $email_kpt['email'];
                $bcc = $email_admin['email'];
                $recipients = [$to, $cc, $bcc];
                // $status_email  = lets_mail($subject, $msg, $recipients);
                // $email_user = 'okawinza@gmail.com';

                // session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
                session()->setFlashdata('success', 'Data berhasil diinput, ' );
                return redirect()->to(base_url('userpage/v_keberatan'));
            } else {
                session()->setFlashdata('fail', 'Data gagal diinput');
                return redirect()->to(base_url('userpage/v_permohonan'));
            }
        }
    }

    public function v_keberatan()
    {
        $data = [
            'title' => 'Daftar Keberatan'
        ];

        return view('user/v_keberatan', $data);
    }

    public function data_keberatan_datatable()
    {

        $request = Services::request();
        $datamodel = new KeberatanModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                if ($list->tanggapan != null) {

                    $disabled = 'disabled';
                } else {
                    $disabled = '';
                };

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nomor_register;
                $row[] = $list->tanggal_keberatan;
                $row[] = $list->jenis_keberatan;
                $row[] = $list->isi_keberatan;

                if ($list->status == "Proses verifikasi") {

                    $row[] = "<span class='badge bg-warning'>$list->status</span>";
                } else if ($list->status == "Sudah ditindaklanjuti") {
                    $row[] = "<span class='badge bg-success'>$list->status</span>";
                }
                $row[] = $list->tanggapan;
                $row[] = "<a href='' class='btn btn-warning edit_btn " . $disabled . "' data-id=" . $list->permohonan_id . " style='border-radius:50%' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Edit'><i class='bx bx-edit-alt'></i></a><a href='' class='btn btn-danger delete_btn  " . $disabled . "' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " style='border-radius:50%'><i class='bx bx-trash' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Hapus'></i></a>";
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

    public function modal_edit_keberatan()
    {
        // $data_permohonan = $this->permohonanModel->find_data(4);
        // dd($data_permohonan);
        if ($this->request->isAJAX()) {
            $jenis_keberatan = $this->keberatanModel->jenis_keberatan();
            $permohonan_id = $this->request->getVar('id');
            $data_keberatan = $this->keberatanModel->find_data($permohonan_id);
            $data = [
                'nomor_register' => $data_keberatan['nomor_register'],
                'jenis_keberatan_id' => $data_keberatan['jenis_keberatan_id'],
                'isi_keberatan' => $data_keberatan['isi_keberatan'],
                'jenis_keberatan' => $jenis_keberatan,
                'permohonan_id' => $permohonan_id
            ];

            return $this->response->setJSON([view('user/modal/modal_edit_keberatan', $data)]);
        } else {
            echo 'Forbidden';
        }
    }

    public function edit_keberatan()
    {
        $jenis_keberatan = $this->request->getVar('jenis_keberatan');
        $isi_keberatan = $this->request->getVar('isi_keberatan');
        $id = $this->request->getVar('permohonan_id');
        // $user_email = $this->request->getVar('user_email');


        // dd($jenis_permohonan, $isi_permohonan, $lampiran_file);
        if (!$this->validate([
            'jenis_keberatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis keberatan harus diisi'
                ]
            ],
            'isi_keberatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi permohonan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('userpage/v_keberatan'));
        }

        $data = [
            'jenis_keberatan_id' => $jenis_keberatan,
            'isi_keberatan' => $isi_keberatan
        ];

        if ($this->keberatanModel->update_keberatan($id, $data)) {
            $data_user = $this->userModel->where('email', session()->get('user_email'))->first();
            $db = db_connect();
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();


            $builder = $db->table('permohonan');
            $data_permohonan = $builder->where('permohonan.id', $id)
                ->select('permohonan.id as permohonan_id, nomor_register,tanggal_keberatan')
                ->join('keberatan', "permohonan.id=keberatan.permohonan_id")
                ->get()->getRowArray();

            $subject = "Update pengajuan keberatan atas permohonan informasi No. Reg {$data_permohonan['nomor_register']}";
            $msg = "{$data_user['nama']} telah mengupdate keberatan permohonan informasi pada tanggal {$data_permohonan['tanggal_keberatan']} dengan isi keberatan : {$isi_keberatan}";
            $to = $data_user['email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            // $status_email  = lets_mail($subject, $msg, $recipients);
            // $email_user = 'okawinza@gmail.com';

            // session()->setFlashdata('success', 'Data berhasil diubah, ' . $status_email);
            session()->setFlashdata('success', 'Data berhasil diubah, ');
            return redirect()->to(base_url('userpage/v_keberatan'));
        } else {
            session()->setFlashdata('fail', ['Data gagal diubah']);
            return redirect()->to(base_url('userpage/v_keberatan'));
        }
    }

    public function delete_keberatan()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('keberatan');
        $builder->where('permohonan_id', $id)->delete();
        $builder2 = $db->table('permohonan');
        $builder2->where('id', $id)->update(['status' => 'Sudah ditindaklanjuti']);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return $this->response->setJSON(['success' => true]);
    }

    public function standar_pelayanan($jenis)
    {
        $db = db_connect();
        $data_layanan = $db->table('standar_layanan')
            ->get()->getRowArray();
        switch ($jenis) {
            case "maklumat":
                $judul = "Maklumat Pelayanan";
                break;
            case "prosedur":
                $judul = "Prosedur Permohonan Informasi";
                break;
            case "keberatan":
                $judul = "Prosedur Pengajuan Keberatan";
                break;
            case "sengketa":
                $judul = "Prosedur Sengketa Informasi";
                break;
            case "jalur":
                $judul = "Jalur dan Waktu Layanan";
                break;
            case "biaya":
                $judul = "Biaya Layanan";
                break;
        }
        $data = [
            'title' => 'Standar Pelayanan',
            'jenis' => $jenis,
            'judul' => $judul,
            'data_layanan' => $data_layanan

        ];

        return view('user/v_standar_pelayanan', $data);
    }

    public function regulasi()
    {
        $db = db_connect();
        $data_regulasi = $db->table('peraturan')
            ->get()->getResultArray();

        $data = [
            'title' => 'Daftar Regulasi',
            'data_peraturan' => $data_regulasi
        ];

        return view('user/v_peraturan', $data);
    }

    public function v_statistik()
    {
        $data_statistik = $this->statistikModel->orderBy('tahun', 'desc')->findAll(10);
        // dd($data_statistik);

        $data = [
            'title' => 'Laporan Informasi',
            'data_statistik' => $data_statistik
        ];

        return view('user/v_statistik', $data);
    }

    public function file_check($nama_file)
    {
        $client = Services::curlrequest();
        $response = $client->request('GET', base_url('admin_file/statistik/' . $nama_file));
        // $body = $response->getBody();

       
        return $this->response
            ->setHeader('Content-Type', $response->getHeaderLine('Content-Type'))
            ->setHeader('Content-Disposition', 'attachment; filename="' . $nama_file . '"')
            ->setBody($response->getBody());
    }

    public function v_laporan_layanan()
    {
        $data_laporan = $this->laporanModel->orderBy('tahun', 'desc')->findAll(10);


        $data_tidak_ada = $data_laporan ? (file_exists(ROOTPATH . 'public/admin_file/laporan/' . $data_laporan[0]['laporan'])) : false;
        // dd($data_tidak_ada);
        $data = [
            'title' => 'Laporan Informasi',
            'data_laporan' => $data_laporan,
            'data_tidak_ada' => $data_tidak_ada
        ];

        return view('user/v_laporan_layanan', $data);
    }

    public function file_check_laporan($nama_file)
    {
        if (file_exists(ROOTPATH . 'public/admin_file/laporan/' . $nama_file)) {

            $client = \Config\Services::curlrequest();
            $response = $client->request('GET', base_url('admin_file/laporan/' . $nama_file));
            // $body = $response->getBody();

            return $this->response
                ->setHeader('Content-Type', $response->getHeaderLine('Content-Type'))
                ->setHeader('Content-Disposition', 'attachment; filename="' . $nama_file . '"')
                ->setBody($response->getBody());
        } else {
            return "File tidak ada";
        }
    }

    public function v_prasyarat($jenis_prasyarat)
    {
        $data_prasyarat = $this->prasyaratModel->first();
        if ($data_prasyarat != null) {
            $data = [
                'title' => 'Prasyarat & Others',
                'data_prasyarat' => $data_prasyarat,
                'jenis_prasyarat' => $jenis_prasyarat
            ];
        } else {
            $data = [
                'title' => 'Prasyarat & Others',
                'data_prasyarat' => false
            ];
        }

        return view('user/v_prasyarat', $data);
    }

    public function api_permohonan()
    {
        if ($this->request->isAJAX()) {

            $db = db_connect();
            // $time = new Time();
            $tahun = $this->request->getVar('tahun');
            $permohonan_perbulan = [];

            for ($i = 1; $i <= 12; $i++) {
                $permohonan_perbulan[] = $db->table('permohonan')->where('MONTH(tanggal_permohonan)', $i)
                    ->where('YEAR(tanggal_permohonan)', $tahun)
                    ->countAllResults();
            }

            return $this->response->setJSON($permohonan_perbulan);
        }
    }

    public function api_per_jenis()
    {
        if ($this->request->isAJAX()) {

            $db = db_connect();
            // $time = new Time();
            $tahun = $this->request->getVar('tahun');
            // $tahun = 2022;
            $permohonan_sepenuhnya = [];
            $permohonan_sebagian = [];
            $permohonan_ditolak = [];

            for ($i = 1; $i <= 5; $i++) {
                $permohonan_sepenuhnya[] = $db->table('permohonan')
                    ->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id')
                    ->where('status_jawaban', 'sepenuhnya')
                    ->where('id_jenis_informasi', $i)
                    ->where('YEAR(tanggal_permohonan)', $tahun)
                    ->countAllResults();
                $permohonan_sebagian[] = $db->table('permohonan')
                    ->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id')
                    ->where('status_jawaban', 'sebagian')
                    ->where('id_jenis_informasi', $i)
                    ->where('YEAR(tanggal_permohonan)', $tahun)
                    ->countAllResults();
                $permohonan_ditolak[] = $db->table('permohonan')
                    ->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id')
                    ->where('proses', 'T')
                    ->where('id_jenis_informasi', $i)
                    ->where('YEAR(tanggal_permohonan)', $tahun)
                    ->countAllResults();
            }

            return $this->response->setJSON([$permohonan_sepenuhnya, $permohonan_sebagian, $permohonan_ditolak]);
        }
    }

    public function modal_message()
    {
        return $this->response->setJSON([view('user/modal/modal-message')]);
    }
}
