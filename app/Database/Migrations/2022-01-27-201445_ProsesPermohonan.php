<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProsesPermohonan extends Migration
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
            'permohonan_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'proses'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'jawaban'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permohonan_id', 'permohonan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('proses_permohonan');
    }

    public function down()
    {
        $this->forge->dropTable('proses_permohonan');
    }
}
