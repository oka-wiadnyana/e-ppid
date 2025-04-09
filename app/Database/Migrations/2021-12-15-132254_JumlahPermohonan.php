<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JumlahPermohonan extends Migration
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
            'bulan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'tahun' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => true,
            ],
            'sepenuhnya' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'sebagian' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'ditolak' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jumlah_permohonan');
    }

    public function down()
    {
        $this->forge->dropTable('jumlah_permohonan');
    }
}
