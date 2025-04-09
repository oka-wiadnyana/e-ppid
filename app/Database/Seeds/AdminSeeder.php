<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $rawpassword = '12345';
        $hashpassword = password_hash($rawpassword, PASSWORD_DEFAULT);
        $email = 'onsdee86@gmail.com';
        $nama = 'Oka';
        $nip = '12345678';
        $jabatan = 'admin';

        $data = [
            'nama' => $nama,
            'nip' => $nip,
            'email' => $email,
            'jabatan' => $jabatan,
            'password' => $hashpassword,
        ];

        $this->db->table('admin_auth')->insert($data);
    }
}
