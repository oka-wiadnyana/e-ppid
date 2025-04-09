<?php

namespace App\Models;

use CodeIgniter\Model;

class UservideoModel extends Model
{

    protected $table            = 'video_informasi';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;

    // model
    public function cari_video($keyword)
    {

        return $this->like('uraian', $keyword);
    }

    public function tampil_video()
    {

        return $this->orderBy('id', 'desc');
    }
}
