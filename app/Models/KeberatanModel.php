<?php

namespace App\Models;

use CodeIgniter\Model;

class KeberatanModel extends Model
{

    protected $table            = 'keberatan';
    protected $allowedFields    = ['permohonan_id', 'jenis_keberatan_id', 'tanggal_keberatan', 'isi_keberatan', 'email', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $column_order = array(null, 'nomor_register', 'tanggal_keberatan', 'jenis_keberatan', 'isi_keberatan', 'status', 'tanggapan_keberatan');
    protected $column_search = array('jenis_informasi', 'tanggal_keberatan', 'isi_keberatan', 'status');
    protected $order = array('tanggal_keberatan' => 'desc');
    protected $request;
    protected $db;
    protected $dt;


    function __construct($request = null)
    {
        // parent::__construct();
        $this->db = db_connect();
        $this->request = $request;


        $this->dt = $this->db->table($this->table)->select("$this->table.id as keberatan_id, permohonan_id,nomor_register,jenis_keberatan,tanggal_keberatan,isi_keberatan,tanggapan, $this->table.status")->where("$this->table.email", session()->get('user_email'))->join('jenis_keberatan', "$this->table.jenis_keberatan_id=jenis_keberatan.id")->join('proses_keberatan', "$this->table.id=proses_keberatan.keberatan_id", 'left')->join('permohonan', "$this->table.permohonan_id=permohonan.id");
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
        return $this->dt->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    public function jenis_keberatan()
    {
        $data_keberatan = $this->db->table('jenis_keberatan')
            ->get()->getResultArray();

        return $data_keberatan;
    }

    public function find_keberatan($id)
    {
        $data_keberatan = $this->db->table($this->table)
            ->where('permohonan_id', $id)
            ->get()->getRowArray();

        return $data_keberatan;
    }

    public function find_data($id)
    {
        $data_keberatan = $this->db->table('keberatan')
            ->select("$this->table.id as keberatan_id, permohonan_id, isi_keberatan, nomor_register, jenis_keberatan_id")
            ->where('permohonan_id', $id)
            ->join('permohonan', "$this->table.permohonan_id=permohonan.id")
            ->get()->getRowArray();

        return $data_keberatan;
    }

    public function update_keberatan($id, $data)
    {
        $this->db->table($this->table)->where('permohonan_id', $id)->update($data);

        return true;
    }
}
