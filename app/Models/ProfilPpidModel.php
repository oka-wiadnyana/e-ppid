<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilPpidModel extends Model
{
    protected $table            = 'profil_ppid';

    protected $allowedFields    = ['profil', 'tupoksi', 'struktur', 'visimisi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
