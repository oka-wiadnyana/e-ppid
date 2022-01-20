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
        $this->validation = Services::validation();
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
            'level4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level 4 harus diisi'
                ],
            ],
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

            $max_data = ++$max_data;



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
}
