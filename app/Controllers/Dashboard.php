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

class Dashboard extends BaseController
{
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
    }

    public function index()
    {
        $data = [
            'title' => 'E-Pelita | Dashboard'
        ];
        return view('epelita/index', $data);
    }

    public function wajib_umum()
    {
        return view('admin/v_wajib_umum');
    }
}
