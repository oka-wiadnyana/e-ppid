<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{

    protected $table            = 'permohonan';
    // protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'id_jenis_informasi',
        'tanggal_permohonan',
        'isi_permohonan',
        'file_permohonan',
        'email',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = array(null, 'jenis_informasi', 'tanggal_permohonan', 'isi_permohonan', 'email');
    protected $column_search = array('jenis_informasi', 'tanggal_permohonan', 'isi_permohonan');
    protected $order = array('permohonan_id' => 'asc');
    protected $request;
    protected $db;
    protected $dt;


    function __construct($request = null)
    {
        // parent::__construct();
        $this->db = db_connect();
        $this->request = $request;

        $this->dt = $this->db->table($this->table)->select("$this->table.id as permohonan_id,id_jenis_informasi,tanggal_permohonan,isi_permohonan,file_permohonan,email,jenis_informasi")->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id");
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
}
