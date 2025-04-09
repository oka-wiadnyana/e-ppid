<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisInformasi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_informasi' => 'Perkara dan Putusan',
            ],
            [
                'jenis_informasi' => 'Kepegawaian',
            ],
            [
                'jenis_informasi' => 'Pengawasan',

            ],
            [
                'jenis_informasi' => 'Anggaran dan Aset',

            ],
            [
                'jenis_informasi' => 'Lainnya',

            ],
        ];

        // Using insertBatch
        $this->db->table('jenis_informasi')->insertBatch($data);
    }
}
