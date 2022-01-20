<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Level3Seeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'level1' => 'A',
                'level2' => '1',
                'level3' => '1',
                'nama' => 'Profil Pengadilan',

            ],
            [
                'level1' => 'A',
                'level2' => '1',
                'level3' => '2',
                'nama' => 'Prosedur beracara',

            ],
            [
                'level1' => 'A',
                'level2' => '1',
                'level3' => '3',
                'nama' => 'Informasi biaya perkara dan informasi biaya kepaniteraan',

            ],
            [
                'level1' => 'A',
                'level2' => '1',
                'level3' => '4',
                'nama' => 'Agenda sidang',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '1',
                'nama' => 'Hak-hak para pihak',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '2',
                'nama' => 'Tata cara pengaduan dugaan pelanggaran',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '3',
                'nama' => 'Hak-hak pelapor',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '4',
                'nama' => 'Tata cara memperoleh layanan informasi',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '5',
                'nama' => 'Hak-hak para pemohon informasi',
            ],
            [
                'level1' => 'A',
                'level2' => '2',
                'level3' => '5',
                'nama' => 'Biaya perolehan informasi',
            ],
            [
                'level1' => 'A',
                'level2' => '3',
                'level3' => '1',
                'nama' => 'Sistem Akuntabilitas kinerja',
            ],
            [
                'level1' => 'A',
                'level2' => '3',
                'level3' => '2',
                'nama' => 'Laporan Realisasi Anggaran',
            ],
            [
                'level1' => 'A',
                'level2' => '3',
                'level3' => '3',
                'nama' => 'Daftar Aset',
            ],
            [
                'level1' => 'A',
                'level2' => '3',
                'level3' => '4',
                'nama' => 'Pengumuman pengadaan barang dan jasa',
            ],
            [
                'level1' => 'A',
                'level2' => '4',
                'level3' => '1',
                'nama' => 'Laporan akses informasi',
            ],
            [
                'level1' => 'A',
                'level2' => '5',
                'level3' => '1',
                'nama' => 'Informasi lain',
            ],
            [
                'level1' => 'B',
                'level2' => '1',
                'level3' => '1',
                'nama' => 'Informasi Serta Merta',
            ],
            [
                'level1' => 'C',
                'level2' => '1',
                'level3' => '1',
                'nama' => 'Umum',
            ],
            [
                'level1' => 'C',
                'level2' => '2',
                'level3' => '1',
                'nama' => 'Informasi putusan',
            ],
            [
                'level1' => 'C',
                'level2' => '2',
                'level3' => '2',
                'nama' => 'Laporan penggunaan biaya perkara',
            ],
            [
                'level1' => 'C',
                'level2' => '2',
                'level3' => '3',
                'nama' => 'Statistik perkara',
            ],
            [
                'level1' => 'C',
                'level2' => '3',
                'level3' => '1',
                'nama' => 'Informasi pengawasan dan pendisiplinan',
            ],
            [
                'level1' => 'C',
                'level2' => '4',
                'level3' => '1',
                'nama' => 'Informasi tentang peraturan dan kebijakan',
            ],
            [
                'level1' => 'C',
                'level2' => '5',
                'level3' => '1',
                'nama' => 'Pedoman pengelolaan   organisasi,   administrasi,   personel   dan   keuangan Pengadilan',
            ],
            [
                'level1' => 'C',
                'level2' => '5',
                'level3' => '2',
                'nama' => 'Standar dan maklumat pelayanan',
            ],
            [
                'level1' => 'C',
                'level2' => '5',
                'level3' => '3',
                'nama' => 'Anggaran serta laporan keuangannya',
            ],
            [
                'level1' => 'C',
                'level2' => '5',
                'level3' => '4',
                'nama' => 'Informasi lainnya',
            ],

        ];

        // Using insertBatch
        $this->db->table('level3')->insertBatch($data);
    }
}
