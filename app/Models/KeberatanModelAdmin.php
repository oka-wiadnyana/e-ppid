<?php

namespace App\Models;

use CodeIgniter\Model;

class KeberatanModelAdmin extends Model
{

    protected $table            = 'keberatan';
    protected $allowedFields    = ['permohonan_id', 'jenis_keberatan_id', 'tanggal_keberatan', 'isi_keberatan', 'email', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $column_order = array(null, 'nomor_register', 'tanggal_keberatan', 'nama', 'keberatan.email', 'jawaban', 'jenis_keberatan', 'isi_keberatan', 'keberatan.status', 'tanggapan');
    protected $column_search = array('tanggal_keberatan', 'nama', 'keberatan.email', 'jawaban', 'jenis_keberatan', 'isi_keberatan', 'keberatan.status', 'tanggapan');
    protected $order = array('tanggal_keberatan' => 'desc');
    protected $request;
    protected $db;
    protected $dt;


    function __construct($request = null)
    {
        // parent::__construct();
        $this->db = db_connect();
        $this->request = $request;


        $this->dt = $this->db->table($this->table)->select("$this->table.id as keberatan_id, $this->table.permohonan_id,nomor_register,jenis_keberatan,tanggal_keberatan,isi_keberatan,tanggapan, $this->table.status,$this->table.email, nama, jawaban")->join('jenis_keberatan', "$this->table.jenis_keberatan_id=jenis_keberatan.id")->join('proses_keberatan', "$this->table.id=proses_keberatan.keberatan_id", 'left')->join('permohonan', "$this->table.permohonan_id=permohonan.id")->join('user_profil', "$this->table.email=user_profil.email")->join('proses_permohonan', "$this->table.permohonan_id=proses_permohonan.permohonan_id");
    }

    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->join('proses_keberatan', "$this->table.id=proses_keberatan.keberatan_id", 'left')->join('proses_permohonan', "$this->table.permohonan_id=proses_permohonan.permohonan_id", 'left')->join('permohonan', "$this->table.permohonan_id=permohonan.id")->join('user_profil', "$this->table.email=user_profil.email")->join('jenis_keberatan', "$this->table.jenis_keberatan_id=jenis_keberatan.id")->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    public function jenis_keberatan()
    {
        $data_keberatan = $this->db->table('jenis_keberatan')->join('proses_keberatan', "$this->table.id=proses_keberatan.keberatan_id", 'left')->join('proses_permohonan', "$this->table.permohonan_id=proses_permohonan.permohonan_id", 'left')->join('permohonan', "$this->table.permohonan_id=permohonan.id")->join('user_profil', "$this->table.email=user_profil.email")->join('jenis_keberatan', "$this->table.jenis_keberatan_id=jenis_keberatan.id")->get()->getResultArray();

        return $data_keberatan;
    }

    public function find_keberatan($id)
    {
        $data_keberatan = $this->db->table($this->table)
            ->select('keberatan.id as keberatan_id, permohonan_id, tanggapan')
            ->where('keberatan.id', $id)
            ->join('proses_keberatan', 'keberatan.id=proses_keberatan.id', 'left')
            ->get()->getRowArray();

        return $data_keberatan;
    }

    public function find_data($id)
    {
        $data_keberatan = $this->db->table('keberatan')
            ->select("$this->table.id as keberatan_id, permohonan_id, isi_keberatan, nomor_register, jenis_keberatan_id,$this->table.email as user_email, nama,tanggapan")
            ->where('keberatan.id', $id)
            ->join('permohonan', "$this->table.permohonan_id=permohonan.id")
            ->join('user_profil', "$this->table.email=user_profil.email")
            ->join('proses_keberatan', "$this->table.id=proses_keberatan.keberatan_id")
            ->get()->getRowArray();

        return $data_keberatan;
    }

    public function proses_keberatan($id, $data)
    {
        $data_keberatan = $this->find_data($id);

        if ($data_keberatan) {
            $db = db_connect();
            $builder = $db->table('proses_keberatan');
            $builder->where('keberatan_id', $id)->update($data);
        } else {
            $db = db_connect();
            $builder = $db->table('proses_keberatan');
            $builder->insert($data);
        }

        $this->db->table($this->table)
            ->where('id', $id)
            ->update(['status' => 'Sudah ditindaklanjuti']);


        return true;
    }
}
