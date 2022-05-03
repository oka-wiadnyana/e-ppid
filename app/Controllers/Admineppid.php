<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LinkModel;
use Config\Services;
use App\Models\VideoModelDt;
use App\Models\Level1ModelDt;
use App\Models\Level2ModelDt;
use App\Models\Level3ModelDt;
use App\Models\ProfilPpidModel;
use App\Models\ProfileModel;
use App\Models\PermohonanModelAdmin;
use App\Models\KeberatanModelAdmin;
use App\Models\PeraturanModel;
use App\Models\StandarModel;
use App\Models\StatistikModel;
use App\Models\LaporanModel;
use App\Models\PrasyaratModel;
use App\Models\LinkterkaitModel;
use App\Models\LayananelektronikModel;
use App\Models\AdminauthModel;
use App\Models\UserauthModelDT;
use CodeIgniter\I18n\Time;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Admineppid extends BaseController
{

    public function __construct()
    {
        $this->linkModel = new LinkModel();
        $this->videoModel = new VideoModelDt();
        $this->level1Model = new Level1ModelDt();
        $this->level2Model = new Level2ModelDt();
        $this->level3Model = new Level3ModelDt();
        $this->profilPpidModel = new ProfilPpidModel();
        $this->profilSatkerModel = new ProfileModel();
        $this->permohonanModel = new PermohonanModelAdmin();
        $this->keberatanModel = new KeberatanModelAdmin();
        $this->peraturanModel = new PeraturanModel();
        $this->standarModel = new StandarModel();
        $this->statistikModel = new StatistikModel();
        $this->laporanModel = new LaporanModel();
        $this->prasyaratModel = new PrasyaratModel();
        $this->linkterkaitModel = new LinkterkaitModel();
        $this->layananelektronikModel = new LayananelektronikModel();
        $this->adminauthModel = new AdminauthModel();
        $this->userauthModel = new UserauthModelDT();
        $this->validation = Services::validation();
        $this->email = Services::email();

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
    public function list_informasi()
    {
        $listLink = $this->linkModel->orderBy('level1', 'asc')->orderBy('level2', 'asc')->orderBy('level3', 'asc')->findAll();
        $data = [
            'title' => 'Admin | Link Informasi',
            'listLink' => $listLink
        ];

        return view('admin/link-informasi', $data);
    }

    public function modal_edit()
    {
        $id = $this->request->getVar('id');
        $dataLink = $this->linkModel->find($id);

        $data = [
            'data_link' => $dataLink

        ];

        return $this->response->setJSON([view('admin/modal/editlinkmodal', $data)]);
    }

    public function edit_link()
    {

        $idLink = $this->request->getVar('id');
        $newLink = $this->request->getVar('new_link');
        $newUraian = $this->request->getVar('new_uraian');
        // dd($newLink, $idLink, $newUraian);
        $this->validation->setRules([
            'new_link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong'
                ]
            ], 'new_uraian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian tidak boleh kosong'
                ]
            ],

        ]);

        $dataValidasi = [
            'new_uraian' => $newUraian,
            'new_link' => $newLink,
        ];
        if (!$this->validation->run($dataValidasi)) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/list_informasi'));
        }
        $dataUpdate = [
            'uraian' => $newUraian,
            'link' => $newLink
        ];
        if ($this->linkModel->update($idLink, $dataUpdate)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/list_informasi'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diupdate');
            return redirect()->to(base_url('admineppid/list_informasi'));
        };
    }

    public function delete_link()
    {
        $id = $this->request->getVar('id');
        if ($this->linkModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
            return $this->response->setJSON(['msg' => 'fail']);
        };
    }

    public function list_video()
    {

        $data = [
            'title' => 'Admin | Link Video',
        ];

        return view('admin/link-video', $data);
    }

    public function video_datatable()
    {
        $request = Services::request();
        $datamodel = new VideoModelDt($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->uraian;
                $row[] = $list->embed_id;
                $row[] = "<a href='' class='btn btn-warning edit_btn' data-id=" . $list->id . " style='border-radius:50%'><i class='fas fa-edit'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " data-embed=" . $list->embed_id . " style='border-radius:50%'><i class='fas fa-trash'>";
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

    public function modal_edit_video()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('video_informasi');
        $video = $builder->where('id', $id)->get()->getRowArray();


        $data = [
            'data_link' => $video

        ];

        return $this->response->setJSON([view('admin/modal/editvideomodal', $data)]);
    }

    public function edit_video()
    {

        $idLink = $this->request->getVar('id');
        $newEmbed = $this->request->getVar('new_embed');
        $newUraian = $this->request->getVar('new_uraian');
        // dd($newLink, $idLink, $newUraian);
        $this->validation->setRules([
            'new_embed' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Embed Id tidak boleh kosong'
                ]
            ], 'new_uraian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian tidak boleh kosong'
                ]
            ],

        ]);

        $dataValidasi = [
            'new_uraian' => $newUraian,
            'new_embed' => $newEmbed,
        ];
        if (!$this->validation->run($dataValidasi)) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/list_video'));
        }
        $dataUpdate = [
            'uraian' => $newUraian,
            'embed_id' => $newEmbed
        ];
        if ($this->videoModel->update($idLink, $dataUpdate)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/list_video'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diupdate');
            return redirect()->to(base_url('admineppid/list_video'));
        };
    }

    public function delete_video()
    {
        $id = $this->request->getVar('id');
        if ($this->videoModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
            return $this->response->setJSON(['msg' => 'fail']);
        };
    }

    public function modal_tambah_video()
    {

        return $this->response->setJSON([view('admin/modal/modaltambahvideo')]);
    }

    public function tambah_video()
    {

        $uraian = $this->request->getVar('uraian');
        $embed_id = $this->request->getVar('embed_id');
        $this->validation->setRules([
            'embed_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Embed Id tidak boleh kosong'
                ]
            ], 'uraian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian tidak boleh kosong'
                ]
            ],

        ]);

        $dataValidasi = [
            'uraian' => $uraian,
            'embed_id' => $embed_id
        ];

        if (!$this->validation->run($dataValidasi)) {
            return redirect()->to(base_url('admineppid/list_video'));
        };


        if ($this->videoModel->save($dataValidasi)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('admineppid/list_video'));
        } else {
            session()->setFlashdata('fail', 'Data gagal ditambahkan');
            return redirect()->to(base_url('admineppid/list_video'));
        };
    }

    public function v_level1()
    {
        $data = [
            'title' => 'Admin | Level1'
        ];

        return view('admin/level1', $data);
    }

    public function level1_datatable()
    {
        $request = Services::request();
        $datamodel = new Level1ModelDt($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->level1;
                $row[] = $list->nama;
                $row[] = "<a href='' class='btn btn-warning edit_btn' data-id=" . $list->id . " style='border-radius:50%'><i class='fas fa-edit'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " data-nama=" . $list->level1 . " style='border-radius:50%'><i class='fas fa-trash'>";
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

    public function modal_edit_level1()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('level1');
        $level1 = $builder->where('id', $id)->get()->getRowArray();
        $data = [
            'data_level1' => $level1
        ];

        return $this->response->setJSON([view('admin/modal/editlevel1modal', $data)]);
    }

    public function edit_level1()
    {

        $id = $this->request->getVar('id');
        $level1 = $this->request->getVar('level1');
        $nama = $this->request->getVar('nama');
        // dd($newLink, $idLink, $newUraian);
        if (!$this->validate([
            'level1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level1 harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level1'));
        }

        $data = [
            'level1' => $level1,
            'nama' => $nama
        ];
        if ($this->level1Model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/v_level1'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diupdate');
            return redirect()->to(base_url('admineppid/v_level1'));
        };
    }

    public function delete_level1()
    {
        $id = $this->request->getVar('id');
        if ($this->level1Model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
            return $this->response->setJSON(['msg' => 'fail']);
        };
    }



    public function modal_tambah_level1()
    {
        $db = db_connect();
        $builder = $db->table('level1');
        $max_level1 = $builder->selectMax('level1')->get()->getRowArray();
        $next_level1 = ++$max_level1['level1'];
        // return $this->response->setJSON([$next_level1]);
        $data = [
            'next_level1' => $next_level1
        ];
        return $this->response->setJSON([view('admin/modal/modaltambahlevel1', $data)]);
    }

    public function tambah_level1()
    {
        $level1 = $this->request->getVar('level1');
        $nama = $this->request->getVar('nama');

        if (!$this->validate([
            'level1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode harus diisi'
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ],
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level1'));
        }

        $data = [
            'level1' => $level1,
            'nama' => $nama
        ];

        if ($this->level1Model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('admineppid/v_level1'));
        } else {
            session()->setFlashdata('fail', 'Data gagal ditambahkan');
            return redirect()->to(base_url('admineppid/v_level1'));
        }
    }

    public function v_level2()
    {
        $data = [
            'title' => 'Admin | Level2'
        ];

        return view('admin/level2', $data);
    }


    public function level2_datatable()
    {
        $request = Services::request();
        $datamodel = new Level2ModelDt($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->level1;
                $row[] = $list->level2;
                $row[] = $list->nama;
                $row[] = "<a href='' class='btn btn-warning edit_btn' data-id=" . $list->id . " style='border-radius:50%'><i class='fas fa-edit'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " data-level1=" . $list->level1 . " data-level2=" . $list->level2 . " style='border-radius:50%'><i class='fas fa-trash'>";
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

    public function modal_edit_level2()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('level2');
        $level2 = $builder->where('id', $id)->get()->getRowArray();
        $data = [
            'data_level2' => $level2
        ];

        return $this->response->setJSON([view('admin/modal/editlevel2modal', $data)]);
    }

    public function edit_level2()
    {

        $id = $this->request->getVar('id');
        $level2 = $this->request->getVar('level2');
        $nama = $this->request->getVar('nama');
        // dd($newLink, $idLink, $newUraian);
        if (!$this->validate([
            'level2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level2 harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level2'));
        }

        $data = [
            'level2' => $level2,
            'nama' => $nama
        ];

        if ($this->level2Model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/v_level2'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diupdate');
            return redirect()->to(base_url('admineppid/v_level2'));
        };
    }

    public function modal_tambah_level2()
    {
        $db = db_connect();
        $builder = $db->table('level1');
        $level1 = $builder->get()->getResultArray();
        $data = [
            'level1' => $level1
        ];
        return $this->response->setJSON([view('admin/modal/modaltambahlevel2', $data)]);
    }

    public function cek_level2()
    {
        $level1 = $this->request->getVar('valueLevel1');

        $db = db_connect();
        $builder = $db->table('level2');
        $max_level2 = $builder->selectMax('level2')->where('level1', $level1)->get()->getRowArray();
        $max_level2 = $max_level2['level2'];
        $next_level2 = ++$max_level2;

        return $this->response->setJSON([$next_level2]);
    }

    public function tambah_level2()
    {
        $level1 = $this->request->getVar('level1');
        $level2 = $this->request->getVar('level2');
        $nama = $this->request->getVar('nama');

        if (!$this->validate([
            'level1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 1 harus diisi'
                ],
            ],
            'level2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 2 harus diisi'
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ],
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level2'));
        }

        $db = db_connect();
        $builder = $db->table('level2');
        $data_exist = $builder->where('level1', $level1)->where('level2', $level2)->countAllResults();

        if ($data_exist > 0) {
            session()->setFlashdata('fail', ['Data level1 :' . $level1 . ' dan data level2 : ' . $level2 . 'sudah ada']);
            return redirect()->to(base_url('admineppid/v_level2'));
        }

        $data = [
            'level1' => $level1,
            'level2' => $level2,
            'nama' => $nama
        ];

        if ($this->level2Model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('admineppid/v_level2'));
        } else {
            session()->setFlashdata('fail', 'Data gagal ditambahkan');
            return redirect()->to(base_url('admineppid/v_level2'));
        }
    }

    public function delete_level2()
    {
        $id = $this->request->getVar('id');
        if ($this->level2Model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
            return $this->response->setJSON(['msg' => 'fail']);
        };
    }

    public function v_level3()
    {
        $data = [
            'title' => 'Admin | Level3'
        ];

        return view('admin/level3', $data);
    }

    public function level3_datatable()
    {
        $request = Services::request();
        $datamodel = new Level3ModelDt($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->level1;
                $row[] = $list->level2;
                $row[] = $list->level3;
                $row[] = $list->nama;
                $row[] = "<a href='' class='btn btn-warning edit_btn' data-id=" . $list->id . " style='border-radius:50%'><i class='fas fa-edit'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " data-level1=" . $list->level1 . " data-level2=" . $list->level2 . " data-level3=" . $list->level3 . " style='border-radius:50%'><i class='fas fa-trash'>";
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

    public function modal_tambah_level3()
    {
        $db = db_connect();
        $builder = $db->table('level1');
        $level1 = $builder->get()->getResultArray();
        $data = [
            'level1' => $level1
        ];
        return $this->response->setJSON([view('admin/modal/modaltambahlevel3', $data)]);
    }

    public function tambah_level3()
    {
        $level1 = $this->request->getVar('level1');
        $level2 = $this->request->getVar('level2');
        $level3 = $this->request->getVar('level3');
        $nama = $this->request->getVar('nama');

        if (!$this->validate([
            'level1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 1 harus diisi'
                ],
            ],
            'level2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 2 harus diisi'
                ],
            ],
            'level3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 3 harus diisi'
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ],
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level3'));
        }

        $db = db_connect();
        $builder = $db->table('level3');
        $data_exist = $builder->where('level1', $level1)->where('level2', $level2)->where('level3', $level3)->countAllResults();

        if ($data_exist > 0) {
            session()->setFlashdata('fail', ['Data level1 :' . $level1 . ', data level2 : ' . $level2 . 'sudah ada' . ', data level3 : ' . $level3]);
            return redirect()->to(base_url('admineppid/v_level3'));
        }

        $data = [
            'level1' => $level1,
            'level2' => $level2,
            'level3' => $level3,
            'nama' => $nama
        ];

        if ($this->level3Model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('admineppid/v_level3'));
        } else {
            session()->setFlashdata('fail', 'Data gagal ditambahkan');
            return redirect()->to(base_url('admineppid/v_level3'));
        }
    }

    public function edit_level3()
    {

        $id = $this->request->getVar('id');
        $level3 = $this->request->getVar('level3');
        $nama = $this->request->getVar('nama');
        // dd($newLink, $idLink, $newUraian);
        if (!$this->validate([
            'level3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level3 harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_level3'));
        }

        $data = [
            'level3' => $level3,
            'nama' => $nama
        ];

        if ($this->level3Model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/v_level3'));
        } else {
            session()->setFlashdata('fail', 'Data gagal diupdate');
            return redirect()->to(base_url('admineppid/v_level3'));
        };
    }

    public function delete_level3()
    {
        $id = $this->request->getVar('id');
        if ($this->level3Model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', 'Data gagal dihapus');
            return $this->response->setJSON(['msg' => 'fail']);
        };
    }

    public function modal_edit_level3()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('level3');
        $level3 = $builder->where('id', $id)->get()->getRowArray();
        $data = [
            'data_level3' => $level3
        ];

        return $this->response->setJSON([view('admin/modal/editlevel3modal', $data)]);
    }

    public function level3_level2()
    {
        $level1 = $this->request->getVar('valueLevel1');
        $db = db_connect();
        $builder = $db->table('level2');
        $level2 = $builder->where('level1', $level1)->get()->getResultArray();

        return $this->response->setJSON($level2);
    }

    public function level3_level3()
    {
        $level1 = $this->request->getVar('valueLevel1');
        $level2 = $this->request->getVar('valueLevel2');
        $db = db_connect();
        $builder = $db->table('level3');
        $max_level3 = $builder->selectMax('level3')->where('level1', $level1)->where('level2', $level2)->get()->getRowArray();
        $max_level3 = $max_level3['level3'];
        $next_level3 = ++$max_level3;

        return $this->response->setJSON($next_level3);
    }

    public function tambah_link()
    {
        $db = db_connect();
        $builder = $db->table('level1');
        $level1 = $builder->get()->getResultArray();
        $data = [
            'title' => 'Admin | Tambah Link',
            'level1' => $level1
        ];
        return view('admin/tambah_link', $data);
    }

    public function list_level3()
    {
        $level1 = $this->request->getVar('valueLevel1');
        $level2 = $this->request->getVar('valueLevel2');
        $db = db_connect();
        $builder = $db->table('level3');
        $level3 = $builder->where('level1', $level1)->where('level2', $level2)->get()->getResultArray();

        return $this->response->setJSON($level3);
    }

    public function get_max_level4()
    {
        $level1 = $this->request->getVar('valueLevel1');
        $level2 = $this->request->getVar('valueLevel2');
        $level3 = $this->request->getVar('valueLevel3');
        $db = db_connect();
        $builder = $db->table('link_informasi');
        $max_level4 = $builder->selectMax('level4')->where('level1', $level1)->where('level2', $level2)->where('level3', $level3)->get()->getRowArray();
        $max_level4 = $max_level4['level4'];
        $next_level4 = ++$max_level4;

        return $this->response->setJSON($next_level4);
    }

    public function insert_link()
    {
        $level1 = $this->request->getVar('level1');
        $level2 = $this->request->getVar('level2');
        $level3 = $this->request->getVar('level3');
        $level4 = $this->request->getVar('level4');
        $uraian = $this->request->getVar('uraian');
        $link = $this->request->getVar('link');

        // return $this->response->setJSON([$level1, $level2, $level3]);

        if (!$this->validate([
            'level1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 1 harus diisi'
                ],
            ],
            'level2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 2 harus diisi'
                ],
            ],
            'level3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 3 harus diisi'
                ],
            ],
            // 'level4' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Level 4 harus diisi'
            //     ],
            // ],
            'uraian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian harus diisi'
                ],
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link harus diisi'
                ],
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['msg' => 'validasi']);
        }


        $jmldata = count($level1);
        for ($i = 0; $i < $jmldata; $i++) {
            $db = db_connect();
            $builder = $db->table('link_informasi');


            $max_data = $builder->selectMax('level4')
                ->where('level1', $level1[$i])
                ->where('level2', $level2[$i])
                ->where('level3', $level3[$i])
                ->get()
                ->getRowArray()['level4'];

            $max_data = (int)$max_data + 1;

            $this->linkModel->insert([
                'level1' => $level1[$i],
                'level2' => $level2[$i],
                'level3' => $level3[$i],
                'level4' => $max_data,
                'uraian' => $uraian[$i],
                'link' => $link[$i],
            ]);
        }
        session()->setFlashdata('success', "$jmldata Data berhasil ditambahkan");
        return $this->response->setJson(['msg' => 'sukses']);
    }

    public function v_profil_ppid()
    {
        $dataProfil = $this->profilPpidModel->first();
        $data = [
            'dataProfil' => $dataProfil
        ];
        return view('admin/v_profil_ppid', $data);
    }

    public function manipulate_profil_ppid()
    {
        $dataProfil = $this->profilPpidModel->first();
        if ($dataProfil != null) {
            $data = [
                'title' => 'Admin | Tambah Data Profil PPID',
                'jenisUpdate' => 'edit',
                'dataProfil' => $dataProfil
            ];
        } else {
            $data = [
                'title' => 'Admin | Tambah Data Profil PPID',
                'jenisUpdate' => 'insert'
            ];
        }

        return view('admin/manipulate-profil-ppid', $data);
    }

    public function upload_gambar_ckeditor()
    {


        if (!$this->validate([
            'upload' => [
                'rules' => 'ext_in[upload,png,jpg,jpeg]|is_image[upload]',
                'errors' => [

                    'is_image' => 'Bukan gambar',
                    'ext_in' => 'Jenis file salah'
                ]
            ]
        ])) {
            $data = [
                'uploaded' => false,
                'error' => $this->validation->getErrors()
            ];
        } else {
            $gambar = $this->request->getFile('upload');

            $name = $gambar->getRandomName();
            $dir = 'img/ckeditor';
            $gambar->move($dir, $name);

            $data = [
                'uploaded' => true,
                'url' => base_url('img/ckeditor/' . $name)
            ];
        }

        return $this->response->setJson($data);        // dd($profil, $tupoksi, $struktur, $visi_misi);
    }

    public function insert_profil_ppid()
    {
        if (!$this->validate([
            'profil' => [
                'rules' => 'required',
                'errors' => [
                    'Profil harus diisi'
                ]
            ],
            'tupoksi' => [
                'rules' => 'required',
                'errors' => [
                    'Tupoksi harus diisi'
                ]
            ],
            'struktur' => [
                'rules' => 'required',
                'errors' => [
                    'Struktur harus diisi'
                ]
            ],
            'visimisi' => [
                'rules' => 'required',
                'errors' => [
                    'Visi Misi harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['url' => base_url('admineppid/tambah_profil_ppid')]);
        };

        $jenis = $this->request->getVar('jenis');
        $id = $this->request->getVar('id');

        $dataPpid = [
            'profil' => $this->request->getVar('profil'),
            'tupoksi' => $this->request->getVar('tupoksi'),
            'struktur' => $this->request->getVar('struktur'),
            'visimisi' => $this->request->getVar('visimisi'),

        ];

        if ($jenis == 'insert') {

            if ($this->profilPpidModel->insert($dataPpid)) {
                session()->setFlashdata('success', 'Data PPID berhasil ditambahkan');
                return $this->response->setJSON(['url' => base_url('admineppid/v_profil_ppid')]);
            } else {
                session()->setFlashdata('fail', 'Data PPID gagal ditambahkan');
                return $this->response->setJSON(['url' => base_url('admineppid/manipulate_profil_ppid')]);
            }
        } else {
            if ($this->profilPpidModel->update($id, $dataPpid)) {
                session()->setFlashdata('success', 'Data PPID berhasil diupdate');
                return $this->response->setJSON(['url' => base_url('admineppid/v_profil_ppid')]);
            } else {
                session()->setFlashdata('fail', 'Data PPID gagal diupdate');
                return $this->response->setJSON(['url' => base_url('admineppid/manipulate_profil_ppid')]);
            }
        }
    }

    public function v_profil_satker()
    {
        $dataProfil = $this->profilSatkerModel->first();
        if ($dataProfil != null) {

            $data = [
                'title' => 'Admin | Profil Satker',
                'profilSatker' => $dataProfil
            ];
        } else {
            $data = [
                'title' => 'Admin | Profil Satker',
            ];
        }
        return view('admin/v_profil_satker', $data);
    }

    public function manipulate_profil_satker()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ],
            ],
            'nama_pendek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pendek harus diisi'
                ],
            ], 'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ],
            ], 'nomor_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi'
                ],
            ], 'nomor_whatsapp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor whatsapp harus diisi'
                ],
            ], 'telegram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telegram harus diisi'
                ],
            ], 'nomor_fax' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor fax harus diisi'
                ],
            ], 'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi'
                ],
            ], 'website' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Website harus diisi'
                ],
            ], 'youtube' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Youtube harus diisi'
                ],
            ],
            'facebook' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Facebook harus diisi'
                ],
            ], 'instagram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Instagram harus diisi'
                ],
            ],
            'embed_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video harus diisi'
                ],
            ],
            'logo' => [
                'rules' => 'ext_in[logo,png,jpg,jpeg]|is_image[logo]',
                'errors' => [
                    'ext_in' => 'Jenis file salah',
                    'is_image' => 'Yang anda upload bukan gambar'
                ],
            ],

        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_profil_satker'))->withInput();
        }

        $nama = $this->request->getVar('nama');
        $nama_pendek = $this->request->getVar('nama_pendek');
        $alamat = $this->request->getVar('alamat');
        $nomor_telepon = $this->request->getVar('nomor_telepon');
        $nomor_whatsapp = $this->request->getVar('nomor_whatsapp');
        $telegram = $this->request->getVar('telegram');
        $nomor_fax = $this->request->getVar('nomor_fax');
        $email = $this->request->getVar('email');
        $website = $this->request->getVar('website');
        $youtube = $this->request->getVar('youtube');
        $facebook = $this->request->getVar('facebook');
        $instagram = $this->request->getVar('instagram');
        $twitter = $this->request->getVar('twitter');
        $embed_id = $this->request->getVar('embed_id');
        $logo = $this->request->getFile('logo');
        $logo_lama = $this->request->getVar('logo-lama');
        $id = $this->request->getVar('id');

        if (isset($id)) {
            if ($logo->getError() == 4) {
                $namaLogo = $logo_lama;
            } else {
                unlink(ROOTPATH . 'public/img/' . $logo_lama);
                $namaBaru = 'logo-pn';
                $ext = $logo->guessExtension();
                $namaLogo = $namaBaru . '.' . $ext;

                $logo->move('img', $namaLogo);
            }
        } else {
            if (isset($logo)) {
                $namaBaru = 'logo-pn';
                $ext = $logo->guessExtension();
                $namaLogo = $namaBaru . '.' . $ext;

                $logo->move('img', $namaLogo);
            }
        }

        $dataInsert = [
            'nama' => $nama,
            'nama_pendek' => $nama_pendek,
            'alamat' => $alamat,
            'nomor_telepon' => $nomor_telepon,
            'nomor_whatsapp' => $nomor_whatsapp,
            'telegram' => $telegram,
            'nomor_fax' => $nomor_fax,
            'email' => $email,
            'link_satker' => $website,
            'link_youtube' => $youtube,
            'link_facebook' => $facebook,
            'link_instagram' => $instagram,
            'link_twitter' => $twitter,
            'link_video_dashboard' => $embed_id,
            'logo' => $namaLogo

        ];

        if (isset($id)) {
            $this->profilSatkerModel->update($id, $dataInsert);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('admineppid/v_profil_satker'));
        } else {
            $this->profilSatkerModel->insert($dataInsert);
            session()->setFlashdata('success', 'Data berhasil ditambah');
            return redirect()->to(base_url('admineppid/v_profil_satker'));
        }
    }

    public function daftar_permohonan()
    {

        $data = [
            'title' => 'Admin | Permohonan Masuk',
        ];

        return view('admin/permohonan-masuk', $data);
    }

    public function data_permohonan_datatable()
    {
        $request = Services::request();
        $datamodel = new PermohonanModelAdmin($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                if ($list->jawaban != null) {

                    $disabled = 'disabled';
                } else {
                    $disabled = '';
                };
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nomor_register;
                $row[] = $list->jenis_informasi;
                $row[] = $list->tanggal_permohonan;
                $row[] = $list->isi_permohonan;
                $row[] = $list->nama;
                $row[] = $list->user_email;
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
                $row[] = "<a href='' class='btn btn-warning reject_btn " . $disabled . "' data-id=" . $list->permohonan_id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Tolak'><i class='fas fa-eject'></i></a><a href='" . base_url('admineppid/download_ktp/' . $list->permohonan_id) . "'class='btn btn-info text-white' data-id='" . $list->permohonan_id . "' style='border-radius:50%' data-toggle='tooltip' data-placement='top' title='File KTP' target=_blank'><i class='fa fa-file'></i></a><a href='' class='btn btn-info accept_btn " . $disabled . "' data-id=" . $list->permohonan_id . " data-register=" . $list->nomor_register . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Proses'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " data-email=" . $list->user_email . " style='border-radius:50%'><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Hapus'></i></a>";
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

    public function modal_proses_permohonan()
    {
        $id = $this->request->getVar('id');
        $data_proses = $this->permohonanModel->find_data_proses($id);
        $email = $this->request->getVar('email');

        if (count($data_proses) > 0) {
            $data = [
                'title' => 'Admin | Proses Permohonan',
                'id' => $id,
                'data_proses' => $data_proses[0],
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        } else {
            $data = [
                'title' => 'Admin | Proses Permohonan',
                'id' => $id,
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        }

        return $this->response->setJSON([view('admin/modal/modalprosespermohonan', $data)]);
    }

    public function proses_permohonan()
    {
        $jawaban = $this->request->getVar('jawaban');
        $status = $this->request->getVar('status');
        $id = $this->request->getVar('id');
        $user_email = $this->request->getVar('email');
        $nomor_register = $this->request->getVar('nomor_register');
        $nomor_register = explode('/', $nomor_register);
        $nomor_register = implode('_', $nomor_register);
        $hapus_file = $this->request->getVar('hapus_file');
        $lampiran = $this->request->getFile('lampiran');


        if (!$this->validate([
            'jawaban' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban harus diisi'
                ]
            ],
            'lampiran' => [
                'rules' => 'ext_in[lampiran,pdf]',
                'errors' => [
                    'ext_in' => 'File permohonan salah'
                ]
            ]
        ])) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/daftar_permohonan');
        }

        if ($lampiran->isValid()) {
            $nama_lampiran = 'lampiran_jawaban_' . $nomor_register;
            $ext = $lampiran->getClientExtension();
            $nama_lampiran = $nama_lampiran . '.' . $ext;
            $nama_lampiran_base64 = base64_encode($nama_lampiran);
            if (file_exists(ROOTPATH . 'public/admin_file/' . $nama_lampiran)) {
                unlink(ROOTPATH . 'public/admin_file/' . $nama_lampiran);
                if ($hapus_file == 'T') {
                    $data_jawaban =  $jawaban . "#untuk lampirannya dapat didownload <a class='badge bg-info' href='" . base_url('admineppid/download_file_jawaban/' . $nama_lampiran_base64) . "' target='_blank'>disini</a>";
                } else {
                    $data_jawaban = $jawaban;
                }
            } else {
                $data_jawaban =  $jawaban . "#untuk lampirannya dapat didownload <a class='badge bg-info' href='" . base_url('admineppid/download_file_jawaban/' . $nama_lampiran_base64) . "' target='_blank'>disini</a>";
            }
            $lampiran->move('admin_file', $nama_lampiran);


            $data = [
                'proses' => 'Y',
                'status_jawaban' => $status,
                'jawaban' => $data_jawaban,
                'lampiran_jawaban' => $nama_lampiran
            ];
        } else if (!$lampiran->isValid() && $hapus_file == 'Y') {
            $data_jawaban = explode('#', $jawaban);
            $data_jawaban = $data_jawaban[0];
            // dd($data_jawaban);
            $data = [
                'proses' => 'Y',
                'status_jawaban' => $status,
                'jawaban' => $data_jawaban,
                // 'lampiran_jawaban' == '',
            ];
        } else {
            $data = [
                'proses' => 'Y',
                'status_jawaban' => $status,
                'jawaban' => $jawaban,
            ];
        }

        if ($this->permohonanModel->update_proses($id, $data)) {

            $data_permohonan = $this->permohonanModel->find_data($id);
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Jawaban atas permohonan informasi nomor : {$data_permohonan['nomor_register']}";
            $msg = "Halo {$data_permohonan['nama']}, permohonan Saudara/i dengan nomor register {$data_permohonan['nomor_register']} telah dijawab dengan jawaban sebagai berikut : {$data_permohonan['jawaban']}";
            $to = $data_permohonan['user_email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            $status_email  = lets_mail($subject, $msg, $recipients);


            session()->setFlashdata('success', 'Jawaban berhasil diinput, ' . $status_email);
            return redirect()->to('admineppid/daftar_permohonan');
        } else {
            session()->setFlashdata('fail', ['Jawaban gagal diinput']);
            return redirect()->to('admineppid/daftar_permohonan');
        }
    }

    public function modal_tolak_permohonan()
    {
        $id = $this->request->getVar('id');
        $data_proses = $this->permohonanModel->find_data_tolak($id);
        $email = $this->request->getVar('email');

        if (count($data_proses) > 0) {
            $data = [

                'id' => $id,
                'data_proses' => $data_proses[0],
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        } else {
            $data = [

                'id' => $id,
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        }

        return $this->response->setJSON([view('admin/modal/modaltolakpermohonan', $data)]);
    }

    public function tolak_permohonan()
    {
        $jenis = $this->request->getVar('jenis');
        $jawaban = $this->request->getVar('jawaban');

        $id = $this->request->getVar('id');
        $user_email = $this->request->getVar('email');

        if (!$this->validate([
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis penolakan harus diisi'
                ]
            ],
            'jawaban' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban harus diisi'
                ]
            ]
        ])) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/daftar_permohonan');
        }

        $data = [
            'proses' => 'T',
            'jenis_penolakan' => $jenis,
            'jawaban' => $jawaban,
        ];

        if ($this->permohonanModel->update_proses($id, $data, 'tolak')) {

            $data_permohonan = $this->permohonanModel->find_data($id);
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Penolakan permohonan informasi nomor : {$data_permohonan['nomor_register']}";
            $msg = "Halo {$data_permohonan['nama']}, permohonan Saudara/i dengan nomor register {$data_permohonan['nomor_register']} ditolak oleh karena : {$data_permohonan['jawaban']}";

            $to = $data_permohonan['user_email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            $status_email  = lets_mail($subject, $msg, $recipients);

            session()->setFlashdata('success', 'Jawaban berhasil diinput, ' . $status_email);
            return redirect()->to('admineppid/daftar_permohonan');
        } else {
            session()->setFlashdata('fail', ['Jawaban gagal diinput']);
            return redirect()->to('admineppid/daftar_permohonan');
        }
    }


    public function download_file_jawaban($base64_code)
    {

        $nama_file = base64_decode($base64_code);

        $client = Services::curlrequest();
        $file_jawaban = $client->send('GET', base_url('admin_file/' . $nama_file));

        return $file_jawaban;
    }

    public function delete_permohonan()
    {
        $id = $this->request->getVar('id');
        if ($this->permohonanModel->delete($id)) {
            session()->setFlashdata('success', 'Permohonan berhasil dihapus');
            return $this->response->setJSON(['success' => true]);
        } else {
            session()->setFlashdata('fail', 'Permohonan gagal dihapus');
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function daftar_keberatan()
    {

        $data = [
            'title' => 'Admin | Daftar Keberatan',
        ];

        return view('admin/daftar-keberatan', $data);
    }

    public function data_keberatan_datatable()
    {
        $request = Services::request();
        $datamodel = new KeberatanModelAdmin($request);
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
                $row[] = $list->nama;
                $row[] = $list->email;
                $row[] = $list->jawaban;
                $row[] = $list->jenis_keberatan;
                $row[] = $list->isi_keberatan;
                $row[] = $list->tanggapan;
                if ($list->status == "Proses verifikasi") {

                    $row[] = "<span class='badge bg-warning'>$list->status</span>";
                } else if ($list->status == "Sudah ditindaklanjuti") {
                    $row[] = "<span class='badge bg-success'>$list->status</span>";
                } else if ($list->status == "Pengajuan keberatan") {
                    $row[] = "<span class='badge bg-danger'>$list->status</span>";
                } else if ($list->status == "Permohonan ditolak") {
                    $row[] = "<span class='badge bg-secondary'>$list->status</span>";
                }
                $row[] = "<a href='' class='btn btn-info accept_btn " . $disabled . "' data-id=" . $list->keberatan_id . " data-register=" . $list->nomor_register . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Proses'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->permohonan_id . " data-nama=" . $list->nomor_register . " data-email=" . $list->email . " style='border-radius:50%'><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Hapus'></i></a>";
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

    public function modal_proses_keberatan()
    {
        $id = $this->request->getVar('id');
        $data_proses = $this->keberatanModel->find_keberatan($id);
        $email = $this->request->getVar('email');

        if ($data_proses) {
            $data = [
                'title' => 'Admin | Proses Keberatan',
                'id' => $data_proses['keberatan_id'],
                'data_proses' => $data_proses,
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        } else {
            $data = [
                'title' => 'Admin | Proses Keberatan',
                'id' => $data_proses['keberatan_id'],
                'nomor_register' => $this->request->getVar('nomor_register'),
                'email' => $email
            ];
        }

        return $this->response->setJSON([view('admin/modal/modalproseskeberatan', $data)]);
    }

    public function proses_keberatan()
    {

        $status = $this->request->getVar('status');
        $tanggapan = $this->request->getVar('tanggapan');
        $id = $this->request->getVar('id');
        // $data_keberatan = $this->keberatanModel->find_data($id);
        // dd($data_keberatan);

        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi'
                ]
            ]
        ])) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/daftar_keberatan');
        }

        $data = [
            'status' => $status,
            'tanggapan' => $tanggapan,
            'keberatan_id' => $id,
        ];
        if ($this->keberatanModel->proses_keberatan($id, $data)) {

            $data_keberatan = $this->keberatanModel->find_data($id, $data);
            $db = db_connect();
            $email_admin = $db->table('admin_auth')->select('email')->where('jabatan', 'admin')->get()->getRowArray();
            $email_kpt = $db->table('admin_auth')->select('email')->where('jabatan', 'Atasan PPID/KPT/WKPT')->get()->getRowArray();

            $subject = "Tanggapan atas keberatan permohonan informasi nomor : {$data_keberatan['nomor_register']}";
            $msg = "Halo {$data_keberatan['nama']}, , keberatan permohonan Saudara/i dengan nomor register permohonan informasi {$data_keberatan['nomor_register']} telah ditanggapi dengan tanggapan sebagai berikut : {$data_keberatan['tanggapan']}";
            $to = $data_keberatan['user_email'];
            $cc = $email_kpt['email'];
            $bcc = $email_admin['email'];
            $recipients = [$to, $cc, $bcc];
            $status_email  = lets_mail($subject, $msg, $recipients);


            session()->setFlashdata('success', 'Tanggapan berhasil diinput, ' . $status_email);
            return redirect()->to('admineppid/daftar_keberatan');
        } else {
            session()->setFlashdata('fail', ['Tanggapan gagal diinput']);
            return redirect()->to('admineppid/daftar_keberatan');
        }
    }

    public function count_permohonan_baru()
    {
        // this is sse server setting


        // if in hosting, use this setting
        // $this->response->setContentType('text/event-stream');
        // $this->response->setHeader('Cache-Control', 'no-cache');


        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');


        $db = db_connect();
        $builder = $db->table('permohonan');
        $data_baru = $builder->where('jawaban', null)->join('proses_permohonan', 'permohonan.id=proses_permohonan.permohonan_id', 'left')->countAllResults();

        echo "data: {$data_baru}\n\n";
        // ob_end_flush();
        flush();
    }

    public function count_keberatan_baru()
    {
        // this is sse server setting

        // if in hosting, use this setting
        // $this->response->setContentType('text/event-stream');
        // $this->response->setHeader('Cache-Control', 'no-cache');


        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');


        $db = db_connect();
        $builder = $db->table('keberatan');
        $data_baru = $builder->where('tanggapan', null)->join('proses_keberatan', 'keberatan.id=proses_keberatan.keberatan_id', 'left')->countAllResults();

        echo "data: {$data_baru}\n\n";
        // ob_end_flush();
        flush();
    }

    public function v_peraturan()
    {

        $data = [
            'title' => 'Admin | Daftar Peraturan',
        ];

        return view('admin/v_peraturan', $data);
    }

    public function data_peraturan_datatable()
    {
        $request = Services::request();
        $datamodel = new PeraturanModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nomor_peraturan;
                $row[] = $list->tentang;

                $row[] = "<a href='' class='btn btn-info edit_btn' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " data-nama=" . $list->nomor_peraturan . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
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

    public function tambah_peraturan()
    {
        $data = [
            'title' => 'Admin | Tambah peraturan'
        ];

        return view('admin/tambah_peraturan');
    }

    public function insert_peraturan()
    {
        $nomor = $this->request->getVar('nomor');
        $tentang = $this->request->getVar('tentang');

        if (!$this->validate([
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor peraturan harus diisi'
                ]
            ],
            'tentang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hal peraturan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['msg' => 'fail']);
        }

        $jumlah_input = count($nomor);
        for ($i = 0; $i < $jumlah_input; $i++) {
            $data = [
                'nomor_peraturan' => $nomor[$i],
                'tentang' => $tentang[$i]
            ];

            $this->peraturanModel->insert($data);
        }

        session()->setFlashdata('success', "{$jumlah_input} data berhasil diinput");
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function delete_peraturan()
    {

        $id = $this->request->getVar('id');
        $this->peraturanModel->delete($id);
        session()->setFlashdata('success', 'Peraturan berhasil dihapus');
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function modal_edit_peraturan()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('peraturan');
        $data_peraturan = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_peraturan' => $data_peraturan
        ];

        return $this->response->setJSON([view('admin/modal/editperaturan', $data)]);
    }

    public function edit_peraturan()
    {
        $nomor_peraturan = $this->request->getVar('nomor_peraturan');
        $tentang = $this->request->getVar('tentang');
        $id = $this->request->getVar('id');

        if (!$this->validate([
            'nomor_peraturan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor peraturan harus diisi'
                ]
            ],
            'tentang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hal peraturan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/daftar_peraturan');
        }

        $data = [
            'nomor_peraturan' => $nomor_peraturan,
            'tentang' => $tentang
        ];
        $db = db_connect();
        $builder = $db->table('peraturan');
        $builder->where('id', $id)->update($data);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('admineppid/v_peraturan');
    }

    public function v_standar_layanan()
    {

        $db = db_connect();
        $builder = $db->table('standar_layanan');
        $data_standar = $builder->get()->getRowArray();

        $data = [
            'title' => 'Admin | Daftar Peraturan',
            'data_standar' => $data_standar
        ];

        return view('admin/v_standar_layanan', $data);
    }

    public function data_standar_datatable()
    {
        $request = Services::request();
        $datamodel = new StandarModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->maklumat) . ">";
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->prosedur) . ">";
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->keberatan) . ">";
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->sengketa) . ">";
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->jalur) . ">";
                $row[] = "<img class ='img-fluid' src=" . base_url('admin_file/standar_layanan/' . $list->biaya) . ">";

                $row[] = "<a href='' class='btn btn-info edit_btn' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id . " style='border-radius:50%'><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Hapus'></i></a>";
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

    public function tambah_standar_layanan()
    {
        $data = [
            'title' => 'Admin | Tambah standar layanan'
        ];

        return view('admin/tambah_standar_layanan');
    }

    public function insert_standar_layanan()
    {

        $maklumat = $this->request->getFile('maklumat');
        $prosedur = $this->request->getFile('prosedur');
        $keberatan = $this->request->getFile('keberatan');
        $sengketa = $this->request->getFile('sengketa');
        $jalur = $this->request->getFile('jalur');
        $biaya = $this->request->getFile('biaya');

        // dd($maklumat);

        $data_validasi = [
            'maklumat' => $maklumat,
            'prosedur' => $prosedur,
            'keberatan' => $keberatan,
            'sengketa' => $sengketa,
            'jalur' => $jalur,
            'biaya' => $biaya,
        ];


        $this->validation->setRules([
            'maklumat' => [
                'rules' => 'uploaded[maklumat]|ext_in[maklumat,jpg,png]',
                'errors' => [
                    'uploaded' => 'Maklumat harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'prosedur' => [
                'rules' => 'uploaded[prosedur]|ext_in[prosedur,jpg,png]',
                'errors' => [
                    'uploaded' => 'Prosedur harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'keberatan' => [
                'rules' => 'uploaded[keberatan]|ext_in[keberatan,jpg,png]',
                'errors' => [
                    'uploaded' => 'Keberatan harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'sengketa' => [
                'rules' => 'uploaded[sengketa]|ext_in[sengketa,jpg,png]',
                'errors' => [
                    'uploaded' => 'Sengketa harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'jalur' => [
                'rules' => 'uploaded[jalur]|ext_in[jalur,jpg,png]',
                'errors' => [
                    'uploaded' => 'Jalur harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'biaya' => [
                'rules' => 'uploaded[biaya]|ext_in[biaya,jpg,png]',
                'errors' => [
                    'uploaded' => 'Biaya harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ]
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        }

        $nama_maklumat = 'maklumat-' . time() . '.' . $maklumat->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_maklumat)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_maklumat);
        }
        $maklumat->move('admin_file/standar_layanan', $nama_maklumat);

        $nama_prosedur = 'prosedur-' . time() . '.' . $prosedur->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_prosedur)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_prosedur);
        }
        $prosedur->move('admin_file/standar_layanan', $nama_prosedur);

        $nama_keberatan = 'keberatan-' . time() . '.' . $keberatan->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_keberatan)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_keberatan);
        }
        $keberatan->move('admin_file/standar_layanan', $nama_keberatan);

        $nama_sengketa = 'sengketa-' . time() . '.' . $sengketa->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_sengketa)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_sengketa);
        }
        $sengketa->move('admin_file/standar_layanan', $nama_sengketa);

        $nama_jalur = 'jalur-' . time() . '.' . $jalur->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_jalur)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_jalur);
        }
        $jalur->move('admin_file/standar_layanan', $nama_jalur);

        $nama_biaya = 'biaya-' . time() . '.' . $biaya->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_biaya)) {
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $nama_biaya);
        }
        $biaya->move('admin_file/standar_layanan', $nama_biaya);

        $data_insert = [
            'maklumat' => $nama_maklumat,
            'prosedur' => $nama_prosedur,
            'keberatan' => $nama_keberatan,
            'sengketa' => $nama_sengketa,
            'jalur' => $nama_jalur,
            'biaya' => $nama_biaya,
        ];


        if ($this->standarModel->insert($data_insert)) {
            session()->setFlashdata('success', "Standar layanan berhasil diinput");
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        } else {
            session()->setFlashdata('fail', ["Standar layanan gagal diinput"]);
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        }
    }

    public function modal_edit_standar()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('standar_layanan');
        $data_standar = $builder->get()->getRowArray();
        $data = [
            'data_standar' => $data_standar

        ];

        return $this->response->setJSON([view('admin/modal/editstandar', $data)]);
    }

    public function edit_standar_layanan()
    {


        $maklumat = $this->request->getFile('maklumat');
        $prosedur = $this->request->getFile('prosedur');
        $keberatan = $this->request->getFile('keberatan');
        $sengketa = $this->request->getFile('sengketa');
        $jalur = $this->request->getFile('jalur');
        $biaya = $this->request->getFile('biaya');
        $maklumat_lama = $this->request->getVar('maklumat_lama');
        $prosedur_lama = $this->request->getVar('prosedur_lama');
        $keberatan_lama = $this->request->getVar('keberatan_lama');
        $sengketa_lama = $this->request->getVar('sengketa_lama');
        $jalur_lama = $this->request->getVar('jalur_lama');
        $biaya_lama = $this->request->getVar('biaya_lama');
        $id = $this->request->getVar('id');

        $data_validasi = [
            'maklumat' => $maklumat,
            'prosedur' => $prosedur,
            'keberatan' => $keberatan,
            'sengketa' => $sengketa,
            'jalur' => $jalur,
            'biaya' => $biaya,
        ];


        $this->validation->setRules([
            'maklumat' => [
                'rules' => 'ext_in[maklumat,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'prosedur' => [
                'rules' => 'ext_in[prosedur,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'keberatan' => [
                'rules' => 'ext_in[keberatan,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'sengketa' => [
                'rules' => 'ext_in[sengketa,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'jalur' => [
                'rules' => 'ext_in[jalur,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'biaya' => [
                'rules' => 'ext_in[biaya,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ]
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        }

        if (!$maklumat->getError() == 4) {
            $nama_maklumat = 'maklumat-' . time() . '.' . $maklumat->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $maklumat_lama);
            $maklumat->move('admin_file/standar_layanan', $nama_maklumat);
        } else {
            $nama_maklumat = $maklumat_lama;
        }
        if (!$prosedur->getError() == 4) {
            $nama_prosedur = 'prosedur-' . time() . '.' . $prosedur->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $prosedur_lama);
            $prosedur->move('admin_file/standar_layanan', $nama_prosedur);
        } else {
            $nama_prosedur = $prosedur_lama;
        }
        if (!$keberatan->getError() == 4) {
            $nama_keberatan = 'keberatan-' . time() . '.' . $keberatan->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $keberatan_lama);
            $keberatan->move('admin_file/standar_layanan', $nama_keberatan);
        } else {
            $nama_keberatan = $keberatan_lama;
        }
        if (!$sengketa->getError() == 4) {
            $nama_sengketa = 'sengketa-' . time() . '.' . $sengketa->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $sengketa_lama);
            $sengketa->move('admin_file/standar_layanan', $nama_sengketa);
        } else {
            $nama_sengketa = $sengketa_lama;
        }
        if (!$jalur->getError() == 4) {
            $nama_jalur = 'jalur-' . time() . '.' . $jalur->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $jalur_lama);
            $jalur->move('admin_file/standar_layanan', $nama_jalur);
        } else {
            $nama_jalur = $jalur_lama;
        }
        if (!$biaya->getError() == 4) {
            $nama_biaya = 'biaya-' . time() . '.' . $biaya->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/standar_layanan/' . $biaya_lama);
            $biaya->move('admin_file/standar_layanan', 'biaya.' . $nama_biaya);
        } else {
            $nama_biaya = $biaya_lama;
        }

        $data_insert = [
            'maklumat' => $nama_maklumat,
            'prosedur' => $nama_prosedur,
            'keberatan' => $nama_keberatan,
            'sengketa' => $nama_sengketa,
            'jalur' => $nama_jalur,
            'biaya' => $nama_biaya,
        ];


        if ($this->standarModel->update($id, $data_insert)) {
            session()->setFlashdata('success', "Standar layanan berhasil diubah");
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        } else {
            session()->setFlashdata('fail', ["Standar layanan gagal diubah"]);
            return redirect()->to(base_url('admineppid/v_standar_layanan'));
        }
    }

    public function v_statistik()
    {

        // $db = db_connect();
        // $builder = $db->table('');
        // $data_standar = $builder->get()->getRowArray();

        $data_statistik = $this->statistikModel->orderBy('id', 'desc')->findAll();

        $data = [
            'title' => 'Laporan Informasi',
            'data_statistik' => $data_statistik
        ];

        return view('admin/v_statistik', $data);
    }

    public function tambah_statistik()
    {
        $data = [
            'title' => 'Laporan Informasi',
        ];

        return view('admin/tambah_statistik', $data);
    }

    public function insert_statistik()
    {

        $tahun = $this->request->getVar('tahun');
        $statistik = $this->request->getFile('statistik');
        $rekapitulasi = $this->request->getFile('rekapitulasi');

        // dd($maklumat);

        $data_validasi = [
            'tahun' => $tahun,
            'statistik' => $statistik,
            'rekapitulasi' => $rekapitulasi,
        ];


        $this->validation->setRules([
            'tahun' => [
                'rules' => 'required|is_unique[statistik_permohonan.tahun]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'is_unique' => 'Data tahun ini sudah ada'
                ]
            ],
            'statistik' => [
                'rules' => 'uploaded[statistik]|ext_in[statistik,jpg,png]',
                'errors' => [
                    'uploaded' => 'Statistik harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'rekapitulasi' => [
                'rules' => 'uploaded[rekapitulasi]|ext_in[rekapitulasi,jpg,png]',
                'errors' => [
                    'uploaded' => 'Rekapitulasi harus diisi',
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/tambah_statistik'));
        }

        $nama_statistik = 'statistik-' . time() . '.' . $statistik->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/statistik/' . $nama_statistik)) {
            unlink(ROOTPATH . 'public/admin_file/statistik/' . $nama_statistik);
        }
        $statistik->move('admin_file/statistik', $nama_statistik);

        $nama_rekapitulasi = 'rekapitulasi-' . time() . '.' . $rekapitulasi->getClientExtension();
        if (file_exists(ROOTPATH . 'public/admin_file/statistik/' . $nama_rekapitulasi)) {
            unlink(ROOTPATH . 'public/admin_file/statistik/' . $nama_rekapitulasi);
        }
        $rekapitulasi->move('admin_file/statistik', $nama_rekapitulasi);



        $data_insert = [
            'tahun' => $tahun,
            'statistik' => $nama_statistik,
            'rekapitulasi' => $nama_rekapitulasi,

        ];


        if ($this->statistikModel->insert($data_insert)) {
            session()->setFlashdata('success', "Data statistik berhasil diinput");
            return redirect()->to(base_url('admineppid/v_statistik'));
        } else {
            session()->setFlashdata('fail', ["statistik gagal diinput"]);
            return redirect()->to(base_url('admineppid/v_statistik'));
        }
    }

    public function modal_edit_statistik()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        $builder = $db->table('statistik_permohonan');
        $data_statistik = $builder->where('id', $id)->get()->getRowArray();
        $data = [
            'data_statistik' => $data_statistik

        ];

        return $this->response->setJSON([view('admin/modal/editstatistik', $data)]);
    }

    public function edit_statistik()
    {


        $statistik = $this->request->getFile('statistik');
        $rekapitulasi = $this->request->getFile('rekapitulasi');
        $id = $this->request->getVar('id');
        $statistik_lama = $this->request->getVar('statistik_lama');
        $rekapitulasi_lama = $this->request->getVar('rekapitulasi_lama');

        $data_validasi = [
            'statistik' => $statistik,
            'rekapitulasi' => $rekapitulasi,

        ];


        $this->validation->setRules([
            'statistik' => [
                'rules' => 'ext_in[statistik,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ],
            'rekapitulasi' => [
                'rules' => 'ext_in[rekapitulasi,jpg,png]',
                'errors' => [
                    'ext_in' => 'File harus jpg atau png'
                ]
            ]
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_statistik'));
        }

        if (!$statistik->getError() == 4) {
            $nama_statistik = 'statistik-' . time() . '.' . $statistik->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/statistik/' . $statistik_lama);
            $statistik->move('admin_file/statistik', $nama_statistik);
        } else {
            $nama_statistik = $statistik_lama;
        }
        if (!$rekapitulasi->getError() == 4) {
            $nama_rekapitulasi = 'rekapitulasi-' . time() . '.' . $rekapitulasi->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/statistik/' . $rekapitulasi_lama);
            $rekapitulasi->move('admin_file/statistik', $nama_rekapitulasi);
        } else {
            $nama_rekapitulasi = $rekapitulasi_lama;
        }


        $data_insert = [
            'statistik' => $nama_statistik,
            'rekapitulasi' => $nama_rekapitulasi,
        ];


        if ($this->statistikModel->update($id, $data_insert)) {
            session()->setFlashdata('success', "Statistik berhasil diubah");
            return redirect()->to(base_url('admineppid/v_statistik'));
        } else {
            session()->setFlashdata('fail', ["Statistik gagal diubah"]);
            return redirect()->to(base_url('admineppid/v_statistik'));
        }
    }


    public function delete_statistik()
    {
        $id = $this->request->getVar('id');
        $data_statistik = $this->statistikModel->find($id);

        unlink(ROOTPATH . 'public/admin_file/statistik/' . $data_statistik['statistik']);
        unlink(ROOTPATH . 'public/admin_file/statistik/' . $data_statistik['rekapitulasi']);

        $this->statistikModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function v_laporan_layanan()
    {

        // $db = db_connect();
        // $builder = $db->table('');
        // $data_standar = $builder->get()->getRowArray();

        $data_laporan = $this->laporanModel->orderBy('tahun', 'desc')->findAll();

        $data = [
            'title' => 'Laporan Informasi',
            'data_laporan' => $data_laporan
        ];

        return view('admin/v_laporan_layanan', $data);
    }

    public function tambah_laporan()
    {
        $data = [
            'title' => 'Laporan Informasi',
        ];

        return view('admin/tambah_laporan', $data);
    }

    public function insert_laporan()
    {

        $tahun = $this->request->getVar('tahun');
        $laporan = $this->request->getFile('laporan');

        $data_validasi = [
            'tahun' => $tahun,
            'laporan' => $laporan,
        ];


        $this->validation->setRules([
            'tahun' => [
                'rules' => 'required|is_unique[laporan_layanan.tahun]',
                'errors' => [
                    'required' => 'Tahun harus diisi',
                    'is_unique' => 'Data tahun ini sudah ada'
                ]
            ],
            'laporan' => [
                'rules' => 'uploaded[laporan]|ext_in[laporan,pdf]',
                'errors' => [
                    'uploaded' => 'laporan harus diisi',
                    'ext_in' => 'File harus pdf'
                ]
            ]
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/tambah_laporan'));
        }

        $nama_laporan = 'laporan-' . time() . '.' . $laporan->getClientExtension();

        $laporan->move('admin_file/laporan', $nama_laporan);

        $data_insert = [
            'tahun' => $tahun,
            'laporan' => $nama_laporan,

        ];


        if ($this->laporanModel->insert($data_insert)) {
            session()->setFlashdata('success', "Data laporan berhasil diinput");
            return redirect()->to(base_url('admineppid/v_laporan_layanan'));
        } else {
            session()->setFlashdata('fail', ["laporan gagal diinput"]);
            return redirect()->to(base_url('admineppid/v_laporan_layanan'));
        }
    }

    public function modal_edit_laporan()
    {
        $id = $this->request->getVar('id');
        // $db = db_connect();
        // $builder = $db->table('statistik_permohonan');
        // $data_statistik = $builder->where('id', $id)->get()->getRowArray();

        $data_laporan = $this->laporanModel->find($id);

        $data = [
            'data_laporan' => $data_laporan

        ];

        return $this->response->setJSON([view('admin/modal/editlaporan', $data)]);
    }

    public function edit_laporan()
    {

        $laporan = $this->request->getFile('laporan');
        $id = $this->request->getVar('id');
        $laporan_lama = $this->request->getVar('laporan_lama');

        $data_validasi = [
            'laporan' => $laporan,

        ];


        $this->validation->setRules([
            'laporan' => [
                'rules' => 'ext_in[laporan,pdf]',
                'errors' => [
                    'ext_in' => 'File harus pdf'
                ]
            ]
        ]);

        if (!$this->validation->run($data_validasi)) {

            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to(base_url('admineppid/v_laporan_layanan'));
        }

        if (!$laporan->getError() == 4) {
            $nama_laporan = 'laporan-' . time() . '.' . $laporan->getClientExtension();
            unlink(ROOTPATH . 'public/admin_file/laporan/' . $laporan_lama);
            $laporan->move('admin_file/laporan', $nama_laporan);
        } else {
            $nama_laporan = $laporan_lama;
        }


        $data_insert = [
            'laporan' => $nama_laporan,
        ];


        if ($this->laporanModel->update($id, $data_insert)) {
            session()->setFlashdata('success', "Data Laporan berhasil diubah");
            return redirect()->to(base_url('admineppid/v_laporan_layanan'));
        } else {
            session()->setFlashdata('fail', ["Data laporan gagal diubah"]);
            return redirect()->to(base_url('admineppid/v_laporan_layanan'));
        }
    }

    public function delete_laporan()
    {
        $id = $this->request->getVar('id');
        $data_laporan = $this->laporanModel->find($id);

        unlink(ROOTPATH . 'public/admin_file/laporan/' . $data_laporan['laporan']);

        $this->laporanModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function file_check_laporan($nama_file)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->send('GET', base_url('admin_file/laporan/' . $nama_file));
        // $body = $response->getBody();

        return $response;
    }

    public function v_prasyarat()
    {
        $data_prasyarat = $this->prasyaratModel->first();
        $data = [
            'data_prasyarat' => $data_prasyarat
        ];
        return view('admin/v_prasyarat', $data);
    }

    public function manipulate_prasyarat()
    {
        $data_prasyarat = $this->prasyaratModel->first();
        if ($data_prasyarat != null) {
            $data = [
                'title' => 'Admin | Footer',
                'jenisUpdate' => 'edit',
                'data_prasyarat' => $data_prasyarat
            ];
        } else {
            $data = [
                'title' => 'Admin | Footer',
                'jenisUpdate' => 'insert'
            ];
        }

        return view('admin/manipulate-prasyarat', $data);
    }

    public function insert_prasyarat()
    {
        if (!$this->validate([
            'prasyarat' => [
                'rules' => 'required',
                'errors' => [
                    'Prasyarat harus diisi'
                ]
            ],
            'hubungi_kami' => [
                'rules' => 'required',
                'errors' => [
                    'Hubungi kami harus diisi'
                ]
            ],
            'faq' => [
                'rules' => 'required',
                'errors' => [
                    'Faq harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['url' => base_url('admineppid/tambah_prasyarat')]);
        };

        $jenis = $this->request->getVar('jenis');
        $id = $this->request->getVar('id');

        $data_prasyarat = [
            'prasyarat' => $this->request->getVar('prasyarat'),
            'hubungi_kami' => $this->request->getVar('hubungi_kami'),
            'faq' => $this->request->getVar('faq'),
        ];

        if ($jenis == 'insert') {

            if ($this->prasyaratModel->insert($data_prasyarat)) {
                session()->setFlashdata('success', 'Data prasyarat berhasil ditambahkan');
                return $this->response->setJSON(['url' => base_url('admineppid/v_prasyarat')]);
            } else {
                session()->setFlashdata('fail', 'Data PPID gagal ditambahkan');
                return $this->response->setJSON(['url' => base_url('admineppid/manipulate_prasyarat')]);
            }
        } else {
            if ($this->prasyaratModel->update($id, $data_prasyarat)) {
                session()->setFlashdata('success', 'Data PPID berhasil diupdate');
                return $this->response->setJSON(['url' => base_url('admineppid/v_prasyarat')]);
            } else {
                session()->setFlashdata('fail', 'Data PPID gagal diupdate');
                return $this->response->setJSON(['url' => base_url('admineppid/manipulate_prasyarat')]);
            }
        }
    }

    public function v_link_terkait()
    {

        $data = [
            'title' => 'Admin | Footer',
        ];

        return view('admin/v_link_terkait', $data);
    }

    public function data_link_terkait_datatable()
    {
        $request = Services::request();
        $datamodel = new LinkterkaitModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->alias;
                $row[] = $list->link;

                $row[] = "<a href='' class='btn btn-info edit_btn' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id .  " style='border-radius:50%'><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Hapus'></i></a>";
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

    public function tambah_link_terkait()
    {
        $data = [
            'title' => 'Admin | Tambah link terkait'
        ];

        return view('admin/tambah_link_terkait');
    }

    public function insert_link_terkait()
    {
        $alias = $this->request->getVar('alias');
        $link = $this->request->getVar('link');

        if (!$this->validate([
            'alias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alias peraturan harus diisi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['msg' => 'fail']);
        }

        $jumlah_input = count($alias);
        for ($i = 0; $i < $jumlah_input; $i++) {
            $data = [
                'alias' => $alias[$i],
                'link' => $link[$i]
            ];

            $this->linkterkaitModel->insert($data);
        }

        session()->setFlashdata('success', "{$jumlah_input} data berhasil diinput");
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function delete_link_terkait()
    {

        $id = $this->request->getVar('id');
        $this->linkterkaitModel->delete($id);
        session()->setFlashdata('success', 'Link berhasil dihapus');
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function modal_edit_link_terkait()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('link_terkait');
        $data_link = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_link' => $data_link
        ];

        return $this->response->setJSON([view('admin/modal/editlinkterkait', $data)]);
    }

    public function edit_link_terkait()
    {
        $alias = $this->request->getVar('alias');
        $link = $this->request->getVar('link');
        $id = $this->request->getVar('id');

        if (!$this->validate([
            'alias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alias harus diisi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/v_link_terkait');
        }

        $data = [
            'alias' => $alias,
            'link' => $link
        ];
        $db = db_connect();
        $builder = $db->table('link_terkait');
        $builder->where('id', $id)->update($data);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('admineppid/v_link_terkait');
    }

    public function v_layanan_elektronik()
    {

        $data = [
            'title' => 'Admin | Footer',
        ];

        return view('admin/v_layanan_elektronik', $data);
    }

    public function data_layanan_elektronik_datatable()
    {
        $request = Services::request();
        $datamodel = new LayananelektronikModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->alias;
                $row[] = $list->link;

                $row[] = "<a href='' class='btn btn-info edit_btn' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id .  " style='border-radius:50%'><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Hapus'></i></a>";
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

    public function tambah_layanan_elektronik()
    {
        $data = [
            'title' => 'Admin | Tambah layanan elektronik'
        ];

        return view('admin/tambah_layanan_elektronik');
    }

    public function insert_layanan_elektronik()
    {
        $alias = $this->request->getVar('alias');
        $link = $this->request->getVar('link');

        if (!$this->validate([
            'alias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alias peraturan harus diisi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return $this->response->setJSON(['msg' => 'fail']);
        }

        $jumlah_input = count($alias);
        for ($i = 0; $i < $jumlah_input; $i++) {
            $data = [
                'alias' => $alias[$i],
                'link' => $link[$i]
            ];

            $this->layananelektronikModel->insert($data);
        }

        session()->setFlashdata('success', "{$jumlah_input} data berhasil diinput");
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function modal_edit_layanan_elektronik()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('layanan_elektronik');
        $data_link = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_link' => $data_link
        ];

        return $this->response->setJSON([view('admin/modal/editlayananelektronik', $data)]);
    }

    public function edit_layanan_elektronik()
    {
        $alias = $this->request->getVar('alias');
        $link = $this->request->getVar('link');
        $id = $this->request->getVar('id');

        if (!$this->validate([
            'alias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alias harus diisi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('fail', $this->validation->getErrors());
            return redirect()->to('admineppid/v_layanan_elektronik');
        }

        $data = [
            'alias' => $alias,
            'link' => $link
        ];
        $db = db_connect();
        $builder = $db->table('layanan_elektronik');
        $builder->where('id', $id)->update($data);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('admineppid/v_layanan_elektronik');
    }

    public function delete_layanan_elektronik()
    {

        $id = $this->request->getVar('id');
        $this->layananelektronikModel->delete($id);
        session()->setFlashdata('success', 'Link berhasil dihapus');
        return $this->response->setJSON(['msg' => 'success']);
    }

    public function v_admin()
    {

        return view('admin/v_admin');
    }

    public function data_admin_datatable()
    {
        $request = Services::request();
        $datamodel = new AdminauthModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $none = ($list->jabatan == 'admin') ? 'd-none' : '';
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama;
                $row[] = $list->nip;
                $row[] = $list->jabatan;
                $row[] = $list->email;
                $row[] = "<img class='img-fluid' src='" . base_url('admin/img_profile/' . $list->foto_profil) . "' width='80vh'>";

                $row[] = "<a href='' class='btn btn-info edit_btn " . $none . "' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn " . $none . "' data-id=" . $list->id . " data-foto=" . $list->foto_profil . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
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

    public function tambah_admin()
    {

        return view('admin/tambah_admin');
    }

    public function modal_edit_admin()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('admin_auth');
        $data_admin = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_admin' => $data_admin
        ];

        return $this->response->setJSON([view('admin/modal/editadmin', $data)]);
    }

    public function v_user()
    {

        return view('admin/v_user');
    }

    public function data_user_datatable()
    {
        $request = Services::request();
        $datamodel = new UserauthModelDT($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nik;
                $row[] = $list->nama;
                $row[] = $list->email;
                $row[] = $list->nomor_telepon;
                $row[] = $list->alamat;
                $row[] = $list->pekerjaan;
                $row[] = $list->institusi;
                $row[] = "<a href='' class='btn btn-info edit_btn' data-id=" . $list->id . " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Edit'><i class='fas fa-check-square'></i></a><a href='" . base_url('admineppid/download_user_ktp/' . $list->id) . "'class='btn btn-info text-white' data-id='" . $list->id . "' style='border-radius:50%' data-toggle='tooltip' data-placement='top' title='File KTP' target=_blank'><i class='fa fa-file'></i></a><a href='' class='btn btn-danger delete_btn' data-id=" . $list->id .
                    " style='border-radius:50%' data-toggle='tooltip' data-placement='bottom' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
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

    public function tambah_user()
    {

        return view('admin/tambah_user');
    }

    public function modal_edit_user()
    {
        $id = $this->request->getVar('id');

        $db = db_connect();
        $builder = $db->table('user_profil');
        $data_user = $builder->where('id', $id)->get()->getRowArray();

        $data = [
            'data_user' => $data_user
        ];

        return $this->response->setJSON([view('admin/modal/edituser', $data)]);
    }

    public function modal_cetak_lap_permohonan()
    {

        return $this->response->setJSON([view('admin/modal/cetaklaporanpermohonan')]);
    }

    public function cetak_laporan_permohonan()
    {
        helper('idndate_helper');

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $kota = $this->request->getVar('kota');
        $tanggal = $this->request->getVar('tanggal');
        $helper_bulan = idndate($tahun . '-' . $bulan . '-1');
        $tanggal = idndate($tanggal);

        $jmlPermohonanPerkara = $this->permohonanModel->get_data_permohonan_perkara($bulan, $tahun);
        $jmlPermohonanKepegawaian = $this->permohonanModel->get_data_permohonan_kepegawaian($bulan, $tahun);
        $jmlPermohonanPengawasan = $this->permohonanModel->get_data_permohonan_pengawasan($bulan, $tahun);
        $jmlPermohonanAnggaran = $this->permohonanModel->get_data_permohonan_anggaran($bulan, $tahun);
        $jmlPermohonanLainnya = $this->permohonanModel->get_data_permohonan_lainnya($bulan, $tahun);

        $pejabat = $this->adminauthModel->get_data_ttd();

        $data = [
            'jml_permohonan_perkara' => $jmlPermohonanPerkara,
            'jml_permohonan_kepegawaian' => $jmlPermohonanKepegawaian,
            'jml_permohonan_pengawasan' => $jmlPermohonanPengawasan,
            'jml_permohonan_anggaran' => $jmlPermohonanAnggaran,
            'jml_permohonan_lainnya' => $jmlPermohonanLainnya,
            'bulan' => $helper_bulan['bln'],
            'tahun' => $tahun,
            'panitera' => $pejabat['PPID_Kepaniteraan'],
            'sekretaris' => $pejabat['PPID_Kesekretariatan'],
            'kota' => $kota,
            'tanggal' => $tanggal['tanggal'],
        ];

        $cetak = view('admin/laporanpermohonan', $data);

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


        $mpdf->WriteHTML($cetak);
        $this->response->setContentType('application/pdf');

        $mpdf->Output("data.pdf", "I");
    }

    public function modal_cetak_lap_keberatan()
    {

        return $this->response->setJSON([view('admin/modal/cetaklaporankeberatan')]);
    }

    public function cetak_laporan_keberatan()
    {
        helper('idndate_helper');

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $kota = $this->request->getVar('kota');
        $tanggal = $this->request->getVar('tanggal');
        $helper_bulan = idndate($tahun . '-' . $bulan . '-1');
        $tanggal = idndate($tanggal);

        $perk_sengketa =  $this->request->getVar('perk_sengketa');
        $perk_berhasil =  $this->request->getVar('perk_berhasil');
        $perk_gagal =  $this->request->getVar('perk_gagal');
        $perk_menguatkan =  $this->request->getVar('perk_menguatkan');
        $perk_menolak =  $this->request->getVar('perk_menolak');

        $komisiPerkara = [$perk_sengketa, $perk_berhasil, $perk_gagal, $perk_menguatkan, $perk_menolak];

        $kepeg_sengketa =  $this->request->getVar('kepeg_sengketa');
        $kepeg_berhasil =  $this->request->getVar('kepeg_berhasil');
        $kepeg_gagal =  $this->request->getVar('kepeg_gagal');
        $kepeg_menguatkan =  $this->request->getVar('kepeg_menguatkan');
        $kepeg_menolak =  $this->request->getVar('kepeg_menolak');

        $komisiKepegawaian = [$kepeg_sengketa, $kepeg_berhasil, $kepeg_gagal, $kepeg_menguatkan, $kepeg_menolak];

        $peng_sengketa =  $this->request->getVar('peng_sengketa');
        $peng_berhasil =  $this->request->getVar('peng_berhasil');
        $peng_gagal =  $this->request->getVar('peng_gagal');
        $peng_menguatkan =  $this->request->getVar('peng_menguatkan');
        $peng_menolak =  $this->request->getVar('peng_menolak');

        $komisiPengawasan = [$peng_sengketa, $peng_berhasil, $peng_gagal, $peng_menguatkan, $peng_menolak];

        $ang_sengketa =  $this->request->getVar('ang_sengketa');
        $ang_berhasil =  $this->request->getVar('ang_berhasil');
        $ang_gagal =  $this->request->getVar('ang_gagal');
        $ang_menguatkan =  $this->request->getVar('ang_menguatkan');
        $ang_menolak =  $this->request->getVar('ang_menolak');

        $komisiAnggaran = [$ang_sengketa, $ang_berhasil, $ang_gagal, $ang_menguatkan, $ang_menolak];

        $lain_sengketa =  $this->request->getVar('lain_sengketa');
        $lain_berhasil =  $this->request->getVar('lain_berhasil');
        $lain_gagal =  $this->request->getVar('lain_gagal');
        $lain_menguatkan =  $this->request->getVar('lain_menguatkan');
        $lain_menolak =  $this->request->getVar('lain_menolak');

        $komisiLainnya = [$lain_sengketa, $lain_berhasil, $lain_gagal, $lain_menguatkan, $lain_menolak];

        $jmlKeberatanPerkara = $this->keberatanModel->get_data_keberatan_perkara($bulan, $tahun);
        $jmlKeberatanKepegawaian = $this->keberatanModel->get_data_keberatan_kepegawaian($bulan, $tahun);
        $jmlKeberatanPengawasan = $this->keberatanModel->get_data_keberatan_pengawasan($bulan, $tahun);

        $jmlKeberatanAnggaran = $this->keberatanModel->get_data_keberatan_anggaran($bulan, $tahun);
        $jmlKeberatanLainnya = $this->keberatanModel->get_data_keberatan_lainnya($bulan, $tahun);
        $pejabat = $this->adminauthModel->get_data_ttd();

        $data = [
            'jml_keberatan_perkara' => $jmlKeberatanPerkara,
            'komisi_perkara' => $komisiPerkara,
            'komisi_kepegawaian' => $komisiKepegawaian,
            'komisi_pengawasan' => $komisiPengawasan,
            'komisi_anggaran' => $komisiAnggaran,
            'komisi_lainnya' => $komisiLainnya,
            'jml_keberatan_kepegawaian' => $jmlKeberatanKepegawaian,
            'jml_keberatan_pengawasan' => $jmlKeberatanPengawasan,
            'jml_keberatan_anggaran' => $jmlKeberatanAnggaran,
            'jml_keberatan_lainnya' => $jmlKeberatanLainnya,
            'bulan' => $helper_bulan['bln'],
            'tahun' => $tahun,
            'panitera' => $pejabat['PPID_Kepaniteraan'],
            'sekretaris' => $pejabat['PPID_Kesekretariatan'],
            'kota' => $kota,
            'tanggal' => $tanggal['tanggal'],
        ];

        $cetak = view('admin/laporankeberatan', $data);

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


        $mpdf->WriteHTML($cetak);
        $this->response->setContentType('application/pdf');

        $mpdf->Output("data.pdf", "I");
    }

    public function download_ktp($id)
    {
        $db = db_connect();
        $data = $db->table('permohonan p')->select('ktp')->join('user_profil up', 'p.email=up.email')->where('p.id', $id)->get()->getRowArray()['ktp'];
        // dd($data);
        if ($data) {

            $client = Services::curlrequest();
            $user_file = $client->send('GET', base_url('ktp/' . $data));

            return $user_file;
        } else {
            echo "file not exist";
        }
    }

    public function download_user_ktp($id)
    {
        $db = db_connect();
        $data = $db->table('user_profil p')->select('ktp')->where('p.id', $id)->get()->getRowArray()['ktp'];
        // dd($data);
        if ($data) {

            $client = Services::curlrequest();
            $user_file = $client->send('GET', base_url('ktp/' . $data));

            return $user_file;
        } else {
            echo "file not exist";
        }
    }
}
