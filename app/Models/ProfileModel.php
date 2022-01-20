<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'profil_satker';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'nama',
        'nama_pendek',
        'alamat',
        'nomor_telepon',
        'nomor_fax',
        'email',
        'link_satker',
        'link_youtube',
        'link_instagram',
        'link_facebook',
        'link_twitter',
        'link_video_dashboard',
        'logo'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
