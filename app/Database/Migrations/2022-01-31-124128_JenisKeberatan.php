<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKeberatan extends Migration
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
            'jenis_keberatan'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_keberatan');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_keberatan');
    }
}
