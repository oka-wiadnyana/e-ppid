<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModelAdmin extends Model
{

    protected $table            = 'permohonan';
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

    protected $column_order = array(null, 'nomor_register', 'jenis_informasi', 'tanggal_permohonan', 'isi_permohonan', 'email', 'jawaban', 'keberatan.status');
    protected $column_search = array('jenis_informasi', 'tanggal_permohonan', 'isi_permohonan', 'keberatan.status', 'jawaban');
    protected $order = array('nomor_register' => 'desc', 'nomor_register' => 'desc');
    protected $request;
    protected $db;
    protected $dt;


    function __construct($request = null)
    {
        // parent::__construct();
        $this->db = db_connect();
        $this->request = $request;


        $this->dt = $this->db->table($this->table)->select("$this->table.id as permohonan_id,id_jenis_informasi,nomor_register,tanggal_permohonan,isi_permohonan,file_permohonan,$this->table.email as user_email,jenis_informasi,$this->table.status,jawaban,nama")->where('keberatan.permohonan_id =', null)->join('user_profil', "$this->table.email=user_profil.email")->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id")->join('proses_permohonan', "$this->table.id=proses_permohonan.permohonan_id", 'left')->join('keberatan', "$this->table.id=keberatan.permohonan_id", 'left');
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
        return $this->dt->where('keberatan.permohonan_id', null)->join('proses_permohonan', "$this->table.id=proses_permohonan.permohonan_id", 'left')->join('jenis_informasi', "$this->table.id_jenis_informasi=jenis_informasi.id")->join('keberatan', "$this->table.id=keberatan.permohonan_id", 'left')->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table)->where('keberatan.permohonan_id', null)->join('keberatan', "$this->table.id=keberatan.permohonan_id", 'left');
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

    public function update_proses($id, $data, $jenis = null)
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

        if ($jenis == 'tolak') {
            $status = 'Permohonan ditolak';
        } else {
            $status = 'Sudah ditindaklanjuti';
        }
        $this->db->table($this->table)
            ->where('id', $id)
            ->update(['status' => $status]);

        return true;
    }

    public function find_data_tolak($id)
    {
        $data = $this->db->table('proses_permohonan')
            ->where('permohonan_id', $id)
            ->get()->getResultArray();
        return $data;
    }

    public function get_data_permohonan_perkara($month, $year)
    {
        $jumlah_permohonan_perkara = $this->db->table($this->table)->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->countAllResults();
        $jml_perkara_sepenuhnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('status_jawaban', 'Sepenuhnya')
            ->countAllResults();
        $jml_perkara_sebagian = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('status_jawaban', 'Sebagian')
            ->countAllResults();
        $jml_perkara_tolak = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('status_jawaban', null)
            ->countAllResults();
        $jml_perkara_tolak_rahasia = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('jenis_penolakan', 'Rahasia')
            ->countAllResults();
        $jml_perkara_tolak_belum_kuasai = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $jml_perkara_tolak_lainnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 1)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $dataLaporanPerkara = [$jumlah_permohonan_perkara, $jml_perkara_sepenuhnya, $jml_perkara_sebagian, $jml_perkara_tolak, $jml_perkara_tolak_rahasia, $jml_perkara_tolak_belum_kuasai, $jml_perkara_tolak_lainnya];



        return $dataLaporanPerkara;
    }

    public function get_data_permohonan_kepegawaian($month, $year)
    {
        $jumlah_permohonan_kepegawaian = $this->db->table($this->table)->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->countAllResults();
        $jml_kepegawaian_sepenuhnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('status_jawaban', 'Sepenuhnya')
            ->countAllResults();
        $jml_kepegawaian_sebagian = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('status_jawaban', 'Sebagian')
            ->countAllResults();
        $jml_kepegawaian_tolak = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('status_jawaban', null)
            ->countAllResults();
        $jml_kepegawaian_tolak_rahasia = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('jenis_penolakan', 'Rahasia')
            ->countAllResults();
        $jml_kepegawaian_tolak_belum_kuasai = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $jml_kepegawaian_tolak_lainnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 2)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $dataLaporanKepegawaian = [$jumlah_permohonan_kepegawaian, $jml_kepegawaian_sepenuhnya, $jml_kepegawaian_sebagian, $jml_kepegawaian_tolak, $jml_kepegawaian_tolak_rahasia, $jml_kepegawaian_tolak_belum_kuasai, $jml_kepegawaian_tolak_lainnya];

        return $dataLaporanKepegawaian;
    }

    public function get_data_permohonan_pengawasan($month, $year)
    {
        $jumlah_permohonan_pengawasan = $this->db->table($this->table)->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->countAllResults();
        $jml_pengawasan_sepenuhnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('status_jawaban', 'Sepenuhnya')
            ->countAllResults();
        $jml_pengawasan_sebagian = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('status_jawaban', 'Sebagian')
            ->countAllResults();
        $jml_pengawasan_tolak = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('status_jawaban', null)
            ->countAllResults();
        $jml_pengawasan_tolak_rahasia = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('jenis_penolakan', 'Rahasia')
            ->countAllResults();
        $jml_pengawasan_tolak_belum_kuasai = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $jml_pengawasan_tolak_lainnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 3)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $dataLaporanPengawasan = [$jumlah_permohonan_pengawasan, $jml_pengawasan_sepenuhnya, $jml_pengawasan_sebagian, $jml_pengawasan_tolak, $jml_pengawasan_tolak_rahasia, $jml_pengawasan_tolak_belum_kuasai, $jml_pengawasan_tolak_lainnya];

        return $dataLaporanPengawasan;
    }

    public function get_data_permohonan_anggaran($month, $year)
    {
        $jumlah_permohonan_anggaran = $this->db->table($this->table)->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->countAllResults();
        $jml_anggaran_sepenuhnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', 'Sepenuhnya')
            ->countAllResults();
        $jml_anggaran_sebagian = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', 'Sebagian')
            ->countAllResults();
        $jml_anggaran_tolak = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', null)
            ->countAllResults();
        $jml_anggaran_tolak_rahasia = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Rahasia')
            ->countAllResults();
        $jml_anggaran_tolak_belum_kuasai = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $jml_anggaran_tolak_lainnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $dataLaporanAnggaran = [$jumlah_permohonan_anggaran, $jml_anggaran_sepenuhnya, $jml_anggaran_sebagian, $jml_anggaran_tolak, $jml_anggaran_tolak_rahasia, $jml_anggaran_tolak_belum_kuasai, $jml_anggaran_tolak_lainnya];

        return $dataLaporanAnggaran;
    }

    public function get_data_permohonan_lainnya($month, $year)
    {
        $jumlah_permohonan_lainnya = $this->db->table($this->table)->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->countAllResults();
        $jml_lainnya_sepenuhnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', 'Sepenuhnya')
            ->countAllResults();
        $jml_lainnya_sebagian = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', 'Sebagian')
            ->countAllResults();
        $jml_lainnya_tolak = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('status_jawaban', null)
            ->countAllResults();
        $jml_lainnya_tolak_rahasia = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Rahasia')
            ->countAllResults();
        $jml_lainnya_tolak_belum_kuasai = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $jml_lainnya_tolak_lainnya = $this->db->table($this->table)
            ->join('proses_permohonan', $this->table . '.id=proses_permohonan.permohonan_id')
            ->where('MONTH(tanggal_permohonan)', $month)
            ->where('YEAR(tanggal_permohonan)', $year)
            ->where('id_jenis_informasi', 4)
            ->where('jenis_penolakan', 'Belum dikuasai')
            ->countAllResults();
        $dataLaporanLainnya = [$jumlah_permohonan_lainnya, $jml_lainnya_sepenuhnya, $jml_lainnya_sebagian, $jml_lainnya_tolak, $jml_lainnya_tolak_rahasia, $jml_lainnya_tolak_belum_kuasai, $jml_lainnya_tolak_lainnya];

        return $dataLaporanLainnya;
    }
}
