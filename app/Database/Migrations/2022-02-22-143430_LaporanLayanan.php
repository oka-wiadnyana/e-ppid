<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanLayanan extends Migration
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
            'tahun'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'laporan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],

            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('laporan_layanan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan_layanan');
    }
}
