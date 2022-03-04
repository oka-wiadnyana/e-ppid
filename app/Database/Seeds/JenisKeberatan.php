<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisKeberatan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_keberatan' => 'Permohonan informasi ditolak',
            ],
            [
                'jenis_keberatan' => 'Informasi berkala tidak disediakan',
            ],
            [
                'jenis_keberatan' => 'Permintaan informasi tidak ditanggapi',

            ],
            [
                'jenis_keberatan' => 'Permintaan informasi tidak ditanggapi sebagaimana yang diminta',

            ],
            [
                'jenis_keberatan' => 'Permintaan informasi tidak dipenuhi',

            ],
            [
                'jenis_keberatan' => 'Biaya yang dikenakan tidak wajar',

            ],
            [
                'jenis_keberatan' => 'Informasi yang disampaikan melebihi jangka waktu yang ditentukan',

            ],
        ];

        // Using insertBatch
        $this->db->table('jenis_keberatan')->insertBatch($data);
    }
}
