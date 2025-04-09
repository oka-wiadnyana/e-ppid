<?php

namespace App\Models;

use CodeIgniter\Model;

class PrasyaratModel extends Model
{
    protected $table            = 'prasyarat_others';

    protected $allowedFields    = ['prasyarat', 'hubungi_kami', 'faq'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
