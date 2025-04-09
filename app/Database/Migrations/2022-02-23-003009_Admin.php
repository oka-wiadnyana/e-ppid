<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'email' => [
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
                'constraint' => '250',
                'default' => 'no-profil.jpg',
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin_auth');
    }

    public function down()
    {
        $this->forge->dropTable('admin_auth');
    }
}
