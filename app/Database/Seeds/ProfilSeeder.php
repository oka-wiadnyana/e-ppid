<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'PENGADILAN NEGERI BANGLI',
                'nama_pendek' => 'PN BANGLI',
                'alamat' => 'Jl. Mayor Sugianyar No. 61, Bangli, Bali',
                'nomor_telepon' => '(0366) 91030',
                'nomor_fax' => '(0366) 91030',
                'email' => 'info@pn-bangli.go.id',
                'link_satker' => 'https://pn-bangli.go.id',
                'link_youtube' => 'https://www.youtube.com/channel/UCLeee8y1JAEroAGxvQR9lBQ',
                'link_facebook' => 'https://www.facebook.com/pengadilan.negeribangli.5',
                'link_instagram'    => 'https://www.instagram.com/pnbangli/',
                'link_twitter'    => '',
                // masukkan hanya id embed
                'link_video_dashboard' => '0Akcjvjgaw4',
                'logo' => 'logo-pn.png'
            ],

        ];

        // Using insertBatch
        $this->db->table('profil_satker')->insertBatch($data);
    }
}
