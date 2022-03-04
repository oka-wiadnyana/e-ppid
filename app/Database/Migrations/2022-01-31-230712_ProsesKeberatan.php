<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProsesKeberatan extends Migration
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
            'keberatan_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'proses'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'tanggapan'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'lampiran_tanggapan'       => [
                'type'       => 'VARCHAR',
                'constraint'       => 500,
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('proses_keberatan');
    }

    public function down()
    {
        $this->forge->dropTable('proses_keberatan');
    }
}
