<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'institusi' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'foto_profil' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'default' => 'no-profil.jpg',
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_profil');
    }

    public function down()
    {
        $this->forge->dropTable('user_profil');
    }
}
