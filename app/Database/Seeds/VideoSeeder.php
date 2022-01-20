<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'uraian' => 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli',
                'embed_id' => 'P8epy8qO0mg',

            ],
            [
                'uraian' => 'Sosialisasi Layanan untuk Penyandang Disabilitas',
                'embed_id' => 'Xx4_LrSRwVA',

            ],
            [
                'uraian' => 'Video Profile Zona Integritas Pengadilan Negeri Bangli',
                'embed_id' => 'H4emotQALhg&t=5s',

            ],
            [
                'uraian' => 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)',
                'embed_id' => 'SnCyTZ4Ac2c',

            ],


        ];

        // Using insertBatch
        $this->db->table('video_informasi')->insertBatch($data);
    }
}
