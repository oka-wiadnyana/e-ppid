<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keberatan extends Migration
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
            'tanggal_keberatan'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'jenis_keberatan_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'isi_keberatan'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
                'default' => 'Proses verifikasi',
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keberatan');
    }

    public function down()
    {
        $this->forge->dropTable('keberatan');
    }
}
