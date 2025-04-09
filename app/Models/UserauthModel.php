<?php

namespace App\Models;

use CodeIgniter\Model;

class UserauthModel extends Model
{

    protected $table            = 'user_profil';
    protected $allowedFields    = ['nik', 'nama', 'email', 'nomor_telepon', 'alamat', 'pekerjaan', 'institusi', 'password', 'foto_profil', 'ktp'];

    // Dates

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
