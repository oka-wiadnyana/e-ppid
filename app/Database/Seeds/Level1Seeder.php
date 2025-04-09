<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Level1Seeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'level1' => 'A',
                'nama' => 'Informasi yang Wajib Diumumkan Secara Berkala oleh Pengadilan',

            ],
            [
                'level1' => 'B',
                'nama' => 'Informasi Wajib Diumumkan Secara Berkala oleh Mahkamah Agung',

            ],
            [
                'level1' => 'C',
                'nama' => 'Informasi yang Wajib Tersedia setiap Saat dan Dapat Diakses oleh Publik',

            ],


        ];

        // Using insertBatch
        $this->db->table('level1')->insertBatch($data);
    }
}
