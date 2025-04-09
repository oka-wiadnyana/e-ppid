<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfilEppid extends Migration
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
            'profil' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tupoksi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'struktur' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'visimisi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_ppid');
    }

    public function down()
    {
        $this->forge->dropTable('profil_ppid');
    }
}
