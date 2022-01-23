<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermohonanInformasi extends Migration
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
            'id_jenis_informasi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'tanggal_permohonan'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'isi_permohonan'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'file_permohonan'       => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',
            'deleted_at TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permohonan');
    }

    public function down()
    {
        $this->forge->dropTable('permohonan');
    }
}
