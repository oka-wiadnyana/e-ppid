<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use CodeIgniter\I18n\Time;
use Ngekoding\CodeIgniterDataTables\DataTables;
use App\Models\ProfileModel;

class Adminpengaduan extends BaseController
{

    public function __construct()
    {

        $this->validation = Services::validation();
        $this->email = Services::email();
        $this->profilSatkerModel = new ProfileModel();
        helper('mailer_helper');
    }

    public function index()
    {
        $db = db_connect();
        $total = $db->table('permohonan')->countAll();
        $diproses = $db->table('permohonan')
            ->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id', 'left')
            ->where('proses !=', null)
            ->countAllResults();
        $belum_proses = $db->table('permohonan')
            ->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id', 'left')
            ->where('proses', null)
            ->countAllResults();

        $diterima = $db->table('proses_permohonan')->where('proses', 'Y')->countAllResults();
        $ditolak = $db->table('proses_permohonan')->where('proses', 'T')->countAllResults();
        $keberatan = $db->table('keberatan')->countAllResults();
        $keberatan_proses = $db->table('keberatan')
            ->join('proses_keberatan', 'keberatan.id=proses_keberatan.keberatan_id', 'left')
            ->where('tanggapan !=', null)
            ->countAllResults();
        $keberatan_belum_proses = $db->table('keberatan')
            ->join('proses_keberatan', 'keberatan.id=proses_keberatan.keberatan_id', 'left')
            ->where('tanggapan', null)
            ->countAllResults();


        $data = [
            'total' => $total,
            'diproses' => $diproses,
            'belum_proses' => $belum_proses,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'keberatan' => $keberatan,
            'keberatan_proses' => $keberatan_proses,
            'keberatan_belum_proses' => $keberatan_belum_proses,
        ];

        return view('admin/dashboard', $data);
    }

    public function v_daftar_pengaduan()
    {
        return view('admin/v_daftar_pengaduan');
    }

    public function datatable_pengaduan()
    {
        $db = db_connect();
        $queryBuilder = $db->table('pengaduan p')->select('p.*,up.nama,up.email,up.nomor_hp,pp.proses,pp.status,pp.file_tanggapan')->join('proses_pengaduan pp', 'p.id=pp.id_pengaduan', 'left')->join('user_pengaduan up', 'p.id_pelapor=up.id')->orderBy('p.id', 'desc');


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
            return '
            
            <a href="" class="btn btn-success text-white uraian-btn" data-id="' . $row->id . '" ' . $disabled . '><i class="fa fa-comment-alt" data-toggle="tooltip" data-placement="top" title="Uraian Pengaduan"></i></a>
            <a href="' . base_url('adminpengaduan/download_ktp/' . $row->id) . '"class="btn btn-info text-white" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="File KTP" target="_blank"><i class="fa fa-file"></i></a>
            <a class="btn btn-primary text-white proses_btn" data-id="' . $row->id . '" ' . $disabled . ' data-toggle="tooltip" data-placement="top" title="Tanggapan pengaduan"><i class="fa fa-check"></i></a>
            <a class="btn btn-danger btn-hapus text-white" data-id="' . $row->id . '" ' . $disabled . ' data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>';
        });


        $datatables->generate(); // done
    }

    public function modal_uraian()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $data_permohonan = $db->table('pengaduan')->where('id', $id)->get()->getRowArray();

        return $this->response->setJSON([view('admin/modal/modal_uraian', ['data' => $data_permohonan])]);
    }

    public function modal_status()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $data_permohonan = $db->table('proses_pengaduan')->where('id_pengaduan', $id)->get()->getRowArray();

        return $this->response->setJSON([view('admin/modal/modal_status', ['data' => $data_permohonan])]);
    }

    public function modal_tanggapan()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $data_pengaduan = $db->table('proses_pengaduan')->where('id_pengaduan', $id)->get()->getRowArray();

        return $this->response->setJSON([view('admin/modal/modal_tanggapan', ['data' => $data_pengaduan])]);
    }

    public function download_tanggapan($file)
    {
        $client = Services::curlrequest();
        $user_file = $client->send('GET', base_url('tanggapan/' . $file));

        return $user_file;
    }

    public function download_ktp($id)
    {
        $db = db_connect();
        $data = $db->table('pengaduan p')->select('ktp')->join('user_pengaduan up', 'p.id_pelapor=up.id')->where('p.id', $id)->get()->getRowArray()['ktp'];
        // dd($data);
        if ($data) {

            $client = Services::curlrequest();
            $user_file = $client->send('GET', base_url('ktp/' . $data));

            return $user_file;
        } else {
            echo "file not exist";
        }
    }

    public function insert_tanggapan()
    {
        $tanggapan = $this->request->getVar('tanggapan');
        $id = $this->request->getVar('id');
        $file_tanggapan = $this->request->getFile('file_tanggapan');

        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'Tanggapan belum diisi'
                ]
            ],
            'file_tanggapan' => [
                'rules' => 'ext_in[file_tanggapan,pdf,jpg,jpeg,png]',
                'errors' => [
                    'ext_in' => 'Jenis file salah'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->valdation->getErrors());
            return redirect()->to(base_url('adminpengaduan/v_daftar_pengaduan'));
        }


        $db = db_connect();
        if ($file_tanggapan->isValid()) {
            $nama_file = 'File-tanggapan-' . time() . '.' . $file_tanggapan->getClientExtension();
            $file_tanggapan->move('tanggapan', $nama_file);

            $data_update = [
                'proses' => 'Y',
                'status' => 'Ditanggapi',
                'tanggapan' => $tanggapan,
                'file_tanggapan' => $nama_file
            ];
            if ($db->table('proses_pengaduan')->where('id_pengaduan', $id)->update($data_update)) {
                $data_pengaduan = $db->table('pengaduan')->select('tanggal_laporan, nama,email,tanggapan')->join('user_pengaduan', 'pengaduan.id_pelapor=user_pengaduan.id', 'left')->join('proses_pengaduan', 'pengaduan.id=proses_pengaduan.id_pengaduan', 'left')->where('pengaduan.id', $id)->get()->getRowArray();
                $db = db_connect();
                $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
                $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();
                $subject = "Tanggapan atas pengaduan tanggal : {$data_pengaduan['tanggal_laporan']}";
                $msg = "Halo {$data_pengaduan['nama']}, pengaduan Saudara/i dengan tanggal laporan {$data_pengaduan['tanggal_laporan']} telah ditanggapi dengan tanggapan sebagai berikut : {$data_pengaduan['tanggapan']}";
                $to = $data_pengaduan['email'];
                $cc = $email_kpt['email'];
                $bcc = $email_admin['email'];
                $recipients = [$to, $cc, $bcc];
                $status_email  = lets_mail($subject, $msg, $recipients);


                session()->setFlashdata('success', 'Tanggapan berhasil diinput, ' . $status_email);

                return redirect()->to(base_url('adminpengaduan/v_daftar_pengaduan'));
            } else {
                session()->setFlashdata('fail', $this->valdation->getErrors());
                return redirect()->to(base_url('adminpengaduan/v_daftar_pengaduan'));
            }
        } else {

            $data_update = [
                'proses' => 'Y',
                'status' => 'Ditanggapi',
                'tanggapan' => $tanggapan,

            ];
            if ($db->table('proses_pengaduan')->where('id_pengaduan', $id)->update($data_update)) {
                $data_pengaduan = $db->table('pengaduan')->select('tanggal_laporan, nama,email,tanggapan')->join('user_pengaduan', 'pengaduan.id_pelapor=user_pengaduan.id', 'left')->join('proses_pengaduan', 'pengaduan.id=proses_pengaduan.id_pengaduan', 'left')->where('pengaduan.id', $id)->get()->getRowArray();
                $db = db_connect();
                $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
                $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

                $subject = "Tanggapan atas pengaduan tanggal : {$data_pengaduan['tanggal_laporan']}";
                $msg = "Halo {$data_pengaduan['nama']}, pengaduan Saudara/i dengan tanggal laporan {$data_pengaduan['tanggal_laporan']} telah ditanggapi dengan tanggapan sebagai berikut : {$data_pengaduan['tanggapan']}";
                $to = $data_pengaduan['email'];
                $cc = $email_kpt['email'];
                $bcc = $email_admin['email'];
                $recipients = [$to, $cc, $bcc];
                $status_email  = lets_mail($subject, $msg, $recipients);



                session()->setFlashdata('success', 'Tanggapan berhasil diinput, ' . $status_email);

                return redirect()->to(base_url('adminpengaduan/v_daftar_pengaduan'));
            } else {
                session()->setFlashdata('fail', $this->valdation->getErrors());
                return redirect()->to(base_url('adminpengaduan/v_daftar_pengaduan'));
            }
        }
    }

    public function api_permohonan()
    {
        if ($this->request->isAJAX()) {

            $db = db_connect();
            // $time = new Time();
            $tahun = $this->request->getVar('tahun');
            $permohonan_perbulan = [];

            for ($i = 1; $i <= 12; $i++) {
                $permohonan_perbulan[] = $db->table('pengaduan')->where('MONTH(tanggal_laporan)', $i)
                    ->where('YEAR(tanggal_laporan)', $tahun)
                    ->countAllResults();
            }

            return $this->response->setJSON($permohonan_perbulan);
        }
    }




    public function count_pengaduan_baru()
    {
        // this is sse server setting

        // if in hosting, use this setting
        // $this->response->setContentType('text/event-stream');
        // $this->response->setHeader('Cache-Control', 'no-cache');


        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');


        $db = db_connect();
        $builder = $db->table('pengaduan');
        $data_baru = $builder->where('proses', null)->join('proses_pengaduan', 'pengaduan.id=proses_pengaduan.id_pengaduan', 'left')->countAllResults();

        echo "data: {$data_baru}\n\n";
        // ob_end_flush();
        flush();
    }

    public function v_user()
    {

        return view('admin/v_user_pengaduan');
    }

    public function datatable_user()
    {
        $db = db_connect();
        $queryBuilder = $db->table('user_pengaduan up')->orderBy('up.id', 'desc');


        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nama', 'alamat', 'email', 'nomor_hp']);


        $datatables->addColumn('action', function ($row) {
            // $disabled = ($row->proses == 'Y') ? "disabled" : "";
            return "<a href='' class='btn btn-info edit_btn' data-id=" . $row->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='" . base_url('adminpengaduan/download_user_ktp/' . $row->id) . "'class='btn btn-info text-white' data-id='" . $row->id . "' style='border-radius:50%' data-toggle='tooltip' data-placement='top' title='File KTP' target=_blank'><i class='fa fa-file'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $row->id .
                " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
        });


        $datatables->generate(); // done
    }

    public function download_user_ktp($id)
    {
        $db = db_connect();
        $data = $db->table('user_pengaduan p')->select('ktp')->where('p.id', $id)->get()->getRowArray()['ktp'];
        // dd($data);
        if ($data) {

            $client = Services::curlrequest();
            $user_file = $client->send('GET', base_url('ktp/' . $data));

            return $user_file;
        } else {
            echo "file not exist";
        }
    }

    public function tambah_user()
    {

        return view('admin/tambah_user_pengaduan');
    }

    public function modal_edit_user()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('user_pengaduan');
        $data_user = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_user' => $data_user
        ];

        return $this->response->setJSON([view('admin/modal/edituserpengaduan', $data)]);
    }
}
