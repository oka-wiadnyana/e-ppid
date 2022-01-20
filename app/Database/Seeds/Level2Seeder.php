<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Level2Seeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'level1' => 'A',
                'level2' => '1',
                'nama' => 'Informasi Profil dan Pelayanan Dasar Pengadilan',

            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'nama' => 'Informasi berkaitan dengan hak masyarakat',

            ],
            [
                'level1' => 'A',
                'level2' => '3',
                'nama' => 'Informasi Program Kerja, Kegiatan, Keuangan dan Kinerja Pengadilan',

            ],
            [
                'level1' => 'A',
                'level2' => '4',
                'nama' => 'Informasi Laporan Akses Informasi',
            ],
            [
                'level1' => 'A',
                'level2' => '5',
                'nama' => 'Informasi Lain',
            ],
            [
                'level1' => 'B',
                'level2' => '1',
                'nama' => 'Informasi Serta Merta',
            ],
            [
                'level1' => 'C',
                'level2' => '1',
                'nama' => 'Umum',
            ],
            [
                'level1' => 'C',
                'level2' => '2',
                'nama' => 'Informasi tentang perkara dan persidangan',
            ],
            [
                'level1' => 'C',
                'level2' => '3',
                'nama' => 'Informasi tentang Pengawasan dan Pendispilinan',
            ],
            [
                'level1' => 'C',
                'level2' => '4',
                'nama' => ' Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian',
            ],
            [
                'level1' => 'C',
                'level2' => '5',
                'nama' => ' Informasi tentang Organisasi, Administrasi, Kepegawaian dan Keuangan',
            ],


        ];

        // Using insertBatch
        $this->db->table('level2')->insertBatch($data);
    }
}
