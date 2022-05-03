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
use Ngekoding\CodeIgniterDataTables\DataTables;

class Pengaduan extends BaseController
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
                'layanan_elektronik' => 'Belum diset',
                'link_terkait' => 'Belum diset'
            ];
        }
        session()->set($sessionProfil);

        helper('mailer_helper');
    }

    public function index()
    {

        $profil = $this->profileModel->findAll();
        // dd($profil[0]);
        $db = db_connect();
        $total_permohonan = $db->table('proses_permohonan')->countAll();
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
        return view('adu/dashboard');
    }

    public function v_form()
    {
        return view('adu/form-pengaduan');
    }


    public function v_pengaduan()
    {
        $data = [
            'title' => 'Daftar Pengaduan'
        ];

        return view('adu/v_pengaduan', $data);
    }

    public function datatable_pengaduan()
    {
        $db = db_connect();
        $queryBuilder = $db->table('pengaduan p')->select('p.*,up.nama,up.email,up.nomor_hp,pp.proses,pp.status,pp.file_tanggapan')->join('proses_pengaduan pp', 'p.id=pp.id_pengaduan', 'left')->join('user_pengaduan up', 'p.id_pelapor=up.id')->where('id_pelapor', session()->get('user_id'))->orderBy('p.id', 'desc');


        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['tanggal_laporan', 'nama', 'hal', 'tempat_kejadian', 'waktu', 'nama_terlapor', 'status']);
        $datatables->format('status', function ($value, $row) {
            if ($value == 'Proses verifikasi') {

                return '<span class="badge rounded-pill bg-warning">' . $value . '</span>';
            } elseif ($value == 'Ditanggapi') {
                if ($row->file_tanggapan) {
                    return '<a href="#" class="status-btn text-white" data-id="' . $row->id . '"><span class="badge badge rounded-pill bg-success">' . $value . '</span></a><br><a href="' . base_url('adminpengaduan/download_tanggapan/' . $row->file_tanggapan) . '" class="text-white" data-id="' . $row->id . '" target="_blank"><span class="badge badge rounded-pill bg-success">File tanggapan</span></a>';
                } else {
                    return '<a href="#" class="status-btn text-white" data-id="' . $row->id . '"><span class="badge badge rounded-pill bg-success">' . $value . '</span></a>';
                }
            }
        });

        $datatables->addColumn('action', function ($row) {
            $disabled = ($row->proses == 'Y') ? "disabled" : "";
            return '<!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row->id . '">
              <i class="bx bx-comment" data-bs-toggle="tooltip" data-bs-placement="top" title="Isi pengaduan"></i>
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal' . $row->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Uraian Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ' . $row->isi_pengaduan . '
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal' . $row->id . '" ' . $disabled . '>
              <i class="bx bxs-edit-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit  pengaduan"></i>
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="editModal' . $row->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="' . base_url('pengaduan/edit_data') . '" method="post" enctype="multipart/form-data">
                  ' . csrf_field() . '
                  <div class="mb-3">
                    <label for="perihal" class="form-label">Hal Pengaduan</label>
                    <input type="text" class="form-control" id="perihal" aria-describedby="emailHelp" name="hal" value="' . $row->hal . '">
                    
                  </div>
                  <div class="mb-3">
                    <label for="tempat_kejadian" class="form-label">Tempa Kejadian</label>
                    <input type="text" class="form-control" id="tempat_kejadian" aria-describedby="emailHelp" name="tempat_kejadian" value="' . $row->tempat_kejadian . '">
                    
                  </div>
                  <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu kejadian</label>
                    <input type="date" class="form-control" id="waktu" aria-describedby="emailHelp" name="waktu" value="' . $row->waktu . '">
                    
                  </div>
                  <div class="mb-3">
                    <label for="nama_terlapor" class="form-label">Hal Pengaduan</label>
                    <input type="text" class="form-control" id="nama_terlapor" aria-describedby="emailHelp" name="nama_terlapor" value="' . $row->nama_terlapor . '">
                    
                  </div>
                  <div class="mb-3">
                  <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="5">' . $row->isi_pengaduan . '</textarea> 
                  </div>
                  <div class="mb-3">
                  <label for="isi_pengaduan" class="form-label"><a class="btn btn-success" href="' . base_url('pengaduan/download/' . $row->file) . '" target="_blank">File sebelumnya : ' . $row->file . '</a></label>
                    <input class="form-control" type="file" id="formFile" name="file">
                  </div>

                  <input type="hidden" value="' . $row->file . '" name="file_lama">
                  <input type="hidden" value="' . $row->id . '" name="id">
                 
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </form>
                  </div>
                  <div class="modal-footer">
                                        
                  </div>
                </div>
              </div>
            </div>
            
            <button class="btn btn-danger btn-hapus" data-id="' . $row->id . '" ' . $disabled . '><i class="bx bx-trash"></i></button>';
        });


        $datatables->generate(); // done
    }


    public function insert_pengaduan()
    {

        $hal = $this->request->getVar('hal');
        $tempat_kejadian = $this->request->getVar('tempat_kejadian');
        $waktu = $this->request->getVar('waktu');
        $nama_terlapor = $this->request->getVar('nama_terlapor');
        $isi_pengaduan = $this->request->getVar('isi_pengaduan');
        $file = $this->request->getFile('file');
        $id_pelapor = $this->request->getVar('id');
        $tanggal_pelaporan = Time::today()->addDays(1);
        $tanggal_pelaporan = $tanggal_pelaporan->toDateString();


        if (!$this->validate([
            'hal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Pengaduan harus diisi'
                ]
            ],
            'tempat_kejadian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat kejadian harus diisi'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu kejadian harus diisi'
                ]
            ],
            'nama_terlapor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama terlapor harus diisi'
                ]
            ],

            'isi_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi pengaduan harus diisi'
                ]
            ],
            'file' => [
                'rules' => 'ext_in[file,pdf,jpg,jpeg,png]',
                'errors' => [
                    'ext_in' => 'File permohonan salah'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('pengaduan/v_form'))->withInput();
        }


        if ($file->isValid()) {
            $nama_file = "file-pengaduan-" . time();
            $ext = $file->getClientExtension();
            $nama_file = $nama_file . '.' . $ext;
            $file->move('user_file', $nama_file);

            $data_insert = [
                'id_pelapor' => $id_pelapor,
                'tanggal_laporan' => $tanggal_pelaporan,
                'hal' => $hal,
                'tempat_kejadian' => $tempat_kejadian,
                'waktu' => $waktu,
                'nama_terlapor' => $nama_terlapor,
                'isi_pengaduan' => $isi_pengaduan,
                'file' => $nama_file,

            ];
        } else {
            $data_insert = [
                'id_pelapor' => $id_pelapor,
                'tanggal_laporan' => $tanggal_pelaporan,
                'hal' => $hal,
                'tempat_kejadian' => $tempat_kejadian,
                'waktu' => $waktu,
                'nama_terlapor' => $nama_terlapor,
                'isi_pengaduan' => $isi_pengaduan,


            ];
        }

        $db = db_connect();

        if ($db->table('pengaduan')->insert($data_insert)) {
            $id_pengaduan = $db->insertID();
            $db->table('proses_pengaduan')->insert(['id_pengaduan' => $id_pengaduan, 'status' => 'Proses verifikasi']);

            // $data_user = $db->table('user_pengaduan')->where('email', session()->get('user_email'))->get()->getRowArray();
            $data_user = $db->table('user_pengaduan')->where('email', 'onsdee86@gmail.com')->get()->getRowArray();
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Upload pengaduan oleh {$data_user['nama']}";
            $msg = "{$data_user['nama']} telah mengirimkan pengaduan pada tanggal {$tanggal_pelaporan} dengan isi permohonan : {$isi_pengaduan}";
            $to = $data_user['email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            $status_email  = lets_mail($subject, $msg, $recipients);


            session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
            return redirect()->to(base_url('pengaduan/v_pengaduan'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diinput');
            return redirect()->to(base_url('pengaduan/v_form'));
        }
    }

    public function edit_data()
    {
        $hal = $this->request->getVar('hal');
        $tempat_kejadian = $this->request->getVar('tempat_kejadian');
        $waktu = $this->request->getVar('waktu');
        $nama_terlapor = $this->request->getVar('nama_terlapor');
        $isi_pengaduan = $this->request->getVar('isi_pengaduan');
        $file = $this->request->getFile('file');
        $file_lama = $this->request->getVar('file_lama');
        $id = $this->request->getVar('id');
        $id_pelapor = session()->get('user_id');
        $tanggal_pelaporan = Time::today()->addDays(1);
        $tanggal_pelaporan = $tanggal_pelaporan->toDateString();



        if (!$this->validate([
            'hal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Pengaduan harus diisi'
                ]
            ],
            'tempat_kejadian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat kejadian harus diisi'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu kejadian harus diisi'
                ]
            ],
            'nama_terlapor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama terlapor harus diisi'
                ]
            ],

            'isi_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi pengaduan harus diisi'
                ]
            ],
            'file' => [
                'rules' => 'ext_in[file,pdf,jpg,jpeg,png]',
                'errors' => [
                    'ext_in' => 'File permohonan salah'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('pengaduan/v_pengaduan'))->withInput();
        }


        if ($file->isValid()) {
            $nama_file = "file-pengaduan-" . time();
            $ext = $file->getClientExtension();
            $nama_file = $nama_file . '.' . $ext;
            $file->move('user_file', $nama_file);

            $data_insert = [
                'id_pelapor' => $id_pelapor,
                'tanggal_laporan' => $tanggal_pelaporan,
                'hal' => $hal,
                'tempat_kejadian' => $tempat_kejadian,
                'waktu' => $waktu,
                'nama_terlapor' => $nama_terlapor,
                'isi_pengaduan' => $isi_pengaduan,
                'file' => $nama_file,

            ];
        } else {
            $data_insert = [
                'id_pelapor' => $id_pelapor,
                'tanggal_laporan' => $tanggal_pelaporan,
                'hal' => $hal,
                'tempat_kejadian' => $tempat_kejadian,
                'waktu' => $waktu,
                'nama_terlapor' => $nama_terlapor,
                'isi_pengaduan' => $isi_pengaduan,
                'file' => $file_lama,


            ];
        }

        $db = db_connect();

        if ($db->table('pengaduan')->where('id', $id)->update($data_insert)) {
            $id_pengaduan = $db->insertID();


            // $data_user = $db->table('user_pengaduan')->where('email', session()->get('user_email'))->get()->getRowArray();
            $data_user = $db->table('user_pengaduan')->where('email', 'onsdee86@gmail.com')->get()->getRowArray();
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Edit pengaduan oleh {$data_user['nama']}";
            $msg = "{$data_user['nama']} telah mengedit pengaduan  dengan isi pengaduan : {$isi_pengaduan}";
            $to = $data_user['email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            $status_email  = lets_mail($subject, $msg, $recipients);


            session()->setFlashdata('success', 'Data berhasil diinput, ' . $status_email);
            return redirect()->to(base_url('pengaduan/v_pengaduan'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diinput');
            return redirect()->to(base_url('pengaduan/v_pengaduan'));
        }
    }

    public function download($file)
    {
        $client = Services::curlrequest();
        $user_file = $client->send('GET', base_url('user_file/' . $file));

        return $user_file;
    }

    public function modal_status()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $data_permohonan = $db->table('proses_pengaduan')->where('id_pengaduan', $id)->get()->getRowArray();

        return $this->response->setJSON([view('adu/modal_status', ['data' => $data_permohonan])]);
    }

    public function hapus_pengaduan()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('pengaduan')->where('id', $id)->delete()) {
            $db->table('proses_pengaduan')->where('id_pengaduan', $id)->delete();
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['Data gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
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



    public function modal_message()
    {
        return $this->response->setJSON([view('user/modal/modal-message')]);
    }
}
