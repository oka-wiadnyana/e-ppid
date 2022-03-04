<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{

    protected $table            = 'permohonan';
    protected $primaryKey = 'id';
    // protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'nomor_register',
        'id_jenis_informasi',
        'tanggal_permohonan',
        'isi_permohonan',
        'file_permohonan',
        'email',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = array(null, 'nomor_register', 'jenis_informasi', 'tanggal_permohonan', 'isi_permohonan', 'email', 'jawaban');
    protected $column_search = array('nomor_register', 'jenis_informasi', 'tanggal_permohonan', 'isi_permohonan', 'status', 'jawaban');
    protected $order = array('nomor_register' => 'desc');
    protected $request;
    protected $db;
    protected $dt;


    function __construct($request = null)
    {
        // parent::__construct();
        $this->db = db_connect();
        $this->request = $request;


        $this->dt = $this->db->table($this->table)->select("$this->table.id as permohonan_id,jenis_informasi,nomor_register,tanggal_permohonan,isi_permohonan,file_permohonan,$this->table.email as user_email,jenis_informasi,$this->table.status as status,jawaban,nama,isi_keberatan")->where("$this->table.email", session()->get('user_email'))->join('user_profil', "$this->table.email=user_profil.email")->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id")->join('proses_permohonan', "$this->table.id=proses_permohonan.permohonan_id", 'left')->join('keberatan', "$this->table.id=keberatan.permohonan_id", 'left');
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
        return $this->dt->join('proses_permohonan', "$this->table.id=proses_permohonan.permohonan_id", 'left')->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id")->where('email', session()->get('user_email'))->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table('permohonan')->where('email', session()->get('user_email'));
        return $tbl_storage->countAllResults();
    }


    public function max_nomor_register($tanggal_permohonan)
    {
        $tahun_permohonan = date('Y', strtotime($tanggal_permohonan));
        $max_nomor = $this->db->table($this->table)
            ->selectMax("nomor_register")
            ->where("YEAR(tanggal_permohonan)", $tahun_permohonan)->get()->getRowArray();
        $max_nomor = explode('/', $max_nomor['nomor_register']);
        $max_nomor = (int)$max_nomor[0] + 1;
        $nomor_register_baru = "$max_nomor/$tahun_permohonan";



        return $nomor_register_baru;
    }

    public function find_data($id)
    {
        $data = $this->db->table($this->table)
            ->select("$this->table.id as permohonan_id,id_jenis_informasi,nomor_register,tanggal_permohonan,isi_permohonan,file_permohonan,jenis_informasi,$this->table.email as user_email, nama, jawaban")
            ->join('user_profil', "$this->table.email=user_profil.email")
            ->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id")
            ->join('proses_permohonan', "$this->table.id=proses_permohonan.permohonan_id", 'left')
            ->where("$this->table.id", $id)->get()->getRowArray();
        return $data;
    }

    public function find_data_proses($id)
    {
        $data = $this->db->table('proses_permohonan')
            ->where('permohonan_id', $id)
            ->get()->getResultArray();
        return $data;
    }

    public function update_proses($id, $data)
    {
        $data_exist = $this->db->table('proses_permohonan')
            ->where('permohonan_id', $id)->countAllResults();

        if ($data_exist > 0) {
            $this->db->table('proses_permohonan')
                ->where('permohonan_id', $id)
                ->update($data);
        } else {
            $data_insert = array_merge($data, ['permohonan_id' => $id]);
            $this->db->table('proses_permohonan')
                ->insert($data_insert);
        }

        $this->db->table($this->table)
            ->where('id', $id)
            ->update(['status' => 'Sudah ditindaklanjuti']);

        return true;
    }
}
