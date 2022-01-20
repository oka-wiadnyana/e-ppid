<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\LinkModel;
use App\Models\VideoModelDt;
use App\Models\UservideoModel;
use App\Models\ProfilPpidModel;

class Userpage extends BaseController
{
    // protected $profil;
    public function __construct()
    {
        $this->linkModel = new LinkModel();
        $this->profileModel = new ProfileModel();
        $this->videoModel = new VideoModelDt();
        $this->uservideoModel = new UservideoModel();
        $this->profilPpidModel = new ProfilPpidModel();


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
        $jenis_permohonan = $this->request->getVar('jenis_informasi');
        $isi_permohonan = $this->request->getVar('isi_permohonan');
        $lampiran_file = $this->request->getFile('lampiran_file');

        dd($jenis_permohonan, $isi_permohonan, $lampiran_file);
    }
}
